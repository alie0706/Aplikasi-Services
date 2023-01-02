<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data Jenis</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('jenis/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_jenis']?>" name="id">
                                <div class="form-group">
                                    <label>Kode Jenis</label>
                                    <input type="text" name="kd_jenis" class="form-control" placeholder="kode jenis" value="<?php echo $record['kd_jenis']?>" maxlength="2" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label>Nama Jenis</label>
                                    <input type="text" name="nama_jenis" class="form-control" placeholder="nama jenis" value="<?php echo $record['nama_jenis']?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'";
                                            echo $record['id_kategori']==$k->id_kategori?'selected':'';
                                            echo">$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

