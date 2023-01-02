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
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> MASTER CUSTOMER
          <small class="float-right"><?php echo date("Y-m-d")?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong><?php echo $record['kd_customer']?></strong><br>
          <?php echo $record['nama_customer']?><br>
          <?php echo $record['alamat_customer']?><br>
          Phone: <?php echo $record['tlp_customer']?><br>
          Email: <?php echo $record['email_customer']?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
          <th>No.</th>
          <th>Kode Alat</th>
          <th>Nama Alat</th>
          <th>Keterangan Alat</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach ($recordalat->result() as $r) { ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $r->kd_customer_alat ?></td>
            <td><?php echo $r->nama_customer_alat ?></td>
            <td><?php echo $r->keterangan_customer_alat ?></td>
          </tr>
          <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
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
