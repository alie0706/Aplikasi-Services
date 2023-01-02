<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI SERVICE <small>Tambah Data Material</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_services_detail/post/'.$record['id_transaksi_services'],'Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Alat</th>
                                                <th>S/N</th>
                                                <th>Qty</th>
                                                <th>Harga Services</th>
                                                <th>Jumlah Harga Services</th>
                                                <th>Keluhan Alat</th>
                                                <th>Keterangan Alat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0;foreach ($list->result() as $r) { 
                                            $jmlharga = $r->qty * $r->harga_services;
                                            $total=$total + $jmlharga;
                                            
                                        
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_customer_alat ?></td>
                                                <td><?php echo $r->serial_number ?></td>
                                                <td><?php echo $r->qty ?></td>
                                                <td><?php echo number_format($r->harga_services,0,',','.'); ?></td>
                                                <td><?php echo number_format($jmlharga,0,',','.'); ?></td>
                                                <td><?php echo $r->keluhan_alat ?></td>
                                                <td><?php echo $r->keterangan_alat ?></td>
                                                
                                                <td class="center">
                                                    <?php /*echo anchor('transaksi_services_detail/edit/'.$r->id_transaksi_services.'/'.$r->id_transaksi_services_detail,'Edit');*/ ?> 
                                                    <?php echo anchor('transaksi_services_detail/delete/'.$r->id_transaksi_services.'/'.$r->id_transaksi_services_detail,'Delete'); ?> 
                                                </td>
                                            </tr>
                                        <?php $no++; } 
                                        $discount = isset($record['discount']) ? $record['discount'] : "0"; 
                                        $total_all = isset($record['total_all']) ? $total : $record['total_all']; 
                                        $tgl =date("Y-m-d");
                                        $tglinvoice=isset($record['tgl_invoice']) ? $tgl : $record['tgl_invoice'];
                                        ?>
                                        <form method="POST" action="../updateservices">
                                       <input class="form-control" type="hidden" name="id_transaksi_services" value="<?php echo $record['id_transaksi_services']?>" readonly>
                                        <tr><td colspan="5" align="right">Total Harga</td>
                                        <input type="hidden" name="total_harga" id="total_harga" value="<?php echo $total;?>" class="form-control" readonly onChange='hitung_total_all()'></td</tr>
                                                
                                                <td><input type="text" id="total_harga" value="<?php echo number_format($total,0,',','.');?>" class="form-control" readonly onChange='hitung_total_all()'></td</tr>
                                                <tr><td colspan="5" align="right">Discount</td>
                                                <td><input type="text" name="discount" id="discount" class="form-control" value="<?php echo $discount?>" onChange='hitung_total_all()'></td</tr>
												<tr><td colspan="5" align="right">PPN 11%
                                                    <?php
                                                    if($record['ppn']=="1"){?>
                                                    <td><input type="radio" name="ppn" value="1" checked><strong>Ya</strong>
                                                        <input type="radio" name="ppn" value="0"><strong>Tidak</strong>
                                                        <?php
                                                    }
                                                    else{?>
                                                    <td><input type="radio" name="ppn" value="1"><strong>Ya</strong>
                                                        <input type="radio" name="ppn" value="0" checked><strong>Tidak</strong>
                                                        <?php
                                                    }
                                                    ?>
                                                <tr><td colspan="5" align="right">Total Keseluruhan</td>
                                                <td><input type="text" name="total_all" id="total_all" value="<?php echo $total_all;?>" readonly class="form-control"></td</tr>
												<!-- <tr><td colspan="7" align="center">
                                                    <?php echo anchor('transaksi_services','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                                </td></tr> -->
                                                <!-- </form> -->
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                                    <div class="form-group">
                                        <label>No Services</label>
                                        <input class="form-control" name="no_services" value="<?php echo $record['no_services']?>" readonly>
                                   
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" value="<?php echo $record['tgl_terima']?>" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer" id="customer" class="form-control" readonly>
                                        <?php foreach ($customer as $k) {
                                            echo "<option value='$k->id_customer'";
                                            echo $record['id_customer']==$k->id_customer?'selected':'';
                                            echo">$k->nama_customer</option>";
                                        } ?>
                                    </select>
                                    </div>
                                    <?php
                                    /*

                                    <div class="form-group">
                                    <label>Customer Alat</label>
                                    <select name="customer_alat" id="customer_alat" class="form-control" readonly>
                                        <?php foreach ($customer_alat as $k) {
                                            echo "<option value='$k->id_customer_alat'";
                                            echo $record['id_customer_alat']==$k->id_customer_alat?'selected':'';
                                            echo">$k->nama_customer_alat</option>";
                                        } ?>
                                    </select>
                                    </div>
                                        */
                                        ?>
                                    <div class="form-group">
                                        <label>No Invoice</label>
                                        <input class="form-control" name="no_invoice" value="<?php echo $record['no_invoice']?>" required>
                                   
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tanggal Invoice</label>
                                        <input type="text" name="tgl_invoice" id="tgl_invoice" value="<?php echo $tglinvoice?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Surat Jalan</label>
                                        <input class="form-control" name="no_surat_jalan" value="<?php echo $record['no_surat_jalan']?>" required>
                                   
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-warning btn-sm">Update</button> |
                                                   
                            <?php echo anchor('transaksi_services','Kembali',array('class'=>'btn btn-danger btn-sm'))?> |
                            <?php if($qtybarang[0]->jml == 0){
                                echo anchor('transaksi_services/delete/'.$record['id_transaksi_services'],'Delete',array('class'=>'btn btn-danger btn-sm'));
                            }
                            else{
                            }
                            ?>
                            </form>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <script type="text/javascript">
                function hitung_total_all()
                {
                    // document.getElementById('total_all').value = 
                    //             parseInt(document.getElementById('total_harga').value) +
                    //             parseInt(document.getElementById('biaya_service').value) +
                    //             parseInt(document.getElementById('pajak').value) - 
                    //             parseInt(document.getElementById('discount').value) ;

                    document.getElementById('total_all').value = 
                                parseInt(document.getElementById('total_harga').value) - 
                                parseInt(document.getElementById('discount').value) ;
                    
                    
                }
                </script>
                 <script>
                    $(function()
                {
                    $('#tgl_invoice').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
                </script>