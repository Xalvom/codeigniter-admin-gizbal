<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth_m');
    }

    public function index()
    {
        $this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password_user', 'Password ', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Admin Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email_user = $this->input->post('email_user');
        $password_user = $this->input->post('password_user');

        $user = $this->auth_m->loginUser($email_user);

        if ($user) {
            if ($user['level_user'] == '1') {
                if (md5($password_user) == $user['password_user']) {
                    if ($user['is_aktif'] == '1') {
                        $data = [
                            'email' => $user['email_user'],
                            'nama' => $user['nama_user'],
                            'id_user' => $user['id_user'],
                            'level_user' => $user['level_user']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Admin Anda Belum Di Aktifkan</div>');
                        redirect('auth', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sesuai</div>');
                    redirect('auth', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda Bukan Sebagai Admin</div>');
                redirect('auth', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar</div>');
            redirect('auth', 'refresh');
        }
    }

    public function regis()
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password ', 'required|trim|min_lenght[2]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password ', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Admin Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $this->auth_m->createUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun anda berhasil di buat. Silahkan Login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah berhasil logout!!</div>');
        redirect('auth');
    }
}
