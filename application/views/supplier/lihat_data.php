                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER SUPPLIER <small>List Data Supplier</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('supplier/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Supplier</th>
                                                <th>Alamat Supplier</th>
                                                <th>Telp Supplier</th>
                                                <th>Email Supplier</th>
                                                <th>PIC Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_supplier ?></td>
                                                <td><?php echo $r->alamat_supplier ?></td>
                                                <td><?php echo $r->tlp_supplier ?></td>
                                                <td><?php echo $r->email_supplier ?></td>
                                                <td><?php echo $r->pic_supplier ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('supplier/edit/'.$r->id_supplier,'Edit'); ?> | 
                                                    <?php echo anchor('supplier/delete/'.$r->id_supplier,'Delete'); ?>
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
