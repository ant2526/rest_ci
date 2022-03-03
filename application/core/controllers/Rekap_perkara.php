<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rekap_perkara extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $q = $this->get('q');
        $q2 = $this->get('q2');
        $q3 = $this->get('q3');
        $q4 = $this->get('q4');
        $qn = $this->get('qn');
        if ($q == '' && $qn == '') {
            $data_perkara = "";
        } else {
        $q = date("Y-m-d", strtotime($q));
        $q2 = date("Y-m-d", strtotime($q2));

        $data_perkara = array();

        if($q3=='admin' && $qn ==""){
            $data_perkara = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_nama`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`nomor_indentitas`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`nomor_indentitas` AS nomor_indentitas2,p2.`alamat` AS alamat2,
                                    h.`nama` AS hukum,
                                    e.`qobla_bada`,g.`nama` AS faktor_perceraian,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
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
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
                                    ORDER BY e.`nomor_akta_cerai` ASC")->result();
        }elseif($q3=='admin' && $qn !=""){
            $data_perkara = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_nama`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`nomor_indentitas`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`nomor_indentitas` AS nomor_indentitas2,p2.`alamat` AS alamat2,
                                    h.`nama` AS hukum,
                                    e.`qobla_bada`,g.`nama` AS faktor_perceraian,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
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
                                    AND (p1.nomor_indentitas = '$qn' OR p2.nomor_indentitas = '$qn' OR a.nomor_perkara = '$qn')
                                    ORDER BY e.`nomor_akta_cerai` ASC")->result();
        }elseif($q3!='admin' && $qn == "" && $q != "" && $q2 != ""){
            $data_perkara = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_nama`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`nomor_indentitas`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`nomor_indentitas` AS nomor_indentitas2,p2.`alamat` AS alamat2,
                                    h.`nama` AS hukum,
                                    e.`qobla_bada`,g.`nama` AS faktor_perceraian,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
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
                                    AND e.tgl_akta_cerai BETWEEN '$q' AND '$q2'
                                    AND f.`kua_tempat_nikah` LIKE '%$q4%'
                                    ORDER BY e.`nomor_akta_cerai` ASC")->result();  

        }elseif($q3!='admin' && $qn != "" && $q == "" && $q2 == ""){
            $data_perkara = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_nama`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`nomor_indentitas`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`nomor_indentitas` AS nomor_indentitas2,p2.`alamat` AS alamat2,
                                    h.`nama` AS hukum,
                                    e.`qobla_bada`,g.`nama` AS faktor_perceraian,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
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
                                    AND (p1.nomor_indentitas = '$qn' OR p2.nomor_indentitas = '$qn' OR a.nomor_perkara = '$qn')
                                    AND f.`kua_tempat_nikah` LIKE '%$q4%'
                                    ORDER BY e.`nomor_akta_cerai` ASC")->result();  
        }elseif($q3!='admin' && $qn != ""){
            $data_perkara = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_nama`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`nomor_indentitas`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`nomor_indentitas` AS nomor_indentitas2,p2.`alamat` AS alamat2,
                                    h.`nama` AS hukum,
                                    e.`qobla_bada`,g.`nama` AS faktor_perceraian,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
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
                                    AND (p1.nomor_indentitas = '$qn' OR p2.nomor_indentitas = '$qn' OR a.nomor_perkara = '$qn')
                                    AND f.`kua_tempat_nikah` LIKE '%$q4%'
                                    ORDER BY e.`nomor_akta_cerai` ASC")->result();  
        }
        
        $this->response($data_perkara, 200);
    }
}
}
?>