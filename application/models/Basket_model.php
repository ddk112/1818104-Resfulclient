<?php 

use GuzzleHttp\Client;

class Basket_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ukm_basket_itn/index.php/'
        ]);

    }

    public function getAllBasket()
    {
        
        $response = $this->_client->request('GET','basket',[
            'query' => [
                'UKM-KEY' => 'diana123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }

    public function getBasketById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
                
    }


    public function tambahDataBasket()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'alasan_bergabung' => $this->input->post('alasan_bergabung', true),
             'jurusan' => $this->input->post('jurusan', true)
           
        ];

        $this->db->insert('mahasiswa', $data);
      ;
    }

    public function hapusDataBasket($id)
    {
       
        $response = $this->_client->request('DELETE','basket',[
            'form_params' => [
                'UKM-KEY' => 'diana123',
                'kode'=>$id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }


    public function ubahDataBasket()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'alasan_bergabung' => $this->input->post('alasan_bergabung', true),
            'jurusan' => $this->input->post('jurusan', true)
          
        ];

        $this->db->where('id', $this->input->post('kode'));
        $this->db->update('mahasiswa', $data);
        
    }

    public function cariDataBasket()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('alasan_bergabung', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}