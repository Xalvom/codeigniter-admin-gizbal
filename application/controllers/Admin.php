<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
    }
    public function index()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Dashboard Administrator';
            $data['graph'] = $this->admin->getBalita();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }

    public function balita()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Data Balita';
            $data['balita'] = $this->admin->getBalita();
            $data['user'] = $this->admin->getUser();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/balita');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function bbu()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Data Gizi Berat Badan Berdasarkan Umur';
            $data['balita'] = $this->admin->getBalita();
            $data['gizi'] = $this->admin->getBbu();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/bbu');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function bbtb()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Data Gizi Berat Badan Berdasarkan Tinggi Badan';
            $data['balita'] = $this->admin->getBalita();
            $data['gizi'] = $this->admin->getBbtb();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/bbtb');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function tbu()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Data Gizi Tinggi Badan Berdasarkan Umur';
            $data['balita'] = $this->admin->getBalita();
            $data['gizi'] = $this->admin->getTbu();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/tbu');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function perkembangan()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Perkembangan Gizi Balita';
            $data['perkembangan'] = $this->admin->getPerkembangan();
            $data['gizi'] = $this->admin->getTbu();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/perkembangan');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function m_user()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Manajemen User';
            $data['user'] = $this->admin->getUser();
            $data['edit'] = $this->admin->getUser();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/manajemen_user');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function l_pesan()
    {

        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Kotak Konsultasi';
            $data['pesan'] = $this->admin->getPesan();
            // $data['edit'] = $this->admin->getPesan();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/pesan');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function b_Pesan()
    {
        $this->admin->balasPesan();
        redirect('admin/l_pesan');
    }
    public function t_artikel()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Artikel Pengetahuan';
            $data['artikel'] = $this->admin->getArtikel();
            // $data['edit'] = $this->admin->getPesan();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/artikel');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function postArtikel()
    {
        $this->admin->addArtikel();
        // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/t_artikel');
    }
    public function putArtikel()
    {
        $this->admin->editArtikel();
        // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/t_artikel');
    }
    public function deleteArtikel()
    {
        $id_artikel = $_GET['id_artikel'];
        $this->admin->deleteArtikel($id_artikel);
        redirect('admin/t_artikel');
    }
    public function t_stimulasi()
    {
        if ($this->session->userdata('level_user') == '1') {
            $data['judul'] = 'Stimulasi';
            $data['stimulasi'] = $this->admin->getStimulasi();
            // $data['edit'] = $this->admin->getPesan();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/stimulasi');
            $this->load->view('templates/admin_footer');
        } else {
            redirect('auth');
        }
    }
    public function postStimulasi()
    {
        $this->admin->addStimulasi();
        // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/t_stimulasi');
    }
    public function addUser()
    {
        if ($this->session->userdata('level_user') == '1') {
            $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('level_user', 'Level User', 'required|trim');
            // $this->form_validation->set_rules('password1', 'Password ', 'required|trim|min_lenght[8]|matches[password2]');
            // $this->form_validation->set_rules('password2', 'Password ', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Manajemen User';
                $data['user'] = $this->admin->getUser();
                $this->load->view('templates/admin_header', $data);
                $this->load->view('templates/admin_sidebar', $data);
                $this->load->view('templates/admin_topbar', $data);
                $this->load->view('admin/manajemen_user');
                $this->load->view('templates/admin_footer');
            } else {
                $this->admin->addUser();
                redirect('admin/m_user');
            }
        } else {
            redirect('auth');
        }
    }
    public function editUser()
    {
        if ($this->session->userdata('level_user') == '1') {
            $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('level_user', 'Level User', 'required|trim');
            // $this->form_validation->set_rules('password1', 'Password ', 'required|trim|min_lenght[8]|matches[password2]');
            // $this->form_validation->set_rules('password2', 'Password ', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Manajemen User';
                $data['user'] = $this->admin->getUser();
                $this->load->view('templates/admin_header', $data);
                $this->load->view('templates/admin_sidebar', $data);
                $this->load->view('templates/admin_topbar', $data);
                $this->load->view('admin/manajemen_user');
                $this->load->view('templates/admin_footer');
            } else {
                $this->admin->editUser();
                redirect('admin/m_user');
            }
        } else {
            redirect('auth');
        }
    }
    public function deleteUser()
    {
        $id_user = $_GET['id_user'];
        if ($this->session->userdata('level_user') == '1') {
            $this->admin->deleteUser($id_user);
            redirect('admin/m_user');
        } else {
            redirect('auth');
        }
    }
}
