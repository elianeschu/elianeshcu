
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->View('Import_View');
		$this->load->View('Login_View');
	}
	public function Erro_Login()
	{
		$this->load->View('Import_View');
		$this->load->View('Views_Erros/Erro_Login_View');
		$this->load->View('Login_View');

	}
}
