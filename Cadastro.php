<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
    }

    public function index()
    {

        $this->load->model('Cadastro_Model');

        $cursos = $this->Cadastro_Model->getCursos();
        $dados['cursos'] = $cursos;
        $this->load->view('Import_View');
        $this->load->view('Cadastro_View', $dados);
    }

    public function realizaCadastro()
    {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $curso = $_POST['curso'];
        $senha = $_POST['senha'];
        $ano = $_POST['ano'];
        $usuario = array('senha' => md5($senha), 'email' => $email);
        $this->load->model('Usuario_Model');
        $idusuario = $this->Usuario_Model->cadUsuario($usuario);
        if ($idusuario != null) {
            $alunoinfo = array('nomealuno'=> $nome, 'cpf' => $cpf, 'anoingresso' => $ano, 'curso_idcurso' => $curso, 'usuario_idusuario' => $idusuario);
            if ($this->Usuario_Model->cadAluno($alunoinfo)) {
                redirect('Login');
            } else {
                $this->load->view('Import_View');
                $this->load->view('Views_Erros/ErroCadastro');
            }
        } else {
            $this->load->view('Import_View');
            $this->load->view('Views_Erros/ErroCadastro');
        }
    }
}
