<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view("login.php");
    }

    function auth()
    {
        $data=array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $cek = json_decode($this->curl->simple_get(API.'/auth/admin',$data));
        
        if($cek->status){
            $this->session->set_userdata(
                array(
                    'ses_name' => $cek->data->name,
                    'ses_role' =>$cek->data->role,
                    'ses_group' =>$cek->data->mst_group
                )
            );
            redirect('dashboard');
        }else{
            $this->session->set_flashdata('message',$cek->message);
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

