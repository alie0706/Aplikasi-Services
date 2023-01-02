<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PANDU PERDANA USAHA</title>

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
         <table border="0" style='width:90%; margin-left:10px'>
          <tr>
		  <?php
		  if($profile[0]->logo!=''){?>
		  
		  <td><img src="<?php echo base_url() ?>images/<?php echo $profile[0]->logo ?>" width='200' height='100' style='border: none;'> 
		  <?php
		  }
		  else{?>
		  
		  <td width="50%">
		  <?php
		  }
		  ?>
          <td align="center"><u><b>SURAT JALAN </u></b><h5><?php echo $record[0]->no_surat_jalan?></h5>
          </td></tr></table>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      
    <table cellspacing='0' style='width:100%; margin-left:10px' border='0'>
    <tr>
    <td>
        <table border="0" width="200%">
        <tr><td>
          <div class="col-sm-6 invoice-col">
          
            <address>
              <strong><?php echo $profile[0]->nama_pt?></strong><br>
              <?php echo $profile[0]->alamat?><br>
              Phone: <?php echo $profile[0]->tlp?><br>
              Email: <?php echo $profile[0]->email?>
            </address>
          </div>
        </td></tr>
      </table>
      <table border="0" width="200%">
      <tr><td>
      <div class="col-sm-6 invoice-col">
        Kepada Yth :
        <address>
          <strong><?php echo $customer[0]->nama_customer?></strong><br>
          <?php echo $customer[0]->alamat_customer?><br>
          Phone: <?php echo $customer[0]->tlp_customer?><br>
          Email: <?php echo $customer[0]->email_customer?>
        </address>
      </div>
      <!-- /.col -->
      
      </div>
    </td></tr>
      </table>
    </td>
      <td>
        <center>
      <table cellspacing='0' style='width:450px; font-size:12pt; font-family:calibri;  box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset; border-collapse: collapse;' border='1'>
      <tr><td><b>No Transaksi <td>: <?php echo $record[0]->no_transaksi?></b><br>
      <tr><td><b>Tanggal Transaksi <td>: <?php echo date_indo($record[0]->tgl_transaksi)?></b><br>   
    </td></tr>
      <!-- /.col -->
      </table>
</td>
<table border="0" width="100%">
      <tr>
    <td>
    <div class="col-sm-4 invoice-col">
<b><i>Bersama surat ini kami kirimkan barang sebagai berikut : </b></i>
</td></tr>
</div>
</table>
    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Keterangan</th>
          <th>Qty</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; $ttlqty=0; foreach ($list as $r) { 
            $ttlqty = $ttlqty + $r->qty; ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $r->kd_barang ?></td>
            <td><?php echo $r->nama_barang ?></td>
            <td><?php echo $r->keterangan ?></td>
            <td><?php echo $r->qty ?></td>
          </tr>
          <?php $no++; } ?>
          <tr><td colspan="4" align="right">Total Qty <td><?php echo $ttlqty ?></td>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <table border="0" width="100%">
       <?php
	if($customer[0]->tujuan==''){?>
	<tr><td colspan="2"> <td align="right">......................, <?php echo date_indo("Y-m-d")?></td></tr>
	<?php
	}
	else{?>
      <tr><td colspan="2"> <td align="right"><?php echo $customer[0]->tujuan;?>, <?php echo date_indo("Y-m-d")?></td></tr>
	  <?php
	 }?>
      <tr><td>
      <tr><td width="40%">
        <td align="center">Penerima 
          <br><br><br><br><br><br><br><br>
          ( ........................................... )
        </td>
          <td align="center">Pengirim 
          <br><br><br><br><br><br><br><br>
          ( ........................................... )
          </td></tr>
      <!-- /.col -->
      </table>
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
