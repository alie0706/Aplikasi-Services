                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI MASUK <small>Data Transaksi Masuk</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_masuk/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Tanda Terima</th>
                                                <th>Supplier</th>
                                                <th>Tanggal terima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_tanda_terima ?></td>
                                                <td><?php echo $r->nama_supplier ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                <td class="center">
                                                    <a href="<?php echo 'transaksi_masuk/edit/'.$r->id_transaksi ?>">Edit</a> |
                                                    <a href="<?php echo 'transaksi_masuk/form_input_barang/'.$r->id_transaksi ?>">Add dan Delete Barang</a>|
                                                    <a href="<?php echo 'transaksi_masuk/cetak/'.$r->id_transaksi ?>" target="blank">Cetak</a> 
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


