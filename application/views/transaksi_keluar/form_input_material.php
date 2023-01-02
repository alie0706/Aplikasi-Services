<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI SERVICE <small>Tambah Data Material</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
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


                            <?php echo anchor('transaksi_services','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                            <?php if($qtybarang[0]->jml == 0){
                                echo anchor('transaksi_services/delete/'.$record['id_transaksi_services'],'Delete',array('class'=>'btn btn-danger btn-sm'));
                            }
                            else{
                            }
                            ?>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_services_detail/post/'.$record['id_transaksi_services'],'Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($list->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_barang ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->qty ?></td>
                                                
                                                <td class="center">
                                                    <?php /*echo anchor('transaksi_services_detail/edit/'.$r->id_transaksi_services.'/'.$r->id_transaksi_services_detail,'Edit');*/ ?> 
                                                    <?php echo anchor('transaksi_services_detail/delete/'.$r->id_transaksi_services.'/'.$r->id_transaksi_services_detail,'Delete'); ?> 
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                