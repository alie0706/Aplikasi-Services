                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI KELUAR <small>Data Transaksi Keluar</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_keluar/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Transaksi</th>
                                                <th>Customer</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_transaksi ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->tgl_transaksi ?></td>
                                                <td class="center">
                                                    <a href="<?php echo 'transaksi_keluar/edit/'.$r->id_transaksi_keluar ?>">Edit</a> |
                                                    <a href="<?php echo 'transaksi_keluar/cetak/'.$r->id_transaksi_keluar ?>" target="blank">Cetak Invoice</a>|
                                                    <a href="<?php echo 'transaksi_keluar/printsj/'.$r->id_transaksi_keluar ?>" target="blank">Cetak Surat Jalan</a> 
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


