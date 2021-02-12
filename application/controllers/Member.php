<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
require_once(APPPATH . 'controllers/Base.php');
class Member extends Base {
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
                'title'     =>'Kalasan | Member',
                'list'      =>'member/list',
                'js'        =>'member/js',
                'modal'     =>'member/modal'
            );
        $this->data['groups'] = $this->groups;
        $this->data['categories'] = $this->categories;
        $this->data['members'] = $this->members();
        $this->load->view('layout/wrapper',$data,$this->data, FALSE);
    }

    function members(){
        $param = array('group' => $this->session->userdata('id'));
        $request = json_decode($this->curl->simple_get(API.'/member/members',$param));
        if ($request->status) {
            return $request->data;
        }
    }

    function member(){
        $param = array('id' => $this->input->get('id'));
        $request = json_decode($this->curl->simple_get(API.'/member/member',$param));
        if ($request->status) {
            echo json_encode($request->data);
        }
    }

    function add_member() {
        $data = array(
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'categories' => $this->input->post('category'),
            'mst_group' => $this->input->post('group'),
            'address' => $this->input->post('address'),
            'is_local' => $this->input->post('origin'),
            'is_leave' => $this->input->post('is_leave'),
            'is_active' => $this->input->post('is_active'),
            'born_date' => $this->input->post('born_date'),
            'description' => $this->input->post('description')
        );
        $request = json_decode($this->curl->simple_post(API.'/member/add_member',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Member added successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to add member!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function update_member() {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'categories' => $this->input->post('category'),
            'mst_group' => $this->input->post('group'),
            'address' => $this->input->post('address'),
            'is_local' => $this->input->post('origin'),
            'is_leave' => $this->input->post('is_leave'),
            'is_active' => $this->input->post('is_active'),
            'born_date' => $this->input->post('born_date'),
            'description' => $this->input->post('description')
        );
        $request = json_decode($this->curl->simple_post(API.'/member/update_member',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Member updated successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to update member!';
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
        $delete = json_decode($this->curl->simple_post(API.'/member/delete',$param));
        if ($delete->status) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}