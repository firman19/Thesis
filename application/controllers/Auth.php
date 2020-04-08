<?php

class Auth extends CI_Controller {
	
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user',['username'=>$username])->row_array();
		// if user exists
		if($user){
			// check password
			$pw = md5($password);
			if($this->db->get_where('user',['password'=>$pw])->row_array()){
				$data = [
					'user_error()' => $user['user_id'],
					// 'email' => $user['email'],
					'username' => $user['username'],
					'login' => 1
				];
				$this->session->set_userdata($data);
				redirect('map');
			}else{
				$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">Wrong Password</div>');
				redirect('welcome');
			}
		}else{
			$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">Username not exists</div>');
			redirect('welcome');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
