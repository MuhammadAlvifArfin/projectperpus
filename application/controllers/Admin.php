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
		require(APPPATH. 'PHPExcel/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
		
		$excel = new PHPExcel();

		$excel->getProperties()->setCreator("THEPerpustakaan");
		$excel->getProperties()->setLastModifiedBy("THEPerpustakaan");
		$excel->getProperties()->setTitle("Data Peminjaman");

		$excel->setActiveSheetIndex(0);

		$style_col = array(
		  'font' => array('bold' => true),
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA TRANSAKSI"); 
		$excel->getActiveSheet()->mergeCells('A1:F1'); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID PEMINJAMAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA MEMBER"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JUDUL BUKU"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL PEMINJAMAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL PENGEMBALIAN");

		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		

		$no = 1; 
		$numrow = 4; 
		foreach($data['transaksi'] as $t){
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $t->id);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $t->nama_member);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $t->judul_buku);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $t->tanggal_pinjam);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $t->tanggal_kembali);
		  
		  
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  
		  $no++;
		  $numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Data Peminjaman");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="DataPeminjaman.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

	// export excel member
	function excel_member()
	{
		$dataM['member'] = $this->Mainmodel->tampil_member()->result();
		require(APPPATH. 'PHPExcel/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
		
		$object = new PHPExcel();

		$object->getProperties()->setCreator("THE Perpustakaan");
		$object->getProperties()->setLastModifiedBy("THE Perpustakaan");
		$object->getProperties()->setTitle("Data Member");

		$object->setActiveSheetIndex(0);

		$style_col = array
		(
		  'font' => array('bold' => true),
		  'alignment' => array
		  (
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
		  ),
		  'borders' => array
		  (
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		
		$style_row = array
		(
		  'alignment' => array
		  (
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array
		  (
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);

		$object->setActiveSheetIndex(0)->setCellValue('A1', "DATA MEMBER"); 
		$object->getActiveSheet()->mergeCells('A1:F1'); 
		$object->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
		$object->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
		$object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		
		$object->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$object->setActiveSheetIndex(0)->setCellValue('B3', "ID MEMBER"); 
		$object->setActiveSheetIndex(0)->setCellValue('C3', "NAMA MEMBER"); 
		$object->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); 
		$object->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); 
		$object->setActiveSheetIndex(0)->setCellValue('F3', "NO TELEPON");

		$object->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$object->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$object->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$object->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$object->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$object->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		

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
		  
		  
		  $object->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $object->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $object->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $object->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $object->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $object->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  
		  $no++;
		  $numrow++;
		}
		
		$object->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$object->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
		$object->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		$object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$object->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$object->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		
		$object->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$object->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$object->getActiveSheet(0)->setTitle("Data Member");
		$object->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="DataMember.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		$write->save('php://output');

	}

	//export excel buku
	public function excel_buku()
	{
		$dataB['buku'] = $this->Mainmodel->tampil_buku()->result();
		require(APPPATH. 'PHPExcel/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
		
		$excel = new PHPExcel();

		$excel->getProperties()->setCreator("THE Perpustakaan");
		$excel->getProperties()->setLastModifiedBy("THE Perpustakaan");
		$excel->getProperties()->setTitle("Data Buku");

		$excel->setActiveSheetIndex(0);

		$style_col = array
		(
		  'font' => array('bold' => true),
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
		  ),
		  'borders' => array
		  (
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		
		$style_row = array
		(
		  'alignment' => array
		  (
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array
		  (
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BUKU"); 
		$excel->getActiveSheet()->mergeCells('A1:F1'); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID BUKU"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "JUDUL BUKU"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "PENERBIT"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TAHUN TERBIT"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "JUMLAH BUKU");

		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		

		$no = 1; 
		$numrow = 4; 
		foreach($dataB['buku'] as $b)
		{
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $b->id);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $b->judul);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $b->penerbit);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $b->tahun_terbit);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $b->stock);
		  
		  
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  
		  $no++;
		  $numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(19);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Data Buku");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Buku.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

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

	//pdf
	function pdf()
	{
		$this->load->library('dompdf_gen');
		$this->load->model('Mainmodel');

		$data['transaksi'] = $this->Mainmodel->tampil_transaksi()->result();
		$data['title'] 		= "Cetak Data Transaksi";
		$this->load->view('perpus/test_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_Transaksi.pdf", array('Attachment' =>0));
	}
}
