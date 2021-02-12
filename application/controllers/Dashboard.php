<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
require_once(APPPATH . 'controllers/Base.php');
class Dashboard extends Base {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('ses_name') == '') {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array (
                'title'     =>'Kalasan | Dashboard',
                'list'      =>'dashboard/list',
                'js'        =>'dashboard/js',
                'modal'     =>'dashboard/modal'
            );
        $this->data['groups'] = $this->groups;
        $this->data['total_member'] = $this->total_member();
        $this->data['member_by_gender'] = $this->member_by_gender();
        $this->data['member_by_category'] = $this->member_by_category();
        $this->data['member_by_origin'] = $this->member_by_origin();
        $this->data['groups_summary'] = $this->groups_summary();
        $this->load->view('layout/wrapper',$data,$this->data, FALSE);
    }

    function total_member(){
        $total = json_decode($this->curl->simple_get(API.'/dashboard/totalmember'));
        if ($total->status) {
            return $total->data;
        }
    }

    function member_by_gender(){
        $total = json_decode($this->curl->simple_get(API.'/dashboard/member_by_gender'));
        if ($total->status) {
            return $total->data;
        }
    }

    function member_by_category(){
        $total = json_decode($this->curl->simple_get(API.'/dashboard/member_by_category'));
        if ($total->status) {
            return $total->data;
        }
    }

    function member_by_origin(){
        $total = json_decode($this->curl->simple_get(API.'/dashboard/member_by_origin'));
        if ($total->status) {
            return $total->data;
        }
    }

    function groups_summary(){
        $request = json_decode($this->curl->simple_get(API.'/dashboard/summary_group'));
        if ($request) {
            return $request->data;
        }
    }
}