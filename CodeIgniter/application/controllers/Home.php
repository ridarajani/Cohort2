<?php

    class Home extends MY_Controller{
        function index(){
            $data['view'] = "layout";
            $this->load->view('layout',$data);
        }
    }