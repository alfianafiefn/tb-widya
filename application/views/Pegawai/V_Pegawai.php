<body class="">
    <div class="page-wrapper">
        <div class="page-container">
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
                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                <input id="txtPegId" name="txtPegId" type="text" class="form-control" hidden>
                                                <input id="txtNama" autocomplete="off" name="txtNama" type="text" class="form-control" >
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Pekerjaan</label>
                                                <select id="txtPekerjaan" name="txtPekerjaan" class="form-control" >
                                                    <option></option>
                                                    <option value="1">cetak</option>
                                                    <option value="2">Kirim</option>
                                                    <option value="3">Toko</option>
                                                </select>
                                            </div>
                                             <div id="flGaji" class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Gaji</label>
                                                <input id="txtGaji" autocomplete="off" name="txtGaji" type="text" class="form-control">
                                            </div>
                                            <div>
                                                <button id="btn-peg-add" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Simpan</span>
                                                    <span id="payment-button-sending" style="display:none;">Simpan…</span>
                                                </button>
                                                <button id="btn-peg-reset" class="btn btn-lg btn-danger btn-block btn-kat" hidden>
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
                                            <h3 class="text-left title-2">pegawai</h3>
                                        </div>
                                         <table id="tb_master" class="table table-bordered table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%"></th>
                                                    <th width="40%">Nama</th>
                                                    <th width="20%">Bagian</th>
                                                    <th width="20%">Gaji</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(!empty($data_peg)){
                                                        foreach ($data_peg as $dp) {
                                                            if($dp['bagian'] == 1){
                                                                $bagian = "Cetak";
                                                            }elseif($dp['bagian'] == 2){
                                                                $bagian = "Kirim";
                                                            }else{
                                                                $bagian = "Toko";
                                                            }
                                                            print_r("
                                                                <tr>
                                                                    <td><a style='color:white;' onclick='btn_peg_edit(\"".$dp['id_peg']."\",\"".$dp['nama']."\",\"".$dp['bagian']."\",\"".$dp['gaji']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_peg_del(\"".$dp['id_peg']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a></td>
                                                                    <td>".$dp['nama']."</td>
                                                                    <td>".$bagian."</td>
                                                                    <td>".$dp['gaji']."</td>
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
