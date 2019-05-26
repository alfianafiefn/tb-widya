<body class="">
    <div class="page-wrapper">
        <div class="page-container">
           <?php $this->load->view('V_Topbar') ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-left title-2">Absen</h3>
                                        </div>
                                        <table id="tb_absen" class="table table-bordered table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <?php
                                                        $yr = date('Y');
                                                        $mth = date('m');
                                                        $jumHari = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);
                                                        $date = date('Y-m-00');
                                                        for ($i=0; $i < $jumHari; $i++) { 
                                                            $date = date('Y-m-d',strtotime($date. '+1 days'));
                                                            print_r("
                                                                    <th>".date('d/m',strtotime($date))."</th>
                                                                ");
                                                        }
                                                     ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if(!empty($data_peg_krm)){
                                                        foreach ($data_peg_krm as $dp) {
                                                            print_r("<tr>");
                                                            print_r("<td>".$dp['nama']."</td>");
                                                            for ($i=0; $i < $jumHari; $i++) { 
                                                                print_r("
                                                                        <td></td>
                                                                    ");
                                                            }
                                                            print_r("</tr>");
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2">
                                            <!-- data-toggle="modal" data-target="#staticModal" -->
                                                <button id="btn-abs" data-id="<?php echo date('Y-m-d'); ?>" data-toggle="modal" data-target="#modalAbsen" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-calendar fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Absen</span>
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="btn-fee-krm" type="submit" class="btn btn-lg btn-danger btn-block">
                                                    <i class="fa fa-dollar fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Gaji</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="card">
                                    <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-left title-2">Cetak</h3>
                                            </div>
                                            <table id="tb_cetak" class="table table-bordered table-striped" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <?php
                                                            $yr = date('Y');
                                                            $mth = date('m');
                                                            $jumHari = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);
                                                            $date = date('Y-m-00');
                                                            for ($i=0; $i < $jumHari; $i++) { 
                                                                $date = date('Y-m-d',strtotime($date. '+1 days'));
                                                                print_r("
                                                                        <th>".date('d/m',strtotime($date))."</th>
                                                                    ");
                                                            }
                                                         ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(!empty($data_peg_ctk)){
                                                            foreach ($data_peg_ctk as $dp) {
                                                                print_r("<tr>");
                                                                print_r("<td>".$dp['nama']."</td>");
                                                                for ($i=0; $i < $jumHari; $i++) { 
                                                                    print_r("
                                                                            <td></td>
                                                                        ");
                                                                }
                                                                print_r("</tr>");
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-2">
                                                <!-- data-toggle="modal" data-target="#modalCetak" -->
                                                    <button id="btn-ctk" data-id="<?php echo date('Y-m-d'); ?>" data-toggle="modal" data-target="#modalCetak" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-calendar fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Cetak</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button id="btn-fee-ctk" type="submit" class="btn btn-lg btn-danger btn-block">
                                                        <i class="fa fa-dollar fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Gaji</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- modal static -->
            <div class="modal fade" id="modalAbsen" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Input Absen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="tb_absen_input" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30%">Pegawai</th>
                                        <th width="70%">Absen</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                           <button type="button" id="simpan_absen_pegawai" class="btn btn-primary">Simpan</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- end modal static -->

    <!-- modal static -->
            <div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Input Cetak</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="tb_cetak_input" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30%">Pegawai</th>
                                        <th width="70%">Batako</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-primary">Simpan</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- end modal static -->
</body>
