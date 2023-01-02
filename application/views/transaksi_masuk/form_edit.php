                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER BARANG <small>Edit Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_masuk/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['id_transaksi']?>">
                                <div class="form-group">
                                        <label>No Tanda Terima</label>
                                        <input class="form-control" name="no_tanda_terima" value="<?php echo $record['no_tanda_terima']?>" placeholder="No Tanda Terima" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" id="tgl_terima" value="<?php echo $record['tgl_terima']?>" placeholder="Isi tanggal terima" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier" id="supplier" class="form-control">
                                        <?php foreach ($supplier as $k) {
                                            echo "<option value='$k->id_supplier'";
                                            echo $record['id_supplier']==$k->id_supplier?'selected':'';
                                            echo">$k->nama_supplier</option>";
                                        } ?>
                                    </select>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
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