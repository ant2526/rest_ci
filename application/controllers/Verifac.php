<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Verifac extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

   function index_get() {
    $q = $this->get('q');
    // ex opxUeiwF5tzQ2VBgiixlK32W
    $ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$decryption_iv = '';
	$decryption_key= "PAMRpasti1";
	// $encryption = openssl_encrypt($no_ac, $ciphering,$encryption_key, $options, $encryption_iv);
	$decryption=openssl_decrypt ($q, $ciphering,$decryption_key, $options, $decryption_iv);
    $q = $decryption;
    $data_perkara = array();

    $data_perkara = $this->db->query("SELECT * FROM perkara_akta_cerai
    JOIN perkara ON perkara.perkara_id=perkara_akta_cerai.perkara_id
    WHERE perkara_akta_cerai.nomor_akta_cerai = '$q'");
         $data_perkara = $data_perkara->result();
    
       
    $d = array();
    $no = 1;
    foreach ($data_perkara as $key => $value) {
        $d[] = [$no,$value->nomor_perkara,$value->para_pihak,$value->nomor_akta_cerai,$value->no_seri_akta_cerai,$value->tgl_akta_cerai,$value->tgl_penyerahan_akta_cerai,$value->jenis_cerai,$value->qobla_bada,$value->keadaan_istri,$value->perceraian_ke];
        $no++;
    }

    $this->response(array("data" => $d), 200);
        
    }
   

}
?>