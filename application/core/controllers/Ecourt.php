<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Ecourt extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

   function index_get() {
    $q = $this->get('q');
    $q2 = $this->get('q2');
    $q = date("Y-m-d", strtotime($q));
    $q2 = date("Y-m-d", strtotime($q2));
    $mp = $this->get('mp');	
    $data_perkara = array();
    if($mp == 0){
        $data_perkara = $this->db->query("SELECT efiling_id, perkara.tanggal_pendaftaran, perkara.nomor_perkara, perkara.jenis_perkara_nama, proses_terakhir_text, hakim_kode, hakim_nama FROM perkara_efiling LEFT JOIN perkara ON perkara_efiling.nomor_perkara = perkara.nomor_perkara LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id WHERE tahapan_terakhir_id = 12 AND jabatan_hakim_id = 1 AND perkara.tanggal_pendaftaran BETWEEN '$q' AND '$q2' GROUP BY efiling_id");
        $data_perkara = $data_perkara->result();
    }elseif ($mp == 1) {
    	 $data_perkara = $this->db->query("SELECT efiling_id, perkara.tanggal_pendaftaran, perkara.nomor_perkara, perkara.jenis_perkara_nama, proses_terakhir_text, hakim_kode, hakim_nama FROM perkara_efiling LEFT JOIN perkara ON perkara_efiling.nomor_perkara = perkara.nomor_perkara LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id WHERE tahapan_terakhir_id = 14 AND jabatan_hakim_id = 1 AND perkara.tanggal_pendaftaran BETWEEN '$q' AND '$q2' GROUP BY efiling_id");
    	 $data_perkara = $data_perkara->result();
    }elseif ($mp == 2) {
    	 $data_perkara = $this->db->query("SELECT efiling_id, perkara.tanggal_pendaftaran, perkara.nomor_perkara, perkara.jenis_perkara_nama, proses_terakhir_text, hakim_kode, hakim_nama FROM perkara_efiling LEFT JOIN perkara ON perkara_efiling.nomor_perkara = perkara.nomor_perkara LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id WHERE tahapan_terakhir_id >= 15 AND jabatan_hakim_id = 2 AND perkara.tanggal_pendaftaran BETWEEN '$q' AND '$q2' GROUP BY efiling_id");
    	 $data_perkara = $data_perkara->result();
    } 
       
        $d = array();
        $no = 1;
        foreach ($data_perkara as $key => $value) {
            $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->proses_terakhir_text];
            $no++;
        }

        $this->response(array("data" => $d), 200);
        // $this->response($data_perkara, 200);
        
    }
   

}
?>