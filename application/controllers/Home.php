<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        //load model
        
    }

    public function index() {

    	$data['page_name'] = 'home';
        $this->load->view('frontend/index',$data);
    }


}