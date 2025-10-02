
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Operasi Pemeliharaan Fasilitas - 2025 </strong> 
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<?php //$base_url = 'https://ppf.fisip.ui.ac.id/backend/'; ?>
<script src="../assets/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/AdminLTE/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>


<script>
// untuk sidebar menu
var url = window.location;
$('ul.sidebar-menu li a').filter(function() {
    return this.href == url;
    console.log(url)
}).parent().siblings().removeClass('active').end().addClass('active');

// untuk treeview sub menu dan multimenu
$('ul.treeview-menu li a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu > li").siblings().removeClass('active menu-open').end().addClass('active menu-open').css({ display: "block" });

/*
jQuery(function($) {
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
   $('ul a').each(function() {
      if (this.href === path) {
        $(this).addClass('active');
    }
  });
});


// Menandai menu aktif berdasarkan URL
const currentLocation = location.pathname;
const menuLinks = document.querySelectorAll('.menu-link');

menuLinks.forEach(link => {
    if (link.getAttribute('href') === currentLocation) {
        link.classList.add('active');
    }
});



console.log('currentLocation '+currentLocation)
console.log(menuLinks)

menuLinks.forEach(
  console.log(li)
);
*/
</script>

<style>
/* Tables */
table#tabel tr td, th {
	/*border:1px solid gray;*/
}

#tabel {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 70%;
    margin:auto;
}

#tabel td, #tabel th {
    border: 1px solid #ddd;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
    font-size:12px;
}

#tabel th{text-align:center}
#tabel tr:nth-child(even){background-color: #f2f2f2;}
#tabel tr:nth-child(odd){background-color: #fff;}

#tabel tr:hover {background-color: #ddd;}

#tabel th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    vertical-align: middle;
    background-color: #4CAF50;
    color: white;
}

.kalban, .bimbingan {
	cursor:pointer;
	text-align:right;
}

table#tabel tr td.total {
	text-align:right !important;
	font-weight: bold !important;
	background: #BCFF00 !important;
}

.space {
	background-color:#fff;
}

</style>
</style>