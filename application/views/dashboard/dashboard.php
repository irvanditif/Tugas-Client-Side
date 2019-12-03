<?php
$list = array();
$month = date("m");
$year = date("Y");

for ($d = 1; $d <= 31; $d++) {
  $time = mktime(12, 0, 0, $month, $d, $year);
  if (date('m', $time) == $month)
  $this->db->where('tgl', date('Y-m-d', $time));
  $num_rows = $this->db->count_all_results('visitor');
  $list[] = date('M d', $time);
  $data[] = $num_rows;
}

?>

<div class="content-wrapper">
  <!-- Kepala Kontent -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Kontent Halaman -->
  <section class="content">

    <!-- Baris Box -->
    <div class="row">
      <!-- kolom -->
      <div class="col-lg-3 col-xs-6">
        <!-- Setting box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><div class="count"><?php $query = $this->db->query("SELECT * FROM penerbit"); echo $query->num_rows(); ?>
            </div></h3>

            <p>Penerbit</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo site_url('penerbit') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./kolom -->

      
    </div>
    <!-- /.baris -->


    <!-- baris -->
    <div class="row">

      <!-- Kolom Kiri -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Visitor</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="bar" style="height:300px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.Kolom Kiri -->

      <!-- Kolom Kanan-->
      <section class="col-lg-5 connectedSortable">

        <!-- kalendar -->
        <div class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Kalendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Tambah Acara</a></li>
                  <li><a href="#">Hapus Acara</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->

          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
        </div>
        <!-- /.kalender -->

      </section>
      <!-- Kolom Kanan -->

    </div>
    <!-- /.baris -->

  </section>
</div>

<script>
  var randomScalingFactor = function() {
    return Math.round(Math.random() * 100)
  };

  var list = <?php echo json_encode($list); ?>;
  var data = <?php echo json_encode($data); ?>;

  var barChartData = {
    labels: list,
    datasets: [{
      fillColor: "rgba(220,220,220,0.5)",
      strokeColor: "rgba(220,220,220,0.8)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data: data
    }, ]

  }
  window.onload = function() {
    var ctx = document.getElementById("bar").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive: true
    });
  }
</script>