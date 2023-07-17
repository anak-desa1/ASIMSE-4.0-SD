<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus_transaksi extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
		is_logged_in();
		$this->load->Model('Perpus_model','perpus');
	}
	 
	public function transaksi_peminjaman()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Pinjam Buku ';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`, `guru_id`,`siswa_id`,
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM perpus_pinjam WHERE status = 'Dipinjam' ORDER BY pinjam_id DESC");

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/pinjam_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function transaksi_pengembalian()
	{	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Data Pengembalian Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();

			$data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`anggota_id`,`anggota_id`,`guru_id`,`siswa_id`,`status`, 
				`tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM perpus_pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC");
			// var_dump($data['pinjam']);
			// die;
			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_kembali/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_kembali/home', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_kembali/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}	
	}

	public function pinjam_umum()
	{	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Pinjam Buku Umum';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['nop'] = $this->perpus->buat_kode('perpus_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
			$data['idbo'] = $this->session->userdata('ses_id');
        	$data['user'] = $this->perpus->get_table('perpus_angota');
			$data['buku'] =  $this->db->query("SELECT * FROM perpus_buku ORDER BY id_buku DESC");

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/tambah_umum', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function pinjam_guru()
	{	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Pinjam Buku Guru';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['nop'] = $this->perpus->buat_kode('perpus_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
			$data['idbo'] = $this->session->userdata('ses_id');
			$data['guru'] = $this->perpus->get_table('m_guru');
        	// $data['user'] = $this->perpus->get_table('perpus_angota');
			$data['buku'] =  $this->db->query("SELECT * FROM perpus_buku ORDER BY id_buku DESC");

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/tambah_guru', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function pinjam_siswa()
	{	
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Tambah Pinjam Buku Siswa';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['nop'] = $this->perpus->buat_kode('perpus_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
			$data['idbo'] = $this->session->userdata('ses_id');
        	$data['user'] = 
			$this->db->select('a.*,a.nama nm_siswa,b.rombel,c.folder')
			->from('m_siswa a')
			->join('t_kelas_siswa b', 'a.nis = b.id_siswa', 'left')
			->join('ab_blangko c', 'a.kd_sekolah = c.kd_sekolah', 'left')
			->group_by('a.nama', 'ASC')
			->get()->result_array();
			$data['buku'] =  $this->db->query("SELECT * FROM perpus_buku ORDER BY id_buku DESC");

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/tambah_siswa', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function detailpinjam()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Detail Pinjam Buku ';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;
			$data['idbo'] = $this->session->userdata('ses_id');		
			$id = $this->uri->segment('3');

			$count = $this->perpus->CountTableId('perpus_pinjam','pinjam_id',$id);
			if($count > 0)
			{
				$data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`anggota_id`,`guru_id`,`siswa_id`,`status`,  
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM perpus_pinjam WHERE pinjam_id = '$id'")->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/detail', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function kembalipinjam()
	{
		if ($this->form_validation->run() == false) {
			$this->benchmark->mark('code_start');
			$data['title'] = 'Kembali Pinjam Buku';
			$data['home'] = 'Perpustakaan';
			$data['subtitle'] = $data['title'];
			$data['main_menu'] = main_menu();
			$data['sub_menu'] = sub_menu();
			$data['cek_akses'] = cek_akses_user();
			$data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
			$data['sekolah'] = $this->db->get('m_sekolah')->row_array();
			// var_dump($data['data_pegawai']);
			// die;			
			$id = $this->uri->segment('3');
			$count = $this->perpus->CountTableId('perpus_pinjam','pinjam_id',$id);
			if($count > 0)
			{
				$data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`anggota_id`,`guru_id`,`siswa_id`,`status`, 
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM perpus_pinjam WHERE pinjam_id = '$id'")->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}

			$this->load->view('layout/header-top', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('perpus_transaksi/transaksi_pinjam/kembali_view', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('perpus_transaksi/transaksi_pinjam/_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
		} else {
		}
	}

	public function prosespinjam()
	{
		$post = $this->input->post();

		if(!empty($post['tambah_umum']))
		{
			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+'.$post['lama'].' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach($hasil_cart as $isi)
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'anggota_id'=>htmlentities($post['anggota_id']), 
					'buku_id' => $isi['id'], 
					'status' => 'Dipinjam', 
					'tgl_pinjam' => htmlentities($post['tgl']), 
					'lama_pinjam' => htmlentities($post['lama']), 
					'tgl_balik'  => $tgl2, 
					'tgl_kembali'  => '0',
				);
			}
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('perpus_pinjam',$data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				  // $this->session->unset_userdata($cart[$i]);
				  // $this->session->unset_userdata('cart');
				}
			}

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_transaksi/transaksi_peminjaman')); 
		}
		if(!empty($post['tambah_guru']))
		{
			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+'.$post['lama'].' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach($hasil_cart as $isi)
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'guru_id'=>htmlentities($post['anggota_id']), 
					'buku_id' => $isi['id'], 
					'status' => 'Dipinjam', 
					'tgl_pinjam' => htmlentities($post['tgl']), 
					'lama_pinjam' => htmlentities($post['lama']), 
					'tgl_balik'  => $tgl2, 
					'tgl_kembali'  => '0',
				);
			}
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('perpus_pinjam',$data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				  // $this->session->unset_userdata($cart[$i]);
				  // $this->session->unset_userdata('cart');
				}
			}

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_transaksi/transaksi_peminjaman')); 
		}
		if(!empty($post['tambah_siswa']))
		{
			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+'.$post['lama'].' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach($hasil_cart as $isi)
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'siswa_id'=>htmlentities($post['anggota_id']), 
					'buku_id' => $isi['id'], 
					'status' => 'Dipinjam', 
					'tgl_pinjam' => htmlentities($post['tgl']), 
					'lama_pinjam' => htmlentities($post['lama']), 
					'tgl_balik'  => $tgl2, 
					'tgl_kembali'  => '0',
				);
			}
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('perpus_pinjam',$data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				  // $this->session->unset_userdata($cart[$i]);
				  // $this->session->unset_userdata('cart');
				}
			}

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_transaksi/transaksi_peminjaman')); 
		}

		if($this->input->get('pinjam_id'))
		{
			$this->perpus->delete_table('perpus_pinjam','pinjam_id',$this->input->get('pinjam_id'));
			$this->perpus->delete_table('perpus_denda','pinjam_id',$this->input->get('pinjam_id'));

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_transaksi/transaksi_peminjaman')); 
		}

		if($this->input->get('kembali'))
		{
			$id = $this->input->get('kembali');
			$pinjam = $this->db->query("SELECT  * FROM perpus_pinjam WHERE pinjam_id = '$id'");

			foreach($pinjam->result_array() as $isi){
				$pinjam_id = $isi['pinjam_id'];
				$denda = $this->db->query("SELECT * FROM perpus_denda WHERE pinjam_id = '$pinjam_id'");
				$jml = $this->db->query("SELECT * FROM perpus_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
				if($denda->num_rows() > 0){
					$s = $denda->row();
					echo $s->denda;
				}else{
					$date1 = date('Ymd');
					$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
					$diff = $date2 - $date1;
					if($diff >= 0 )
					{
						$harga_denda = 0;
						$lama_waktu = 0;
					}else{
						$dd = $this->perpus->get_tableid_edit('tbl_biaya_denda','stat','Aktif'); 
						$harga_denda = $jml*($dd->harga_denda*abs($diff));
						$lama_waktu = abs($diff);
					}
				}
				
			}

			$data = array(
				'status' => 'Di Kembalikan', 
				'tgl_kembali'  => date('Y-m-d'),
			);

			$total_array = count($data);
			if($total_array != 0)
			{	
				$this->db->where('pinjam_id',$this->input->get('kembali'));
				$this->db->update('perpus_pinjam',$data);
			}

			$data_denda = array(
				'pinjam_id' => $this->input->get('kembali'), 
				'denda' => $harga_denda, 
				'lama_waktu'=>$lama_waktu, 
				'tgl_denda'=> date('Y-m-d'),
			);
			$this->db->insert('perpus_denda',$data_denda);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Pengembalian Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('perpus_transaksi/transaksi_peminjaman')); 

		}
	}

	public function result_umum()
    {	
		
		$user = $this->perpus->get_tableid_edit('perpus_angota','anggota_id',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama != null)
		{
			echo '<table class="table table-striped">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>'.$user->nama.'</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>'.$user->telepon.'</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>'.$user->email.'</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>'.$user->alamat.'</td>
						</tr>
						<tr>
							<td>Level</td>
							<td>:</td>
							<td>'.$user->level.'</td>
						</tr>
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}

	public function result_guru()
    {	
		$user = $this->perpus->get_tableid_edit('m_guru','nip',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama_guru != null)
		{
			echo '	<table class="table table-striped">
						<tr>
							<td>'.$user->nama_guru.'</td>
						</tr>						
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}

	public function result_siswa()
    {			
		$user = $this->perpus->get_tableid_edit('m_siswa','nis',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama != null)
		{
			echo '	<table class="table table-striped">
						<tr>							
							<td>'.$user->nama.'</td>							
						</tr>						
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}

	public function buku()
    {	
		$id = $this->input->post('kode_buku');
		$row = $this->db->query("SELECT * FROM perpus_buku WHERE buku_id ='$id'");
		if($row->num_rows() > 0)
		{
			$tes = $row->row();
			$item = array(
				'id'      => $id,
				'qty'     => 1,
                'price'   => '1000',
				'name'    => $tes->title,
				'options' => array('isbn' => $tes->isbn,'thn' => $tes->thn_buku,'penerbit' => $tes->penerbit)
			);
			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($id);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		}else{

		}
        
	}

	public function buku_list()
	{
	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1;
				foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
				<tr>
					<td><?= $no;?></td>
					<td><?= $items['name'];?></td>
					<td><?= $items['options']['penerbit'];?></td>
					<td><?= $items['options']['thn'];?></td>
					<td style="width:17%">
					<a href="javascript:void(0)" id="delete_buku<?=$no;?>" data_<?=$no;?>="<?= $items['id'];?>" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function(){
						$("#delete_buku<?=$no;?>").click(function (e) {
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('perpus_transaksi/del_cart');?>",
								data:'kode_buku='+$(this).attr("data_<?=$no;?>"),
								beforeSend: function(){
								},
								success: function(html){
									$("#tampil").html(html);
								}
							});
						});
					});
				</script>
			<?php $no++;}?>
			</tbody>
		</table>
		<?php foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
			<input type="hidden" value="<?= $items['id'];?>" name="idbuku[]">
		<?php }?>
		<div id="tampil"></div>
	<?php
	}

	public function del_cart()
    {
		error_reporting(0);
        $id = $this->input->post('buku_id');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
       // redirect('jual/tambah');
		echo '<script>$("#result_buku").load("'.base_url('perpus_transaksi/buku_list').'");</script>';
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['buku_id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

}
