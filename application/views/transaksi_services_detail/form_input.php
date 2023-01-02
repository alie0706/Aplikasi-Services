<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI SERVICES MATERIAL <small>Tambah Data Services material</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_services_detail/post'); ?>
                                   <input type="hidden" class="form-control" name="id_transaksi_services" value="<?php echo $record[0]->id_transaksi_services ?>" placeholder="No Tanda Terima" required>
                                        
                                   <div class="form-group">
                                        <label>Nama Alat</label>
                                        <select name="id_customer_alat" id="id_customer_alat" class="form-control select2">
                                            <option value="0" selected>Silahkan Pilih</option>
                                            <?php foreach ($recordalat as $k) {
                                                echo "<option value='$k->id_customer_alat'>$k->nama_customer_alat</option>";
                                            } ?>
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="number" name="qty" class="form-control" value="1" placeholder="Qty">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Services</label>
                                            <input type="text" name="harga_services" class="form-control" placeholder="Harga Services">
                                        </div>
                                        <div class="form-group">
                                        <label>Keluhan Alat</label>
                                        <input class="form-control" name="keluhan_alat" placeholder="Keluhan Alat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Alat</label>
                                        <textarea class="form-control" name="keterangan_alat" placeholder="Keterangan Alat" required></textarea>
                                    </div>
                                       
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_services/form_input_material/'.$record[0]->id_transaksi_services,'Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                                    </div>
                <!-- /. ROW  -->
                <script>
                 
                        //pilih combobox
                        $("#kategori").change(function(){

                        // variabel dari nilai combo box kategori
                        var id_kategori = $("#kategori").val();
                        // alert(id_kategori);
                        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                        $.ajax({
                            url : "../../jenis/get_jenis",
                            method : "POST",
                            data : {id_kategori:id_kategori},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                
                                var html = '';
                                var i;
                                html += '<option value=0>Silahkan Pilih </option>';
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].id_jenis+'>'+data[i].nama_jenis+'</option>';
                                }
                                $('#jenis').html(html);

                            }
                        });
                        });

                        $("#jenis").change(function(){

                        // variabel dari nilai combo box kategori
                        var id_jenis = $("#jenis").val();

                        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                        $.ajax({
                            url : "<?php echo base_url();?>jenis/get_merk",
                            method : "POST",
                            data : {id_jenis:id_jenis},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                html += '<option value=0>Silahkan Pilih </option>';
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].id_merk+'>'+data[i].nama_merk+'</option>';
                                }
                                $('#merk').html(html);

                            }
                        });
                        });

                        $("#merk").change(function(){

                        // variabel dari nilai combo box kategori
                        var id_merk = $("#merk").val();

                        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                        $.ajax({
                            url : "<?php echo base_url();?>merk/get_jenis_obat",
                            method : "POST",
                            data : {id_merk:id_merk},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                html += '<option value=0>Silahkan Pilih </option>';
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+data[i].id_jenis_obat+'>'+data[i].nama_jenis_obat+'</option>';
                                }
                                $('#jenis_obat').html(html);

                            }
                        });
                        });
                        $("#jenis_obat").change(function(){

                            // variabel dari nilai combo box kategori
                            var id_jenis_obat = $("#jenis_obat").val();

                            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                            $.ajax({
                                url : "<?php echo base_url();?>jenis_obat/get_konektor",
                                method : "POST",
                                data : {id_jenis_obat:id_jenis_obat},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;

                                    for(i=0; i<data.length; i++){
                                        html += '<option value='+data[i].id_konektor+'>'+data[i].nama_konektor+'</option>';
                                    }
                                    $('#konektor').html(html);

                                }
                            });
                        });
                        
                </script>