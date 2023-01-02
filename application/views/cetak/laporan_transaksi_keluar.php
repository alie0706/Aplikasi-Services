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
  <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                <h3 class="page-header">
                                    LAPORAN TRANSAKSI KELUAR <br><small>Periode : <?php echo $tgl1;?> s/d <?php echo $tgl2;?></small>
                                </h3>
                                        <?php $no=1; foreach ($record->result() as $r) { 
                                             $totalharga = "Rp " . number_format($r->total_harga,2,',','.');
                                             $biayaservices = "Rp " . number_format($r->biaya_services,2,',','.'); 
                                             $pajak="Rp " . number_format($r->pajak,2,',','.');
                                             $totalall="Rp " . number_format($r->total_all,2,',','.');?>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                <th>No.</th>
                                                <th>No Transaksi</th>
                                                <th>Customer</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total Harga</th>
                                                <th>Biaya Services</th>
                                                <th>Pajak</th>
                                                <th>Total Keseluruhan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_transaksi ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->tgl_transaksi ?></td>
                                                <td><?php echo $totalharga ?></td>
                                                <td><?php echo $biayaservices ?></td>
                                                <td><?php echo $pajak ?></td>
                                                <td><?php echo $totalall ?></td>
                                                </td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                            <th>No.</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                            <th>Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $noo=1; 
                                                        $recorddetail    =  $this->model_transaksi_keluar_detail->get_one_barang($r->id_transaksi_keluar);
                                                            foreach ($recorddetail->result() as $rd) { 
                                                            $harga = "Rp " . number_format($rd->harga,2,',','.'); 
                                                            $total="Rp " . number_format($rd->total,2,',','.');?>
                                                            <tr class="gradeU">
                                                            <td><?php echo $noo ?></td>
                                                            <td><?php echo $rd->kd_barang ?></td>
                                                            <td><?php echo $rd->nama_barang ?></td>
                                                            <td><?php echo $rd->qty ?></td>
                                                            <td><?php echo $harga ?></td>
                                                            <td><?php echo $total ?></td>
                                                            <td><?php echo $rd->keterangan ?></td>
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
