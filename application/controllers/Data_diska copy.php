<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_diska extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
       
    $q = $this->get('q');
    $q2 = $this->get('q2');
    $q = date("Y-m-d", strtotime($q));
    $q2 = date("Y-m-d", strtotime($q2));
    $q3 = $this->get('q3');
    $q4 = $this->get('q4');
        
$data_perkara = $this->db->query("SELECT 'Bangsal' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Bangsal%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dawarblandong' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Dawarblandong%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dlanggu' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Dlanggu%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gedeg' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Gedeg%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gondang' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Gondang%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jatirejo' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Jatirejo%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jetis' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Jetis%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kemlagi' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Kemlagi%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kutorejo' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Kutorejo%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojoanyar' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Mojoanyar%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojosari' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Mojosari%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Ngoro' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Ngoro%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pacet' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Pacet%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pungging' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Pungging%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Puri' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Puri%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Sooko' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Sooko%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trawas' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Trawas%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trowulan' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Trowulan%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Magersari' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Magersari%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Prajuritkulon' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND (p1.`alamat` LIKE '%Prajuritkulon%' OR p1.`alamat` LIKE '%Prajurit Kulon%')
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kranggan' AS kec, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND p1.`alamat` LIKE '%Kranggan%'
                                    AND a.`jenis_perkara_nama` = 'Dispensasi Kawin'
                                    AND d.`tanggal_putusan` BETWEEN '$q' AND '$q2'
                                    ");
        $data_perkara = $data_perkara->result();
        $this->response($data_perkara, 200);
    }

    

}
?>