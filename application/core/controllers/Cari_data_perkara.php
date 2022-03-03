<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Cari_data_perkara extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $q = $this->get('q');
        $data_perkara = array();
        if ($q != '') {
        $data_perkara = $this->db->query("SELECT A.perkara_id, A.nomor_perkara, B.nama AS nama_p, C.nomor_indentitas AS nik_p, C.telepon AS nomor_hp_p, D.nama AS nama_t, E.nomor_indentitas AS nik_t, E.telepon AS nomor_hp_t
FROM perkara AS A 
LEFT JOIN perkara_pihak1 AS B ON A.`perkara_id` = B.`perkara_id`
LEFT JOIN pihak AS C ON B.`pihak_id` = C.`id` 
LEFT JOIN perkara_pihak2 AS D ON A.`perkara_id` = D.`perkara_id`
LEFT JOIN pihak AS E ON D.`pihak_id` = E.`id` 
WHERE nomor_perkara = '$q'");
        $data_perkara = $data_perkara->result();
        }
        $this->response($data_perkara, 200);
    }

    

}
?>