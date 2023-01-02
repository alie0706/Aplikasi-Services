<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data Kategori</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('kategori/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_kategori']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" placeholder="kategori" value="<?php echo $record['nama_kategori']?>">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan kategori" value="<?php echo $record['keterangan']?>">
                                </div>
                                <?php
                                if($record['status']=='1'){?>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" checked/>
                                    <label class="form-check-label" for="flexRadioDefault1"> Aktif </label>
                                    </div>

                                    <!-- Default checked radio -->
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" />
                                    <label class="form-check-label" for="flexRadioDefault2"> Tidak Aktif </label>
                                    </div>
                                <?php    
                                }
                                else{?>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"  value="1">
                                    <label class="form-check-label" for="flexRadioDefault1"> Aktif </label>
                                    </div>

                                    <!-- Default checked radio -->
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"  value="0" checked/>
                                    <label class="form-check-label" for="flexRadioDefault2"> Tidak Aktif </label>
                                    </div>
                                <?php    
                                }
                                ?>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

