<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class File_putusan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $q = $this->get('q');
        $q3 = $this->get('q3');
        $q4 = $this->get('q4');
        $data_perkara = array();    
        if($q3=='admin'){
            $data_perkara = $this->db->query("SELECT A.perkara_id, A.nomor_perkara, A.tanggal_pendaftaran, A.jenis_perkara_nama, A.pihak1_text, A.pihak2_text, A.proses_terakhir_text, C.nomor_indentitas, E.nomor_indentitas, F.tanggal_putusan,  F.amar_putusan_dok, H.nama AS status_putusan, G.nomor_akta_cerai, G.tgl_akta_cerai, G.no_seri_akta_cerai  FROM perkara AS A
LEFT JOIN perkara_pihak1 AS B ON A.`perkara_id` = B.`perkara_id`
LEFT JOIN pihak AS C ON B.`pihak_id` = C.`id`
LEFT JOIN perkara_pihak2 AS D ON A.`perkara_id` = D.`perkara_id`
LEFT JOIN pihak AS E ON D.`pihak_id` = E.`id`
LEFT JOIN perkara_putusan AS F ON A.`perkara_id` = F.`perkara_id`
LEFT JOIN perkara_akta_cerai AS G ON A.`perkara_id` = G.`perkara_id`
LEFT JOIN status_putusan AS H ON F.`status_putusan_id` = H.`id`
WHERE (C.nomor_indentitas = '$q' OR E.nomor_indentitas = '$q' OR A.nomor_perkara = '$q' OR A.pihak1_text = '$q' OR A.pihak2_text = '$q' OR G.nomor_akta_cerai = '$q') GROUP BY A.nomor_perkara
");
        $data_perkara = $data_perkara->result();
        }else{
             $data_perkara = $this->db->query("SELECT A.perkara_id, A.nomor_perkara, A.tanggal_pendaftaran, A.jenis_perkara_nama, A.pihak1_text, A.pihak2_text, A.proses_terakhir_text, C.nomor_indentitas, E.nomor_indentitas, F.tanggal_putusan,  F.amar_putusan_dok, H.nama AS status_putusan, G.nomor_akta_cerai, G.tgl_akta_cerai, G.no_seri_akta_cerai  FROM perkara AS A
LEFT JOIN perkara_pihak1 AS B ON A.`perkara_id` = B.`perkara_id`
LEFT JOIN pihak AS C ON B.`pihak_id` = C.`id`
LEFT JOIN perkara_pihak2 AS D ON A.`perkara_id` = D.`perkara_id`
LEFT JOIN pihak AS E ON D.`pihak_id` = E.`id`
LEFT JOIN perkara_putusan AS F ON A.`perkara_id` = F.`perkara_id`
LEFT JOIN perkara_akta_cerai AS G ON A.`perkara_id` = G.`perkara_id`
LEFT JOIN status_putusan AS H ON F.`status_putusan_id` = H.`id`
LEFT JOIN perkara_data_pernikahan AS I ON A.`perkara_id`=I.`perkara_id`
WHERE (C.nomor_indentitas = '$q' OR E.nomor_indentitas = '$q' OR A.nomor_perkara = '$q' OR A.pihak1_text = '$q' OR A.pihak2_text = '$q' OR G.nomor_akta_cerai = '$q') AND I.`kua_tempat_nikah` LIKE '%$q4%' GROUP BY A.nomor_perkara
");
        $data_perkara = $data_perkara->result();
        }
        $this->response($data_perkara, 200);
    }

    

}
?>