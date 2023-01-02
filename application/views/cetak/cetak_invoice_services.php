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
          <td align="center"><u><b>INVOICE SERVICES</u></b><h5><?php echo $record[0]->no_invoice?></h5>
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
        <table border="0" width="150%">
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
      <table cellspacing='0' style='width:500px; font-size:12pt; font-family:calibri;  box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset; border-collapse: collapse;' border='1'>
      <tr><td><b>No Services <td>: <?php echo $record[0]->no_services?></b><br>
      <tr><td><b>Tanggal Services <td>: <?php echo date_indo($record[0]->tgl_terima)?></b><br> 
      <tr><td><b>Jumlah Transaksi <td>: <?php echo number_format($record[0]->total_all,0,',','.');?></b><br>    
        <b><i>( <?php echo terbilang($record[0]->total_all,0,',','.');?> Rupiah )</b></i>  
    </td></tr>
      <!-- /.col -->
      </table>
</td>

    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
          <th>No.</th>
          <th>Nama Alat</th>
          <th>Merk Alat</th>
          <th>Type Alat</th>
          <th>S/N</th>
          <th>Keluhan Alat</th>
          <th>Qty</th>
          <th>Harga Services</th>
          <th>Jumlah Harga Services</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; 
          $jmlharga = 0;
          $subtotal = 0;
          $discount = 0;
          $pajak = 0;
          $totalall = 0;
          foreach ($list->result() as $r) { 
            $jmlharga = $r->qty * $r->harga_services;
            $subtotal = number_format($record[0]->total_harga,0,',','.');
            $discount = number_format($record[0]->discount,0,',','.');
            $pajak = number_format($record[0]->pajak,0,',','.');
            $totalall = number_format($record[0]->total_all,0,',','.');
            ?>
          <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $r->nama_customer_alat ?></td>
          <td><?php echo $r->merk_customer_alat ?></td>
          <td><?php echo $r->type_customer_alat ?></td>
          <td><?php echo $r->serial_number ?></td>
          <td><?php echo $r->keluhan_alat ?></td>
          <td><?php echo $r->qty ?></td>
          <td><?php echo number_format($r->harga_services,0,',','.'); ?></td>
          <td style='padding-right:30px; text-align: right;'><?php echo number_format($jmlharga,0,',','.'); ?></td>
          </tr>
          <?php $no++; } ?>
          <tr><td colspan="8" align="right">Sub Total <td style='padding-right:30px; text-align: right;'><?php echo $subtotal ?></td>
          <tr><td colspan="8" align="right">Discount <td style='padding-right:30px; text-align: right;'><?php echo $discount ?></td>
          <tr><td colspan="8" align="right">Pajak <td style='padding-right:30px; text-align: right;'><?php echo $pajak ?></td>
          <tr><td colspan="8" align="right">Total Keseluruhan <td style='padding-right:30px; text-align: right;'><?php echo $totalall ?></td>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>

    <table cellspacing='0' style='width:550px; margin-left:10px' border="1">
      <tr><td><b><?php echo terbilang($record[0]->total_all,0,',','.');?> Rupiah </b>
    </td></tr>
    </table>
    <br>

    <table cellspacing='0' style='width:750px; margin-left:10px' border="0">
      <tr><td colspan="2"><b>Kondisi Pembayaran </b></td><tr>
        <tr><td width="40px" align="center"> 1 <td> Pembayaran dilakukan melalui </td></tr>
		<tr><td><td>
						<?php echo $profile[0]->bank; ?><br>
                        An. <?php echo $profile[0]->an; ?><br>
                        No Rek. <?php echo $profile[0]->no_rekening; ?></td></tr>
        <tr><td width="40px" align="center"> 2 <td> Pembayaran dianggap lunas apabila Cek/Bilyet sudah Cair atau sudah tercatat di rekening koran</td></tr>
    </table>

    <table cellspacing='0' style='width:100%; margin-left:10px' border="0">
      <tr><td width="50%"><td align="center"> Hormat kami <br><br><br><br><br><br><br>
    <u>( Herjuno Herlambang )</u><br> Direktur </td></tr>
    </table>
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
