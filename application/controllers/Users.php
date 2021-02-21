<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
require_once(APPPATH . 'controllers/Base.php');
class Users extends Base {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('ses_name') == '') {
            redirect('login');
        }
    }

    public function index()
    {
        $this->session->set_userdata('groups',$this->input->get('name'));
        $this->session->set_userdata('id',$this->input->get('id'));

        $data = array (
                'title'     =>'Kalasan | Users',
                'list'      =>'user/list',
                'js'        =>'user/js',
                'modal'     =>'user/modal'
            );
        $this->data['groups'] = $this->groups;
        $this->data['categories'] = $this->categories;
        $this->data['users'] = $this->users();
        $this->load->view('layout/wrapper',$data,$this->data, FALSE);
    }

    function users(){
        $request = json_decode($this->curl->simple_get(API.'/user/users'));
        if ($request->status) {
            return $request->data;
        }
    }

    function user(){
        $param = array('id' => $this->input->get('id'));
        $request = json_decode($this->curl->simple_get(API.'/user/user',$param));
        if ($request->status) {
            echo json_encode($request->data);
        }
    }

    function add_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'mst_group' => $this->input->post('mst_group'),
            'role' => $this->input->post('role'),
            'is_active' => $this->input->post('is_active')
        );
        $request = json_decode($this->curl->simple_post(API.'/user/add_user',$data));

        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'User added successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to add user!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function update_user() {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'old_password' => $this->input->post('old_password'),
            'mst_group' => $this->input->post('mst_group'),
            'role' => $this->input->post('role'),
            'is_active' => $this->input->post('is_active')
        );
        
        $request = json_decode($this->curl->simple_post(API.'/user/update_user',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'User updated successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to update user!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function delete($id){
        $param = array('id' => $id);
        $delete = json_decode($this->curl->simple_post(API.'/user/delete',$param));
        if ($delete->status) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}