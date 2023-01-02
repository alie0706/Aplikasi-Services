                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            MASTER BARANG <small>Tambah Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('barang/post'); ?>
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
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <script>
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