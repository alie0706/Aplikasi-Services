                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        TRANSAKSI SERVICES <small>Edit Data Transaksi Services</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_services/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['id_transaksi_services']?>">
                                <div class="form-group">
                                        <label>No Services</label>
                                        <input class="form-control" name="no_services" placeholder="No Services" value="<?php echo $record['no_services']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" id="tgl_terima" value="<?php echo $record['tgl_terima']?>" placeholder="Isi tanggal terima" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer" id="customer" class="form-control">
                                        <?php foreach ($customer as $k) {
                                            echo "<option value='$k->id_customer'";
                                            echo $record['id_customer']==$k->id_customer?'selected':'';
                                            echo">$k->nama_customer</option>";
                                        } ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="sel1">Pilih Customer Alat</label>
                                            <label>Customer Alat</label>
                                                <select name="customer_alat" id="customer_alat" class="form-control">
                                                    <?php foreach ($customer_alat->result() as $k) {
                                                        echo "<option value='$k->id_customer_alat'";
                                                        echo $record['id_customer_alat']==$k->id_customer_alat?'selected':'';
                                                        echo">$k->nama_customer_alat</option>";
                                                    } ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Keluhan Services</label>
                                        <input class="form-control" name="keluhan_services" value="<?php echo $record['keluhan_services']?>" placeholder="Keluhan Services" required>
                                    </div>
                                    

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('transaksi_services','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
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