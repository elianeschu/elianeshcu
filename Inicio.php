<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
	}

	public function index()
	{
		
		$tipo = $this->session->userdata('tipo');
		if (!$_SESSION['active'] || (!isset($_SESSION))) {
			redirect('Login');
		} 
		if ($tipo == 1){
			$this->load->view('Import_View');
			$this->load->view('Telaaluno_View');
		}
		else{
			redirect('Professor');
		}
	}
	
}
