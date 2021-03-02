<?php

use GuzzleHttp\Client;

class Auth_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://hallohimman.com/api/api/'
        ]);
    }

    public function createUser()
    {
        $data = [
            "nama_user" => $this->input->post('nama_user', true),
            "email_user" => $this->input->post('email_user', true),
            "password_user" => md5($this->input->post('password_user', true)),
            "level_user" => $this->input->post('level_user', true)
        ];

        $response = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function loginUser($email_user)
    {
        $response = $this->_client->request('GET', 'user/login', [
            'query' => [
                'email_user' => $email_user
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data']['0'];
    }
}
