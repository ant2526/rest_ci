<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Beranda_satu extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
   	$hariini = date('Y-m-d');
    $tgl1 = date('Y-m-d', strtotime($hariini. ' - 30 days'));
    $tgl2 = date('Y-m-d', strtotime($hariini. ' - 60 days'));
    $tgl3 = date('Y-m-d', strtotime($hariini. ' - 60 days'));
    $tgl4 = date('Y-m-d', strtotime($hariini. ' - 90 days'));
    $tgl5 = date('Y-m-d', strtotime($hariini. ' - 90 days'));
    $tgl6 = date('Y-m-d', strtotime($hariini. ' - 120 days'));
    $tgl7 = date('Y-m-d', strtotime($hariini. ' - 120 days'));
    $tgl8 = date('Y-m-d', strtotime($hariini. ' - 150 days'));
    $tgl9 = date('Y-m-d', strtotime($hariini. ' - 150 days'));
    $tgl10 = date('Y-m-d', strtotime($hariini. ' - 1200 days'));

       
	$data_perkara1 = $this->db->query("SELECT *  FROM perkara 
LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl1' AND tanggal_pendaftaran > '$tgl2' AND
jabatan_hakim_id = 1 GROUP BY nomor_perkara")->num_rows(); 

	$data_perkara2 = $this->db->query("SELECT *  FROM perkara 
LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl3' AND tanggal_pendaftaran > '$tgl4' AND
jabatan_hakim_id = 1 GROUP BY nomor_perkara")->num_rows(); 

	$data_perkara3 = $this->db->query("SELECT *  FROM perkara 
LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl5' AND tanggal_pendaftaran > '$tgl6' AND
jabatan_hakim_id = 1 GROUP BY nomor_perkara")->num_rows(); 

	$data_perkara4 = $this->db->query("SELECT *  FROM perkara 
LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl7' AND tanggal_pendaftaran > '$tgl8' AND
jabatan_hakim_id = 1 GROUP BY nomor_perkara")->num_rows(); 

	$data_perkara5 = $this->db->query("SELECT *  FROM perkara 
LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl9' AND tanggal_pendaftaran > '$tgl10' AND
jabatan_hakim_id = 1 GROUP BY nomor_perkara")->num_rows(); 

	$data_perkara = array(
		'satu_bulan' => $data_perkara1,
		'dua_bulan' => $data_perkara2,
		'tiga_bulan' => $data_perkara3,
		'empat_bulan' => $data_perkara4,
		'lima_bulan' => $data_perkara5
	);

	

     $this->response($data_perkara, 200);
    }

    

}
?>