                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            LAPORAN TRANSAKSI MASUK <small>Data Transaksi Masuk</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                            <?php echo form_open('laporan/transaksimasuk/cari'); 
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
                                    LAPORAN TRANSAKSI MASUK <br><small>Periode : <?php echo $tgl1;?> s/d <?php echo $tgl2;?></small>
                                </h3>
                                 <?php echo "<a href='cetak/$tgl1/$tgl2' target='blank' class='btn btn-danger btn-sm'>Cetak</a>";?><p>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr style="background-color: blue;">
                                                    <th>No.</th>
                                                    <th>No Tanda Terima</th>
                                                    <th>Supplier</th>
                                                    <th>Tanggal terima</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr style="background-color: red;">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_tanda_terima ?></td>
                                                <td><?php echo $r->nama_supplier ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                </td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Kode Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Nama Kategori</th>
                                                                <th>Nama Jenis</th>
                                                                <th>Nama Merk</th>
                                                                <th>Nama Jenis Obat</th>
                                                                <th>Nama Konektor</th>
                                                                <th>Qty</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $noo=1; 
                                                        $recorddetail    =  $this->model_transaksi_masuk_detail->get_one_transaksi($r->id_transaksi);
                                                            foreach ($recorddetail->result() as $rd) { 
                                                                $kategori = $this->model_kategori->get_one($rd->id_kategori)->result();
                                                                $jenis = $this->model_jenis->get_one($rd->id_jenis)->result();
                                                                $merk = $this->model_merk->get_one($rd->id_merk)->result();
                                                                $jenis_obat = $this->model_jenis_obat->get_one($rd->id_jenis_obat)->result();
                                                                $konektor = $this->model_konektor->get_one($rd->id_konektor)->result();
                                                                ?>
                                                            <tr class="gradeU">
                                                                <td><?php echo $noo ?></td>
                                                                <td><?php echo $rd->kd_barang ?></td>
                                                                <td><?php echo $rd->nama_barang ?></td>
                                                                <td><?php echo isset($kategori[0]->nama_kategori) ? $kategori[0]->nama_kategori:"" ;?></td>
                                                                <td><?php echo isset($jenis[0]->nama_jenis) ? $jenis[0]->nama_jenis:"" ;?></td>
                                                                <td><?php echo isset($merk[0]->nama_merk) ? $merk[0]->nama_merk:"" ;?></td>
                                                                <td><?php echo isset($jenis_obat[0]->nama_jenis_obat) ? $jenis_obat[0]->nama_jenis_obat:"" ;?></td>
                                                                <td><?php echo isset($konektor[0]->nama_konektor) ? $konektor[0]->nama_konektor:"" ;?></td>
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


