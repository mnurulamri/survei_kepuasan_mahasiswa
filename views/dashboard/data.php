<?php
//print_r($jumlah_pengaduan);
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?=$jumlah_pengaduan?></h3>
                <p>Total Pengaduan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?=$jumlah_menunggu_konfirmasi?></h3>
                <p>Menunggu Konfirmasi</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?=$jumlah_dalam_proses?></h3>
                <p>Dalam Proses</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?=$jumlah_ditunda?></h3>
                <p>Ditunda</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?=$jumlah_ditolak?></h3>
                <p>Ditolak</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>
    
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?=$jumlah_selesai?></h3>
                <p>Selesai</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
            <!--<a href=""></a>-->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-lg-6">
        <!-- Donut chart -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">Donut Chart</h3>

                    <div class="box-tools pull-rightx">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body-->
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Bar Chart</h3>
                    <div class="box-tools pull-leftx">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>                
                </div>
                <div class="box-body">
                    <div id="bar-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>     
    </div>

    <!--
    <div class="col-md-6 col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Bar Chart</h3>
                <div class="box-tools pull-leftx">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>                
            </div>
            <div class="box-body">
                <div id="bar-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    -->


</div>
