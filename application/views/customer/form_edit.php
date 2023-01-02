<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        PANDU PERDANA USAHA <small>Edit Data Customer</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('customer/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_customer']?>" name="id">
                                <div class="form-group">
                                    <label>Kode Customer</label>
                                    <input type="text" name="kd_customer" class="form-control" value="<?php echo $record['kd_customer']?>" placeholder="kode customer">
                                </div>
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input type="text" name="nama_customer" class="form-control" value="<?php echo $record['nama_customer']?>" placeholder="nama customer">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Customer</label>
                                    <textarea name="alamat_customer" class="form-control" placeholder="alamat customer"><?php echo $record['alamat_customer']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp Customer</label>
                                    <input type="text" name="tlp_customer" class="form-control" value="<?php echo $record['tlp_customer']?>" placeholder="telp customer">
                                </div>
                                <div class="form-group">
                                    <label>Email Customer</label>
                                    <input type="email" name="email_customer" class="form-control" value="<?php echo $record['email_customer']?>" placeholder="email customer">
                                </div>
                                <div class="form-group">
                                    <label>PIC Customer</label>
                                    <input type="text" name="pic_customer" class="form-control" value="<?php echo $record['pic_customer']?>" placeholder="pic customer">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <?php
                                        if($record['status']=='1'){
                                            echo "<option value='1' selected>Aktif</option>
                                                  <option value='0'>Tidak Aktif</option>";
                                        }
                                        else{
                                            echo "<option value='1'>Aktif</option>
                                            <option value='0' selected>Tidak Aktif</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('customer','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

