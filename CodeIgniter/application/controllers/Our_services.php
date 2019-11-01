<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Our_services extends MY_Controller{
        function index(){
            $data['view'] = 'Our_services';
            $this->load->view('layout', $data);
        }
    }