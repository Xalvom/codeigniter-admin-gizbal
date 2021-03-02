<?php

use GuzzleHttp\Client;

class Admin_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://hallohimman.com/api/api/'
        ]);
    }

    public function getBalita()
    {
        $response = $this->_client->request('GET', 'balita');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getBbu()
    {
        $response = $this->_client->request('GET', 'gizi/bbu');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getTbu()
    {
        $response = $this->_client->request('GET', 'gizi/tbu');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getBbtb()
    {
        $response = $this->_client->request('GET', 'gizi/bbtb');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getPerkembangan()
    {
        $response = $this->_client->request('GET', 'balita/perkembangan');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getUser()
    {
        $response = $this->_client->request('GET', 'user/role');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getUserBalita()
    {
        $response = $this->_client->request('GET', 'balita/balitaIdUser');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getPesan()
    {
        $response = $this->_client->request('GET', 'user/pesan');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addUser()
    {
        $data = [
            "nama_user" => $this->input->post('nama_user', true),
            "email_user" => $this->input->post('email_user', true),
            "password_user" => md5($this->input->post('password_user', true)),
            "level_user" => $this->input->post('level_user', true),
            "is_aktif" => 0
        ];

        $response = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function editUser()
    {
        $data = [
            "nama_user" => $this->input->post('nama_user', true),
            "email_user" => $this->input->post('email_user', true),
            "level_user" => $this->input->post('level_user', true),
            "id_user" => $this->input->post('id_user')
        ];

        $response = $this->_client->request('PUT', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function deleteUser($id_user)
    {
        $response = $this->_client->request('DELETE', 'user', [
            'form_params' => [
                'id_user' => $id_user
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function balasPesan()
    {
        $data = [
            "penjawab" => $this->input->post('penjawab', true),
            "id_pengirim" => $this->input->post('id_pengirim', true),
            // "judul_pesan" => $this->input->post('judul_pesan', true),
            // "pertanyaan" => $this->input->post('pertanyaan', true),
            "jawaban" => $this->input->post('jawaban'),
            "id_pesan" => $this->input->post('id_pesan'),
            "tanggal_pesan" => $this->input->post('tanggal_pesan', true)
        ];

        $response = $this->_client->request('PUT', 'user/pesan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addArtikel()
    {
        $data = [
            "judul_artikel" => $this->input->post('judul_artikel', true),
            "isi_artikel" => $this->input->post('isi_artikel', true),
            "id_author" => $this->input->post('id_author', true),
            "created_at" => $this->input->post('created_at', true)

        ];

        $response = $this->_client->request('POST', 'user/artikel', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getArtikel()
    {
        $response = $this->_client->request('GET', 'user/artikel');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function deleteArtikel($id_artikel)
    {
        $response = $this->_client->request('DELETE', 'user/artikel', [
            'form_params' => [
                'id_artikel' => $id_artikel
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function editArtikel()
    {
        $data = [
            "judul_artikel" => $this->input->post('judul_artikel', true),
            "isi_artikel" => $this->input->post('isi_artikel', true),
            "id_author" => $this->input->post('id_author', true),
            "id_artikel" => $this->input->post('id_artikel', true),
            "created_at" => $this->input->post('created_at', true)

        ];

        $response = $this->_client->request('PUT', 'user/artikel', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getStimulasi()
    {
        $response = $this->_client->request('GET', 'balita/stimulasi');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addStimulasi()
    {
        $data = [
            "kat_umur" => $this->input->post('kat_umur', true),
            "isi_stimulasi" => $this->input->post('isi_stimulasi', true)

        ];

        $response = $this->_client->request('POST', 'balita/stimulasi', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
}
