<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data Supplier</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('supplier/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_supplier']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" name="nama_supplier" class="form-control" value="<?php echo $record['nama_supplier']?>" placeholder="nama supplier">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <textarea name="alamat_supplier" class="form-control" placeholder="alamat supplier"><?php echo $record['alamat_supplier']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp Supplier</label>
                                    <input type="text" name="tlp_supplier" class="form-control" value="<?php echo $record['tlp_supplier']?>" placeholder="telp supplier">
                                </div>
                                <div class="form-group">
                                    <label>Email Supplier</label>
                                    <input type="email" name="email_supplier" class="form-control" value="<?php echo $record['email_supplier']?>" placeholder="email supplier">
                                </div>
                                <div class="form-group">
                                    <label>PIC supplier</label>
                                    <input type="text" name="pic_supplier" class="form-control" value="<?php echo $record['pic_supplier']?>" placeholder="pic supplier">
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
                                <?php echo anchor('supplier','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

