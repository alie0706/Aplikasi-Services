<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Edit Data Merk</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('merk/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_merk']?>" name="id">
                                <div class="form-group">
                                    <label>Kode Merk</label>
                                    <input type="text" name="kd_merk" class="form-control" placeholder="kode merk" value="<?php echo $record['kd_merk']?>" maxlength="2" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label>Nama Merk</label>
                                    <input type="text" name="nama_merk" class="form-control" placeholder="nama merk" value="<?php echo $record['nama_merk']?>" >
                                </div>
                                
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'";
                                            echo $record['id_kategori']==$k->id_kategori?'selected':'';
                                            echo">$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                    <?php foreach ($jenis as $k) {
                                            echo "<option value='$k->id_jenis'";
                                            echo $record['id_jenis']==$k->id_jenis?'selected':'';
                                            echo">$k->nama_jenis</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('merk','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <script>

                    $("#kategori").change(function(){

                        // variabel dari nilai combo box kategori
                        var id_kategori = $("#kategori").val();
                    // alert(id_kategori);
                        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                        $.ajax({
                            url : "<?php echo base_url();?>jenis/get_jenis",
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
                </script>
