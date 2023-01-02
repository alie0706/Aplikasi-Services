                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI SERVICES <small>Data Transaksi Services</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_services/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Services</th>
                                                <th>Customer</th>
                                                <!-- <th>Customer Alat</th> -->
                                                <th>Tanggal terima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { 
										// $alat=$this->model_customer_alat->get_one_alat($r->id_customer_alat)->result();
                                        ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_services ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                <td class="center">
                                                    <a href="<?php echo 'transaksi_services/edit/'.$r->id_transaksi_services ?>">Edit</a> |
                                                    <a href="<?php echo 'transaksi_services/form_input_material/'.$r->id_transaksi_services ?>">Add dan Delete Barang</a> |
                                                    <a href="<?php echo 'transaksi_services/cetakinvoice/'.$r->id_transaksi_services ?>" target="blank">Cetak Invoice</a> |
                                                    <a href="<?php echo 'transaksi_services/cetak/'.$r->id_transaksi_services ?>" target="blank">Cetak</a> 
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


