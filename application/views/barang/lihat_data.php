                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER BARANG <small>Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                           
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Jenis</th>
                                                <th>Merk</th>
                                                <th>Jenis Obat</th>
                                                <th>Konektor</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { 
                                            $kategori = $this->model_kategori->get_one($r->id_kategori)->result();
                                            $jenis = $this->model_jenis->get_one($r->id_jenis)->result();
                                            $merk = $this->model_merk->get_one($r->id_merk)->result();
                                            $jenis_obat = $this->model_jenis_obat->get_one($r->id_jenis_obat)->result();
                                            $konektor = $this->model_konektor->get_one($r->id_konektor)->result();
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_barang ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo isset($kategori[0]->nama_kategori) ? $kategori[0]->nama_kategori:"" ;?></td>
                                                <td><?php echo isset($jenis[0]->nama_jenis) ? $jenis[0]->nama_jenis:"" ;?></td>
                                                <td><?php echo isset($merk[0]->nama_merk) ? $merk[0]->nama_merk:"" ;?></td>
                                                <td><?php echo isset($jenis_obat[0]->nama_jenis_obat) ? $jenis_obat[0]->nama_jenis_obat:"" ;?></td>
                                                <td><?php echo isset($konektor[0]->nama_konektor) ? $konektor[0]->nama_konektor:"" ;?></td>
                                                <td><?php echo $r->stok ?></td>
                                                <td class="center">
                                                    <a href="<?php echo 'barang/cetak_barcode/'.$r->kd_barang ?>" target="blank">Cetak Barcode</a> 
                                                </td>
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
                <!-- /. ROW  -->


