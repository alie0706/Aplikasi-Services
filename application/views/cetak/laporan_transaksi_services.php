<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APP SERVICES</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                <h3 class="page-header">
                                    LAPORAN TRANSAKSI SERVICES <br><small>Periode : <?php echo $tgl1;?> s/d <?php echo $tgl2;?></small>
                                </h3>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                <th>No.</th>
                                                <th>No Services</th>
                                                <th>Customer</th>
                                                <th>Customer Alat</th>
                                                <th>Tanggal terima</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_services ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->nama_customer_alat ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                </td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                            <th>No.</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $noo=1; 
                                                        $recorddetail    =  $this->model_transaksi_services_detail->get_one_transaksi($r->id_transaksi_services);
                                                            foreach ($recorddetail->result() as $rd) { ?>
                                                            <tr class="gradeU">
                                                            <td><?php echo $noo ?></td>
                                                            <td><?php echo $rd->kd_barang ?></td>
                                                            <td><?php echo $rd->nama_barang ?></td>
                                                            <td><?php echo $rd->qty ?></td>
                                                            </tr>
                                                        <?php $noo++; } ?>
                                                        </tbody>
                                                    </table>
                                            
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
