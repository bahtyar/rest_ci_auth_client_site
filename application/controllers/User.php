<?php
Class user extends CI_Controller{

    var $API ="";
    
    function __construct() {
        parent::__construct();        

        $this->API="http://localhost:8080/Test/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');

        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('hasil','Belum login!');
            redirect('login');
        }
    }
    
    // menampilkan data kontak
    function index(){
        $data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $this->load->view('daftar/list',$data); //edit lagi
    }
    
    // insert data kontak
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'        =>  $this->input->post('id'),
                'nama'      =>  $this->input->post('nama'),
                'status'    =>  $this->input->post('status'));
            $insert =  $this->curl->simple_post($this->API.'/user', $data); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
                $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('user'); 
        }else{
            $this->load->view('daftar/create'); 
        }
    }

    // edit data kontak
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'        =>  $this->input->post('id'),
                'nama'      =>  $this->input->post('nama'),
                'status'    =>  $this->input->post('status'));
            $update =  $this->curl->simple_put($this->API.'/user', $data, array(CURLOPT_BUFFERSIZE => 99));

            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal :  '. $this->curl->error_string);
           }
           redirect('user'); 
       }else{
        $params = array('id'=>  $this->uri->segment(3));
        $data['user'] = json_decode($this->curl->simple_get($this->API.'/user',$params));
        $this->load->view('daftar/edit',$data); 
    }
}

    // delete data kontak
function delete($id){
    if(empty($id)){
        redirect('user'); 
    }else{
        $delete =  $this->curl->simple_delete($this->API.'/user', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 99)); 
        if($delete)
        {
            $this->session->set_flashdata('hasil','Delete Data Berhasil');
        }else
        {
           $this->session->set_flashdata('hasil','Delete Data Gagal');
       }
       redirect('user');
   }
}
}