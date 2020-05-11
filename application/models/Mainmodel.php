<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmodel extends CI_Model {

	function dologin(){
		$n   = $this->input->post('nama');
		$u   = $this->input->post('username');
		$p   = $this->input->post('password');
		$cek = $this->db->where('username',$u)->where('password',$p)->get('pegawai');
		if ($cek->num_rows()>0) 
		{
			foreach ($cek->result() as $key) 
			{
				$id = $key->id;
			}
			$user_data = array
			(
				'id'	   => $id,
				'username' => $u,
				'password' => $p,
				'nama'     => $n,
			);
			$this->session->set_userdata( $user_data );
			return true;
		}
		else
		{
			return false;
		}
	}

	function tampil_data(){
		return $this->db->get('pegawai');
	}

	

	// member assets

	function  tampil_member(){
		return $this->db->get('member');
	}

	function input_member($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_member($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_member($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// buku assets
	function  tampil_buku(){
		return $this->db->get('buku');
	}

	function buku_sum(){
		$sql = "SELECT sum(stock) as total from buku";
		$result = $this->db->query($sql);
		return $result->row()->total;
	}

	function input_buku($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_buku($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_buku($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// pegawai assets
	function edit_pegawai($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function input_pegawai($data,$table){
		$this->db->insert($table,$data);
	}

	function update_pegawai($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// transaksi assets
	public function  tampil_transaksi(){
		return $this->db->get('transaksi');
	}

	function input_transaksi($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_transaksi($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function update_transaksi($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	
}
