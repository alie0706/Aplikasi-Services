<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data profile</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="<?php echo base_url('profile/edit'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $record[0]->id;?>" name="id">
                                
                                <input type="hidden" name="file_lama" value="<?php echo $record[0]->logo?>" readonly class="form-control">
                                <div class="form-group">
                                    <label>Nama PT</label>
                                    <input type="text" name="nama_pt" class="form-control" value="<?php echo $record[0]->nama_pt;?>" placeholder="nama PT">
                                </div>
                                <div class="form-group">
                                    <label>Alamat PT</label>
                                    <textarea name="alamat" class="form-control" placeholder="alamat pt"><?php echo $record[0]->alamat;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Telp PT</label>
                                    <input type="text" name="tlp" class="form-control" value="<?php echo $record[0]->tlp;?>" placeholder="telp profile">
                                </div>
                                <div class="form-group">
                                    <label>Email PT</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $record[0]->email;?>" placeholder="email profile">
                                </div>
                                <div class="form-group">
                                    <label>Upload Logo</label>
                                    <br>
                                    <img src="<?php echo base_url() ?>images/<?php echo $record[0]->logo ?>" width='200' height='100' style='border: none;'>
                                    <br>
                                    <font color="red"><?php echo $record[0]->logo?></font>
                                    <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                </div>
                                </div>
                               
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('profile','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

