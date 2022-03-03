<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rencana_ac extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $q = $this->get('q');
       $q2 = $this->get('q2');
       $q3 = $this->get('q3');

       if($q3 == "cg"){
       
            $data_perkara = $this->db->query("SELECT B.nomor_perkara, DATE_FORMAT(E.tanggal_pemberitahuan_putusan,'%d/%m/%Y') AS pemberitahuan_putusan, DATE_FORMAT(C.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan, DATE_FORMAT(C.tanggal_bht,'%d/%m/%Y') AS tanggal_bht FROM perkara_akta_cerai AS A
            LEFT JOIN perkara AS B ON A.`perkara_id` = B.`perkara_id`
            LEFT JOIN perkara_putusan AS C ON A.`perkara_id` = C.`perkara_id`
            LEFT JOIN perkara_putusan_pemberitahuan_putusan AS E ON A.`perkara_id` = E.`perkara_id`
            WHERE tanggal_bht BETWEEN '$q' AND '$q2' AND E.pihak=2");

            $data_perkara = $data_perkara->result();

            $d = array();
            $no = 1;
            foreach ($data_perkara as $key => $value) {
                $d[] = [$no,$value->nomor_perkara,$value->tanggal_putusan,$value->pemberitahuan_putusan,$value->tanggal_bht];
                $no++;
            }
        }elseif($q3 == "ct"){
            $data_perkara = $this->db->query("SELECT B.nomor_perkara,DATE_FORMAT(E.tanggal_pemberitahuan_putusan,'%d/%m/%Y') AS pemberitahuan_putusan, DATE_FORMAT(C.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan, DATE_FORMAT(C.tanggal_bht,'%d/%m/%Y') AS tanggal_bht, DATE_FORMAT(D.tgl_ikrar_talak,'%d/%m/%Y') AS tgl_ikrar_talak FROM perkara_akta_cerai AS A
            LEFT JOIN perkara AS B ON A.`perkara_id` = B.`perkara_id`
            LEFT JOIN perkara_putusan AS C ON A.`perkara_id` = C.`perkara_id`
            LEFT JOIN perkara_ikrar_talak AS D ON A.`perkara_id` = D.`perkara_id`
           LEFT JOIN perkara_putusan_pemberitahuan_putusan AS E ON A.`perkara_id` = E.`perkara_id`
             WHERE tgl_ikrar_talak BETWEEN '$q' AND '$q2' AND E.pihak=2");

            $data_perkara = $data_perkara->result();

            $d = array();
            $no = 1;
            foreach ($data_perkara as $key => $value) {
                $d[] = [$no,$value->nomor_perkara,$value->tanggal_putusan,$value->pemberitahuan_putusan,$value->tanggal_bht,$value->tgl_ikrar_talak];
                $no++;
            }
       }else{
            $d = array();
       }

       
       $this->response(array("data" => $d), 200);
        
    }
   

}
?>