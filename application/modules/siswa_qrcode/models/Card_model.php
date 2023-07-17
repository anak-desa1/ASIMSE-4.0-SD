<?php
class Card_model extends Ci_Model
{
    public function get_siswarombel($ta)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.*')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where('k.kd_sekolah', $this->session->kd_sekolah)
            ->where('k.ta',  $ta)
            ->group_by('k.rombel')
            // ->group_by('k.id_kelas', 'k.kd_sekolah', 'k.rombel', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
}
