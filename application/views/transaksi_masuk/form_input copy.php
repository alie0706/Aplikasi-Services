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
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label>No Tanda Terima</label>
                                    <input class="form-control" name="no_tanda_terima" placeholder="No Tanda Terima" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label>Tanggal terima</label>
                                <input type="text" name="tgl_terima" id="tgl_terima" placeholder="Isi tanggal terima" class="form-control" required>
                                </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
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
                                            <option value="0" selected>Silahkan Pilih</option>
                                        
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Merk</label>
                                    <select class="form-control" name="merk" id="merk">
                                            <option value="0" selected>Silahkan Pilih</option>
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Jenis Obat</label>
                                    <select class="form-control" name="jenis_obat" id="jenis_obat">
                                            <option value="0" selected>Silahkan Pilih</option>
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="sel1">Pilih Konektor</label>
                                    <select class="form-control" name="konektor" id="konektor">
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

                                    <td><input type="text" name="kd_barang[]" placeholder="Kode Barang" class="form-control kd_list" required="" /></td>  
                                    <td><input type="text" name="nama_barang[]" placeholder="Nama Barang" class="form-control name_list" required="" /></td>  
                                    <td><input type="text" name="qty[]" placeholder="Qty" class="form-control name_list" required="" /></td>  
                                    <td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control keterangan_list" required="" /></td>  
                                    <!-- <td><input type="text" name="harga[]" placeholder="Harga" id="dengan-rupiah" class="form-control harga_list" required="" /></td>   -->

                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

                                </tr>  

                            </table>  

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_masuk','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                                    </div>
                <!-- /. ROW  -->
                <script>
                    $(function()
                {
                    $('#tgl_terima').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
                        //add row dynamic
                        $(document).ready(function(){      

                        var i=1;  



                        $('#add').click(function(){  

                            i++;  

                            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="kd_barang[]" placeholder="Kode Barang" class="form-control name_list" required /></td><td><input type="text" name="nama_barang[]" placeholder="Nama Barang" class="form-control name_list" required="" /></td><td><input type="text" name="qty[]" placeholder="Qty" class="form-control name_list" required="" /></td><td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control keterangan_list" required="" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

                        });



                        $(document).on('click', '.btn_remove', function(){  

                            var button_id = $(this).attr("id");   

                            $('#row'+button_id+'').remove();  

                        });  



                        });  

                        // //format rupiah
                        // var dengan_rupiah = document.getElementById('dengan-rupiah');
                        // dengan_rupiah.addEventListener('keyup', function(e)
                        // {
                        //     dengan_rupiah.value = formatRupiah(this.value);
                        // });
                        
                        // /* Fungsi */
                        // function formatRupiah(angka, prefix)
                        // {
                        //     var number_string = angka.replace(/[^.\d]/g, '').toString(),
                        //         split    = number_string.split('.'),
                        //         sisa     = split[0].length % 3,
                        //         rupiah     = split[0].substr(0, sisa),
                        //         ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                                
                        //     if (ribuan) {
                        //         separator = sisa ? ',' : '';
                        //         rupiah += separator + ribuan.join(',');
                        //     }
                            
                        //     rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                        //     return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
                        // }
                
                        //pilih combobox
                        $("#kategori").change(function(){

                            // variabel dari nilai combo box kategori
                            var id_kategori = $("#kategori").val();
                            // alert(id_kategori);
                            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                            $.ajax({
                                url : "../jenis/get_jenis",
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