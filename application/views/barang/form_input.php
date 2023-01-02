                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER BARANG <small>Tambah Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('barang/post'); ?>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <option value="0" selected>Silahkan Pilih</option>
                                            <?php foreach ($kategori as $k) {
                                                echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Jenis</label>
                                    <select class="form-control" name="jenis" id="jenis">
                                        
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Merk</label>
                                    <select class="form-control" name="merk" id="merk">
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Jenis Obat</label>
                                    <select class="form-control" name="jenis_obat" id="jenis_obat">
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                
                                <!--  -->
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="table-responsive">  

                            <table class="table table-bordered" id="dynamic_field">  

                                <tr>  

                                    <td><input type="text" name="addmore[][kd_barang]" placeholder="Kode Barang" class="form-control kd_list" required="" /></td>  
                                    <td><input type="text" name="addmore[][nama_barang]" placeholder="Nama Barang" class="form-control name_list" required="" /></td>  
                                    <td><input type="text" name="addmore[][keterangan]" placeholder="Keterangan" class="form-control keterangan_list" required="" /></td>  
                                    <!-- <td><input type="text" name="addmore[][harga]" placeholder="Harga" id="dengan-rupiah" class="form-control harga_list" required="" /></td>   -->

                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

                                </tr>  

                            </table>  

                            <!-- <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  

                            </div>



                            </form>  
                            
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input class="form-control" name="kode_barang" placeholder="kode barang">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input class="form-control" name="nama_barang" placeholder="nama barang">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" name="keterangan" placeholder="keterangan">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input class="form-control" name="harga" placeholder="harga" id="dengan-rupiah">
                                </div> -->

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                                    </div>
                <!-- /. ROW  -->
                <script>
                        //add row dynamic
                        $(document).ready(function(){      

                        var i=1;  



                        $('#add').click(function(){  

                            i++;  

                            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][kd_barang]" placeholder="Kode Barang" class="form-control name_list" required /></td><td><input type="text" name="addmore[][nama_barang]" placeholder="Nama Barang" class="form-control name_list" required="" /></td><td><input type="text" name="addmore[][keterangan]" placeholder="Keterangan" class="form-control keterangan_list" required="" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

                        });



                        $(document).on('click', '.btn_remove', function(){  

                            var button_id = $(this).attr("id");   

                            $('#row'+button_id+'').remove();  

                        });  



                        });  

                        //format rupiah
                        var dengan_rupiah = document.getElementById('dengan-rupiah');
                        dengan_rupiah.addEventListener('keyup', function(e)
                        {
                            dengan_rupiah.value = formatRupiah(this.value);
                        });
                        
                        /* Fungsi */
                        function formatRupiah(angka, prefix)
                        {
                            var number_string = angka.replace(/[^.\d]/g, '').toString(),
                                split    = number_string.split('.'),
                                sisa     = split[0].length % 3,
                                rupiah     = split[0].substr(0, sisa),
                                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                                
                            if (ribuan) {
                                separator = sisa ? ',' : '';
                                rupiah += separator + ribuan.join(',');
                            }
                            
                            rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
                        }
                </script>