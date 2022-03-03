<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Elitigasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
      
        $q = $this->get('q');
       
        $data_perkara = $this->db->query("SELECT perkara.perkara_id AS id, nomor_perkara, tanggal_pendaftaran, tanggal_putusan, panitera_nama  FROM perkara 
        LEFT JOIN perkara_panitera_pn ON perkara.perkara_id = perkara_panitera_pn.perkara_id
        LEFT JOIN perkara_putusan ON perkara.perkara_id = perkara_putusan.perkara_id
        WHERE nomor_perkara = '".$q."'
        GROUP BY nomor_perkara
        ");


        $data_perkara = $data_perkara->result();
        $this->response($data_perkara, 200);
     
        
    }
   

}
?>