<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Perkara_minutasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       $q = $this->get('q');
       $q2 = $this->get('q2');
       $q3 = $this->get('q3');

       if($q3 == "gugatan"){
       
            $data_perkara = $this->db->query("SELECT B.nomor_perkara, DATE_FORMAT(A.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
            CONCAT(SUBSTRING_INDEX(C.majelis_hakim_nama, '<', 1) ,' / ' , REPLACE(C.panitera_pengganti_text, 'Panitera Pengganti: ', ''))  AS majelis, B.jenis_perkara_nama, B.jenis_perkara_nama,
            DATE_FORMAT(A.tanggal_minutasi,'%d/%m/%Y') AS tanggal_minutasi,
            DATE_FORMAT(A.tanggal_bht,'%d/%m/%Y') AS tanggal_bht
            FROM perkara_putusan AS A
            LEFT JOIN perkara AS B ON A.`perkara_id` = B.`perkara_id`
            LEFT JOIN perkara_penetapan AS C ON A.`perkara_id` = C.`perkara_id`
            WHERE A.tanggal_minutasi = '$q'  AND C.panitera_pengganti_text LIKE '%$q2%'
            AND B.nomor_perkara LIKE '%Pdt.G%'  ORDER BY B.perkara_id ASC");

            $data_perkara = $data_perkara->result();

            $d = array();
            $no = 1;
            foreach ($data_perkara as $key => $value) {
                $d[] = [$no,$value->nomor_perkara,$value->majelis,$value->jenis_perkara_nama,$value->tanggal_putusan, $value->tanggal_minutasi];
                $no++;
            }
        }elseif($q3 == "permohonan"){
            $data_perkara = $this->db->query("SELECT B.nomor_perkara, DATE_FORMAT(A.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
            CONCAT(SUBSTRING_INDEX(C.majelis_hakim_nama, '<', 1) ,' / ' , REPLACE(C.panitera_pengganti_text, 'Panitera Pengganti: ', ''))  AS majelis, B.jenis_perkara_nama, B.jenis_perkara_nama,
            DATE_FORMAT(A.tanggal_minutasi,'%d/%m/%Y') AS tanggal_minutasi,
            DATE_FORMAT(A.tanggal_bht,'%d/%m/%Y') AS tanggal_bht
            FROM perkara_putusan AS A
            LEFT JOIN perkara AS B ON A.`perkara_id` = B.`perkara_id`
            LEFT JOIN perkara_penetapan AS C ON A.`perkara_id` = C.`perkara_id`
            WHERE A.tanggal_minutasi = '$q'  AND C.panitera_pengganti_text LIKE '%$q2%'
            AND B.nomor_perkara LIKE '%Pdt.P%'  ORDER BY B.perkara_id ASC");



            $data_perkara = $data_perkara->result();

            $d = array();
            $no = 1;
            foreach ($data_perkara as $key => $value) {
                $d[] = [$no,$value->nomor_perkara,$value->majelis,$value->jenis_perkara_nama,$value->tanggal_putusan, $value->tanggal_minutasi];
                $no++;
            }
       }else{
            $d = array();
       }

       
       $this->response(array("data" => $d), 200);
        
    }
   

}
?>