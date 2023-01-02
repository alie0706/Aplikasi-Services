<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI MASUK BARANG <small>Tambah Data Transaksi Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi_masuk_detail/post'); ?>
                                   <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $record[0]->id_transaksi ?>" placeholder="No Tanda Terima" required>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                            <option value='0'>Silahkan Pilih</option>
                                                <?php foreach ($kategori as $k) {
                                                    echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                                } ?>
                                            </select>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="sel1">Pilih Jenis</label>
                                            <select class="form-control" name="jenis" id="jenis">
                                                
                                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Merk</label>
                                            <select class="form-control" name="merk" id="merk">
                                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Jenis Obat</label>
                                            <select class="form-control" name="jenis_obat" id="jenis_obat">
                                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Konektor</label>
                                            <select class="form-control" name="konektor" id="konektor">
                                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>S/N</label>
                                            <input type="text" name="serial_number" class="form-control" placeholder="S/N">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Kode barang</label>
                                            <input type="text" name="kd_barang" class="form-control" placeholder="Kode barang">
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Nama barang</label>
                                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama barang">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" class="form-control" placeholder="Qty">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                                        </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_masuk/form_input_barang/'.$record[0]->id_transaksi,'Kembali',array('class'=>'btn btn-danger btn-sm'))?>
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

                                    html +='<option value="0">Silahkan Pilih</option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value='+data[i].id_konektor+'>'+data[i].nama_konektor+'</option>';
                                    }
                                    $('#konektor').html(html);

                                }
                            });
                        });
                        
                </script>