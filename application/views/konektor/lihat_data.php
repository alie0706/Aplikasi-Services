                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            KONEKTOR <small>List Data Konektor</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('konektor/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Konektor</th>
                                                <th>Kode Konektor</th>
                                                <th>Nama Jenis Obat</th>
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
                                                <td><?php echo $r->kd_konektor ?></td>
                                                <td><?php echo $r->nama_konektor ?></td>
                                                <td><?php echo $r->nama_jenis_obat ?></td>
                                                <td><?php echo $r->nama_merk ?></td>
                                                <td><?php echo $r->nama_jenis ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('konektor/edit/'.$r->id_konektor,'Edit'); ?> | 
                                                    <?php echo anchor('konektor/delete/'.$r->id_konektor,'Delete'); ?>
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
