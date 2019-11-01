<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_page extends MY_Controller{
        function index(){
            $data['view'] = 'Home_page';
            $this->load->view('layout', $data);
        }
    }