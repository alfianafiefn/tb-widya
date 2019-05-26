$(document).ready(function(){
// Datatable
  $("#tb_master").DataTable({
    "bLengthChange": false,
    "pageLength": 8
  });

  $(".tb_maintenance").DataTable({
    "scrollX": true,
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false,
    'scrollCollapse': true,
    "fixedColumns":   {
            leftColumns: 1
        }
  });

  $("#tb_absen").DataTable({
    "scrollX": true,
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false,
    'scrollCollapse': true,
    "fixedColumns":   {
            leftColumns: 1
        }
  });

  $("#tb_cetak").DataTable({
    "scrollX": true,
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false,
    'scrollCollapse': true,
    "fixedColumns":   {
            leftColumns: 1
        }
  });

  $("#tb_absen_input").DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false
  });

  $("#tb_cetak_input").DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false
  });

// V_pegawai 
  $("#txtPekerjaan").on('change', function() {
      var pkj = $("#txtPekerjaan option:selected").val();
      if(pkj == 1){
        $("#flGaji").hide();
        $("#txtGaji").prop("required",false);
      }else{
        $("#flGaji").show();
        $("#txtGaji").prop("required",true);
      }
  });

  // V_barang
  $('#txtcetak').on('change', function(){
    if(this.checked){
      $("#flModal").prop("hidden",false);
      $("#txtModal").prop("required",true);
    }else{
      $("#flModal").prop("hidden",true);
      $("#txtModal").prop("required",false);
    }
  });

  // V_KATEGORI
  $('#btn-kat-add').on('click', function(){
      var id = $('#txtkategoriid').val();
      var kategori = $('#txtkategori').val();
      var table = $('#tb_master').DataTable();
      if(kategori != ''){
        $.ajax({
            url: base_url+"kategori/kat_add",
            type: "POST",
            data: {kat:kategori,id:id},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }
            }
          });
        $('#txtkategori').val('');
        $('#txtkategoriid').val('');
      }else{
        alert('data kosong');
      }
  });

  $('#btn-kat-reset').on('click',function(){
    $('#txtkategori').val('');
    $('#txtkategoriid').val('');
    $('#btn-kat-reset').prop("hidden",true);
  });

   // V_PEGAWAI
  $('#btn-peg-add').on('click', function(){
      var id = $('#txtPegId').val();
      var nama = $('#txtNama').val();
      var pek = $('#txtPekerjaan option:selected').val();
      var fee = $('#txtGaji').val();
      var table = $('#tb_master').DataTable();
      if(nama != '' || pek != ''){
        $.ajax({
            url: base_url+"pegawai/peg_add",
            type: "POST",
            data: {id:id,nama:nama,pek:pek,fee:fee},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }
            }
          });
        $('#txtPegId').val('');
        $('#txtNama').val('');
        $('#txtPekerjaan').prop('selectedIndex',0);
        $('#txtGaji').val('');
      }else{
        alert('data kosong');
      }
  });

  $('#btn-peg-reset').on('click',function(){
    $('#txtPegId').val('');
    $('#txtNama').val('');
    $('#txtGaji').val('');
    $('#txtPekerjaan').prop('selectedIndex',0);
    $('#btn-peg-reset').prop("hidden",true);
  });

   // V_KENDARAAN
  $('#btn-ken-add').on('click', function(){
      var id = $('#txtKendaraanId').val();
      var ken = $('#txtKendaraan').val();
      var table = $('#tb_master').DataTable();
      if(ken != ''){
        $.ajax({
            url: base_url+"kendaraan/ken_add",
            type: "POST",
            data: {id:id,ken:ken},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }
            }
          });
        $('#txtKendaraanId').val('');
        $('#txtKendaraan').val('');
      }else{
        alert('data kosong');
      }
  });

  $('#btn-ken-reset').on('click',function(){
    $('#txtKendaraanId').val('');
    $('#txtKendaraan').val('');
    $(this).prop("hidden",true);
  });

// V_BARANG
    $('#btn-brg-add').on('click', function(){
      var id = $('#txtBarangId').val();
      var kat = $('#txtkategori option:selected').val();
      var brg = $('#txtBarang').val();
      var ket = $('#txtKeterangan').val();
      var ctk = $('#txtcetak').val();
      var mdl = $('#txtModal').val();
      var jual = $('#txtJual').val();
      var table = $('#tb_master').DataTable();
      if(brg != '' && ket != '' && jual != ''){
        $.ajax({
            url: base_url+"barang/barang_add",
            type: "POST",
            data: {id:id,kat:kat,brg:brg,ket:ket,ctk:ctk,mdl:mdl,jual:jual},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }
            }
          });
        var id = $('#txtBarangId').val('');
        var kat = $('#txtkategori').prop('selectedIndex',0);
        var brg = $('#txtBarang').val('');
        var ket = $('#txtKeterangan').val('');
        var ctk = $('#txtcetak').prop('checked',false);
        var mdl = $('#txtModal').val('');
        var jual = $('#txtJual').val('');
        $('#flModal').prop("hidden",true);
      }else{
        alert('data kosong');
      }
    });

  $('#btn-barang-reset').on('click',function(){
    var id = $('#txtBarangId').val('');
    var kat = $('#txtkategori').prop('selectedIndex',0);
    var brg = $('#txtBarang').val('');
    var ket = $('#txtKeterangan').val('');
    var ctk = $('#txtcetak').prop('checked',false);
    var mdl = $('#txtModal').val('');
    var jual = $('#txtJual').val('');
    $('#flModal').prop("hidden",true);
    $(this).prop("hidden",true);
  });

// V_ABSEN
  $('#btn-abs').on('click',function(){
    var dt = $(this).data("id");
    var table = $('#tb_absen_input').DataTable();
       $.ajax({
            url: base_url+"pegawai/get_input_abs",
            type: "POST",
            data: {id:dt},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
               var x = 0;
               $('#tb_absen_input tbody tr').each(function() {
                    x++;
                    $('.btn_'+x).on('click',{id:x}, function(e){
                      var r = e.data.id;
                        $('.btn_'+r).prop("class","btn btn-outline-success btn_"+r+"");
                        $(this).prop("class","btn btn-success btn_"+r+"");
                    });
                });
            }
          });
  });

   $('#btn-ctk').on('click',function(){
    var dt = $(this).data("id");
    var table = $('#tb_cetak_input').DataTable();
       $.ajax({
            url: base_url+"pegawai/get_input_ctk",
            type: "POST",
            data: {id:dt},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
  });

// V_MAINTENANCE
  
  $('#btn-simpan-maintenance').on('click',function(){
      var id      = $('#txtMaintenanceId').val();
      var id_ken  = $('#txtKendaraanId').val();
      var tgl     = $('#txtTanggal').val();
      var peg     = $('#txtPegawai').val();
      var ket     = $('#txtKeterangan').val();
      var biaya   = $('#txtBiaya').val();
      var table = $('.tb_maintenance').DataTable();
      $.ajax({
            url: base_url+"kendaraan/maintenance_add",
            type: "POST",
            data: {id:id,id_ken:id_ken,tgl:tgl,peg:peg,ket:ket,biaya:biaya},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
      $('#txtMaintenanceId').val('');
      $('#txtKendaraanId').val('');
      $('#txtTanggal').val('');
      $('#txtPegawai').prop('selectedIndex',0);
      $('#txtKeterangan').val('');
      $('#txtBiaya').val('');
      $('#modalMaintenance').modal('toggle');
  });

  $('#btn-service').on('click',function (){
      var id = $(this).attr("data-id");
      $('#txtKendaraanId').val(id);

  });

  $('#simpan_absen_pegawai').on('click',function(){

  });

});

//+++++++++
// KATEGORI
//+++++++++
function btn_kat_edit(id,kat){
  $('#txtkategoriid').val(id);
  $('#txtkategori').val(kat);
  $('#btn-kat-reset').prop("hidden",false);
}

function btn_kat_del(id){
  var table = $('#tb_master').DataTable();
  if (confirm("Hapus data ?")) {
        $.ajax({
            url: base_url+"kategori/kat_del",
            type: "POST",
            data: {id:id},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
    }
    return false;
}

function btn_barang_edit(id,kat,nama,ket,ctk,mdl,jual){
  $('#txtBarangId').val(id);
  $('#txtkategori').val(kat);
  $('#txtBarang').val(nama);
  $('#txtKeterangan').val(ket);
  if(ctk == "1"){
    $('#txtcetak').prop('checked',true);
    $('#flModal').prop('hidden',false);
    $('#txtModal').val(mdl);
  }
  $('#txtJual').val(jual);
  $('#btn-barang-reset').prop("hidden",false);
}

function btn_barang_del(id){
  var table = $('#tb_master').DataTable();
  if (confirm("Hapus data ?")) {
        $.ajax({
            url: base_url+"barang/barang_del",
            type: "POST",
            data: {id:id},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
    }
    return false;
}
//++++++++
// PEGAWAI
//++++++++

function btn_peg_edit(id,nama,bag,fee){
  $('#txtPegId').val(id);
  $('#txtNama').val(nama);
  $("#txtPekerjaan").val(bag);
  $('#txtGaji').val(fee);
  $('#btn-peg-reset').prop("hidden",false);
}

function btn_peg_del(id){
  var table = $('#tb_master').DataTable();
  if (confirm("Hapus data ?")) {
        $.ajax({
            url: base_url+"pegawai/peg_del",
            type: "POST",
            data: {id:id},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
    }
    return false;
}

//++++++++++
// KENDARAAN
//++++++++++
function btn_ken_edit(id,ken){
  $('#txtKendaraanId').val(id);
  $('#txtKendaraan').val(ken);
  $('#btn-ken-reset').prop("hidden",false);
}

function btn_ken_del(id){
  var table = $('#tb_master').DataTable();
  if (confirm("Hapus data ?")) {
        $.ajax({
            url: base_url+"kendaraan/ken_del",
            type: "POST",
            data: {id:id},
            success: function(data) {
              if(data != "[]"){
                var send = $.parseJSON(data);
                table.clear();
                table.rows.add(send);
                table.draw();
              }else{
                alert('Data tidak di temukan');
              }
            }
          });
    }
    return false;
}

function change_ken(i,id){
  document.getElementById('tab'+i).setAttribute('active',true);
  $('#btn-service').prop("data-id",false).attr("data-id",id);
}

//++++++++++++
// MAINTENANCE
//++++++++++++

function btn_main_del(id){
  alert(id);
}