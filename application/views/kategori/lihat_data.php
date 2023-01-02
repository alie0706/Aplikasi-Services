                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            KATEGORI <small>List Data Kategori</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('kategori/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo $r->keterangan ?></td>
                                                <td><?php 
                                                    if($r->status=='1'){
                                                        echo "Aktif";
                                                    } 
                                                    else{
                                                        echo "Tidak Aktif";
                                                    };
                                                    ?></td>
                                                <td class="center">
                                                    <?php echo anchor('kategori/edit/'.$r->id_kategori,'Edit'); ?> | 
                                                    <?php echo anchor('kategori/delete/'.$r->id_kategori,'Delete'); ?>
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
