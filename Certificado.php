<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Certificado extends CI_Controller
{
    
    

    function __construct()
    {

        parent::__construct();
    }

    
   

    public function cadastrarCertificado()
    {


        $this->load->model('Certificado_Model');
        $modalidades = $this->Certificado_Model->getCategorias();
        $dados['modalidades'] = $modalidades;
        $this->load->view('Import_View');
        $this->load->view('Cadastrocertificado_View', $dados);
    }



public function certificadoCadastro(){
    
     
    $curso = $_POST['curso'];
    $carga = $_POST['carga'];
    $modalidade = $_POST['modalidade'];
    $idlogado = $this->session->userdata('idusuario');

    $certificado = array('descricaocertificado' => $curso, 'cargahorariacertificado' => $carga, 'modalidade_idmodalidade'=> $modalidade, 'usuario_idusuario' => $idlogado, );
    $this->load->model('Certificado_Model');
    $idcertificado = $this->Certificado_Model->cadCertificado($certificado);
    if ($idcertificado != null) {
            redirect('Inicio');
        } else {
            $this->load->view('Import_View');
            $this->load->view('Views_Erros/ErroCadastro');
        }
    
}
}






