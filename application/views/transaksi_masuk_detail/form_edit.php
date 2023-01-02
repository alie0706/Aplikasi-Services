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
                                <?php echo form_open('transaksi_masuk_detail/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $recorddetail['id_transaksi_detail']?>">
                                <input type="hidden" name="id_transaksi" value="<?php echo $record['id_transaksi']?>">
                                <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="kategori" class="form-control" id="kategori">
                                                <?php foreach ($kategori as $k) {
                                                    echo "<option value='$k->id_kategori'";
                                                    echo $kategori[0]->id_kategori==$k->id_kategori?'selected':'';
                                                    echo">$k->nama_kategori</option>";
                                                } ?>
                                            </select>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="sel1">Pilih Jenis</label>
                                            <select name="jenis" class="form-control" id="jenis">
                                                <?php foreach ($jenis as $k) {
                                                    echo "<option value='$k->id_jenis'";
                                                    echo $jenis[0]->id_jenis==$k->id_jenis?'selected':'';
                                                    echo">$k->nama_jenis</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Merk</label>
                                            <select name="merk" class="form-control" id="merk">
                                                <?php foreach ($merk as $k) {
                                                    echo "<option value='$k->id_merk'";
                                                    echo $merk[0]->id_merk==$k->id_merk?'selected':'';
                                                    echo">$k->nama_merk</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Jenis Obat</label>
                                            <select name="jenis_obat" class="form-control" id="jenis_obat">
                                                <?php foreach ($jenis_obat as $k) {
                                                    echo "<option value='$k->id_jenis_obat'";
                                                    echo $jenis_obat[0]->id_jenis_obat==$k->id_jenis_obat?'selected':'';
                                                    echo">$k->nama_jenis_obat</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih Konektor</label>
                                            <select name="konektor" class="form-control" id="konektor">
                                                <?php foreach ($konektor as $k) {
                                                    echo "<option value='$k->id_konektor'";
                                                    echo $konektor[0]->id_konektor==$k->id_konektor?'selected':'';
                                                    echo">$k->nama_konektor</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode barang</label>
                                            <input type="text" name="kd_barang" class="form-control" value="<?php echo $recorddetail['kd_barang']?>" placeholder="Kode barang">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama barang</label>
                                            <input type="text" name="nama_barang" class="form-control" value="<?php echo $cekbarang[0]->nama_barang ?>"  placeholder="Nama barang">
                                        </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" class="form-control" value="<?php echo $recorddetail['qty']?>" placeholder="Qty">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" value="<?php echo $cekbarang[0]->keterangan ?>" placeholder="Keterangan">
                                        </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_masuk_detail','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
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