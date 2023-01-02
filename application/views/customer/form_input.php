                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        PANDU PERDANA USAHA <small>Tambah Data Customer</small>
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
                                <?php echo form_open('customer/post'); ?>
                                <div class="form-group">
                                    <label>Kode Customer</label>
                                    <input type="text" name="kd_customer" class="form-control" placeholder="kode customer">
                                </div>
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input type="text" name="nama_customer" class="form-control" placeholder="nama customer">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Customer</label>
                                    <textarea name="alamat_customer" class="form-control" placeholder="alamat customer"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp Customer</label>
                                    <input type="text" name="tlp_customer" class="form-control" placeholder="telp customer">
                                </div>
                                <div class="form-group">
                                    <label>Email Customer</label>
                                    <input type="email" name="email_customer" class="form-control" placeholder="email customer">
                                </div>
                                <div class="form-group">
                                    <label>PIC Customer</label>
                                    <input type="text" name="pic_customer" class="form-control" placeholder="pic customer">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('customer','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->