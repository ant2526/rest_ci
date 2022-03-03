<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontrol_perkara extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $hakim = $this->get('hakim');
       $bulan = $this->get('bulan');

       $hariini = date('Y-m-d');
       if($bulan == 1){
            $tgl1 = date('Y-m-d', strtotime($hariini. ' - 30 days'));
            $tgl2 = date('Y-m-d', strtotime($hariini. ' - 60 days'));
       }elseif ($bulan == 2) {
            $tgl1 = date('Y-m-d', strtotime($hariini. ' - 60 days'));
            $tgl2 = date('Y-m-d', strtotime($hariini. ' - 90 days'));
       }elseif ($bulan == 3) {
            $tgl1 = date('Y-m-d', strtotime($hariini. ' - 90 days'));
            $tgl2 = date('Y-m-d', strtotime($hariini. ' - 120 days'));
       }elseif ($bulan == 4) {
            $tgl1 = date('Y-m-d', strtotime($hariini. ' - 120 days'));
            $tgl2 = date('Y-m-d', strtotime($hariini. ' - 150 days'));
       }elseif ($bulan == 5) {
            $tgl1 = date('Y-m-d', strtotime($hariini. ' - 150 days'));
            $tgl2 = date('Y-m-d', strtotime($hariini. ' - 1200 days'));
       }


//        if($hakim == ""){
//        $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, hakim_kode, hakim_nama  FROM perkara 
// LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
// WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl1' AND tanggal_pendaftaran > '$tgl2' AND
// jabatan_hakim_id = 1 GROUP BY nomor_perkara");

//        }else{
//        $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, hakim_kode, hakim_nama  FROM perkara 
// LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
// WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl1' AND tanggal_pendaftaran > '$tgl2' AND
// jabatan_hakim_id = 1 AND hakim_nama LIKE '%$hakim%' GROUP BY nomor_perkara");

//        }

//        $data_perkara = $data_perkara->result();
//        $this->response($data_perkara, 200);

     if($hakim == ""){
     $data_perkara = $this->db->query("SELECT nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, hakim_nama, proses_terakhir_text FROM perkara 
     LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
     WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl1' AND tanggal_pendaftaran > '$tgl2' AND
     jabatan_hakim_id = 1 AND nomor_perkara LIKE '%Pdt.G%' GROUP BY nomor_perkara");

     }else{
     $data_perkara = $this->db->query("SELECT nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, hakim_nama, proses_terakhir_text  FROM perkara 
     LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
     WHERE tahapan_terakhir_id < 15 AND tanggal_pendaftaran <= '$tgl1' AND tanggal_pendaftaran > '$tgl2' AND
     jabatan_hakim_id = 1 AND nomor_perkara LIKE '%Pdt.G%' AND hakim_nama LIKE '%$hakim%' GROUP BY nomor_perkara");

     }
     $d = array();
     $no = 1;
     foreach ($data_perkara->result() as $key => $value) {
          $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->hakim_nama,$value->proses_terakhir_text];
          $no++;
     }

     $this->response(array("data" => $d), 200);
        
    }
   

}
?>