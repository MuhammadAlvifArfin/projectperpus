<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel');
		if ($this->session->userdata('username')===null) {
			redirect('login','refresh');
		}
		$this->load->library('user_agent');
		$this->load->helper('url');
	}

	function index()
	{
		$data['title'] 		= "Dashboard";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_dashboard');
		$this->load->view('perpus/utama/p_footer');
	}

	// buku assets
	function buku()
	{
		$this->load->model('Mainmodel');
		$dataB['buku'] = $this->Mainmodel->tampil_buku()->result();
		$data['title'] 		= "Buku";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_buku',$dataB);
		$this->load->view('perpus/utama/p_footer');
	}

	function tambah_buku()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Nama', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|integer');
		$this->form_validation->set_rules('stock', 'Stok', 'required|integer');

		$this->form_validation->set_message('required', '* %s Belum Terisi');
		$this->form_validation->set_message('integer', '* %s Harus Berupa Angka');
        

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->model('Mainmodel');
			$dataB['buku'] = $this->Mainmodel->tampil_buku()->result();
			$data['title'] 		= "Buku";
			$this->load->view('perpus/utama/p_header',$data);
			$this->load->view('perpus/p_buku',$dataB);
			$this->load->view('perpus/utama/p_footer');
        }
        else
        {
			$judul = $this->input->post('judul');
			$penerbit = $this->input->post('penerbit');
			$tahun_terbit = $this->input->post('tahun_terbit');
			$stock = $this->input->post('stock');
			$gambar = $_FILES['gambar'];
			if($gambar='')
			{
				echo "gambar kosong";
			}
			else
			{
				$config['upload_path'] = './assets/gambar_buku';
				$config['allowed_types'] = 'jpg|png|gif';
	
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('gambar'))
				{
					$this->load->model('Mainmodel');
					$dataB['buku'] = $this->Mainmodel->tampil_buku()->result();
					$data['title'] 		= "Buku";
					$this->load->view('perpus/utama/p_header',$data);
					$this->load->view('perpus/p_buku',$dataB);
					$this->load->view('perpus/utama/p_footer');
				}
				else
				{
					$gambar=$this->upload->data('file_name'); 
				}
			}
	
			$data = array(
				'judul' => $judul,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun_terbit,
				'stock' => $stock,
				'gambar' => $gambar,
			);
	
			$this->Mainmodel->input_member($data, 'buku');
			$this->session->set_flashdata('flash','Ditambah');
			redirect(base_url().'admin/buku');
		}
	}

	function delete_buku($id)
	{
		$where = array('id' => $id);
		$this->Mainmodel->delete_data($where, 'buku');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'admin/buku');
	}

	function update_buku()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit = $this->input->post('tahun_terbit');
		$stock = $this->input->post('stock');
		$file_lama = $this->input->post('filelama');
		$gambar = $_FILES['gambar'];
		if($gambar = '')
		{
			
		}
		else
		{
			$config['upload_path'] = './assets/gambar_buku';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar'))
			{
				$gambar = $file_lama;
			}
			else
			{
				$gambar=$this->upload->data('file_name'); 
				unlink('assets/gambar_buku'.$file_lama);
			}
		}

		$data = array(
			'id' => $id,
			'judul' => $judul,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'stock' => $stock,
			'gambar' => $gambar,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_buku($where,$data,'buku');
		$this->session->set_flashdata('flash','Diupdate');
		redirect(base_url().'admin/buku');
	}

	// pegawai assets
	function pegawai()
	{
		$this->load->model('Mainmodel');
		$dataP['pegawai'] = $this->Mainmodel->tampil_data()->result();
		$data['title'] 		= "Pegawai";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_pegawai',$dataP);
		$this->load->view('perpus/utama/p_footer');
	}
	
	function delete_pegawai($id)
	{
		$where = array('id' => $id);
		$this->Mainmodel->delete_data($where, 'pegawai');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'admin/pegawai');
	}

	function tambah_pegawai()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[pegawai.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('repass', 'Konfirmasi Password', 'required|matches[password]',
			array('matches' => '* %s Tidak Sesuai Dengan Password')
		);

		$this->form_validation->set_message('required', '* %s Belum Terisi');
		$this->form_validation->set_message('min_lenght', '* %s Minimal 5 Karakter');
		$this->form_validation->set_message('is_unique', '* %s Sudah Ada. Silahkan Ganti');
        

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->model('Mainmodel');
			$dataP['pegawai'] = $this->Mainmodel->tampil_data()->result();
			$data['title'] 		= "Pegawai";
			$this->load->view('perpus/utama/p_header',$data);
			$this->load->view('perpus/p_pegawai',$dataP);
			$this->load->view('perpus/utama/p_footer');
        }
        else
        {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => $password,
			);
	
			$this->Mainmodel->input_pegawai($data, 'pegawai');
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url().'admin/pegawai');
		}
	}

	function update_pegawai()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_pegawai($where,$data,'pegawai');
		$this->session->set_flashdata('flash','Di Update');
		redirect(base_url().'admin/pegawai');
	}

	// member assets
	function member()
	{
		$this->load->model('Mainmodel');
		$dataM['member'] = $this->Mainmodel->tampil_member()->result();
		$data['title'] 		= "Member";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_member',$dataM);
		$this->load->view('perpus/utama/p_footer');
	}
	function delete_member($id)
	{
		$where = array('id' => $id);
		$this->Mainmodel->delete_data($where, 'member');
		$this->session->set_flashdata('flash','Di Hapus');
		redirect(base_url().'admin/member');
	}

	function tambah_member()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telpon', 'No Telepon', 'required|min_length[10]|integer');

		$this->form_validation->set_message('required', '* %s Belum Terisi');
		$this->form_validation->set_message('min_length', '* %s Minimal 10 Karakter');
		$this->form_validation->set_message('integer', '* %s Harus Berupa Angka');
        

        if ($this->form_validation->run() == FALSE)
        {
			
			
			$this->load->model('Mainmodel');
			$dataM['member'] = $this->Mainmodel->tampil_member()->result();
			$data['title'] 		= "Member";
			$this->load->view('perpus/utama/p_header',$data);
			$this->load->view('perpus/p_member',$dataM);
			$this->load->view('perpus/utama/p_footer');
        }
        else
        {
			$nama = $this->input->post('nama');
			$jenkel = $this->input->post('jenkel');
			$alamat = $this->input->post('alamat');
			$telpon = $this->input->post('telpon');
	
			$data = array(
				'nama' => $nama,
				'jenkel' => $jenkel,
				'alamat' => $alamat,
				'telpon' => $telpon,
			);
	
			$this->Mainmodel->input_member($data, 'member');
			$this->session->set_flashdata('flash','Di Tambah');
			redirect(base_url().'admin/member');
		}
		
	}

	function update_member()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jenkel = $this->input->post('jenkel');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telpon');

		$data = array(
			'nama' => $nama,
			'jenkel' => $jenkel,
			'alamat' => $alamat,
			'telpon' => $telpon,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_member($where,$data,'member');
		$this->session->set_flashdata('flash','Di Update');
		redirect(base_url().'admin/member');
	}

	// transaksi assets
	function transaksi()
	{

		$this->load->model('Mainmodel');
		$dataT['transaksi'] = $this->Mainmodel->tampil_transaksi()->result();
		$dataT['member'] = $this->Mainmodel->tampil_member()->result();		
		$dataT['buku'] = $this->Mainmodel->tampil_buku()->result();
		$data['title'] 		= "Transaksi";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_transaksi',$dataT);
		$this->load->view('perpus/utama/p_footer');
	}

	function tambah_transaksi()
	{
		$nama_member = $this->input->post('nama_member');
		$judul_buku = $this->input->post('judul_buku');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$tanggal_kembali = $this->input->post('tanggal_kembali');

		$data = array(
			'nama_member' => $nama_member,
			'judul_buku' => $judul_buku,
			'tanggal_pinjam' => $tanggal_pinjam,
			'tanggal_kembali' => $tanggal_kembali,
		);

		$this->Mainmodel->input_transaksi($data, 'transaksi');
		$this->session->set_flashdata('flash','Di Tambah');
		redirect(base_url().'admin/transaksi');
	}

	function delete_transaksi($id)
	{
		$where = array('id' => $id);
		$this->Mainmodel->delete_data($where, 'transaksi');
		$this->session->set_flashdata('flash','Di Hapus');
		redirect(base_url().'admin/transaksi');
	}

	function update_transaksi()
	{
		$id = $this->input->post('id');
		$nama_member = $this->input->post('nama_member');
		$judul_buku = $this->input->post('judul_buku');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$tanggal_kembali = $this->input->post('tanggal_kembali');

		$data = array(
			'nama_member' => $nama_member,
			'judul_buku' => $judul_buku,
			'tanggal_pinjam' => $tanggal_pinjam,
			'tanggal_kembali' => $tanggal_kembali,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_transaksi($where,$data,'transaksi');
		$this->session->set_flashdata('flash','Di Update');
		redirect(base_url().'admin/transaksi');
	}
}
