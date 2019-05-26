<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kendaraan extends CI_Controller {

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
	public function kendaraan()
	{
		$data['data_ken'] = $this->M_kendaraan->get_ken(); 
		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Kendaraan/V_Kendaraan',$data);
		$this->load->view('js');

	}

	public function ken_add(){
		$ken = $_POST['ken'];
		$id = $_POST['id'];
		if($id != '' || $id != null){
			$this->M_kendaraan->edit_ken($id,$ken);
		}else{
			$this->M_kendaraan->add_ken($ken);
		}
		$this->get_ken();
	}

	public function ken_del(){
		$id = $_POST['id'];
		$this->M_kendaraan->del_ken($id);
		$this->get_ken();	
	}

	public function get_ken(){
		$data_ken = $this->M_kendaraan->get_ken();
		foreach($data_ken as $dk){
			$idx1 = "";
			$idx2 = "";

			$idx1 = "<a style='color:white;' onclick='btn_ken_edit(\"".$dk['id_kendaraan']."\",\"".$dk['jenis']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='color:white;' onclick='btn_ken_del(\"".$dk['id_kendaraan']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a>";
			$idx2 = $dk['jenis'];
			$data_[] = array($idx1,$idx2);
		}
		echo json_encode($data_);
	}

	public function maintenance(){
		$data['data_ken'] = $this->M_kendaraan->get_ken();
		$data['data_maintenance'] = $this->M_kendaraan->get_maintenance();
		$data['data_peg'] = $this->M_pegawai->get_peg(); 
		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Kendaraan/V_Maintenance',$data);
		$this->load->view('js');
	}

	public function maintenance_add(){
		$id = $_POST['id'];
		$id_ken = $_POST['id_ken'];
		$tgl = $_POST['tgl'];
		$peg = $_POST['peg'];
		$ket = $_POST['ket'];
		$biaya = $_POST['biaya'];
		if($id == null || $id == ''){
			$this->M_kendaraan->maintenance_add($id_ken,$tgl,$peg,$ket,$biaya);
		}else{
			$this->M_kendaraan->maintenance_edit($id,$id_ken,$tgl,$peg,$ket,$biaya);
		}
		$this->get_maintenance();
	}

	public function get_maintenance(){
		$data_maintenance = $this->M_kendaraan->get_maintenance();
		foreach($data_maintenance as $dm){
			$idx1 = "";
			$idx2 = "";
			$idx3 = "";
			$idx4 = "";

			$idx1 = " <a style='color:white;' onclick='btn_main_edit(\"".$dm['id_maintenance']."\")' class='btn btn-primary' 				title='edit'><i class='fa fa-fw fa-edit'></i></a>
                      <a style='color:white;' onclick='btn_main_del(\"".$dm['id_maintenance']."\")' class='btn btn-danger' 			title='hapus' ><i class='fa fa-fw fa-remove'></i></a>";
			$idx2 = $dm['tanggal'];
			$idx3 = $dm['keterangan'];
			$idx4 = $dm['nominal'];
			$data_[] = array($idx1,$idx2);
		}
		echo json_encode($data_);
	}

}
