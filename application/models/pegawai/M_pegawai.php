<?php
class M_pegawai extends CI_Model{
	function __construct(){
		parent::__construct();
		// remove sql mode
		// -------------------------------------------------------------------------------------------------------
		$sql_mod = $this->db->query("set SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		// -------------------------------------------------------------------------------------------------------
	}

	public function add_peg($nama,$pek,$fee){
		$query = $this->db->query("insert into t_pegawai(nama,bagian,gaji) values ('$nama','$pek','$fee')");
		return;
	}

	public function edit_peg($id,$nama,$pek,$fee){
		$query = $this->db->query("update t_pegawai set nama='$nama',bagian='$pek',gaji='$fee' where id_peg='$id'");
		return;
	}

	public function get_peg(){
		$query = $this->db->query("select * from t_pegawai order by id_peg desc");
		return $query->result_array();
	}

	public function get_peg_det($id1,$id2){
		$query = $this->db->query("select * from t_pegawai where bagian like '%$id1%' or bagian like '%$id2%' order by id_peg desc");
		return $query->result_array();
	}

	public function del_peg($id){
		$query = $this->db->query("delete from t_pegawai where id_peg='$id'");
		return;
	}
	
	public function get_input_abs($dt){
		$query = $this->db->query("select * from t_absen a
									inner join t_pegawai b on a.id_peg=b.id_peg
									where a.tanggal='$dt' and b.bagian in ('2','3') order by a.id_peg desc");
		return $query->result_array();
	}

	public function get_input_ctk($dt){
		$query = $this->db->query("select * from t_absen a
									inner join t_pegawai b on a.id_peg=b.id_peg
									where a.tanggal='$dt' and b.bagian in ('1','0') order by a.id_peg desc");
		return $query->result_array();
	}
}