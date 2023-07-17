<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus_data extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Perpus_model');
	}

	public function data_buku()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['buku'] =  $this->db->query("SELECT * FROM perpus_buku ORDER BY id_buku DESC");

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_buku/buku_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function bukudetail()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Detail Data Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$count = $this->Perpus_model->CountTableId('perpus_buku','id_buku',$this->uri->segment('3'));
			if($count > 0)
			{
				$data['buku'] = $this->Perpus_model->get_tableid_edit('perpus_buku','id_buku',$this->uri->segment('3'));
			}else{
				echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
			}	

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_buku/detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function bukuedit()
	{		
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Ubah Data Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$count = $this->Perpus_model->CountTableId('perpus_buku','id_buku',$this->uri->segment('3'));
			if($count > 0)
			{
				
				$data['buku'] = $this->Perpus_model->get_tableid_edit('perpus_buku','id_buku',$this->uri->segment('3'));
				$data['kats'] =  $this->db->query("SELECT * FROM perpus_kategori ORDER BY id_kategori DESC")->result_array();
				$data['rakbuku'] =  $this->db->query("SELECT * FROM perpus_rak ORDER BY id_rak DESC")->result_array();

			}else{
				echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
			}	

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_buku/edit_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}		
	}

	public function bukutambah()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['kats'] =  $this->db->query("SELECT * FROM perpus_kategori ORDER BY id_kategori DESC")->result_array();
			$data['rakbuku'] =  $this->db->query("SELECT * FROM perpus_rak ORDER BY id_rak DESC")->result_array();

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_buku/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_buku/tambah_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_buku/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}		
	}

	public function prosesbuku()
	{
		// cek_post();
        // if (cek_akses_user()['role_id'] == 0) {
        //     redirect(base_url('unauthorized'));
        // }

		// hapus aksi form proses buku
		if(!empty($this->input->get('buku_id')))
		{
        
			$buku = $this->Perpus_model->get_tableid_edit('perpus_buku','id_buku',htmlentities($this->input->get('buku_id')));
			
			$sampul = './panel/dist/upload/perpus_buku/'.$buku->sampul;
			if(file_exists($sampul))
			{
				unlink($sampul);
			}
			
			$lampiran = './panel/dist/upload/perpus_buku/'.$buku->lampiran;
			if(file_exists($lampiran))
			{
				unlink($lampiran);
			}
			
			$this->Perpus_model->delete_table('perpus_buku','id_buku',$this->input->get('buku_id'));
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-danger">
					<p> Berhasil Hapus Buku !</p>
				</div></div>');
			redirect(base_url('perpus_data/data_buku'));  
		}

		// tambah aksi form proses buku
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$buku_id = $this->Perpus_model->buat_kode('perpus_buku','BK','id_buku','ORDER BY id_buku DESC LIMIT 1'); 
			$data = array(
				'buku_id'=>$buku_id,
				'nama_kategori'=>htmlentities($post['kategori']), 
				'nama_rak' => htmlentities($post['rak']), 
				'isbn' => htmlentities($post['isbn']), 
				'title'  => htmlentities($post['title']), 
				'pengarang'=> htmlentities($post['pengarang']), 
				'penerbit'=> htmlentities($post['penerbit']),    
				'thn_buku' => htmlentities($post['thn']), 
				'isi' => $this->input->post('ket'), 
				'jml'=> htmlentities($post['jml']),  
				'tgl_masuk' => date('Y-m-d H:i:s')
			);

			$this->load->library('upload',$config);
			if(!empty($_FILES['gambar']['name']))
			{
				// setting konfigurasi upload
				$config['upload_path'] = './panel/dist/upload/perpus_buku/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
					$this->db->set('sampul', $file1['upload_data']['file_name']);
				}else{
					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('perpus_data/data_buku')); 
				}
			}

			if(!empty($_FILES['lampiran']['name']))
			{
				// setting konfigurasi upload
				$config['upload_path'] = './panel/dist/upload/perpus_buku/';
				$config['allowed_types'] = 'pdf'; 
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
					$this->db->set('lampiran', $file2['upload_data']['file_name']);
				}else{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('perpus_data/data_buku')); 
				}
			}

			$this->db->insert('perpus_buku', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_buku')); 
		}

		// edit aksi form proses buku
		if(!empty($this->input->post('edit')))
		{
			$post = $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']), 
				'nama_rak' => htmlentities($post['rak']), 
				'isbn' => htmlentities($post['isbn']), 
				'title'  => htmlentities($post['title']),
				'pengarang'=> htmlentities($post['pengarang']), 
				'penerbit'=> htmlentities($post['penerbit']),  
				'thn_buku' => htmlentities($post['thn']), 
				'isi' => $this->input->post('ket'), 
				'jml'=> htmlentities($post['jml']),  
				'tgl_masuk' => date('Y-m-d H:i:s')
			);

			if(!empty($_FILES['gambar']['name']))
			{
				// setting konfigurasi upload
				$config['upload_path'] = './panel/dist/upload/perpus_buku/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$gambar = './panel/dist/upload/perpus_buku/'.htmlentities($post['gmbr']);
					if(file_exists($gambar)) {
						unlink($gambar);
					}
					$file1 = array('upload_data' => $this->upload->data());
					$this->db->set('sampul', $file1['upload_data']['file_name']);
				}else{
					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('perpus_data/data_buku')); 
				}
			}

			if(!empty($_FILES['lampiran']['name']))
			{
				// setting konfigurasi upload
				$config['upload_path'] = './panel/dist/upload/perpus_buku/';
				$config['allowed_types'] = 'pdf'; 
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$lampiran = './panel/dist/upload/perpus_buku/'.htmlentities($post['lamp']);
					if(file_exists($lampiran)) {
						unlink($lampiran);
					}
					$file2 = array('upload_data' => $this->upload->data());
					$this->db->set('lampiran', $file2['upload_data']['file_name']);
				}else{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('perpus_data/data_buku')); 
				}
			}

			$this->db->where('id_buku',htmlentities($post['edit']));
			$this->db->update('perpus_buku', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Buku Sukses !</p>
				</div></div>');
			redirect(base_url('perpus_data/bukuedit/'.$post['edit'])); 
		}
	}

	public function data_kategori()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Kategori Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['kategori'] =  $this->db->query("SELECT * FROM perpus_kategori ORDER BY id_kategori DESC");

			if(!empty($this->input->get('id'))){
				$id = $this->input->get('id');
				$count = $this->Perpus_model->CountTableId('perpus_kategori','id_kategori',$id);
				if($count > 0)
				{			
					$data['kat'] = $this->db->query("SELECT *FROM perpus_kategori WHERE id_kategori='$id'")->row();
				}else{
					echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/kategori').'"</script>';
				}
			}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_kategori/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_kategori/kat_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_kategori/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}	
	}

	public function katproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);

			$this->db->insert('perpus_kategori', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_kategori'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori',htmlentities($post['edit']));
			$this->db->update('perpus_kategori', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_kategori')); 		
		}

		if(!empty($this->input->get('kat_id')))
		{
			$this->db->where('id_kategori',$this->input->get('kat_id'));
			$this->db->delete('perpus_kategori');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-danger">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_kategori')); 
		}
	}

	public function data_rak()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Rak Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['rakbuku'] =  $this->db->query("SELECT * FROM perpus_rak ORDER BY id_rak DESC");

			if(!empty($this->input->get('id'))){
				$id = $this->input->get('id');
				$count = $this->Perpus_model->CountTableId('perpus_rak','id_rak',$id);
				if($count > 0)
				{	
					$data['rak'] = $this->db->query("SELECT *FROM perpus_rak WHERE id_rak='$id'")->row();
				}else{
					echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('perpus_data/data_rak').'"</script>';
				}
			}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_rak/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_rak/rak_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_rak/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function rakproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);

			$this->db->insert('perpus_rak', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_rak'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);
			$this->db->where('id_rak',htmlentities($post['edit']));
			$this->db->update('perpus_rak', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Edit Rak Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_rak')); 		
		}

		if(!empty($this->input->get('rak_id')))
		{
			$this->db->where('id_rak',$this->input->get('rak_id'));
			$this->db->delete('perpus_rak');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-danger">
			<p> Hapus Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_rak')); 
		}
	}

	public function data_denda()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Denda';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['denda'] = $this->db->query("SELECT * FROM perpus_biaya_denda ORDER BY id_biaya_denda DESC");

			if(!empty($this->input->get('id'))){
				$id = $this->input->get('id');
				$count = $this->Perpus_model->CountTableId('perpus_biaya_denda','id_biaya_denda',$id);
				if($count > 0)
				{			
					$data['den'] = $this->db->query("SELECT *FROM perpus_biaya_denda WHERE id_biaya_denda='$id'")->row();
				}else{
					echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('transaksi/denda').'"</script>';
				}
			}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_denda/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_denda/denda_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_denda/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function dendaproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'harga_denda'=>$post['harga'],
				'stat'=>'Tidak Aktif',
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->insert('perpus_biaya_denda', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah  Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_denda')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$dd = $this->Perpus_model->get_tableid('perpus_biaya_denda','stat','Aktif');
			foreach($dd as $isi)
			{
				$data1 = array(
					'stat'=>'Tidak Aktif',
				);
				$this->db->where('id_biaya_denda',$isi['id_biaya_denda']);
				$this->db->update('perpus_biaya_denda', $data1);
			}

			$post= $this->input->post();
			$data = array(
				'harga_denda'=>$post['harga'],
				'stat'=>$post['status'],
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->where('id_biaya_denda',$post['edit']);
			$this->db->update('perpus_biaya_denda', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Edit Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_denda')); 	
		}

		if(!empty($this->input->get('denda_id')))
		{
			$this->db->where('id_biaya_denda',$this->input->get('denda_id'));
			$this->db->delete('perpus_biaya_denda');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-danger">
			<p> Hapus Harga Denda Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_data/data_denda')); 
		}
	}

	public function data_label()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Kategori Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			
			$data['buku'] =  $this->Perpus_model->get_buku();

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_data/data_label/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_data/data_label/label_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_data/data_label/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}	
	}

	public function showw()
	{
		$this->load->library('ciqrcode');
		$id = $this->input->post('id');
		$this->load->model('Perpus_model');
		$car = $this->Perpus_model->getShow_query($id);
		// var_dump($car);
		// die;
		if ($car->num_rows() > 0) {
			foreach ($car->result() as $row) {
				$shows = array(
					'buku_id' => $row->buku_id,
					'title' => $row->title,
					'penerbit' => $row->penerbit,
				);
				$this->load->view('perpus_data/data_label/v_scan', $shows);
			}
		} else {
			$this->load->view('perpus_data/data_label/v_scan_kosong');
		}
	}

	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->Perpus_model->search_value($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'label' => $row->nama,
					);
				echo json_encode($arr_result);
			}
		}
	}

	public function print()
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();

		$id = $this->input->post('selector', true);		
      	$data['buku'] = $this->Perpus_model->get_buku_cetak($id)->result();
		$data['data'] = $this->db->get('perpus_rak')->row_array();
        // var_dump($data['buku']);
        // die;		
        $this->load->view('perpus_data/data_label/_css');           
        $this->load->view('perpus_data/data_label/cetak_print', $data);       
        $this->load->view('perpus_data/data_label/_js');        	
    }
	
}
