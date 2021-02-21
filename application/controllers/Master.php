<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
require_once(APPPATH . 'controllers/Base.php');
class Master extends Base {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('ses_name') == '') {
            redirect('login');
        }
    }

    public function groups()
    {
        $this->session->set_userdata('groups',$this->input->get('name'));
        $this->session->set_userdata('id',$this->input->get('id'));

        $data = array (
                'title'     =>'Kalasan | Groups',
                'list'      =>'master/groups/list',
                'js'        =>'master/groups/js',
                'modal'     =>'master/groups/modal'
            );
        $this->data['categories'] = $this->categories;
        $this->data['groups'] = $this->groups;
        $this->data['grups'] = $this->get_grups();
        $this->load->view('layout/wrapper',$data,$this->data, FALSE);
    }

    function get_grups() {
    	$request = json_decode($this->curl->simple_get(API.'/masters/groups'));
        if ($request->status) {
            return $request->data;
        }
    }

    function get_grup(){
        $param = array('id' => $this->input->get('id'));
        $request = json_decode($this->curl->simple_get(API.'/masters/groups',$param));
        if ($request->status) {
            echo json_encode($request->data);
        }
    }

    function add_group() {
        $data = array(
            'name' => $this->input->post('name'),
            'is_active' => $this->input->post('is_active')
        );
        $request = json_decode($this->curl->simple_post(API.'/masters/add_group',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Group added successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to add group!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function update_group() {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'is_active' => $this->input->post('is_active')
        );
        $request = json_decode($this->curl->simple_post(API.'/masters/update_group',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Group updated successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to update group!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function delete_group($id){
        $param = array('id' => $id);
        $delete = json_decode($this->curl->simple_post(API.'/masters/delete_group',$param));
        if ($delete->status) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // ==============================

    public function categories()
    {
        $this->session->set_userdata('groups',$this->input->get('name'));
        $this->session->set_userdata('id',$this->input->get('id'));

        $data = array (
                'title'     =>'Kalasan | Categories',
                'list'      =>'master/categories/list',
                'js'        =>'master/categories/js',
                'modal'     =>'master/categories/modal'
            );
        $this->data['categories'] = $this->categories;
        $this->data['groups'] = $this->groups;
        $this->data['kategories'] = $this->get_kategories();
        $this->load->view('layout/wrapper',$data,$this->data, FALSE);
    }

    function get_kategories() {
    	$request = json_decode($this->curl->simple_get(API.'/masters/categories'));
        if ($request->status) {
            return $request->data;
        }
    }

    function get_kategory(){
        $param = array('id' => $this->input->get('id'));
        $request = json_decode($this->curl->simple_get(API.'/masters/categories',$param));
        if ($request->status) {
            echo json_encode($request->data);
        }
    }

    function add_category() {
        $data = array(
            'name' => $this->input->post('name'),
            'is_active' => $this->input->post('is_active')
        );
        $request = json_decode($this->curl->simple_post(API.'/masters/add_categories',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Group added successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to add group!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function update_category() {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'is_active' => $this->input->post('is_active')
        );
        $request = json_decode($this->curl->simple_post(API.'/masters/update_categories',$data));
        if ($request->status) {
            $result['status'] = 'success';
            $result['message'] = 'Group updated successfully!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'Failed to update group!';
        }
        $result['redirect_url'] = $_SERVER['HTTP_REFERER'];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo json_encode($result);
        exit();
    }

    function delete_category($id){
        $param = array('id' => $id);
        $delete = json_decode($this->curl->simple_post(API.'/masters/delete_categories',$param));
        if ($delete->status) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}