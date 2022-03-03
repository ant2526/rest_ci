<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Minutasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

   function index_get() {
    $q = $this->get('q');
    $data_perkara = array();

         $data_perkara = $this->db->query("SELECT * FROM perkara_putusan
JOIN perkara ON perkara.perkara_id=perkara_putusan.perkara_id
WHERE perkara_putusan.`tanggal_putusan` != perkara_putusan.`tanggal_minutasi` 
AND perkara_putusan.`tanggal_putusan` LIKE '%$q%'");
         $data_perkara = $data_perkara->result();
    
       
         $d = array();
         $no = 1;
         foreach ($data_perkara as $key => $value) {
              $d[] = [$no,$value->nomor_perkara,$value->tanggal_putusan,$value->tanggal_minutasi];
              $no++;
         }
  
         $this->response(array("data" => $d), 200);
        
    }
   

}
?>