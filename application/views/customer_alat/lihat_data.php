                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER CUSTOMER <small>List Data Customer</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('customer_alat/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Alamat Customer</th>
                                                <th>Telp Customer</th>
                                                <th>Email Customer</th>
                                                <th>PIC Customer</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_customer ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->alamat_customer ?></td>
                                                <td><?php echo $r->tlp_customer ?></td>
                                                <td><?php echo $r->email_customer ?></td>
                                                <td><?php echo $r->pic_customer ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('customer_alat/edit/'.$r->id_customer,'Edit'); ?> | 
                                                    <?php echo anchor('customer_alat/delete/'.$r->id_customer,'Delete'); ?>| 
                                                    <?php echo anchor('customer_alat/detail/'.$r->id_customer,'Add Alat'); ?>
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
