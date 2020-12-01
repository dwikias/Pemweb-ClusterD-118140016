<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Login Page';
            $this->load->view('templates/v_authHeader',$data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/v_authFooter');
        } else 
        {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email'); 
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
       //jika user ada
        if($user){
            //jika user aktif
            if($user['is_active'] == 1){
                if(password_verify($password,$user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('admin');
                    }else {
                        redirect('user');
                    }
                }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Password Salah!</div>');
                redirect('auth');
                }
            }else {
                
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Email Anda belum diaktivasi!
              </div>');
              redirect('auth');
            }
        }else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email anda belum terdaftarkan, silakan Daftar dahulu!
          </div>');
          redirect('auth');
        }
    }

 
    
    public function registration()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Maaf email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
    
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

        if ($this->form_validation->run() == false)
        {
            $data['title'] = 'User Registration';
            $this->load->view('templates/v_authHeader',$data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/v_authFooter');

        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user',$data);
            $_SESSION['message'] = '<div class="alert alert-success" role="alert">
            Anda sudah terdaftar, silakan Login!</div>';
            $this->session->mark_as_flash('message');
            
            redirect('auth');

        }

    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda berhasil keluar!
          </div>');
          redirect('auth');
    }

    public function blocked()
    {
       
		$this->load->view('auth/blocked');
	
    }
}
