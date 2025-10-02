
<div class="container">
        <h1 class="mt-5">Kelola Pertanyaan</h1>

        <br><br>

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><strong class="text-purple" style="font-size:18px">Pertanyaan Tertutup</strong></a></li>
                <li><a href="#tab_2" data-toggle="tab"><strong class="text-success" style="font-size:18px">Pertanyaan Terbuka</strong></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    
                    <div class="w3-container">

                        <div class="w3-row">
                            <a href="javascript:void(0)" onclick="openTab(event, 'kategori-pertanyaan');">
                                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding aktif">Kategori Pertanyaan</div>
                            </a>
                            <a href="javascript:void(0)" onclick="openTab(event, 'item-pertanyaan');">
                                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Item Pertanyaan</div>
                            </a>
                        </div>
                        <br>
                        <div id="kategori-pertanyaan" class="w3-container city">                            
                            <div class="text-center">
                                <!--<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-kategori-pertanyaan">Tambah Kategori Pertanyaan</a>-->
								<button class="btn btn-primary btn-sm" onclick="displayFormKategoriPertanyaan()">Tambah Kategori Pertanyaan</button>	
								<div id="form-kategori-pertanyaan" style="display:none">
									<br>
									<form id="form-kategori">
										<table style="margin:auto">
											<tr>
												<td><input type="text" class="form-control " name="nama_kategori" placeholder="Kategori Pertanyaan" required></td>
												<td><button type="submit" class="btn btn-default">simpan</button></td>
											</tr>
										</table>
									</form>	
									<br>		
								</div>
                            </div>
						
                            <div id="data-kategori"></div>
                        </div>

                        <div id="item-pertanyaan" class="w3-container city" style="display:none">
                            <div class="text-center">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-pertanyaan-tertutup">Tambah Pertanyaan</a>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pertanyaan as $p): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td id="pertanyaan-tertutup-<?php echo $p['id'];?>"><?php echo $p['pertanyaan']; ?></td>
                                        <td id="kategori-<?php echo $p['id'];?>"><?php echo $p['nama_kategori']; ?></td>
                                        <td>
                                            <a href="#" id="<?php echo $p['id'];?>" class="btn btn-warning btn-sm edit-pertanyaan-tertutup" data-toggle="modalx" data-target="#modal-edit-pertanyaan-tertutupx">Edit</a>
                                            <a href="#" id="<?php echo $p['id'];?>" class="btn btn-danger btn-sm delete-pertanyaan-tertutup" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                            <i id="tombol-simpan-pertanyaan-tertutup-<?php echo $p['id'];?>"></i>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                    <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="text-center">
                        <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-pertanyaan-terbuka">Tambah Pertanyaan Terbuka</a>
                    </div>
                    
                    <div class="box">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pertanyaan_terbuka as $pt): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $pt['pertanyaan']; ?></td>
                                    <td>
                                        <a href="#" id="<?php echo $pt['id'];?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-pertanyaan-terbuka">Edit</a>
                                        <a href="#" id="<?php echo $pt['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
        </div>
    </div>

    <!-- modal pertanyaan tertutup -->
    <div id="modal-tambah-pertanyaan-tertutup" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pertanyaan Tertutup</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                        <h1 class="mt-5">Tambah Kategori Pertanyaan</h1>
                        <form method="post" action="<?php echo site_url('pertanyaan/store'); ?>">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori_id" required>
                                    <?php foreach ($kategori as $k): ?>
                                    <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <h1 class="mt-5">Tambah Pertanyaan</h1>
                        <form method="post" action="<?php echo site_url('pertanyaan/store'); ?>">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori_id" required>
                                    <?php foreach ($kategori as $k): ?>
                                    <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    
    <!-- modal pertanyaan terbuka -->
    <div id="modal-tambah-pertanyaan-terbuka" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pertanyaan Terbuka</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1 class="mt-5">Tambah Pertanyaan Terbuka</h1>
                        <form method="post" action="<?php echo site_url('pertanyaan/store_terbuka'); ?>">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- modal edit pertanyaan tertutup -->
    <div id="modal-edit-pertanyaan-tertutup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Pertanyaan Tertutup</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1 class="mt-5">Edit Pertanyaan</h1>
                        <form method="post" action="<?php echo site_url('pertanyaan/update/' . $pertanyaan['id']); ?>">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori_id" required>
                                    <?php foreach ($kategori as $k): ?>
                                    <option value="<?php echo $k['id']; ?>" <?php echo ($k['id'] == $pertanyaan['kategori_id']) ? 'selected' : ''; ?>>
                                        <?php echo $k['nama_kategori']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required><?php echo $pertanyaan['pertanyaan']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal edit pertanyaan terbuka -->
    <div id="modal-edit-pertanyaan-terbuka" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Pertanyaan Terbuka</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1 class="mt-5">Edit Pertanyaan Terbuka</h1>
                        <form method="post" action="<?php echo site_url('pertanyaan/update_terbuka/' . $pertanyaan['id']); ?>">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" rows="3" required><?php echo $pertanyaan['pertanyaan']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
include(APPPATH.'views/admin/pertanyaan/script.php'); 
include(APPPATH.'views/admin/pertanyaan/css.php'); 
?>