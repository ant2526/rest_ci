<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_perceraian extends REST_Controller {

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
        
$data_perkara = $this->db->query("SELECT 'Bangsal' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Bangsal%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Bangsal' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Bangsal%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dawarblandong' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Dawarblandong%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dawarblandong' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Dawarblandong%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dlanggu' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Dlanggu%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Dlanggu' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Dlanggu%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gedeg' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Gedeg%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gedeg' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Gedeg%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gondang' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Gondang%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Gondang' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Gondang%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jatirejo' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Jatirejo%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jatirejo' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Jatirejo%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jetis' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Jetis%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Jetis' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Jetis%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kemlagi' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kemlagi%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kemlagi' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kemlagi%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kutorejo' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kutorejo%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kutorejo' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kutorejo%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojoanyar' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Mojoanyar%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojoanyar' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Mojoanyar%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojosari' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Mojosari%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Mojosari' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Mojosari%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Ngoro' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Ngoro%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Ngoro' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Ngoro%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pacet' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Pacet%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pacet' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Pacet%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pungging' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Pungging%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Pungging' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Pungging%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Puri' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Puri%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Puri' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Puri%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Sooko' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Sooko%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Sooko' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Sooko%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trawas' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Trawas%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trawas' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Trawas%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trowulan' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Trowulan%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Trowulan' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Trowulan%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Magersari' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Magersari%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Magersari' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Magersari%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Prajuritkulon' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Prajuritkulon%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Prajuritkulon' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Prajuritkulon%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kranggan' AS kec, 'Cerai Talak' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kranggan%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Talak'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
UNION
SELECT 'Kranggan' AS kec, 'Cerai Gugat' AS jenis_perkara_nm, COUNT(jenis_perkara_nama)  AS jumlah  
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN faktor_perceraian AS g ON e.`faktor_perceraian_id`=g.`id`
                                    LEFT JOIN sumber_hukum AS h ON d.`sumber_hukum_id`=h.`id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2016
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND f.`kua_tempat_nikah` LIKE '%Kranggann%'
                                    AND a.`jenis_perkara_nama` = 'Cerai Gugat'
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
                                    ");
        $data_perkara = $data_perkara->result();
        $this->response($data_perkara, 200);
    }

    

}
?>