<?php //var_dump($pertanyaan_terbuka);?>
<h1 class="mt-5x">Survey Kepuasan Pelanggan OPF</h1>

<h1 class="mt-5x text-center">Survei Kepuasan</h1>

<div class="box box-default">
    <div class="box-body">
        <!--<label class="text-info">
        Unit Operasi dan pemeliharaan FISIP UI melakukan Survei Kepuasan setiap semester untuk memperoleh hasil evaluasi dan rekomendasi
        mengenai kualitas layanan non akademik dan kepuasan para pemangku
        kepentingan agar dapat ditingkatkan secara berkesinambungan. Survei ini juga
        dilakukan untuk mendapatkan informasi yang akan dijadikan dasar bagi FISIP UI untuk
        perbaikan dan peningkatan kualitas kinerja FISIP UI
        </label>   -->
        <label class="text-infox" style="color:#666">
        Unit Operasi dan pemeliharaan FISIP UI melakukan Survei Kepuasan setiap semester untuk memperoleh hasil evaluasi dan rekomendasi
        mengenai kualitas layanan sarana prasarana, silahkan Bapak/Ibu/Saudara/Saudari mengisi kuesioner di bawah ini guna pengembangan dan perbaikan layanan infrastruktur di lingkungan FISIP UI.
        </label>
        
    </div> 
</div>

            <div class=" box box-warning" style="border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd; padding:10px; box-shadow: 3px 3px 3px #ddd;"> 
                <form method="post" action="survei/submit" class="form-horizontal" id="input-survei">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="unit" class="col-sm-2 control-label">Unit</label>
                        <div class="col-sm-10">
                            <input type="unit" class="form-control" id="unit" name="unit" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis" class="col-sm-2 control-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jenis" name="jenis" required>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                                <option value="staf">staf</option>
                            </select>
                        </div>
                    </div>
            </div>
                <!-- Pertanyaan Berdasarkan Kategori -->
                <?php foreach ($kategori as $kat): ?>
                    <div class="box box-default box-solid" style="border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd; box-shadow: 3px 3px 3px #ddd;">   
                        <div class="box-header"style="line-height:7px">
                            <div class="mt-4x text-center text-purple" style="font-size:18px"><b>- <?php echo $kat['nama_kategori']; ?> -</b></div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                         
                        <div class="box-body">
                            <?php foreach ($pertanyaan as $pert): ?>
                                <?php if ($pert['kategori_id'] == $kat['id']): ?>
                                    <div class="form-group text-center">
                                        <label class="text-info"><?php echo $pert['pertanyaan']; ?></label>
                                        <div style="line-height:2.5px">&nbsp;</div>
                                                <div class="d-flex justify-content-centerx">
                                                    <!-- Level 1 - Sangat Tidak Puas -->
                                                    <label for="pertanyaan_<?php echo $pert['id']; ?>_1" class="text-center" data-toggle="tooltip" title="Sangat Tidak Puas">
                                                        <input type="radio" id="pertanyaan_<?php echo $pert['id']; ?>_1" name="pertanyaan_tertutup_<?php echo $pert['id']; ?>" value="1" required>
                                                        
                                                        <i class="far fa-angry fa-2x text-danger"></i><br>
                                                        <small>1 - Sangat Tidak Puas</small>
                                                    </label>
                                                    <!-- Level 2 - Tidak Puas -->
                                                    <label for="pertanyaan_<?php echo $pert['id']; ?>_2" class="text-center" data-toggle="tooltip" title="Tidak Puas">
                                                        <input type="radio" id="pertanyaan_<?php echo $pert['id']; ?>_2" name="pertanyaan_tertutup_<?php echo $pert['id']; ?>" value="2" required>
                                                        <i class="far fa-frown fa-2x text-warning"></i><br>
                                                        <small>2 - Tidak Puas</small>
                                                    </label>
                                                    <!-- Level 3 - Cukup Puas -->
                                                    <label for="pertanyaan_<?php echo $pert['id']; ?>_3" class="text-center" data-toggle="tooltip" title="Cukup Puas">
                                                        <input type="radio" id="pertanyaan_<?php echo $pert['id']; ?>_3" name="pertanyaan_tertutup_<?php echo $pert['id']; ?>" value="3" required>
                                                        <i class="far fa-meh fa-2x text-secondary"></i><br>
                                                        <small>3 - Cukup Puas</small>
                                                    </label>
                                                    <!-- Level 4 - Puas -->
                                                    <label for="pertanyaan_<?php echo $pert['id']; ?>_4" class="text-center" data-toggle="tooltip" title="Puas">
                                                        <input type="radio" id="pertanyaan_<?php echo $pert['id']; ?>_4" name="pertanyaan_tertutup_<?php echo $pert['id']; ?>" value="4" required>
                                                        <i class="far fa-smile fa-2x text-primary"></i><br>
                                                        <small>4 - Puas</small>
                                                    </label>
                                                    <!-- Level 5 - Sangat Puas -->
                                                    <label for="pertanyaan_<?php echo $pert['id']; ?>_5" class="text-center" data-toggle="tooltip" title="Sangat Puas">
                                                        <input type="radio" id="pertanyaan_<?php echo $pert['id']; ?>_5" name="pertanyaan_tertutup_<?php echo $pert['id']; ?>" value="5" required>
                                                        <i class="far fa-laugh fa-2x text-success"></i><br>
                                                        <small>5 - Sangat Puas</small>
                                                    </label>
                                                </div> 

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>   <!-- /.box-body -->        
                    </div> <!-- /.box -->
                

                <?php endforeach; ?>

		
		<div class="box box-default" style="padding:10px">
            <div class="box-header" style="line-height:7px">
                <div class="mt-4x text-center text-purple" style="font-size:18px"><strong>- Pertanyaan Terbuka -</strong></div>
            </div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<?php if(!empty($pertanyaan_terbuka)){ ?>
						<?php foreach ($pertanyaan_terbuka as $pert): ?>
						    <div class="form-group">
						        <label class="text-info"><?php echo $pert['pertanyaan']; ?></label>
						        <textarea class="form-control" name="pertanyaan_terbuka_<?php echo $pert['id']; ?>" rows="3" required></textarea>
						    </div>
						<?php endforeach;
					} else { ?>
						<div>belum ada data</div>
					<?php } ?>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
	                <button type="submit" class="btn btn-primary">Submit</button>
	            </form>
			</div>
			<div class="col-md-2"></div>
		</div>
        <!--
        <h2 class="mt-5">Hasil Survey</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Unit</th>
                    <th>Jenis</th>
                    <th>Kepuasan</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($survei as $survey): ?>
                <tr>
                    <td><?php echo $survey['nama']; ?></td>
                    <td><?php echo $survey['unit']; ?></td>
                    <td><?php echo $survey['jenis']; ?></td>
                    <td><?php echo $survey['kepuasan']; ?></td>
                    <td><?php echo $survey['komentar']; ?></td>
                    <td><?php echo $survey['created_at']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
    <style>
        /* Sembunyikan teks di bawah ikon */
        .form-group div label small {
            display: none;
        }
        
        /* Sembunyikan radio button asli */
        .form-group input[type="radio"] {
            /*display: none;*/
            opacity:0;
        }

        /* Style untuk container ikon */
        .form-group .d-flex {
            gap: 15px; /* Jarak antar ikon 
            margin-left:50px;*/
            letter-spacing: 5px;
        }

        /* Style untuk label ikon */
        .form-group label {
            display: inline-block;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s, opacity 0.2s;
        }

        /* Style untuk ikon */
        .form-group label i {
            font-size: 2.5rem; /* Ukuran ikon */
            transition: all 0.3s;
        }

        /* Efek hover pada ikon */
        .form-group label:hover i {
            transform: scale(1.2); /* Perbesar ikon saat dihover */
            opacity: 0.8;
        }

        /* Efek saat ikon dipilih */
        .form-group input[type="radio"]:checked + i {
            transform: scale(1.3); /* Perbesar ikon saat dipilih */
            opacity: 1;
            filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.2)); /* Tambahkan shadow */
        }

        /* Warna ikon saat dipilih */
        .form-group input[type="radio"]:checked + i.fa-angry {
            color: #dc3545 !important; /* Merah lebih tegas */
        }
        .form-group input[type="radio"]:checked + i.fa-frown {
            color: #ffc107 !important; /* Kuning lesbih tegas */
        }
        .form-group input[type="radio"]:checked + i.fa-meh {
            color: #6c757d !important; /* Abu-abu lebih tegas */
        }
        .form-group input[type="radio"]:checked + i.fa-smile {
            color: #0d6efd !important; /* Biru lebih tegas */
        }
        .form-group input[type="radio"]:checked + i.fa-laugh {
            color: #198754 !important; /* Hijau lebih tegas */
        }

        /* Style untuk teks di bawah ikon */
        .form-group label small {
            display: block;
            margin-top: 5px;
            font-size: 0.9rem;
            color: #555;
        }

        /* ... (CSS sebelumnya) ... */

        /* Animasi bounce saat ikon dipilih*/
        @keyframes bounce {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        .form-group input[type="radio"]:checked + i {
            animation: bounce 0.5s ease-in-out;
        } 
    </style>