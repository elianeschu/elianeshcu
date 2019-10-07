<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Verifica_Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $_SESSION['active'] = false;
        if (isset($_POST['senha'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $this->load->model('Login_Model');
            $return = $this->Login_Model->login($email, md5($senha));
            
            if ($return->idusuario != 0) {
                $_SESSION['active'] = true;
            
            if ($return->idusuario == 1) {
                   
                $this->session->set_userdata('idusuario', 1);


            }
        }
            if ($return->tipousuario_idtipousuario != 0) {
                $_SESSION['active'] = true;
                
                $this->session->set_userdata('email', $_POST['email']);
                if ($return->tipousuario_idtipousuario == 1) {
                   
                    $this->session->set_userdata('tipo', 1);
                    redirect('Inicio');
                } else {
                    $this->session->set_userdata('tipo', 2);
                    redirect('Professor');
                }
            } else {
                redirect('Login/Erro_Login');
            }
        } else {
            redirect('Login');
        }
    }
    public function Logout()
    {
        $_SESSION['active'] != false;
        $this->session->sess_destroy();
        redirect('Login');
    }
}
