<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Barang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function kategori()
	{
		$data['data_kat'] = $this->M_barang->get_kat();
		
		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Item/V_Kategori',$data);
		$this->load->view('js');
	}

	public function kat_add(){
		$kat = $_POST['kat'];
		$id = $_POST['id'];
		if($id != '' || $id != null){
			$this->M_barang->edit_kat($id,$kat);
		}else{
			$this->M_barang->add_kat($kat);
		}
		$this->get_kat();
	}

	public function kat_del(){
		$id = $_POST['id'];
		$this->M_barang->del_kat($id);
		$this->get_kat();	
	}

	public function get_kat(){
		$data_kat = $this->M_barang->get_kat();
		foreach($data_kat as $dk){
			$idx1 = "";
			$idx2 = "";

			$idx1 = "<a style='color:white;' onclick='btn_kat_edit(\"".$dk['id_kategori']."\",\"".$dk['kategori']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_kat_del(\"".$dk['id_kategori']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a>";
			$idx2 = $dk['kategori'];
			$data_[] = array($idx1,$idx2);
		}
		echo json_encode($data_);
	}

	public function barang()
	{
		$data['data_kat'] = $this->M_barang->get_kat();
		$data['data_barang'] = $this->M_barang->get_barang();

		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Item/V_Barang',$data);
		$this->load->view('js');

	}

	public function barang_add(){
		$id = $_POST['id'];
		$kat = $_POST['kat'];
		$brg = $_POST['brg'];
		$ket = $_POST['ket'];
		$ctk = $_POST['ctk'];
		$mdl = $_POST['mdl'];
		$jual = $_POST['jual'];
		if($id != '' || $id != null){
			$this->M_barang->edit_barang($id,$kat,$brg,$ket,$ctk,$mdl,$jual);
		}else{
			$this->M_barang->add_barang($kat,$brg,$ket,$ctk,$mdl,$jual);
		}
		$this->get_barang();
	}

	public function barang_del(){
		$id = $_POST['id'];
		$this->M_barang->del_barang($id);
		$this->get_barang();	
	}

	public function get_barang(){
		$data_barang = $this->M_barang->get_barang();
		foreach($data_barang as $db){
			$idx1 = "";
			$idx2 = "";
			$idx3 = "";

			$idx1 = "<a style='color:white;' onclick='btn_barang_edit(\"".$db['id_item']."\",\"".$db['id_kategori']."\",\"".$db['nama']."\",\"".$db['keterangan']."\",\"".$db['produksi']."\",\"".$db['modal']."\",\"".$db['jual']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_barang_del(\"".$db['id_item']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a>";
			$idx2 = $db['nama'];
			$idx3 = $db['keterangan'];
			$data_[] = array($idx1,$idx2,$idx3);
		}
		echo json_encode($data_);
	}

	public function harga(){

	}
}
