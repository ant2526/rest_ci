<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Belum_putus_non_mediasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $hakim = $this->get('hakim');
       $bulan = $this->get('bulan');

       if($bulan == 0){
          $lama_proses_1 = 0;
          $lama_proses_2 = 30;
       }elseif ($bulan == 1) {
          $lama_proses_1 = 30;
          $lama_proses_2 = 60;
       }elseif ($bulan == 2) {
          $lama_proses_1 = 60;
          $lama_proses_2 = 90;
       }elseif ($bulan == 3) {
          $lama_proses_1 = 90;
          $lama_proses_2 = 120;
       }elseif ($bulan == 4) {
          $lama_proses_1 = 120;
          $lama_proses_2 = 150;
       }elseif ($bulan == 5) {
          $lama_proses_1 = 150;
          $lama_proses_2 = 1200;
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
          $data_perkara = $this->db->query("SELECT perkara.perkara_id, mediasi_id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, hakim_nama, proses_terakhir_text, (DATEDIFF(NOW(),tanggal_pendaftaran)+1) AS lama_proses FROM perkara 
          LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
          LEFT JOIN perkara_mediasi ON perkara.perkara_id = perkara_mediasi.perkara_id
          WHERE tahapan_terakhir_id < 15 AND (DATEDIFF(NOW(),tanggal_pendaftaran)+1) <= $lama_proses_2 AND (DATEDIFF(NOW(),tanggal_pendaftaran)+1) > $lama_proses_1 AND
          jabatan_hakim_id = 1 AND nomor_perkara LIKE '%Pdt.G%' AND mediasi_id IS NULL GROUP BY nomor_perkara");
     
          }else{
          $data_perkara = $this->db->query("SELECT perkara.perkara_id, mediasi_id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, hakim_nama, proses_terakhir_text, (DATEDIFF(NOW(),tanggal_pendaftaran)+1) AS lama_proses FROM perkara 
          LEFT JOIN perkara_hakim_pn ON perkara.perkara_id = perkara_hakim_pn.perkara_id
          LEFT JOIN perkara_mediasi ON perkara.perkara_id = perkara_mediasi.perkara_id
          WHERE tahapan_terakhir_id < 15 AND (DATEDIFF(NOW(),tanggal_pendaftaran)+1) <= $lama_proses_2 AND (DATEDIFF(NOW(),tanggal_pendaftaran)+1) > $lama_proses_1 AND
          jabatan_hakim_id = 1 AND nomor_perkara LIKE '%Pdt.G%' AND mediasi_id IS NULL AND hakim_nama LIKE '%$hakim%' GROUP BY nomor_perkara");
     
     }
     $d = array();
     $no = 1;
     foreach ($data_perkara->result() as $key => $value) {
          // $data_sidang = $this->db->query("SELECT MAX(tanggal_sidang) as tanggal_sidang FROM perkara_jadwal_sidang WHERE perkara_id = $value->perkara_id")->row();
          $data_sidang = $this->db->query("SELECT tanggal_sidang, agenda FROM sipp.perkara_jadwal_sidang WHERE perkara_id =$value->perkara_id ORDER BY id DESC LIMIT 1")->row();
          $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->hakim_nama,$value->lama_proses,$data_sidang->tanggal_sidang,$data_sidang->agenda];
          $no++;
     }

     $this->response(array("data" => $d), 200);
        
    }
   

}
?>