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
                                                <th>Tanggal terima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_tanda_terima ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                <td class="center">
                                                    <a href="<?php echo 'transaksi_masuk/edit/'.$r->id_transaksi ?>"><i class="glyphicon glyphicon-edit"></i></a> |
                                                    <a href="<?php echo 'transaksi_masuk/delete/'.$r->id_transaksi ?>"><i class="glyphicon glyphicon-trash"></i></a>
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


