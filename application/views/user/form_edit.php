                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            APP SERVICES <small>Edit Data User</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('user/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_user']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $record['nama_lengkap']?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $record['username']?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password" placeholder="password"><i><font color="red" size=1>Kosongkan jika tidak diubah</i></font>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" id="level" class="form-control">
                                    <?php
                                    if($record['level']=='admin'){
                                        echo "<option value='admin' selected>Admin</option>
                                              <option value='user'>User</option>";
                                    }
                                    else{
                                        echo "<option value='admin'>Admin</option>
                                        <option value='user' selected>User</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('user','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->