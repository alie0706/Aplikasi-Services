                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Tambah Data Supplier</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <?php
                if($this->session->flashdata('item')) {
                    $message = $this->session->flashdata('item');
                    ?>
                    <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>
                    
                    </div>
                    <?php
                    }
                    
                    ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('supplier/post'); ?>
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" name="nama_supplier" class="form-control" placeholder="nama supplier">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <textarea name="alamat_supplier" class="form-control" placeholder="alamat supplier"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp Supplier</label>
                                    <input type="text" name="tlp_supplier" class="form-control" placeholder="telp supplier">
                                </div>
                                <div class="form-group">
                                    <label>Email Supplier</label>
                                    <input type="email" name="email_supplier" class="form-control" placeholder="email supplier">
                                </div>
                                <div class="form-group">
                                    <label>PIC supplier</label>
                                    <input type="text" name="pic_supplier" class="form-control" placeholder="pic supplier">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('supplier','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->