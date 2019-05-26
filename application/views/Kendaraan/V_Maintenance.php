<body class="">
    <div class="page-wrapper">
        <div class="page-container">
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
                                            <h3 class="text-left title-2">Maintenance</h3>
                                        </div>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <?php
                                                if(!empty($data_ken)){ $i=0;
                                                    foreach ($data_ken as $dk) { $i++;
                                                        if($i == 1){ $act = "active"; $di = $dk['id_kendaraan']; }else{ $act = ""; }
                                                        ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link <?php echo $act; ?>" onclick="change_ken('<?php echo $i; ?>','<?php echo $dk['id_kendaraan'] ?>')" id="tab<?php echo $i; ?>" data-toggle="tab" href="#des<?php echo $i; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $dk['jenis'] ?></a>
                                                            </li>  
                                                        <?php
                                                    }
                                                }
                                             ?>
                                        </ul>
                                        <div class="tab-content pl-3 p-1" id="myTabContent">
                                             <?php
                                                if(!empty($data_ken)){ $i=0;
                                                    foreach ($data_ken as $dk) { $i++;
                                                        if($i == 1){ $act = "active"; }else{ $act = ""; }
                                                        ?>
                                                            <div class="tab-pane fade show <?php echo $act; ?>" id="des<?php echo $i; ?>" role="tabpanel" aria-labelledby="home-tab">
                                                                <table class="table table-bordered table-striped tb_maintenance" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                           <th width="18%"></th>
                                                                           <th>Tanggal</th>
                                                                           <th>Keterangan</th>
                                                                           <th>Biaya</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            if(!empty($data_maintenance)){
                                                                                foreach ($data_maintenance as $dm) {
                                                                                    if($dm['id_kendaraan'] == $dk['id_kendaraan']){
                                                                                       print_r("
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <a style='color:white;' onclick='btn_main_edit(\"".$dm['id_maintenance']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                                                    <a style='color:white;' onclick='btn_main_del(\"".$dm['id_maintenance']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a>
                                                                                                </td>
                                                                                                <td>".$dm['tanggal']."</td>
                                                                                                <td>".$dm['keterangan']."</td>
                                                                                                <td>".$dm['nominal']."</td>
                                                                                            </tr>
                                                                                        ");
                                                                                    }
                                                                                }
                                                                            }
                                                                         ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                             ?>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2">
                                            <!-- data-toggle="modal" data-target="#staticModal" -->
                                                <button id="btn-service" data-id="<?php echo $di; ?>" data-toggle="modal" data-target="#modalMaintenance" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-wrench fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Tambah</span>
                                                </button>
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
            <div class="modal fade" id="modalMaintenance" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Input Maintenance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <input id="txtMaintenanceId" autocomplete="off" name="" type="hidden" class="form-control" >
                        <input id="txtKendaraanId" autocomplete="off" name="" type="hidden" class="form-control" >
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Tanggal</label>
                                <input id="txtTanggal" autocomplete="off" name="" type="text" class="form-control" >
                            </div>
                             <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Pengorder</label>
                                <select id="txtPegawai" name="txtPekerjaan" class="form-control" >
                                    <option></option>
                                    <?php
                                        if(!empty($data_peg)){
                                            foreach ($data_peg as $dp) {
                                                print_r("
                                                        <option value='".$dp['id_pegawai']."'>".$dp['nama']."</option>
                                                    ");
                                            }
                                        }
                                     ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Keterangan</label>
                                <textarea class="form-control" id="txtKeterangan" style="resize: none;" cols="5" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Biaya</label>
                                <input id="txtBiaya" autocomplete="off" name="" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" id="btn-simpan-maintenance" class="btn btn-primary">Simpan</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- end modal static -->
</body>
