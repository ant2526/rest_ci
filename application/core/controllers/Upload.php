<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Upload extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

   function index_get() {
    $q = $this->get('q');
    $data_perkara = array();

    	 //$data_perkara = $this->db->query("SELECT * FROM dirput_antrian WHERE STATUS != 0 AND STATUS != 1 AND tgl_masuk LIKE '%$q%'");
         $data_perkara = $this->db->query("SELECT nomor_perkara, tgl_masuk FROM dirput_antrian
JOIN perkara ON perkara.perkara_id=dirput_antrian.perkara_id
WHERE STATUS != 0 AND STATUS != 1 AND tgl_masuk LIKE '%$q%'");
         $data_perkara = $data_perkara->result();
    
         $d = array();
         $no = 1;
         foreach ($data_perkara as $key => $value) {
              $d[] = [$no,$value->nomor_perkara,$value->tgl_masuk];
              $no++;
         }
  
         $this->response(array("data" => $d), 200);
    //    $this->response($data_perkara, 200);
        
    }
   

}
?>