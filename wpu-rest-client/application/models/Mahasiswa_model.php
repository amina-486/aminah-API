<?php
use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model {

    private $_client;

    public function __construct(){
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/VIDIO7/api/',
            'auth' => ['aminah', 'aminah123']
        ]);
    }
    public function getAllMahasiswa()
    {
        $response = $this->_client->request('get', 'mahasiswa', [
            'query' => [
                'aminah-key' => 'aminah123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

      public function getMahasiswaById($id)
    {
        $response = $this->_client->request('get', 'mahasiswa', [
            'query' => [
              'aminah-key' => 'aminah123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            'aminah-key' => 'aminah123'
        ];

        $response = $this->_client->request('POST', 'mahasiswa', [
            'form_params' => $data
       ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusDataMahasiswa($id)
    {
       $response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'aminah-key' => 'aminah123',
                'id' => $id
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), true);

       return $result;
    }
    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "id" => $this->input->post('id', true),
            'aminah-key' => 'aminah123'
        ];

        $response = $this->_client->request('PUT', 'mahasiswa', [
            'form_params' => $data
       ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

}