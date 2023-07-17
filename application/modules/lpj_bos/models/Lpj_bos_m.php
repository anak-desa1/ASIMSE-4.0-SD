<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpj_bos_m extends CI_Model
{
    // satuan
    public function getSatuan()
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_satuan')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditSatuan($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_satuan')
            ->where(['satuan_id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_satuan()
    {
        $satuan_nama = htmlspecialchars($this->input->post('satuan_nama', true));

        $data = [
            'satuan_nama' => $satuan_nama,
        ];
        // insert ke table user
        $this->db->insert('lpj_satuan', $data);
    }

    public function simpan_edit_satuan()
    {
        $satuan_id = htmlspecialchars($this->input->post('satuan_id', true));
        $satuan_nama = htmlspecialchars($this->input->post('satuan_nama', true));
        $this->db->set('satuan_nama', $satuan_nama);
        $this->db->where('satuan_id', $satuan_id);
        $this->db->update('lpj_satuan');
    }
    // end satuan

    // kategori
    public function getKategori()
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_kategori')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditKategori($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_kategori')
            ->where(['kategori_id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_kategori()
    {
        $kategori_nama = htmlspecialchars($this->input->post('kategori_nama', true));

        $data = [
            'kategori_nama' => $kategori_nama,
        ];
        // insert ke table user
        $this->db->insert('lpj_kategori', $data);
    }

    public function simpan_edit_kategori()
    {
        $kategori_id = htmlspecialchars($this->input->post('kategori_id', true));
        $kategori_nama = htmlspecialchars($this->input->post('kategori_nama', true));
        $this->db->set('kategori_nama', $kategori_nama);
        $this->db->where('kategori_id', $kategori_id);
        $this->db->update('lpj_kategori');
    }
    // end kategori

    // suplier
    public function getsuplier()
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_suplier')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditsuplier($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_suplier')
            ->where(['suplier_id ' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function simpan_tambah_suplier()
    {
        $suplier_nama = htmlspecialchars($this->input->post('suplier_nama', true));
        $suplier_alamat = htmlspecialchars($this->input->post('suplier_alamat', true));
        $suplier_notelp = htmlspecialchars($this->input->post('suplier_notelp', true));

        $data = [
            'suplier_nama' => $suplier_nama,
            'suplier_alamat' => $suplier_alamat,
            'suplier_notelp' => $suplier_notelp,
        ];
        // insert ke table user
        $this->db->insert('lpj_suplier', $data);
    }

    public function simpan_edit_suplier()
    {
        $suplier_id = htmlspecialchars($this->input->post('suplier_id', true));
        $suplier_nama = htmlspecialchars($this->input->post('suplier_nama', true));
        $suplier_alamat = htmlspecialchars($this->input->post('suplier_alamat', true));
        $suplier_notelp = htmlspecialchars($this->input->post('suplier_notelp', true));
        // var_dump($suplier_id);
        // die;
        $this->db->set('suplier_nama', $suplier_nama);
        $this->db->set('suplier_alamat', $suplier_alamat);
        $this->db->set('suplier_notelp', $suplier_notelp);
        $this->db->where('suplier_id ', $suplier_id);
        $this->db->update('lpj_suplier');
    }
    // end kategori

    // barang
    public function getBarang()
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_barang')
            ->get()->result_array();
        return $bagidata;
    }

    public function getEditBarang($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_barang')
            ->where(['barang_id' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    function get_kobar()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM lpj_barang");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "BR" . $kd;
    }

    public function simpan_tambah_barang()
    {
        $kobar = htmlspecialchars($this->input->post('kobar', true));
        $nabar = htmlspecialchars($this->input->post('nabar', true));
        $satuan = htmlspecialchars($this->input->post('satuan', true));
        $kat = htmlspecialchars($this->input->post('kategori', true));
        $harpok = str_replace(',', '', $this->input->post('harpok'));
        $harjul = str_replace(',', '', $this->input->post('harjul'));
        $harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
        $stok = htmlspecialchars($this->input->post('stok', true));
        $min_stok = htmlspecialchars($this->input->post('min_stok', true));
        $pegawai = htmlspecialchars($this->input->post('pegawai', true));

        $data = [
            'barang_id' => $kobar,
            'barang_nama' => $nabar,
            'barang_satuan' => $satuan,
            'barang_kategori' => $kat,
            'barang_harpok' =>  $harpok,
            'barang_harjul' => $harjul,
            'barang_harjul_grosir' => $harjul_grosir,
            'barang_stok' => $stok,
            'barang_min_stok' => $min_stok,
            'barang_user_id' => $pegawai,
        ];
        // insert ke table user
        $this->db->insert('lpj_barang', $data);
    }

    public function simpan_edit_barang()
    {
        $kobar = htmlspecialchars($this->input->post('kobar', true));
        $nabar = htmlspecialchars($this->input->post('nabar', true));
        $satuan = htmlspecialchars($this->input->post('satuan', true));
        $kat = htmlspecialchars($this->input->post('kategori', true));
        $harpok = str_replace(',', '', $this->input->post('harpok'));
        $harjul = str_replace(',', '', $this->input->post('harjul'));
        $harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
        $stok = htmlspecialchars($this->input->post('stok', true));
        $min_stok = htmlspecialchars($this->input->post('min_stok', true));
        $pegawai = htmlspecialchars($this->input->post('pegawai', true));

        $this->db->set('barang_nama', $nabar);
        $this->db->set('barang_satuan', $satuan);
        $this->db->set('barang_kategori', $kat);
        $this->db->set('barang_harpok', $harpok);
        $this->db->set('barang_harjul', $harjul);
        $this->db->set('barang_harjul_grosir', $harjul_grosir);
        $this->db->set('barang_stok',  $stok);
        $this->db->set('barang_min_stok', $min_stok);
        $this->db->set('barang_user_id', $pegawai);
        $this->db->where('barang_id', $kobar);
        $this->db->update('lpj_barang');
    }
    // end barang

    //  tampil surat_pesanan
    public function getSuratPesanan()
    {
        $bagidata =
            $this->db->select('a.*,b.*')
            ->from('lpj_pesan a')
            ->join('lpj_suplier b', 'a.pesan_suplier_id=b.suplier_id')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_barang($kobar)
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_barang')
            ->where(['barang_id' => $kobar])
            ->get()->row_array();
        return $bagidata;
    }

    public function getKopSP()
    {
        $bagidata =
            $this->db->select('*')
            ->from('lpj_kop_sp')
            ->get()->row_array();
        return $bagidata;
    }

    // public function simpan_kop_sp()
    // {
    //     $id = htmlspecialchars($this->input->post('id', true));
    //     $judul = stripslashes($this->input->post('kop', true));

    //     $cek = $this->db->get_where('lpj_kop_sp', ['id' => 1])->row_array();
    //     $data = [
    //         'id' => $id,
    //         'judul' => $judul,
    //     ];

    //     if ($cek == 0) {
    //         $this->db->insert('lpj_kop_sp', $data);
    //     } else {
    //         $this->db->set('judul', $judul);
    //         $this->db->where('id', $id);
    //         $this->db->update('lpj_kop_sp');
    //     }
    // }

    function simpan_surat_pesanan($nofak, $tglfak, $suplier, $beli_kode, $lampiran, $perihal, $program, $pesanan, $kegiatan, $bulan, $sub_kegiatan, $belanja)
    {
        $user = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $idadmin = $user['nik'];
        // var_dump($idadmin);
        // die;
        $this->db->query("INSERT INTO lpj_pesan (pesan_nofak,pesan_tanggal,pesan_suplier_id,pesan_user_id,pesan_kode,pesan_lampiran,pesan_perihal,pesan_program,pesan_kegiatan,pesan_sub_kegiatan,pesan_pesanan,pesan_bulan,pesan_belanja) VALUES ('$nofak','$tglfak','$suplier','$idadmin','$beli_kode','$lampiran', '$perihal', '$program', '$pesanan', '$kegiatan', '$bulan', '$sub_kegiatan', '$belanja')");
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'd_pesan_nofak'         =>    $nofak,
                'd_pesan_barang_id'    =>    $item['id'],
                'd_pesan_harga'        =>    $item['price'],
                'd_pesan_jumlah'        =>    $item['qty'],
                'd_pesan_total'        =>    $item['subtotal'],
                'd_pesan_kode'        =>    $beli_kode
            );
            $this->db->insert('lpj_pesan_detail', $data);
        }
        return true;
    }

    function get_kobel()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(pesan_kode,6)) AS kd_max FROM lpj_pesan");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "BL" . date('dmy') . $kd;
    }

    public function getCetak($nofak)
    {
        $bagidata =
            $this->db->select('a.*,b.*')
            ->from('lpj_pesan a')
            ->join('lpj_suplier b', 'a.pesan_suplier_id=b.suplier_id')
            ->where(['a.pesan_kode' => $nofak])
            ->get()->row_array();
        return $bagidata;
    }

    public function getCetakBarang($nofak)
    {
        $bagidata =
            $this->db->select('a.*,b.*')
            ->from('lpj_pesan_detail a')
            ->join('lpj_barang b', 'a.d_pesan_barang_id=b.barang_id')
            ->where(['a.d_pesan_kode' => $nofak])
            ->get()->result_array();
        return $bagidata;
    }

    public function sekolah()
    {
        $sekolah = $this->db->select('a.*,b.*,c.*,d.*')
            ->from('m_sekolah a')
            ->join('m_provinsi b', 'a.sekolah_provinsi_id = b.provinsi_id')
            ->join('m_kota c', 'a.sekolah_kota_id = c.kota_id')
            ->join('m_kecamatan d', 'a.sekolah_kecamatan_id = d.kecamatan_id', 'left')
            ->get()->row_array();
        return $sekolah;
    }
    // end tampil surat_pesanan


}
