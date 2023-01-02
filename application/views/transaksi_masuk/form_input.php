<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI MASUK <small>Tambah Data Transaksi</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_masuk/post'); ?>
                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                                    <div class="form-group">
                                        <label>No Tanda Terima</label>
                                        <input class="form-control" name="no_tanda_terima" value="<?php echo $no_tanda_terima;?>" readonly placeholder="No Tanda Terima" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" id="tgl_terima" placeholder="Isi tanggal terima" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select name="supplier" id="supplier" class="form-control select2">
                                            <option value="0" selected>Silahkan Pilih</option>
                                            <?php foreach ($supplier as $k) {
                                                echo "<option value='$k->id_supplier'>$k->nama_supplier</option>";
                                            } ?>
                                        </select>
                                    </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_masuk','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

                                
                <!-- /. ROW  -->
                <script>
                    $(function()
                {
                    $('#tgl_terima').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
               

                      
                </script>