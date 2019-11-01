<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Database extends MY_Controller{
        function index(){
            $data['view'] = 'Database';
            $this->load->view('layout', $data);
        }
    }