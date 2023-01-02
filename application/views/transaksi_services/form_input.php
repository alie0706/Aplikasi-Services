<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI SERVICES <small>Tambah Data Transaksi Services</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_services/post'); ?>
                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                                    <div class="form-group">
                                        <label>No Services</label>
                                        <input class="form-control" name="no_services"  value="<?php echo $no_services;?>" readonly placeholder="No Services" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" id="tgl_terima" placeholder="Isi tanggal terima" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <select name="customer" id="customer" class="form-control">
                                            <option value="0" selected>Silahkan Pilih</option>
                                            <?php foreach ($customer as $k) {
                                                echo "<option value='$k->id_customer'>$k->nama_customer</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <?php
                                    /*
                                    <div class="form-group">
                                            <label for="sel1">Pilih Customer Alat</label>
                                            <select class="form-control" name="customer_alat" id="customer_alat">
                                                
                                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Keluhan Services</label>
                                        <input class="form-control" name="keluhan_services" placeholder="Keluhan Services" required>
                                    </div>
                                    */
                                    ?>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
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
               
                //pilih combobox
                $("#customer").change(function(){

                // variabel dari nilai combo box customer
                var id_customer = $("#customer").val();
                // alert("test");
                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    url : "<?php echo base_url();?>customer_alat/get_customer_alat",
                    method : "POST",
                    data : {id_customer:id_customer},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        html += '<option value=0>Silahkan Pilih </option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_customer_alat+'>'+data[i].nama_customer_alat+'</option>';
                        }
                        $('#customer_alat').html(html);

                    }
                });
                });
                      
                </script>