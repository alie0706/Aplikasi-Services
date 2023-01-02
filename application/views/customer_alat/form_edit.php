<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data Customer Alat</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('customer_alat/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_customer_alat']?>" name="id">
                                <input type="hidden" name="id_customer" class="form-control" value="<?php echo $record['id_customer']?>" placeholder="kode customer alat">
                                
                                <div class="form-group">
                                    <label>Kode Alat</label>
                                    <input type="text" name="kd_customer_alat" class="form-control" value="<?php echo $record['kd_customer_alat']?>" placeholder="kode customer alat">
                                </div>
                                <div class="form-group">
                                    <label>Nama Alat</label>
                                    <input type="text" name="nama_customer_alat" class="form-control" value="<?php echo $record['nama_customer_alat']?>" placeholder="nama customer alat">
                                </div>
                                <div class="form-group">
                                    <label>S/N</label>
                                    <input type="text" name="serial_number" class="form-control" value="<?php echo $record['serial_number']?>" placeholder="S/N">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Alat</label>
                                    <textarea name="keterangan_customer_alat" class="form-control"><?php echo $record['keterangan_customer_alat']?></textarea>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('customer/detail/'.$record['id_customer'],'Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

