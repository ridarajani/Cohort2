<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class About_us extends MY_Controller{
        function index(){
            $data['view'] = 'About_us';
            $this->load->view('layout', $data);
        }
    }