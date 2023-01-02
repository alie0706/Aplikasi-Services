                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER CUSTOMER ALAT<small>List Data Customer ALAT</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Kode Customer</label>
                                    <input type="text" name="kd_customer" class="form-control" value="<?php echo $record['kd_customer']?>" readonly placeholder="kode customer">
                                </div>
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input type="text" name="nama_customer" class="form-control" value="<?php echo $record['nama_customer']?>" readonly placeholder="nama customer">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Customer</label>
                                    <textarea name="alamat_customer" class="form-control" readonly placeholder="alamat customer"><?php echo $record['alamat_customer']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp Customer</label>
                                    <input type="text" name="tlp_customer" class="form-control" value="<?php echo $record['tlp_customer']?>" readonly placeholder="telp customer">
                                </div>
                                <div class="form-group">
                                    <label>Email Customer</label>
                                    <input type="email" name="email_customer" class="form-control" value="<?php echo $record['email_customer']?>" readonly placeholder="email customer">
                                </div>
                                
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('customer_alat/post','Tambah Data Alat',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Kode Alat</th>
                                                <th>Nama Alat</th>
                                                <th>S/N</th>
                                                <th>Keterangan Alat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($recordalat->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_customer ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->kode_alat?></td>
                                                <td><?php echo $r->nama_alat?></td>
                                                <td><?php echo $r->serial_number?></td>
                                                <td><?php echo $r->keterangan_alat?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('customer_alat/edit/'.$r->id_customer,'Edit'); ?> | 
                                                    <?php echo anchor('customer_alat/delete/'.$r->id_customer_alat,'Delete'); ?>| 
                                                    <?php echo anchor('customer_alat/detail/'.$r->id_customer_alat,'Add Alat'); ?>
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
