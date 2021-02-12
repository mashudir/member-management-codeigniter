<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Author     : Mashudi Rohmat Amd. Kom.
*Project    : Member Management `Kalasan Youth`
*Year       : 2021
*/
class Base extends CI_Controller
{
    public $groups;
    public $categories;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_base','base');
        $this->get_groups();
        $this->get_categories();
    }

    function get_groups() {
        if ($this->base->groups()) {
            $this->groups = $this->base->groups();
        }
    }

    function get_categories() {
        if ($this->base->categories()) {
            $this->categories = $this->base->categories();
        }
    }
}

