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
                                                <label for="cc-payment" class="control-label mb-1">kategori</label>
                                                <select id="txtkategori" class="form-control" name="txtkategori">
                                                	<option value="">[pilih]</option>
                                                    <?php
                                                        if(!empty($data_kat)){
                                                            foreach ($data_kat as $dk) {
                                                                print_r("
                                                                    <option value='".$dk['id_kategori']."'>".$dk['kategori']."</option>
                                                                    ");
                                                            }
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                <input id="txtBarang" name="cc-payment" type="text" class="form-control" autocomplete="off" aria-required="true" aria-invalid="false" >
                                                <input id="txtBarangId" name="cc-payment" type="text" class="form-control" hidden aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Keterangan</label>
                                                <input id="txtKeterangan" name="cc-payment" autocomplete="off" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">cetak ?</label>
                                                <input id="txtcetak" value="1" style="transform: scale(1.5);padding-left:10px;" name="txtcetak" type="checkbox"></input>
                                            </div>
                                            <div id="flModal" class="form-group" hidden >
                                                <label for="cc-payment" class="control-label mb-1">Modal</label>
                                                <input id="txtModal" name="txtModal" type="text" autocomplete="off" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jual</label>
                                                <input id="txtJual" name="cc-payment" type="text" autocomplete="off" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div>
                                                <button id="btn-brg-add" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Tambah</span>
                                                </button>
                                                <button id="btn-barang-reset" class="btn btn-lg btn-danger btn-block btn-kat" hidden>
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
                                            <h3 class="text-left title-2">barang</h3>
                                        </div>
                                        <table id="tb_master" class="table table-bordered table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%"></th>
                                                    <th width="40%">Barang</th>
                                                    <th width="40%">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(!empty($data_barang)){
                                                        foreach ($data_barang as $db) {
                                                            print_r("
                                                                <tr>
                                                                    <td><a style='color:white;' onclick='btn_barang_edit(\"".$db['id_item']."\",\"".$db['id_kategori']."\",\"".$db['nama']."\",\"".$db['keterangan']."\",\"".$db['produksi']."\",\"".$db['modal']."\",\"".$db['jual']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_barang_del(\"".$db['id_item']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a></td>
                                                                    <td>".$db['nama']."</td>
                                                                    <td>".$db['keterangan']."</td>
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
