<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Lkh_jurusita extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $jurusita = $this->get('jurusita');
       $status = $this->get('status');

       $q = $this->get('q');
       $q2 = $this->get('q2');
       $tgl1 = date("Y-m-d", strtotime($q));
       $tgl2 = date("Y-m-d", strtotime($q2));
        
       if($status == 1){
       
                if($jurusita == ""){
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            WHERE tanggal_pendaftaran >= '$tgl1' AND tanggal_pendaftaran <= '$tgl2' GROUP BY nomor_perkara");

                }else{
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            WHERE tanggal_pendaftaran >= '$tgl1' AND tanggal_pendaftaran <= '$tgl2' AND jurusita_nama = '$jurusita' GROUP BY nomor_perkara");

                }

                // $data_perkara = $data_perkara->result();
                // $this->response($data_perkara, 200);
                $d = array();
                $no = 1;
                foreach ($data_perkara->result() as $key => $value) {
                        $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->jurusita_nama,$value->proses_terakhir_text];
                        $no++;
                }

                $this->response(array("data" => $d), 200);
        }else if($status == 3){
        // persidangan
       
                if($jurusita == ""){
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            WHERE tahapan_terakhir_id = 14 AND tanggal_pendaftaran >= '$tgl1' AND tanggal_pendaftaran <= '$tgl2' GROUP BY nomor_perkara");

                }else{
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            WHERE  tahapan_terakhir_id = 14 AND tanggal_pendaftaran >= '$tgl1' AND tanggal_pendaftaran <= '$tgl2' AND jurusita_nama = '$jurusita' GROUP BY nomor_perkara");

                }

                // $data_perkara = $data_perkara->result();
                // $this->response($data_perkara, 200);
                 $d = array();
                $no = 1;
                foreach ($data_perkara->result() as $key => $value) {
                        $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->jurusita_nama,$value->proses_terakhir_text];
                        $no++;
                }

                $this->response(array("data" => $d), 200);
                
                        
        }else{
            if($jurusita == ""){
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            LEFT JOIN perkara_putusan ON perkara.perkara_id = perkara_putusan.perkara_id
            WHERE tahapan_terakhir_id >= 15 AND tanggal_putusan >= '$tgl1' AND tanggal_putusan <= '$tgl2' GROUP BY nomor_perkara");

                }else{
                $data_perkara = $this->db->query("SELECT perkara.perkara_id as id, nomor_perkara, tanggal_pendaftaran, jenis_perkara_nama, proses_terakhir_text, jurusita_nama  FROM perkara 
            LEFT JOIN perkara_jurusita ON perkara.perkara_id = perkara_jurusita.perkara_id
            LEFT JOIN perkara_putusan ON perkara.perkara_id = perkara_putusan.perkara_id
            WHERE tahapan_terakhir_id >= 15 AND tanggal_putusan >= '$tgl1' AND tanggal_putusan <= '$tgl2' AND jurusita_nama = '$jurusita' GROUP BY nomor_perkara");

                }

                // $data_perkara = $data_perkara->result();
                // $this->response($data_perkara, 200);
                $d = array();
                $no = 1;
                foreach ($data_perkara->result() as $key => $value) {
                        $d[] = [$no,$value->nomor_perkara,$value->tanggal_pendaftaran,$value->jenis_perkara_nama,$value->jurusita_nama,$value->proses_terakhir_text];
                        $no++;
                }

                $this->response(array("data" => $d), 200);
        }
        
    }
   

}
?>