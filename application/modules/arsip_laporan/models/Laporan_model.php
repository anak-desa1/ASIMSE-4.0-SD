<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function arsip($tgl_awal, $tgl_akhir, $jenis_dokumen)
    {
        $documen =
                $this->db->select('a.*,c.nama_ruangan,d.nama_lemari,e.nama_rak,f.nama_box,g.nama_map,h.nama_urut')
                ->from('mst_dokumen a')   
                ->join('mst_jenis_dokumen b', 'a.nama_jenis_dokumen = b.nama_jenis_dokumen', 'left')  
                ->join('mst_ruangan c', 'a.id_ruangan = c.id_ruangan', 'left')    
                ->join('mst_lemari d', 'a.id_lemari = d.id_lemari', 'left')  
                ->join('mst_rak e', 'a.id_rak = e.id_rak', 'left') 
                ->join('mst_box f', 'a.id_box = f.id_box', 'left')   
                ->join('mst_map g', 'a.id_map = g.id_map', 'left')  
                ->join('mst_urut h', 'a.id_urut = h.id_urut', 'left')             
                ->where('a.tanggal_dokumen >=', $tgl_awal)->where('a.tanggal_dokumen <=', $tgl_akhir)               
                ->where(['a.nama_jenis_dokumen' => rawurldecode($jenis_dokumen)])
                ->group_by('a.id_dokumen', 'ASC')
                ->get()->result_array();  
        return $documen;     
    }
}
