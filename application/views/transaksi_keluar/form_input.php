<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI KELUAR <small>Tambah Data Transaksi Keluar</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                           
                            <div class="panel-body">
                                <div class="table-responsive">
                <section id="main-content">
            <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Keranjang Penjualan</h3>
						<br>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-search"></i> Cari Barang</h4>
								</div>
								<div class="panel-body">
									<input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
								</div>
								<div class="panel-body">
									<div id="hasil_cari"></div>
									<div id="tunggu"></div>
									
								</div>
							</div>
						</div>
						
                        <div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-shopping-cart"></i> KASIR
									
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered">
											<tr>
												<td><b>Tanggal</b></td>
												<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
											</tr>
										</table>
										<table class="table table-bordered" id="example1">
											<thead>
												<tr>
													<td> No</td>
													<td> Nama Barang</td>
													<td style="width:10%;"> Jumlah</td>
													<td style="width:20%;"> Harga</td>
													<td style="width:20%;"> Total</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												<?php 
                                                $total_bayar=0; 
                                                $no=1; 
                                                $totalharga =0;
                                                $sisa_bayar =0;
                                                $discount = 0;
                                                // $hasil_penjualan = $lihat -> penjualan();?>
												<?php foreach($keranjang->result() as $isi){
                                                    $totalharga = $totalharga + $isi->total;
                                                    $sisa_bayar = $totalharga - $discount;
                                                    ;?>
												<tr>
													<td><?php echo $no;?></td>
													<td><?php echo $isi->nama_barang;?></td>
													<td>
												<!-- aksi ke table penjualan -->
												<form method="POST" action="jualupdate">
														<input type="number" name="qty" id="qty[]" value="<?php echo $isi->qty;?>" class="form-control">
														<input type="hidden" name="id" value="<?php echo $isi->id_transaksi_keluar_detail;?>" class="form-control">
														<input type="hidden" name="id_barang" value="<?php echo $isi->id_barang;?>" class="form-control">
													</td>
													<td><input type="number" name="harga" id="harga[]" value="<?php echo $isi->harga;?>" class="form-control" placeholder="masukan harga"></td>
													<td>
                                                        <?php
                                                        if($isi->total == 0){                                                            
                                                        }
                                                        else{
                                                        ?><input type="number" name="total" id="total[]" value="<?php echo $isi->total;?>" class="form-control" readonly>
                                                        <?php
                                                        }?>
                                                    </td>
													<td><input type="text" name="keterangan" class="form-control" value="<?php echo $isi->keterangan;?>" placeholder="keterangan"></td>
													<td>
														<button type="submit" class="btn btn-warning">Update</button>
												</form>
												<!-- aksi ke table penjualan -->
                                                <a href="<?php echo 'deletetemp/'.$isi->id_transaksi_keluar_detail.'/'.$isi->id_session  ?>" class="btn btn-danger"><i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
                                                <?php $no++; $total_bayar += $isi->total;}?>
                                                <?php echo form_open('transaksi_keluar/post'); ?>
                                                <tr><td colspan="4" align="right">Total Harga</td>
                                                <td><input type="text" name="total_harga" id="total_harga" value="<?php echo $totalharga;?>" class="form-control" readonly onChange='hitung_total_all()'></td</tr>
                                                <tr><td colspan="4" align="right">Discount</td>
                                                <td><input type="text" name="discount" id="discount" class="form-control" value="0" onChange='hitung_total_all()'></td</tr>
												<tr><td colspan="4" align="right">Uang Muka</td>
                                                <td><input type="text" name="uang_muka" id="uang_muka" class="form-control" value="0" onChange='hitung_sisa()'></td</tr>
												<tr><td colspan="4" align="right">PPN 11%
                                                    <td><input type="radio" name="ppn" value="1" checked><strong>Ya</strong>
                                                        <input type="radio" name="ppn" value="0"><strong>Tidak</strong>
                                                <!-- <tr><td colspan="4" align="right">PPN 11%
                                                    <td><input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="yesCheck" value="1" checked><strong>Ya</strong>
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="noCheck" value="0"><strong>Tidak</strong>
                                                <tr><td colspan="4" align="right">Biaya Pajak</td>
                                                <td><span id="ifYes" style="display:block" ><input type="text" name="pajak" id="pajak" value="0" class="form-control" onChange='hitung_total_all()'></span></td</tr> -->
												<tr><td colspan="4" align="right">Total Keseluruhan</td>
                                                <td><input type="text" name="total_all" id="total_all" value="<?php echo $totalharga;?>" readonly onChange='hitung_sisa()' class="form-control"></td</tr>
												<!-- <tr><td colspan="4" align="right">Sisa Pembayaran</td>
                                                <td><input type="text" name="sisa_bayar" id="sisa_bayar" value="<?php echo $sisa_bayar;?>" readonly class="form-control"></td</tr> -->
												
											</tbody>
									</table>
									
										<br/>
										<br/>
									</div>
								</div>
							</div>
						</div>
				  </div>
              </div>
          </section>
          <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                                <input class="form-control" type="hidden" name="no_transaksi" placeholder="No Transaksi" readonly required>
                                    <div class="form-group">
                                        <label>No Invoice</label>
                                        <input class="form-control" name="no_invoice" placeholder="No Invoice" required>
									</div>
									<div class="form-group">
                                        <label>No Surat Jalan</label>
                                        <input class="form-control" name="no_surat_jalan" placeholder="No Surat Jalan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Transaksi</label>
                                        <input type="text" name="tgl_transaksi" id="tgl_transaksi" placeholder="Isi tanggal transaksi" class="form-control" required>
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
                                    
                                    
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('transaksi_keluar','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
      </section>      
      <script type="text/javascript">
                    function yesnoCheck() {
                        // alert(document.getElementByValue('ppn'));
                    if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.display = 'block';
                    }
                    else document.getElementById('ifYes').style.display = 'none';
                    }
                    </script>

                <!-- /. ROW  -->
                <script>
                    $(function()
                {
                    $('#tgl_transaksi').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
             

                function hitung_total_all()
                {
                    // document.getElementById('total_all').value = 
                    //             parseInt(document.getElementById('total_harga').value) +
                    //             parseInt(document.getElementById('uang_muka').value) +
                    //             parseInt(document.getElementById('pajak').value) - 
                    //             parseInt(document.getElementById('discount').value) ;

                    document.getElementById('total_all').value = 
                                // parseInt(document.getElementById('total_harga').value) +
                                // parseInt(document.getElementById('uang_muka').value) - 
                                // parseInt(document.getElementById('discount').value) ;
                                parseInt(document.getElementById('total_harga').value) - 
                                parseInt(document.getElementById('discount').value) ;

                    // document.getElementById('sisa_bayar').value = 
                    //             parseInt(document.getElementById('total_harga').value) - 
                    //             parseInt(document.getElementById('discount').value) ;
                    
                    
                }
                // function hitung_sisa()
                // {
                //     document.getElementById('sisa_bayar').value = 
                //                 parseInt(document.getElementById('total_all').value) - 
                //                 parseInt(document.getElementById('uang_muka').value) ;
                    
                    
                // }
              // AJAX call for autocomplete 
                $(document).ready(function(){
                    $("#cari").change(function(){
                        $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>barang/cari_barang",
                        data:'keyword='+$(this).val(),
                        beforeSend: function(){
                            $("#hasil_cari").hide();
                            $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                        },
                        success: function(html){
                            $("#tunggu").html('');
                            $("#hasil_cari").show();
                            $("#hasil_cari").html(html);
                        }
                    });
                    });
                });  
                      
                
                </script>
                