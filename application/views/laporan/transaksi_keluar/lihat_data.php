                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            LAPORAN TRANSAKSI KELUAR <small>Data Transaksi Keluar</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                            <?php echo form_open('laporan/transaksikeluar/cari'); 
                            $tgl1 = isset($tgl1) ? $tgl1 : "";
                            $tgl2 = isset($tgl2) ? $tgl2 : "";
                            ?>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Transaksi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                        <input type="text" name="tgl1" id="tgl1" value="<?php echo $tgl1;?>" class="form-control" required>
                                                        </div>
                                                
                                                    </div>
                                        
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                        <input type="text" name="tgl2" id="tgl2" value="<?php echo $tgl2;?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Cari</button> 
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                    </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                <h3 class="page-header">
                                    LAPORAN TRANSAKSI Keluar <br><small>Periode : <?php echo $tgl1;?> s/d <?php echo $tgl2;?></small>
                                </h3>
                                 <?php echo "<a href='cetak/$tgl1/$tgl2' target='blank' class='btn btn-danger btn-sm'>Cetak</a>";?><p>
                                        <?php $no=1; foreach ($record->result() as $r) { 
                                            $totalharga = "Rp " . number_format($r->total_harga,2,',','.');
                                            $biayaservices = "Rp " . number_format($r->biaya_services,2,',','.'); 
                                            $pajak="Rp " . number_format($r->pajak,2,',','.');
                                            $totalall="Rp " . number_format($r->total_all,2,',','.');
                                            ?>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr style="background-color: blue;">
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
                                            <tr style="background-color: red;">
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
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <script>
                    $(function()
                {
                    $('#tgl1').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'});
                    $('#tgl2').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
               

                      
                </script>
                <!-- /. ROW  -->


