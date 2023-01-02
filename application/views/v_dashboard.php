                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Dashboard <small>APP-SERVICES.</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $jumlahtransaksimasuk;?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Transaksi Masuk

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $jumlahtransaksikeluar;?> </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Transaksi Keluar

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $jumlahtransaksiservices;?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Transaksi Services

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $jumlahbarang;?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Data Barang

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                
                    <div class="col-md-12">

                        <div class="panel panel-default">
                        <div class="panel-footer back-footer-green">
                                List Transaksi Masuk

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                                <th>No Tanda Terima</th>
                                                <th>Supplier</th>
                                                <th>Tanggal terima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($recordmasuk->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_tanda_terima ?></td>
                                                <td><?php echo $r->nama_supplier ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                
                    <div class="col-md-12">

                        <div class="panel panel-default">
                        <div class="panel-footer back-footer-blue">
                                List Transaksi Keluar

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTables1-example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                                <th>No Transaksi</th>
                                                <th>Customer</th>
                                                <th>Tanggal Transaksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($recordkeluar->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_transaksi ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->tgl_transaksi ?></td>
                                                </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                
                    <div class="col-md-12">

                        <div class="panel panel-default">
                        <div class="panel-footer back-footer-red">
                                List Transaksi Services

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTables2-example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                                <th>No Services</th>
                                                <th>Customer</th>
                                                <th>Customer Alat</th>
                                                <th>Tanggal terima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($recordservices->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->no_services ?></td>
                                                <td><?php echo $r->nama_customer ?></td>
                                                <td><?php echo $r->nama_customer_alat ?></td>
                                                <td><?php echo $r->tgl_terima ?></td>
                                                </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->