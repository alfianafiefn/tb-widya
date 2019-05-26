<?php
class M_barang extends CI_Model{
	function __construct(){
		parent::__construct();
		// remove sql mode
		// -------------------------------------------------------------------------------------------------------
		$sql_mod = $this->db->query("set SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		// -------------------------------------------------------------------------------------------------------
	}

	public function add_kat($kat){
		$query = $this->db->query("insert into t_kategori(kategori) values ('$kat')");
		return;
	}

	public function edit_kat($id,$kat){
		$query = $this->db->query("update t_kategori set kategori='$kat' where id_kategori='$id'");
		return;
	}

	public function get_kat(){
		$query = $this->db->query("select * from t_kategori order by id_kategori desc");
		return $query->result_array();
	}

	public function del_kat($id){
		$query = $this->db->query("delete from t_kategori where id_kategori='$id'");
		return;
	}

	public function add_barang($kat,$nama,$ket,$ctk,$mdl,$jual){
		$query = $this->db->query("insert into t_barang(id_kategori,nama,keterangan,produksi,modal,jual) values ('$kat','$nama','$ket','$ctk','$mdl','$jual')");
		return;
	}

	public function edit_barang($id,$kat,$nama,$ket,$ctk,$mdl,$jual){
		$query = $this->db->query("update t_barang set id_kategori='$kat',nama='$nama',keterangan='$ket',produksi='$ctk',modal='$mdl',jual='$jual' where id_item='$id'");
		return;
	}

	public function get_barang(){
		$query = $this->db->query("select * from t_barang order by id_item desc");
		return $query->result_array();
	}

	public function del_barang($id){
		$query = $this->db->query("delete from t_barang where id_item='$id'");
		return;
	}
	
}