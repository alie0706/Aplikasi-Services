                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            JENIS <small>List Data Jenis</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('jenis/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Jenis</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_jenis ?></td>
                                                <td><?php echo $r->nama_jenis ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('jenis/edit/'.$r->id_jenis,'Edit'); ?> | 
                                                    <?php echo anchor('jenis/delete/'.$r->id_jenis,'Delete'); ?>
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
