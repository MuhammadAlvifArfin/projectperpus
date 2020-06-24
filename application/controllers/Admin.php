<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

	//cari buku
	function search_buku()
	{
		$keyword = $this->input->post('keyword');
		$title['title'] 		= "Buku";
		$data['buku'] = $this->Mainmodel->get_keyword($keyword);
		$this->load->view('perpus/utama/p_header',$title);
		$this->load->view('perpus/p_buku',$data);
		$this->load->view('perpus/utama/p_footer');
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
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	function tambah_pegawai()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'No Telepon', 'required|min_length[10]|integer|is_unique[pegawai.telepon]',
			array('min_length' => '* %s Minimal 10 Karakter')
		);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array('valid_email' => '* %s Harus Berupa Email')
		);
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[pegawai.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('repass', 'Konfirmasi Password', 'required|matches[password]',
			array('matches' => '* %s Tidak Sesuai Dengan Password')
		);

		$this->form_validation->set_message('required', '* %s Belum Terisi');
		$this->form_validation->set_message('min_lenght', '* %s Minimal 5 Karakter');
		$this->form_validation->set_message('is_unique', '* %s Sudah Ada. Silahkan Ganti');
		$this->form_validation->set_message('integer', '* %s Harus Berupa Angka');

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
			$jenkel = $this->input->post('jenkel');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			$data = array(
				'nama' => $nama,
				'jenkel' => $jenkel,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
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
		$jenkel = $this->input->post('jenkel');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama,
			'jenkel' => $jenkel,
			'alamat' => $alamat,
			'telepon' => $telepon,
			'email' => $email,
			'username' => $username,
			'password' => $password,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_pegawai($where,$data,'pegawai');
		$this->session->set_flashdata('flash','Di Update');
		redirect(base_url().'admin/detail_pegawai');
	}

	function detail_pegawai()
	{
		$this->load->model('Mainmodel');
		$dataP['pegawai'] = $this->Mainmodel->tampil_data()->result();
		$dataP['data'] = $this->Mainmodel->tampil_detail();
		$data['title'] 		= "Detail Pegawai";
		$this->load->view('perpus/utama/p_header',$data);
		$this->load->view('perpus/p_detail',$dataP);
		$this->load->view('perpus/utama/p_footer');
	}

	function pdf_pegawai()
	{
		$this->load->library('dompdf_gen');
		$this->load->model('Mainmodel');

		$data['pegawai'] = $this->Mainmodel->tampil_data()->result();
		$this->load->view('perpus/pdf_pegawai',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Pegawai.pdf", array('Attachment' =>0));
	}

	function excel_pegawai()
	{

		$dataP['pegawai'] = $this->Mainmodel->tampil_data()->result();
        $object = new Spreadsheet();

        $object->getProperties()->setCreator("ThePerpustakaan");
        $object->getProperties()->setLastModifiedBy("ThePerpustakaan");
        $object->getProperties()->setTitle("Data Pegawai");

        $object->setActiveSheetIndex(0);
		
		$object->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$object->setActiveSheetIndex(0)->setCellValue('B3', "ID PEGAWAI"); 
		$object->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PEGAWAI"); 
		$object->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); 
		$object->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); 
		$object->setActiveSheetIndex(0)->setCellValue('F3', "NO TELEPON");
		$object->setActiveSheetIndex(0)->setCellValue('G3', "EMAIL");

		
		$no = 1; 
		$numrow = 4; 
		foreach($dataP['pegawai'] as $p)
		{
		  $object->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $object->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $p->id);
		  $object->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $p->nama);
		  $object->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $p->jenkel);
		  $object->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $p->alamat);
		  $object->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $p->telepon);
		  $object->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $p->email);
		  
		  $no++;
		  $numrow++;
		}

        $filename = "Data Pegawai";

        $object->getActiveSheet()->setTitle("Data Pegawai");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');


        exit;

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

		$data = array(
			'nama_member' => $nama_member,
			'judul_buku' => $judul_buku,
			'tanggal_pinjam'=> date('Y-m-d'),
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
		// $tanggal_pinjam = $this->input->post('tanggal_pinjam');
		// $tanggal_kembali = $this->input->post('tanggal_kembali');

		$data = array(
			'nama_member' => $nama_member,
			'judul_buku' => $judul_buku,
			// 'tanggal_pinjam' => $tanggal_pinjam,
			// 'tanggal_kembali' => $tanggal_kembali,
		);

		$where = array(
			'id' => $id
		);

		$this->Mainmodel->update_transaksi($where,$data,'transaksi');
		$this->session->set_flashdata('flash','Di Update');
		redirect(base_url().'admin/transaksi');
	}

	function kembali($id)
	{
		$where = array('id' => $id);
		$data = array(
			'denda' 		 => $this->input->post('denda'),
			'tanggal_kembali' => date('Y-m-d'),
		);

		$this->Mainmodel->update_transaksi($where,$data,'transaksi');
		redirect(base_url().'admin/transaksi');
	}


	//export excel transaksi
	public function excel_transaksi()
	{
		$data['transaksi'] = $this->Mainmodel->tampil_transaksi()->result();
        $object = new Spreadsheet();

        $object->getProperties()->setCreator("ThePerpustakaan");
        $object->getProperties()->setLastModifiedBy("ThePerpustakaan");
        $object->getProperties()->setTitle("Data Transaksi");

        $object->setActiveSheetIndex(0);
		
		$object->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$object->setActiveSheetIndex(0)->setCellValue('B3', "ID PEMINJAMAN"); 
		$object->setActiveSheetIndex(0)->setCellValue('C3', "NAMA MEMBER"); 
		$object->setActiveSheetIndex(0)->setCellValue('D3', "JUDUL BUKU"); 
		$object->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL PEMINJAMAN"); 
		$object->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL PENGEMBALIAN");
		
		$no = 1; 
		$numrow = 4; 
		foreach($data['transaksi'] as $t){
		  $object->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $object->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $t->id);
		  $object->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $t->nama_member);
		  $object->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $t->judul_buku);
		  $object->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $t->tanggal_pinjam);
		  $object->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $t->tanggal_kembali);
		  
		  $no++;
		  $numrow++;
		}

        $filename = "Data Transaksi";

        $object->getActiveSheet()->setTitle("Data Transaksi");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');


        exit;        
	}

	// export excel member
	function excel_member()
	{

		$dataM['member'] = $this->Mainmodel->tampil_member()->result();
        $object = new Spreadsheet();

        $object->getProperties()->setCreator("ThePerpustakaan");
        $object->getProperties()->setLastModifiedBy("ThePerpustakaan");
        $object->getProperties()->setTitle("Data Member");

        $object->setActiveSheetIndex(0);
		
		$object->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$object->setActiveSheetIndex(0)->setCellValue('B3', "ID MEMBER"); 
		$object->setActiveSheetIndex(0)->setCellValue('C3', "NAMA MEMBER"); 
		$object->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); 
		$object->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); 
		$object->setActiveSheetIndex(0)->setCellValue('F3', "NO TELEPON");
		
		$no = 1; 
		$numrow = 4; 
		foreach($dataM['member'] as $m)
		{
		  $object->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $object->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $m->id);
		  $object->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $m->nama);
		  $object->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $m->jenkel);
		  $object->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $m->alamat);
		  $object->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $m->telpon);
		  
		  $no++;
		  $numrow++;
		}

        $filename = "Data Member";

        $object->getActiveSheet()->setTitle("Data Member");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');


        exit;        
	}

	//export excel buku
	public function excel_buku()
	{

		$dataB['buku'] = $this->Mainmodel->tampil_buku()->result();
        $object = new Spreadsheet();

        $object->getProperties()->setCreator("ThePerpustakaan");
        $object->getProperties()->setLastModifiedBy("ThePerpustakaan");
        $object->getProperties()->setTitle("Data Buku");

        $object->setActiveSheetIndex(0);
		
		$object->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$object->setActiveSheetIndex(0)->setCellValue('B3', "ID BUKU"); 
		$object->setActiveSheetIndex(0)->setCellValue('C3', "JUDUL BUKU"); 
		$object->setActiveSheetIndex(0)->setCellValue('D3', "PENERBIT"); 
		$object->setActiveSheetIndex(0)->setCellValue('E3', "TAHUN TERBIT"); 
		$object->setActiveSheetIndex(0)->setCellValue('F3', "JUMLAH BUKU");
		
		$no = 1; 
		$numrow = 4; 
		foreach($dataB['buku'] as $b)
		{
			$object->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$object->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $b->id);
			$object->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $b->judul);
			$object->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $b->penerbit);
			$object->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $b->tahun_terbit);
			$object->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $b->stock);
		  
		  $no++;
		  $numrow++;
		}

        $filename = "Data Buku";

        $object->getActiveSheet()->setTitle("Data Buku");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');

		
		exit;
		
	}

	//print transaksi
	function print_transaksi()
	{
		$this->load->model('Mainmodel');
		$data['transaksi'] = $this->Mainmodel->tampil_transaksi()->result();
		$data['title'] 		= "Cetak Data Transaksi";
		$this->load->view('perpus/print_transaksi',$data);
	}

	// print buku
	function print_buku()
	{
		$this->load->model('Mainmodel');
		$data['buku'] = $this->Mainmodel->tampil_buku()->result();
		$data['title'] 		= "Cetak Data Buku";
		$this->load->view('perpus/print_buku',$data);
	}

	// print buku
	function print_member()
	{
		$this->load->model('Mainmodel');
		$data['member'] = $this->Mainmodel->tampil_member()->result();
		$data['title'] 		= "Cetak Data Member";
		$this->load->view('perpus/print_member',$data);
	}

	// print pegawai
	function print_pegawai()
	{
		$this->load->model('Mainmodel');
		$data['pegawai'] = $this->Mainmodel->tampil_data()->result();
		$data['title'] 		= "Cetak Data Pegawai";
		$this->load->view('perpus/print_pegawai',$data);
	}

	//pdf transaksi
	function pdf_transaksi()
	{
		$this->load->library('dompdf_gen');
		$this->load->model('Mainmodel');

		$data['transaksi'] = $this->Mainmodel->tampil_transaksi()->result();
		$this->load->view('perpus/pdf_transaksi',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Transaksi.pdf", array('Attachment' =>0));
	}

	//pdf buku
	function pdf_buku()
	{
		$this->load->library('dompdf_gen');
		$this->load->model('Mainmodel');

		$data['buku'] = $this->Mainmodel->tampil_buku()->result();
		$this->load->view('perpus/pdf_buku',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Buku.pdf", array('Attachment' =>0));
	}

	//pdf buku
	function pdf_member()
	{
		$this->load->library('dompdf_gen');
		$this->load->model('Mainmodel');

		$data['member'] = $this->Mainmodel->tampil_member()->result();
		$this->load->view('perpus/pdf_member',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Member.pdf", array('Attachment' =>0));
	}
}
