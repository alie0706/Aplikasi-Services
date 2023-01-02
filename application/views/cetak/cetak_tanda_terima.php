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
          <!-- <i class="fas fa-globe"></i>  -->
          <img src="<?php echo base_url() ?>images/<?php echo $profile[0]->logo ?>" width='200' height='100' style='border: none;'> TANDA TERIMA.
          <small class="float-right"><?php echo date_indo("Y-m-d")?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <div class="row invoice-info">
    <table border="0" width="100%">
    <tr>
    <td>
    <table border="0" width="100%">
    <tr>
    <td>
      <div class="col-sm-4 invoice-col">
        From :
        <address>
          <strong><?php echo $profile[0]->nama_pt?></strong><br>
          <?php echo $profile[0]->alamat?><br>
          Phone: <?php echo $profile[0]->tlp?><br>
          Email: <?php echo $profile[0]->email?>
        </address>
      </div>
    </td></tr>
  </table>
      <td>
      <table border="0" width="100%">
      <tr>
    <td>
      <div class="col-sm-4 invoice-col">
        To :
        <address>
          <strong><?php echo $supplier[0]->nama_supplier?></strong><br>
          <?php echo $supplier[0]->alamat_supplier?><br>
          Phone: <?php echo $supplier[0]->tlp_supplier?><br>
          Email: <?php echo $supplier[0]->email_supplier?>
        </address>
      </div>
      <!-- /.col -->
      
      </div>
    </td></tr>
      </table>
    </td>
      <td>
      <table border="0" width="100%">
      <tr>
    <td>
      <!-- /.col -->
      <div class="col-sm-3 invoice-col">
        <b>No Tanda Terima : <?php echo $record['no_tanda_terima']?></b><br>
        <br>
        <b>Tanggal Terima : <?php echo $record['tgl_terima']?></b><br>    
      </div>
    </td></tr>
      <!-- /.col -->
      </table>
</td>
<!-- <table border="0" width="100%">
      <tr>
    <td>
    <div class="col-sm-4 invoice-col">
<b><i>Berikut kami kirimkan barang sebagai berikut : </b></i>
</td></tr>
</div>
</table> -->
    </div>

    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
          <th>No.</th>
          <th>Nama Kategori</th>
          <th>Nama Jenis</th>
          <th>Nama Merk</th>
          <th>Nama Jenis Obat</th>
          <th>Nama Konektor</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Qty</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach ($list->result() as $r) { 
            $kategori = $this->model_kategori->get_one($r->id_kategori)->result();
            $jenis = $this->model_jenis->get_one($r->id_jenis)->result();
            $merk = $this->model_merk->get_one($r->id_merk)->result();
            $jenis_obat = $this->model_jenis_obat->get_one($r->id_jenis_obat)->result();
            $konektor = $this->model_konektor->get_one($r->id_konektor)->result();
            ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo isset($kategori[0]->nama_kategori) ? $kategori[0]->nama_kategori:"" ;?></td>
            <td><?php echo isset($jenis[0]->nama_jenis) ? $jenis[0]->nama_jenis:"" ;?></td>
            <td><?php echo isset($merk[0]->nama_merk) ? $merk[0]->nama_merk:"" ;?></td>
            <td><?php echo isset($jenis_obat[0]->nama_jenis_obat) ? $jenis_obat[0]->nama_jenis_obat:"" ;?></td>
            <td><?php echo isset($konektor[0]->nama_konektor) ? $konektor[0]->nama_konektor:"" ;?></td>
            <td><?php echo $r->kd_barang ?></td>
            <td><?php echo $r->nama_barang ?></td>
            <td><?php echo $r->qty ?></td>
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
