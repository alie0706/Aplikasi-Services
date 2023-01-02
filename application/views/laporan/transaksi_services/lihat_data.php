                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            LAPORAN TRANSAKSI SERVICES <small>Data Transaksi Services</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                            <?php echo form_open('laporan/transaksiservices/cari'); 
                            $tgl1 = isset($tgl1) ? $tgl1 : "";
                            $tgl2 = isset($tgl2) ? $tgl2 : "";
                            ?>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Terima</label>
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
                                    LAPORAN TRANSAKSI SERVICES <br><small>Periode : <?php echo $tgl1;?> s/d <?php echo $tgl2;?></small>
                                </h3>
                                 <?php echo "<a href='cetak/$tgl1/$tgl2' target='blank' class='btn btn-danger btn-sm'>Cetak</a>";?><p>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr style="background-color: blue;">
                                                <th>No.</th>
                                                <th>No Services</th>
                                                <th>Customer</th>
                                                <th>Customer Alat</th>
                                                <th>Tanggal terima</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr style="background-color: red;">
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


