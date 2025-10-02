<?php
/*if (!isset($this->session->userdata['logged_in'])) {
  redirect('autentikasi/logout');
}*/

$role_id = 1; //$role_id = $this->session->userdata['logged_in']['kajietik_role_id'];

if ($role_id == 0) {
  $role_value = 0;
  $submit_value = 'Pelapor';
  $btn_style = 'btn-primary';
} else if ($role_id == 2) {
  $role_value = 2;
  $submit_value = 'Petugas';
  $btn_style = 'btn-info';
} else if ($role_id == 6) {
  $role_value = 6;
  $submit_value = 'Keoordinator';
  $btn_style = 'btn-danger';
} else if ($role_id == 1) {
  $role_value = 1;
}
if ($role_value == 1) {
  $submit_form = '
              <form action="'.base_url().'autentikasi/set_role_bridge" method="POST" id="form">
                <input type="hidden" id="var1" name="role_id" value="0"/>
                <input type="submit" value="Pelapor" class="btn btn-primary btn-smx btn-block">
              </form>
              <div style="line-height:2px;">&nbsp;</div>
              <form action="'.base_url().'autentikasi/set_role_bridge" method="POST" id="form">
                <input type="hidden" id="var1" name="role_id" value="2"/>
                <input type="submit" value="Petugas" class="btn btn-info btn-smx btn-block">
              </form>
              <div style="line-height:2px;">&nbsp;</div>
              <form action="'.base_url().'autentikasi/set_role_bridge" method="POST" id="form">
                <input type="hidden" id="var1" name="role_id" value="6"/>
                <input type="submit" value="Koordinator" class="btn btn-success btn-smx btn-block">
              </form>
  ';
} else {
  $submit_form = '
  <form action="'.base_url().'autentikasi/set_role_bridge" method="POST" id="form">
    <input type="hidden" id="var1" name="role_id" value="'.$role_value.'"/>
    <input type="submit" value="'.$submit_value.'" class="btn btn-primary btn-smx btn-block">
  </form>';
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

    <title>OPF FISIP UI</title>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../assets/AdminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/skins/skin-yellow.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-image: url('/backend/assets/images/orange-geometric.png'); ">

    <div class="container">

      <div class="starter-template">
    <div style="text-shadow: 2px 2px 2px lightgray; color:#000">
      <!--<div style="height:35vw; background-image: url('/backend/assets/images/UI_logo.png'); ">-->
        <div style="text-align:center">
          <hr style="border-color:#fa0">
          <h3>Aplikasi Pengaduan Kerusakan Fasilitas</h3>
          
	        <div style="text-align:center">Operasi dan Pemeliharaan</div>
	        <div style="text-align:center">Fakultas Ilmu Sosial dan Ilmu Politik Universitas Indonesia</div>
        </div>
        <!--<hr style="border-color:#fa0">-->
        <div style="border-top:1px solid #fa0;"></div>
        <div class="row" style="text-align:center">
            <h3 class="box-title">Login Sebagai:</h3>

            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <?=$submit_form?>
            </div>
            <div class="col-sm-4"></div>
        <!--
        <?php
        $photo = 'data:image/png;base64,'.$foto;
        echo "<img src = '$photo' width='100px'' height='150px' />";
        ?>
        -->
        </div>


        <!-- 
        <hr>  
        <div class="box box-info" style="overflow:auto">
          <div class="box-header with-border" style="text-align:center">
            <h3 class="box-title">Login Sebagai:</h3>
          </div>
          <div class="box-body">

            <div>
            </div> /. data-list-perbaikan   
          </div>
        </div> -->
      <!--</div>-->
    </div>
        <div style="margin:auto;"><font style="font-weight:bold; font-style:italic; color:#fff; background-color:#555;">&nbsp;&nbsp;&nbsp;&nbsp;ALUR SISTEM PENGADUAN KERUSAKAN FASILITAS&nbsp;&nbsp;&nbsp;&nbsp;</font></div>
        
        <div style="margin:auto" class="text-center">
          <?php          
          /*echo '
          <div style="margin:auto; position:absolute; height:100%; width:100%;">
            <embed src="'.base_url().'assets/pdf_viewer/web/viewer.html?file='.base_url().'dokumen/alur_proses_sistem.pdf" style="height:100%; width:80%;">
          </div>';*/
          ?>
        <!--
        <div style="margin-left:20%; width:70%">
          <?php
          //$data = base64_encode(file_get_contents("dokumen/Alur_Sistem_Pengaduan-2.svg")) ;
          //echo base64_decode($data);
          ?> 
        </div>
        -->     
             
        </div>


        <!--<footer class="main-footer">-->
          <!-- To the right -->
          <!-- <div class="pull-rightx hidden-xs">
            Komite Kaji Etik
          </div>-->
          <!-- Default to the left 
          <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.-->
        <!--</footer>-->
      </div>

      <div class="text-center" style="border:1px solid gray">
        <img src="../../dokumen/Alur_Sistem_Pengaduan_2.png" alt="">
      </div>

    </div><!-- /.container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      /*$(".btn-primary").click(function(){
        var role = 0
        alert(role)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>perbaikan/login/resultRole",
            data: {role:role},
            dataType: "html",
            success: function(data) {
                //window.location.href = "https://ppf.fisip.ui.ac.id/backend/perbaikan/permohonan";
            }
        })
      })*/
    })
    </script>
  </body>
<style>
body{
	background-image:url('/backend/assets/images/orange-geometric.png');
    background-position: center center; /* Background image is centered vertically and horizontally at all times */
    background-repeat: no-repeat; /* Background image doesn’t tile */
    background-attachment: fixed;  /* Background image is fixed in the viewport so that it doesnt move when the content’s height is greater than the image’s height */
    background-size: cover; /* This is what makes the background image rescale based on the container’s size */
}
</style>
</html>
