<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mainmodel','model');
    	
	}

	public function index()
	{
    $data['title'] 		= "Login";
		if ($this->session->userdata('username')===null) {
			$this->load->view('perpus/p_login', $data);
		}else{
			redirect('admin','refresh');
		}
	}

  public function registrasi()
  {
		$this->load->model('Mainmodel');
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
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]',
			array('min_length' => '* %s Minimal 5 Karakter')
		);
		$this->form_validation->set_rules('repass', 'Re-Password', 'required|matches[password]',
			array('matches' => '* %s Tidak Sesuai Dengan Password')
		);

		$this->form_validation->set_message('required', '* %s Belum Terisi');
		$this->form_validation->set_message('min_length', '* %s Minimal 5 Karakter');
		$this->form_validation->set_message('is_unique', '* %s Sudah Ada. Silahkan Ganti');
		$this->form_validation->set_message('integer', '* %s Harus Berupa Angka');
        
        if ($this->form_validation->run() == FALSE)
        {
			$data['title'] 		= "Registrasi";
			$this->load->view('perpus/p_registrasi', $data);
        }
        else
        {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
	
			$this->Mainmodel->input_pegawai($data, 'pegawai');
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url().'login/index');

		}
  }

	public function dologin()
	{
		$cek = $this->model->dologin();
		if ($cek) {
			redirect('admin','refresh');
		}else{
			$this->session->set_flashdata('error', 'Username atau password tidak cocok!');
			redirect('login','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
