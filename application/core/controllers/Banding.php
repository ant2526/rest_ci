<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Banding extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $q = $this->get('q');
       $q2 = $this->get('q2');
       if($q == "" && $q2 == ""){
       
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_banding, penerimaan_memori_banding, penerimaan_kontra_banding, pengiriman_berkas_banding, putusan_banding, (putusan_banding - permohonan_banding) AS lama_proses
              FROM perkara_banding");

            $data_perkara = $data_perkara->result();
        }elseif($q != "" && $q2 == ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_banding, penerimaan_memori_banding, penerimaan_kontra_banding, pengiriman_berkas_banding, putusan_banding, (putusan_banding - permohonan_banding) AS lama_proses
            FROM perkara_banding WHERE nomor_perkara_pn = '".$q."' ");

            $data_perkara = $data_perkara->result();
       }elseif($q != "" && $q2 != ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_banding, penerimaan_memori_banding, penerimaan_kontra_banding, pengiriman_berkas_banding, putusan_banding, (putusan_banding - permohonan_banding) AS lama_proses
            FROM perkara_banding WHERE nomor_perkara_pn = '".$q."' AND YEAR(permohonan_banding) = '".$q2."' ");

            $data_perkara = $data_perkara->result();
        }elseif($q == "" && $q2 != ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_banding, penerimaan_memori_banding, penerimaan_kontra_banding, pengiriman_berkas_banding, putusan_banding, (putusan_banding - permohonan_banding) AS lama_proses
            FROM perkara_banding WHERE YEAR(permohonan_banding) = '".$q2."' ");

            $data_perkara = $data_perkara->result();
        }

       $d = array();
       $no = 1;
       foreach ($data_perkara as $key => $value) {
        if ($value->lama_proses >= 1){
            $lama_proses = $value->lama_proses." Hari";
        }else{
            $tgl1 = new DateTime($value->permohonan_banding);
            $tgl2 = new DateTime(date("Y-m-d"));
            $lama_proses = $tgl2->diff($tgl1)->days + 1;
            $lama_proses = $lama_proses." Hari";
        }
            $d[] = [$no,$value->nomor_perkara_pn,$value->permohonan_banding,$value->penerimaan_memori_banding,$value->penerimaan_kontra_banding,$value->pengiriman_berkas_banding,$value->putusan_banding, $lama_proses];
            $no++;
       }

       $this->response(array("data" => $d), 200);
        
    }
   

}
?>