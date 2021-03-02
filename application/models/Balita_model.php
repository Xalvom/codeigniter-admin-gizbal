<?php

use GuzzleHttp\Client;

class Balita_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://hallohimman.com/api/api/'
        ]);
    }
    public function addBalita()
    {
        $data = [
            "nama_balita" => $this->input->post('nama_balita', true),
            "alamat_balita" => $this->input->post('alamat_balita', true),
            "tgllahir_balita" => $this->input->post('tgllahir_balita', true),
            "kelamin_balita" => $this->input->post('kelamin_balita', true),
            "id_user" => $this->input->post('id_user', true)
        ];
        $response = $this->_client->request('POST', 'balita', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getBalitaByUser($id_user)
    {
        $response = $this->_client->request('GET', 'balita/balitaId', [
            'query' => [
                'id_user' => $id_user
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addPerkembangan()
    {
        $data = [
            "kat_umur" => $this->input->post('kat_umur', true),
            "isi_perkembangan" => $this->input->post('isi_perkembangan', true)
        ];
        $response = $this->_client->request('POST', 'balita/perkembangan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function deleteBalita($id_balita)
    {
        $response = $this->_client->request('DELETE', 'balita', [
            'form_params' => [
                'id_balita' => $id_balita
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function deleteStimulasi($id_stimulasi)
    {
        $response = $this->_client->request('DELETE', 'balita/stimulasi', [
            'form_params' => [
                'id_stimulasi' => $id_stimulasi
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function deletePerkembangan($id_perkembangan)
    {
        $response = $this->_client->request('DELETE', 'balita/perkembangan', [
            'form_params' => [
                'id_perkembangan' => $id_perkembangan
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function addBbu()
    {
        $data = [
            "kelamin" => $this->input->post('kelamin', true),
            "umur" => $this->input->post('umur', true),
            "berat_badan" => $this->input->post('berat_badan', true),
            "update_bbu" => $this->input->post('update_bbu'),
            "id_balita" => $this->input->post('id_balita', true)
        ];
        $response = $this->_client->request('POST', 'gizi/bbu', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addTbu()
    {
        $data = [
            "kelamin" => $this->input->post('kelamin', true),
            "umur" => $this->input->post('umur', true),
            "tinggi_badan" => $this->input->post('tinggi_badan', true),
            "update_tbu" => $this->input->post('update_tbu'),
            "id_balita" => $this->input->post('id_balita', true)
        ];
        $response = $this->_client->request('POST', 'gizi/tbu', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function addBbtb()
    {
        $umur = $this->input->post('umur');
        if ($umur > 25) {
            $kat_umur = 2;
        } else {
            $kat_umur = 1;
        }
        $data = [
            "kelamin" => $this->input->post('kelamin', true),
            "kat_umur" => $kat_umur,
            "berat_badan" => $this->input->post('berat_badan', true),
            "tinggi_badan" => $this->input->post('tinggi_badan', true),
            "update_bbtb" => $this->input->post('update_bbtb'),
            "id_balita" => $this->input->post('id_balita', true)
        ];
        $response = $this->_client->request('POST', 'gizi/bbtb', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getIDBalita($id_balita)
    {
        $response = $this->_client->request('GET', 'balita', [
            'query' => [
                'id_balita' => $id_balita
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data']['0'];
    }
    public function getDataBalita($id_balita)
    {
        $hsl = $this->getIDBalita($id_balita);
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_balita' => $data->id_balita,
                    'tgllahir_balita' => $data->tgllahir_balita,
                    'kelamin' => $data->kelamin,
                );
            }
        }
        return $hasil;
    }
    public function editBalita()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "nama_balita" => $this->input->post('nama_balita', true),
            "nama_orangtua" => $this->input->post('nama_orangtua', true),
            "id_balita" => $this->input->post('id_balita', true),
            "alamat_balita" => $this->input->post('alamat_balita', true),
            "tgllahir_balita" => $this->input->post('tgllahir_balita', true),
            "kelamin_balita" => $this->input->post('kelamin_balita', true),
        ];

        $response = $this->_client->request('PUT', 'balita', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
}
