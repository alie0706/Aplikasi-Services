                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MERK <small>List Data Merk</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('merk/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Merk</th>
                                                <th>Nama Merk</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_merk ?></td>
                                                <td><?php echo $r->nama_merk ?></td>
                                                <td><?php echo $r->nama_jenis ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('merk/edit/'.$r->id_merk,'Edit'); ?> | 
                                                    <?php echo anchor('merk/delete/'.$r->id_merk,'Delete'); ?>
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
