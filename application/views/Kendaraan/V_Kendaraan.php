<body class="">
    <div class="page-wrapper">
        <div class="page-container">
           <?php $this->load->view('V_Topbar') ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Tambah Data</h3>
                                        </div>
                                        <hr>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">kendaraan</label>
                                                <input id="txtKendaraanId" type="text" class="form-control" aria-required="true" aria-invalid="false" hidden>
                                                <input id="txtKendaraan" autocomplete="off" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div>
                                                <button id="btn-ken-add" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Tambah</span>
                                                </button>
                                                <button id="btn-ken-reset" type="submit" class="btn btn-lg btn-danger btn-block" hidden>
                                                    <i class="fa fa-reset fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Reset</span>
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                               <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-left title-2">kendaraan</h3>
                                        </div>
                                        <table id="tb_master" class="table table-bordered table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%"></th>
                                                    <th width="80%">Angkutan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(!empty($data_ken)){
                                                        foreach ($data_ken as $dk) {
                                                            print_r("
                                                                <tr>
                                                                    <td><a style='color:white;' onclick='btn_ken_edit(\"".$dk['id_kendaraan']."\",\"".$dk['jenis']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_ken_del(\"".$dk['id_kendaraan']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a></td>
                                                                    <td>".$dk['jenis']."</td>
                                                                </tr>
                                                                ");
                                                        }
                                                    }
                                                 ?>
                                            </tbody>
                                        </table>
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

</body>
