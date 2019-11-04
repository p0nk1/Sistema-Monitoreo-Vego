<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_select extends CI_Controller
{
        function __construct(){
            parent::__construct();
            $this->load->Model('m_listado');   
        }
    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('v_usuario');
        $this->load->view('layout/footer');
    }
    public function get_municipio(){
        $id_estado = $this->input->post('id_estado');
        $municipio = $this->m_listado->get_municipio_query($id_estado);
            if(count($municipio)!=0){
                
                $pro_select_box ='';
                $pro_select_box .='<option> Seleccione un Municipio</option>';
                foreach ($municipio as $municipio) {
                $pro_select_box .= '<option value=" ' .$municipio->id_municipio.' ">' .$municipio->municipio.'</option>' ;
                
                 
            }echo $pro_select_box;           
        }
    }/*
    public function get_parroquia(){
        $municipio = $this->input->post('id_municipio');
        $parroquia= $this->dep_model->get_parroquia_query($municipio);
            if(count($parroquia)>0){
                $pro_select_box_par ='';
                $pro_select_box_par .='<option value="'.'">Seleccione una Parroquia</option>';
                foreach ($parroquia as $parroquia) {
                   $pro_select_box_par .= '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->parroquia.'</option>' ;
                }echo $pro_select_box_par;
        }
    }*/
}
?>