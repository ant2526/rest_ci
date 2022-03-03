<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Cari_data_perkara_putus extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $q = $this->get('q');
        $data_perkara = array();
        if ($q != '') {
        $data_perkara = $this->db->query("SELECT A.perkara_id, A.nomor_perkara, A.jenis_perkara_nama, B.nama AS nama_p,
        C.nomor_indentitas AS nik_p, C.telepon AS nomor_hp_p, D.nama AS nama_t, 
        E.nomor_indentitas AS nik_t, E.telepon AS nomor_hp_t, F.status_putusan_id,
        (CASE 
            WHEN (F.status_putusan_id = 7 ) THEN 'Dicabut'
            WHEN (F.status_putusan_id = 62 ) THEN 'Dikabulkan'
            WHEN (F.status_putusan_id = 63 ) THEN 'Ditolak'
            WHEN (F.status_putusan_id = 64 ) THEN 'Tidak Dapat Diterima'
            WHEN (F.status_putusan_id = 65 ) THEN 'Digugurkan'
            WHEN (F.status_putusan_id = 66 ) THEN 'Dicoret dari Register'
            WHEN (F.status_putusan_id = 67 ) THEN 'Dicabut'
            WHEN (F.status_putusan_id = 85 ) THEN 'Perdamaian'
            WHEN (F.status_putusan_id = 92 ) THEN 'Dismissal'
            WHEN (F.status_putusan_id = 93 ) THEN 'Gugur'
            ELSE 'Belum Putus' 
        END) as putusan
       FROM perkara AS A 
       LEFT JOIN perkara_pihak1 AS B ON A.`perkara_id` = B.`perkara_id`
       LEFT JOIN pihak AS C ON B.`pihak_id` = C.`id` 
       LEFT JOIN perkara_pihak2 AS D ON A.`perkara_id` = D.`perkara_id`
       LEFT JOIN pihak AS E ON D.`pihak_id` = E.`id` 
       LEFT JOIN perkara_putusan AS F ON A.`perkara_id` = F.`perkara_id` 
       WHERE nomor_perkara = '$q'");
        $data_perkara = $data_perkara->result();
        }
        $this->response($data_perkara, 200);
    }

    

}
?>