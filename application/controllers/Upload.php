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
    $q2 = $this->get('q2');
    $data_perkara = array();


    	 //$data_perkara = $this->db->query("SELECT * FROM dirput_antrian WHERE STATUS != 0 AND STATUS != 1 AND tgl_masuk LIKE '%$q%'");

         //$data_perkara = $this->db->query("SELECT nomor_perkara, tgl_putusan FROM perkara_putusan
//JOIN perkara_putusan ON perkara.perkara_id=perkara_putusan.perkara_id
//WHERE amar_putusan_anonimisasi_dok = '' AND tgl_masuk LIKE '%$q%'");
        if($q2 == "Gagal Upload"){                     
            $data_perkara = $this->db->query("SELECT nomor_perkara, tgl_masuk FROM dirput_antrian
            JOIN perkara ON perkara.perkara_id=dirput_antrian.perkara_id
            WHERE STATUS != 0 AND STATUS != 1 AND YEAR(tgl_masuk) = '$q'"); 
                     $data_perkara = $data_perkara->result();
                
             $d = array();
             $no = 1;
             foreach ($data_perkara as $key => $value) {
                  $d[] = [$no,$value->nomor_perkara,$value->tgl_masuk];
                  $no++;
             }
      
             $this->response(array("data" => $d), 200);

        }elseif($q2 == "Belum Upload"){
            // $data_perkara = $this->db->query("SELECT 
            //                   a.nomor_perkara as nomor_perkara,
            //                   d.tanggal_putusan as tanggal_putusan
            //                 FROM
            //                   perkara AS a 
            //                   LEFT JOIN perkara_hakim_pn AS b 
            //                     ON a.perkara_id = b.perkara_id 
            //                   LEFT JOIN perkara_panitera_pn AS c 
            //                     ON a.perkara_id = c.perkara_id 
            //                   LEFT JOIN perkara_putusan AS d 
            //                     ON a.perkara_id = d.perkara_id 
            //                 WHERE YEAR (d.tanggal_putusan) > 2017  
            //                   AND d.`amar_putusan_anonimisasi_dok` IS NULL 
            //                     AND b.urutan = '1' 
            //                     AND b.aktif = 'Y' 
            //                     AND c.aktif = 'Y' 
            //                 ORDER BY d.tanggal_putusan, b.hakim_nama ASC"); 

                $data_perkara = $this->db->query("SELECT nomor_perkara, perkara_putusan.tanggal_putusan as tanggal_putusan FROM perkara
                  JOIN perkara_putusan ON perkara.`perkara_id` = perkara_putusan.`perkara_id`
                  WHERE YEAR(perkara_putusan.tanggal_putusan) = '$q' AND perkara_putusan.`amar_putusan_anonimisasi_dok` IS NULL"); 
                     $data_perkara = $data_perkara->result();
                
             $d = array();
             $no = 1;
             foreach ($data_perkara as $key => $value) {
                  $d[] = [$no,$value->nomor_perkara,$value->tanggal_putusan];
                  $no++;
             }
      
             $this->response(array("data" => $d), 200);

        }        
        
    }
   

}
?>