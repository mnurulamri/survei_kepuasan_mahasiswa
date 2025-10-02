<?php
//echo '<pre>';
//echo 'jumlah_menunggu_konfirmasi='.$jumlah_menunggu_konfirmasi;echo ' jumlah_dalam_proses='.$jumlah_dalam_proses;echo ' jumlah_ditunda='.$jumlah_ditunda;echo ' jumlah_ditolak='.$jumlah_ditolak;echo ' jumlah_selesai='.$jumlah_selesai;echo '</pre>';
?>


<!-- FLOT CHARTS -->
<script src="../assets/AdminLTE/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../assets/AdminLTE/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../assets/AdminLTE/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../assets/AdminLTE/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<script>
  $(function () {

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {label: "Menunggu Konfirmasi", data: <?=$jumlah_menunggu_konfirmasi;?>, color: "#00a65a"},
      {label: "Dalam Proses", data: <?=$jumlah_dalam_proses;?>, color: "#f39c12"},
      {label: "Ditunda", data: <?=$jumlah_ditunda;?>, color: "#f56954"},
      {label: "Ditolak", data: <?=$jumlah_ditolak;?>, color: "#39CCCC"},
      {label: "Selesai", data: <?=$jumlah_selesai;?>, color: "#605ca8"}
    ];
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.3,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    /*
     * END DONUT CHART
     */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [["Menunggu Konfirmasi", <?=$jumlah_menunggu_konfirmasi;?>], ["Dalam Proses", <?=$jumlah_dalam_proses;?>], ["Ditunda", <?=$jumlah_ditunda;?>], ["Ditolak", <?=$jumlah_ditolak;?>], ["Selesai", <?=$jumlah_selesai;?>]],
      color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART */

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:12px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>