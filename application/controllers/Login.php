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
    $this->load->view('perpus/utama/l_header', $data);
		if ($this->session->userdata('username')===null) {
			$this->load->view('perpus/p_login');
		}else{
			redirect('admin','refresh');
		}
    $this->load->view('perpus/utama/l_footer');
	}

  public function registrasi()
  {
	//   $this->load->model('Mainmodel');
	//   $this->form_validation->set_rules('nama', 'Nama', 'required');
	//   $this->form_validation->set_rules('username', 'Username', 'required');
	//   $this->form_validation->set_rules('password', 'Password', 'required|is_unique[pegawai.password]|min_length[4]|matches[re_password]',[
	// 	  'matches' => 'Password Dont Match',
	// 	  'min_lenght' => 'Password To Short'
	//   ]);
	//   $this->form_validation->set_rules('password', 'Password', 'required|is_unique[pegawai.password]|matches[password]');
	  
	//   if($this->form_validation->run() == false)
	//   {
	// 	$data['title'] 		= "Registration";
	// 	$this->load->view('perpus/utama/l_header', $data);
	// 	$this->load->view('perpus/p_registrasi');
	// 	$this->load->view('perpus/utama/l_footer');
	//   }
	//   else
	//   {
	// 	$data = array(
	// 		'nama' => $this->input->post('nama'),
	// 		'username' => $this->input->post('username'),
	// 		'password' => $this->input->post('password'),
	// 	);

	// 	$this->Mainmodel->input_pegawai($data, 'pegawai');
	// 	redirect(base_url().'login/index');
	//   }



		$this->load->model('Mainmodel');
	  	$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
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
        

        if ($this->form_validation->run() == FALSE)
        {
			$data['title'] 		= "Registration";
			$this->load->view('perpus/utama/l_header', $data);
			$this->load->view('perpus/p_registrasi');
			$this->load->view('perpus/utama/l_footer');
        }
        else
        {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
	
			$this->Mainmodel->input_pegawai($data, 'pegawai');
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url().'login/index');




			// $nama = $this->input->post('nama');
			// $username = $this->input->post('username');
			// $password = $this->input->post('password');
	
			// $data = array(
			// 	'nama' => $nama,
			// 	'username' => $username,
			// 	'password' => $password,
			// );
	
			// $this->Mainmodel->input_pegawai($data, 'pegawai');
			// $this->session->set_flashdata('flash', 'Ditambah');
			// redirect(base_url().'admin/pegawai');
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
