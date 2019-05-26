<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pegawai extends CI_Controller {

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

	public function pegawai()
	{
		$data['data_peg'] = $this->M_pegawai->get_peg();
		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Pegawai/V_Pegawai',$data);
		$this->load->view('js');
	}

	public function peg_add(){
		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$pek 	= $_POST['pek'];
		$fee 	= $_POST['fee'];
		if($id != '' || $id != null){
			$this->M_pegawai->edit_peg($id,$nama,$pek,$fee);
		}else{
			$this->M_pegawai->add_peg($nama,$pek,$fee);
		}
		$this->get_peg();
	}

	public function peg_del(){
		$id = $_POST['id'];
		$this->M_pegawai->del_peg($id);
		$this->get_peg();	
	}

	public function get_peg(){
		$data_peg = $this->M_pegawai->get_peg();
		foreach($data_peg as $dp){
			$idx1 = "";
			$idx2 = "";
			$idx3 = "";
			$idx4 = "";
			if($dp['bagian'] == 1){
                $bagian = "Cetak";
            }elseif($dp['bagian'] == 2){
                $bagian = "Kirim";
            }else{
                $bagian = "Toko";
            }
			$idx1 = "<a style='' onclick='btn_peg_edit(\"".$dp['id_peg']."\",\"".$dp['nama']."\",\"".$dp['bagian']."\",\"".$dp['gaji']."\")' class='btn btn-primary' title='edit'><i class='fa fa-fw fa-edit'></i></a>
                                                                    <a style='' onclick='btn_peg_del(\"".$dp['id_peg']."\")' class='btn btn-danger' title='hapus' ><i class='fa fa-fw fa-remove'></i></a>";
			$idx2 = $dp['nama'];
			$idx3 = $bagian;
			$idx4 = $dp['gaji'];
			$data_[] = array($idx1,$idx2,$idx3,$idx4);
		}
		echo json_encode($data_);
	}

	public function absen()
	{
		$data['data_peg_krm'] = $this->M_pegawai->get_peg_det('2','3');
		$data['data_peg_ctk'] = $this->M_pegawai->get_peg_det('1','0');

		$this->load->view('V_Header');
		$this->load->view('V_Sidemenu');
		$this->load->view('Pegawai/V_Absen',$data);
		$this->load->view('js');

	}

	public function get_input_abs(){
		$i = 0;
		$dt = $_POST['id'];
		$data_abs = $this->M_pegawai->get_input_abs($dt);
		if(empty($data_abs)){
		}else{
			
			foreach($data_abs as $da){
				$i++;
				$idx1 = "";
				$idx2 = "";

				$disabled_1 = "";
				$disabled_2 = "";
				$disabled_3 = "";
				$disabled_4 = "";
				$disabled_5 = "";
				$btn_active_1	= "btn-outline-success";
				$btn_active_2	= "btn-outline-success";
				$btn_active_3	= "btn-outline-success";
				$btn_active_4	= "btn-outline-success";
				$btn_active_5	= "btn-outline-success";
				if($da['masuk'] == '1'){
					$disabled_1 	= "";
					$btn_active_1	= "btn-success";
				}elseif($da['masuk'] == '0.75'){
					$disabled_2 	= "";
					$btn_active_2	= "btn-success";
				}elseif($da['masuk'] == '0.50'){
					$disabled_3 	= "";
					$btn_active_3	= "btn-success";
				}elseif($da['masuk'] == '0.25'){
					$disabled_4 	= "";
					$btn_active_4	= "btn-success";
				}else{
					$disabled_5 	= "";
					$btn_active_5	= "btn-success";
				}

				$idx1 = $da['nama'];
				$idx2 = "
						<button style='width:50px;' class='btn ".$btn_active_1." btn_".$i."' data-id='1' ".$disabled_1.">1</button>
						<button style='width:50px;' class='btn ".$btn_active_2." btn_".$i."' data-id='0.75' ".$disabled_2.">3/4</button>
						<button style='width:50px;' class='btn ".$btn_active_3." btn_".$i."' data-id='0.50' ".$disabled_3.">1/2</button>
						<button style='width:50px;' class='btn ".$btn_active_4." btn_".$i."' data-id='0.25' ".$disabled_4.">1/4</button>
						<button style='width:50px;' class='btn ".$btn_active_5." btn_".$i."' data-id='0' ".$disabled_5.">0</button>
						";
				$data_[] = array($idx1,$idx2);
			}
		}
		echo json_encode($data_);
	}

	public function get_input_ctk(){
		$i = 0;
		$dt = $_POST['id'];
		$data_abs = $this->M_pegawai->get_input_abs($dt);
		if(empty($data_abs)){
		}else{
			
			foreach($data_abs as $da){
				$i++;
				$idx1 = "";
				$idx2 = "";

				$disabled_1 = "";
				$disabled_2 = "";
				$disabled_3 = "";
				$disabled_4 = "";
				$btn_active_1	= "btn-warning";
				$btn_active_2	= "btn-warning";
				$btn_active_3	= "btn-warning";
				$btn_active_4	= "btn-warning";
				if($da['masuk'] == '1'){
					$disabled_1 	= "disabled";
					$btn_active_1	= "btn-danger";
				}elseif($da['masuk'] == '0.5'){
					$disabled_2 	= "disabled";
					$btn_active_2	= "btn-danger";
				}elseif($da['masuk'] == '0.25'){
					$disabled_3 	= "disabled";
					$btn_active_3	= "btn-danger";
				}else{
					$disabled_4 	= "disabled";
					$btn_active_4	= "btn-danger";
				}

				$idx1 = $da['nama'];
				$idx2 = "
						<button style='width:50px;' class='btn ".$btn_active_1."' value='1' ".$disabled_1.">1</button>
						<button style='width:50px;' class='btn ".$btn_active_2."' value='0.5' ".$disabled_2.">1/2</button>
						<button style='width:50px;' class='btn ".$btn_active_3."' value='0.25' ".$disabled_3.">1/4</button>
						<button style='width:50px;' class='btn ".$btn_active_4."' value='0' ".$disabled_4.">0</button>
						";
				$data_[] = array($idx1,$idx2);
			}
		}
		echo json_encode($data_);
	}


}
