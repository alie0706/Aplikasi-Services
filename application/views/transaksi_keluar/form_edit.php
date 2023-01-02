<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI KELUAR <small>Edit Data Transaksi Keluar</small>
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
													<td style="width:10%;"> Qty Lama</td>
													<td style="width:10%;"> Qty </td>
													<td style="width:20%;"> Harga</td>
													<td style="width:20%;"> Total</td>
													<td> Keterangan</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												<?php 
                                                $total_bayar=0; 
                                                $no=1; 
                                                $totalharga =0;
                                                // $hasil_penjualan = $lihat -> penjualan();?>
												<?php foreach($keranjang->result() as $isi){
                                                    $totalharga = $totalharga + $isi->total;
                                                    if($totalharga==0){
                                                        $totalall = $record[0]->discount + $record[0]->pajak;
                                                    }
                                                    else{
                                                        $totalall = $totalharga - $record[0]->discount + $record[0]->pajak;
                                                    }
                                                        // echo "TEST";
                                                        // break;
                                                    // $totalall1=isset($totalall) ? $totalall:"0";
                                                    ?>
												<tr>
													<td><?php echo $no;?></td>
													<td><?php echo $isi->nama_barang;?></td>
													<td>
												<!-- aksi ke table penjualan -->
												<form method="POST" action="../jualupdatetrans">
														<input type="number" name="qty" id="qty" value="<?php echo $isi->qty;?>" readonly class="form-control">
														<input type="hidden" name="id" value="<?php echo $isi->id_transaksi_keluar_detail;?>" class="form-control">
														<input type="hidden" name="idtrans" value="<?php echo $isi->id_transaksi_keluar;?>" class="form-control">
														<input type="hidden" name="id_barang" value="<?php echo $isi->id_barang;?>" class="form-control">
													</td>
                                                    <td><input type="number" name="qty_baru" id="qty_baru" value="0" class="form-control">
                                                </td>
													<td><input type="number" name="harga" id="harga" value="<?php echo $isi->harga;?>" class="form-control" placeholder="masukan harga"></td>
													<td>
                                                        <?php
                                                        if($isi->total == 0){                                                            
                                                        }
                                                        else{
                                                        ?><input type="number" name="total" id="total" value="<?php echo $isi->total;?>" class="form-control" readonly>
                                                        <?php
                                                        }?>
                                                    </td>
                                                    <td><input type="text" name="keterangan" class="form-control" value="<?php echo $isi->keterangan;?>" placeholder="keterangan"></td>
													
													<td>
														<button type="submit" class="btn btn-warning">Update</button>
												</form>
												<!-- aksi ke table penjualan -->
                                                <a href="<?php echo '../deletetrans/'.$isi->id_transaksi_keluar_detail.'/'.$isi->id_barang.'/'.$isi->id_transaksi_keluar  ?>" class="btn btn-danger"><i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
                                                <?php $no++; $total_bayar += $isi->total;}?>
                                                <?php echo form_open('transaksi_keluar/updatepost'); ?>
                                                
												<input type="hidden" name="idtrans" value="<?php echo $record[0]->id_transaksi_keluar;?>" class="form-control">
                                                <tr><td colspan="5" align="right">Total Harga</td>
                                                <td><input type="text" name="total_harga" id="total_harga" value="<?php echo $totalharga;?>" class="form-control" readonly onChange='hitung_total_all()'></td</tr>
                                                <!-- <tr><td colspan="5" align="right">Biaya Service</td>
                                                <td><input type="text" name="biaya_service" id="biaya_service" value="<?php echo $record[0]->biaya_services;?>" class="form-control" onChange='hitung_total_all()'></td</tr> -->
												<tr><td colspan="5" align="right">Discount</td>
                                                <td><input type="text" name="discount" id="discount" value="<?php echo $record[0]->discount;?>" class="form-control" onChange='hitung_total_all()'></td</tr>
												<tr><td colspan="5" align="right">Uang Muka</td>
                                                <td><input type="text" name="uang_muka" id="uang_muka" class="form-control" value="<?php echo $record[0]->uang_muka;?>" onChange='hitung_sisa()'></td</tr>
												<input type="hidden" name="pajak" id="pajak" value="<?php echo $record[0]->pajak;?>" class="form-control" onChange='hitung_total_all()'></span>
                                                <?php
                                                /*if($record[0]->ppn=='1'){?>
                                                <tr><td colspan="5" align="right">PPN
                                                    <td><input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="yesCheck" value="1" checked><strong>Ya</strong>
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="noCheck" value="0"><strong>Tidak</strong>
                                                        <tr><td colspan="5" align="right">Biaya Pajak</td>
                                                <td><span id="ifYes" style="display:block" ><input type="text" name="pajak" id="pajak" value="<?php echo $record[0]->pajak;?>" class="form-control" onChange='hitung_total_all()'></span></td</tr>
												
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                <tr><td colspan="5" align="right">PPN
                                                    <td><input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="yesCheck" value="1"><strong>Ya</strong>
                                                        <input type="radio" onclick="javascript:yesnoCheck();" name="ppn" id="noCheck" value="0" checked><strong>Tidak</strong>
                                                <tr><td colspan="5" align="right">Biaya Pajak</td>
                                                <td><span id="ifYes" style="display:none" ><input type="text" name="pajak" id="pajak" value="<?php echo $record[0]->pajak;?>" class="form-control" onChange='hitung_total_all()'></span></td</tr>
												<?php
                                                }*/

                                                if($record[0]->ppn=='1'){?>
                                                    <tr><td colspan="5" align="right">PPN 11%
                                                        <td><input type="radio" name="ppn" value="1" checked><strong>Ya</strong>
                                                            <input type="radio" name="ppn" value="0"><strong>Tidak</strong>
                                                            
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                    <tr><td colspan="5" align="right">PPN 11%
                                                        <td><input type="radio" name="ppn" value="1"><strong>Ya</strong>
                                                            <input type="radio" name="ppn" value="0" checked><strong>Tidak</strong>
                                                    <?php
                                                    }
                                                ?>
                                                <tr><td colspan="5" align="right">Total Keseluruhan</td>
                                                <td><input type="text" name="total_all" id="total_all" value="<?php echo $record[0]->total_all;?>" readonly class="form-control"></td</tr>
												
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
                                <input class="form-control" type="hidden" name="no_transaksi" value="<?php echo $record[0]->no_transaksi;?>">
                                    <div class="form-group">
                                        <label>No Invoice</label>
                                        <input class="form-control" name="no_invoice" value="<?php echo $record[0]->no_invoice;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Surat Jalan</label>
                                        <input class="form-control" name="no_surat_jalan" value="<?php echo $record[0]->no_invoice;?>" required placeholder="No Surat Jalan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Transaksi</label>
                                        <input type="text" name="tgl_transaksi" id="tgl_transaksi" value="<?php echo $record[0]->tgl_transaksi;?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                            <label>Customer</label>
                                                <select name="customer" id="customer" class="form-control">
                                                    <?php foreach ($listcustomer as $k) {
                                                        echo "<option value='$k->id_customer'";
                                                        echo $record[0]->id_customer==$k->id_customer?'selected':'';
                                                        echo">$k->nama_customer</option>";
                                                    } ?>
                                                </select>
                                        </div>
                                    
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
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
               //hitung otomatis
            //    function calc_laporan()
            //     {
            //         var txt1 = document.getElementById('qty[]').value;
            //         var txt2 = document.getElementById('harga[]').value;
            //         var txt3 = document.getElementById('total[]').value;
            //         var result = txt1 * txt2 ;
            //         if (!isNaN(result)) {
            //         document.getElementById('total[]').value = result;
            //         }
                    
            //     }

                function hitung_total_all()
                {
                     document.getElementById('total_all').value = 
                    //             parseInt(document.getElementById('total_harga').value) +
                    //             // parseInt(document.getElementById('biaya_service').value) +
                    //             parseInt(document.getElementById('discount').value)+
                    //             parseInt(document.getElementById('pajak').value) ;

                    parseInt(document.getElementById('total_harga').value) - 
                                parseInt(document.getElementById('discount').value) ;

                    // var txt1 = document.getElementById('total_harga').value;
                    // var txt2 = document.getElementById('biaya_service').value;
                    // var txt3 = document.getElementById('pajak').value;
                    // var result = (txt1 + txt2 + txt3) ;
                    // if (!isNaN(result)) {
                    // document.getElementById('total_all').value = result;
                    // }
                    
                }
              // AJAX call for autocomplete 
                $(document).ready(function(){
                    $("#cari").change(function(){
                        $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>barang/cari_barang_update",
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