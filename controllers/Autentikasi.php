<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller
{
	private $ci;
	private $server;
	private $port;
	private $admin;
	private $password;
	private $conn;
	private $bind;
	private $basedn;
	private $filter;
	private $username;

	public function __construct()
	{
		parent::__construct();

  		$this->server		= "ldap://152.118.39.37";
  		$this->port			= "389";

		$this->load->database();
		$this->load->helper('url');
		//$this->load->helper('form');
		//$this->load->library('form_validation');
		$this->load->library('session');
	}

    public function index()
    {
        $this->load->view('autentikasi/login');
    }

    public function koneksi()
	{
        $this->conn = ldap_connect($this->server,$this->port) or die("Tidak dapat terhubung ke server");

		if($this->conn)  // jika terkoneksi
		{
            # Check validation for user input in SignUp form
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $this->username = $this->xss_clean($username);
            $this->password = $this->xss_clean($password);

            # set atribut LDAP
            $this->filter = "uid=" . $this->username;
            $this->base_dn = "o=Universitas Indonesia,c=ID";

            $result = @ldap_search($this->conn, $this->base_dn, $this->filter);
            $info = ldap_get_entries($this->conn, $result);

            if($info['count'] == 0) {
                ldap_close($this->conn);
                redirect('autentikasi', 'refresh');
            }

            $this->DN = $info[0]["dn"];
            $ret = @ldap_bind($this->conn, $this->DN, $this->password);

            // cek password            
            if(!$ret)  
            {
                // jika password salah
                //redirect('autentikasi/login', 'refresh');
                echo 'password salah';
                
                    //error password -> redirect ke halaman index
                    $url = 'autentikasi';
                    echo'
                    <script>
                        window.location.href = "'.base_url().$url.'";
                    </script>
                    ';
            } else {
                // password ok                    
                $cn = $info[0]['cn'][0];
                $uid = $info[0]['uid'][0];
                $kd_fak = $info[0]['kodefakultas'][0];
                $role = $info[0]['role'][0];
                $id_user = $info[0]['kodeidentitas'][0];
                $email = $info[0]['mail'][0];
                
                # set kode organisai
                if (!empty($info[0]['kodeorg'][0])) {
                    $array_kode_org = explode(':', $info[0]['kodeorg'][0]);
                    $kode_org = $array_kode_org[0];
                } else {
                    $kode_org = 0;
                }

                # filter hanya mahasiswa FISIP
                if($kd_fak == '89' or $kd_fak == '69' or $kd_fak == '09' or $kd_fak == '00' )
                {
                    # masuk berdasarkan hak akses
                    $hak_akses = 0;
                    $username = $this->username;

                   # cek akun ke database 
                    $sql = "SELECT * FROM users WHERE username = ?";
                    $result = $this->db->query($sql, array($uid))->result_array();
                     
                    
                    if (count($result) > 0) {
                        foreach ($result as $k => $v) {
                            $hak_akses  = $v['hak_akses'];
                        }
                    } else {
                        $hak_akses = 0;
                    }
                    //echo '<pre>'; print_r($hak_akses); exit();
                    # set session data
                    $session_data = array(
                        'username_pengaduan'  => $username,
                        'hak_akses_pengaduan' => $hak_akses,
                        'role_pengaduan' => $role,
                        'kode_org_pengaduan' => $kode_org,
                        'cn_pengaduan' => $cn
                    );
                    
                    // Add user data in session
                    $this->session->set_userdata('logged_pengaduan', $session_data);

                    # redirect ke halaman utama untuk masing-masing hak akses
                    switch ($hak_akses) {
                        case 0:
                            # pelapor
                            $url = 'pelapor';
                            break;
                        case 1:
                            # admin
                            $url = 'autentikasi/set_role';
                            break;       
                        case 2:
                            # petugas
                            $url = 'petugas';
                            break;
                        case 6:
                            # koordinator
                            $url = 'koordinator';
                            break;
                        case 7:
                            # manajer
                            $url = 'manajer';
                            break;

                        //default:
                            # code...
                        //    break;
                    }
                    
                    echo'
                    <script>
                        window.location.href = "'.base_url().$url.'";
                    </script>';
                } else {
                    $url = 'autentikasi';
                    echo'
                    <script>
                        alert(Anda tidak memiliki hak akses);
                        window.location.href = "'.base_url().$url.'";
                    </script>';
                }
            }


        } else {
            echo 'tidak konek';
        }        
        
    }

    public function xss_clean($data)
    {
        // Fix &entity\n;
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
        
        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
        
        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
        
        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
        
        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
        
        do
        {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);
        
        // we are done...
        return $data;
    }

    public function set_role()
    {
        $this->load->view('autentikasi/set_role');
    }

    public function set_role_bridge()
    {
        $role_id = $this->input->post('role_id');

		if($role_id == 0)
		{
			# $this->session->set_userdata('logged_pengaduan', $newdata);  
            # skrip ini akan menimpa session sebelumnya
            # jadi ngakalinnya dengan
            $newdata = $this->session->userdata('logged_pengaduan');
            $newdata['role_name_pengaduan'] = 'Pelapor';
            $newdata['role_id_pengaduan'] = $role_id;
            $this->session->set_userdata('logged_pengaduan', $newdata);

			header("location:".base_url()."pelapor");
		}
		else if ($role_id == 2)
		{
			//$this->session->set_userdata('role_name','Sekretariat');
			$newdata = $this->session->userdata('logged_pengaduan');
            $newdata['role_name_pengaduan'] = 'Petugas';
            $newdata['role_id_pengaduan'] = $role_id;
            $this->session->set_userdata('logged_pengaduan', $newdata);

			header("location:".base_url()."petugas");
		}
		else if ($role_id == 6)
		{
			$newdata = $this->session->userdata('logged_pengaduan');
            $newdata['role_name_pengaduan'] = 'Koordinator';
            $newdata['role_id_pengaduan'] = $role_id;
            $this->session->set_userdata('logged_pengaduan', $newdata);

			header("location:".base_url()."koordinator");
		}/*
		else if ($_POST['role_id']==1)
		{
			//$this->session->set_userdata('role_name','Ketua Tim');
			$newdata = array(
		        'role_name_pengaduan'  => 'Admin',
				'role_id_pengaduan'  => $role_id
			);
			$this->session->set_userdata($newdata);
			header("location:".base_url()."daftar/sekretariat");
		}*/
    }
	
	public function logout() 
	{
		// Removing session data
		$sess_array = array(
			'username_pengaduan' => '',
			'hak_akses_pengaduan' => '',
			'role_pengaduan' => '',
			'kode_org_pengaduan' => '',
			'cn_pengaduan' => '',
	        'role_name_pengaduan'  => '',
			'role_id_pengaduan'  => ''
		);

		$this->session->unset_userdata('logged_pengaduan', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$url = 'autentikasi';
		echo'
		<script>
		window.location.href = "'.base_url().$url.'";
		</script>';	
	}
}