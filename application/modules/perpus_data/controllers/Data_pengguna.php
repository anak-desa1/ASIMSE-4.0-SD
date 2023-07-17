<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengguna extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Perpus_model','perpus');
	}
     
    public function index()
    {	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Pengguna';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['user'] = $this->perpus->get_table('perpus_angota');

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_pengguna/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_pengguna/pengguna_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_pengguna/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
    }

    public function tambah_pengguna()
    {	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Data Pengguna';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
		
			$data['user'] = $this->perpus->get_table('perpus_angota');

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_pengguna/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_pengguna/tambah_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_pengguna/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
    }

	public function tambah_guru()
    {	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Data Pengguna';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['guru'] = $this->perpus->get_table('m_guru');

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_pengguna/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_pengguna/tambah_guru', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_pengguna/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
    }

	public function tambah_siswa()
    {	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Data Pengguna';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['siswa'] = $this->perpus->get_siswarombel();

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_pengguna/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_pengguna/tambah_siswa', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_pengguna/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
    }

    public function add_pengguna()
    {
		// format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
		$id = $this->perpus->buat_kode('perpus_angota','AG','id_login','ORDER BY id_login DESC LIMIT 1'); 
        $nama = htmlentities($this->input->post('nama',TRUE));
        $user = htmlentities($this->input->post('user',TRUE));
        $pass = md5(htmlentities($this->input->post('pass',TRUE)));
        $level = htmlentities($this->input->post('level',TRUE));
        $jenkel = htmlentities($this->input->post('jenkel',TRUE));
        $telepon = htmlentities($this->input->post('telepon',TRUE));
        $status = htmlentities($this->input->post('status',TRUE));
        $alamat = htmlentities($this->input->post('alamat',TRUE));
		$email = $_POST['email'];
		
		$dd = $this->db->query("SELECT * FROM perpus_angota WHERE user = '$user' OR email = '$email'");
		if($dd->num_rows() > 0)
		{
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Update User : '.$nama.' !, Username / Email Anda Sudah Terpakai</p>
			</div></div>');
			redirect(base_url('perpus_data/data_pengguna/tambah_pengguna')); 
		}else{
            // setting konfigurasi upload
            $nmfile = "user_".time();
            $config['upload_path'] = './panel/dist/upload/perpus_pengguna/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('gambar');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);
            $data1 = array('upload_data' => $this->upload->data());
            $data = array(
				'anggota_id' => $id,
                'nama'=>$nama,
                'user'=>$user,
                'pass'=>$pass,
                'level'=>$level,
                'tempat_lahir'=>$_POST['lahir'],
                'tgl_lahir'=>$_POST['tgl_lahir'],
                'level'=>$level,
                'email'=>$_POST['email'],
                'telepon'=>$telepon,
                'foto'=>$data1['upload_data']['file_name'],
                'jenkel'=>$jenkel,
                'alamat'=>$alamat,
                'tgl_bergabung'=>date('Y-m-d')
            );
			$this->db->insert('perpus_angota',$data);
			
            $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
			redirect(base_url('perpus_data/data_pengguna'));
		}    
      
    }	

    public function edit_pengguna()
    {	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Ubah Data Pengguna';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
		
			$count = $this->perpus->CountTableId('perpus_angota','id_login',$this->uri->segment('4'));
			if($count > 0)
				{			
					$data['user'] = $this->perpus->get_tableid_edit('perpus_angota','id_login',$this->uri->segment('4'));
				}else{
					echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
				}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_pengguna/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_pengguna/edit_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_pengguna/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

    public function upd_pengguna()
    {
        $nama = htmlentities($this->input->post('nama',TRUE));
        $user = htmlentities($this->input->post('user',TRUE));
        $pass = htmlentities($this->input->post('pass'));
        $level = htmlentities($this->input->post('level',TRUE));
        $jenkel = htmlentities($this->input->post('jenkel',TRUE));
        $telepon = htmlentities($this->input->post('telepon',TRUE));
        $status = htmlentities($this->input->post('status',TRUE));
        $alamat = htmlentities($this->input->post('alamat',TRUE));
        $id_login = htmlentities($this->input->post('id_login',TRUE));

        // setting konfigurasi upload
        $nmfile = "user_".time();
        $config['upload_path'] = './panel/dist/upload/perpus_pengguna/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
		// upload gambar 1
        
		if(!$this->upload->do_upload('gambar'))
		{
			$data = array(
				'nama'=>$nama,
				'user'=>$user,
				'pass'=>md5($pass),
				'tempat_lahir'=>$_POST['lahir'],
				'tgl_lahir'=>$_POST['tgl_lahir'],
				'level'=>$level,
				'email'=>$_POST['email'],
				'telepon'=>$telepon,
				'jenkel'=>$jenkel,
				'alamat'=>$alamat,
			);
			$this->perpus->update_table('perpus_angota','id_login',$id_login,$data);
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Update User : '.$nama.' !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_pengguna/edit_pengguna/'.$id_login));
		}
    }

    public function del_pengguna()
    {
        if($this->uri->segment('4') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('perpus_data/data_pengguna').'";</script>';}
        
        $user = $this->perpus->get_tableid_edit('perpus_angota','id_login',$this->uri->segment('4'));
        unlink('./panel/dist/upload/perpus_pengguna/'.$user->foto);
		$this->perpus->delete_table('perpus_angota','id_login',$this->uri->segment('4'));
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-danger">
		<p> Berhasil Hapus User !</p>
		</div></div>');
		redirect(base_url('perpus_data/data_pengguna'));  
    }

	public function tabel($target)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
       
		$data['siswa'] =
		$this->db->select('a.*,a.nama nm_siswa,b.rombel,c.folder')
		->from('m_siswa a')
		->join('t_kelas_siswa b', 'a.nis = b.id_siswa', 'left')
		->join('ab_blangko c', 'a.kd_sekolah = c.kd_sekolah', 'left')
		->where(['b.rombel' => $target])
		->group_by('a.nama', 'ASC')
		->get()->result_array();

        $this->load->view('perpus_data/data_pengguna/siswa_list', $data);
    }
}
