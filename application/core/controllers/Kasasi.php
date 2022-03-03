<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kasasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $q = $this->get('q');
       $q2 = $this->get('q2');
       if($q == "" && $q2 == ""){
       
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_kasasi, penerimaan_memori_kasasi, penerimaan_kontra_kasasi, pengiriman_berkas_kasasi, putusan_kasasi, (putusan_kasasi - permohonan_kasasi) AS lama_proses
              FROM perkara_kasasi");

            $data_perkara = $data_perkara->result();
        }elseif($q != "" && $q2 == ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_kasasi, penerimaan_memori_kasasi, penerimaan_kontra_kasasi, pengiriman_berkas_kasasi, putusan_kasasi, (putusan_kasasi - permohonan_kasasi) AS lama_proses
            FROM perkara_kasasi WHERE nomor_perkara_pn = '".$q."' ");

            $data_perkara = $data_perkara->result();
        }elseif($q != "" && $q2 != ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_kasasi, penerimaan_memori_kasasi, penerimaan_kontra_kasasi, pengiriman_berkas_kasasi, putusan_kasasi, (putusan_kasasi - permohonan_kasasi) AS lama_proses
            FROM perkara_kasasi WHERE nomor_perkara_pn = '".$q."' AND YEAR(permohonan_kasasi) = '".$q2."' ");

            $data_perkara = $data_perkara->result();
        }elseif($q == "" && $q2 != ""){
            $data_perkara = $this->db->query("SELECT nomor_perkara_pn, permohonan_kasasi, penerimaan_memori_kasasi, penerimaan_kontra_kasasi, pengiriman_berkas_kasasi, putusan_kasasi, (putusan_kasasi - permohonan_kasasi) AS lama_proses
            FROM perkara_kasasi WHERE YEAR(permohonan_kasasi) = '".$q2."' ");

            $data_perkara = $data_perkara->result();
        }

        $d = array();
        $no = 1;
        foreach ($data_perkara as $key => $value) {
            if ($value->lama_proses >= 1){
                $lama_proses = $value->lama_proses." Hari";
            }else{
                $tgl1 = new DateTime($value->permohonan_kasasi);
                $tgl2 = new DateTime(date("Y-m-d"));
                $lama_proses = $tgl2->diff($tgl1)->days + 1;
                $lama_proses = $lama_proses." Hari";
            }
             $d[] = [$no,$value->nomor_perkara_pn,$value->permohonan_kasasi,$value->penerimaan_memori_kasasi,$value->penerimaan_kontra_kasasi,$value->pengiriman_berkas_kasasi,$value->putusan_kasasi,$lama_proses];
             $no++;
        }
 
        $this->response(array("data" => $d), 200);
        
    }
   

}
?>