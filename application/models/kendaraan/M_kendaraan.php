<?php
class M_kendaraan extends CI_Model{
	function __construct(){
		parent::__construct();
		// remove sql mode
		// -------------------------------------------------------------------------------------------------------
		$sql_mod = $this->db->query("set SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		// -------------------------------------------------------------------------------------------------------
	}

	public function add_ken($ken){
		$query = $this->db->query("insert into t_kendaraan(jenis) values ('$ken')");
		return;
	}

	public function edit_ken($id,$ken){
		$query = $this->db->query("update t_kendaraan set jenis='$kan' where id_kendaraan='$id'");
		return;
	}

	public function get_ken(){
		$query = $this->db->query("select * from t_kendaraan order by id_kendaraan desc");
		return $query->result_array();
	}

	public function del_ken($id){
		$query = $this->db->query("delete from t_kendaraan where id_kendaraan='$id'");
		return;
	}

	public function get_maintenance(){
		$query = $this->db->query("select * from t_maintenance order by tanggal desc");
		return $query->result_array();	
	}

	public function maintenance_add($id_ken,$tgl,$peg,$ket,$biaya){
		$query = $this->db->query("insert into t_maintenance(id_kendaraan,tanggal,nominal,order_,keterangan) values ('$id_ken','$tgl','$biaya','$peg','$ket')");
		return;
	}

	public function maintenance_edit($id,$id_ken,$tgl,$peg,$ket,$biaya){
		$query = $this->db->query("update t_maintenance set id_kendaraan='$id_ken',tanggal='$tgl',nominal='$biaya',order_='$peg',keterangan='$ket' where id_maintenance='$id'");
		return;
	}
	
}