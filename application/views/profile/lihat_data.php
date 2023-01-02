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
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama PT</th>
                                                <th>Alamat PT</th>
                                                <th>Telp PT</th>
                                                <th>Email PT</th>
                                                <!-- <th>Logo PT</th> -->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_pt ?></td>
                                                <td><?php echo $r->alamat ?></td>
                                                <td><?php echo $r->tlp ?></td>
                                                <td><?php echo $r->email ?></td>
                                                <!-- <td><?php echo $r->pic_ ?></td> -->
                                                
                                                <td class="center">
                                                    <?php echo anchor('profile/edit/'.$r->id,'Edit'); ?> 
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
