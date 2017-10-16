<?php

class Pesquisar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
        redirect('login');
    }
        $this->load->model('All_model','',TRUE);
        $this->load->model('usuarios_model','',TRUE);
        $this->load->helper('modal_helper');
        $this->data['getUser'] = $this->usuarios_model->getById($this->session->userdata('id'));
	$this->load->model('all_model', '', TRUE);	
        $this->data['config'] = $this->all_model->getConfig('config_sistema', '1');
    }

      
    public function valoreconomico(){
 
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vOrdemServico')){
           $this->session->set_flashdata('error','Você não tem permissão para pesquisa ordem de serviços.');
           redirect(base_url());
        }
        
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');
        
        if($de == null && $ate == null){
            $this->data['getVE'] = $this->All_model->get();
        }else{
            $this->data['getVE'] = $this->All_model->search('itens_valor_economico',$de, $ate);
        }
        
        $this->data['view'] = 'valoreconomico/valoreconomico';
        $this->load->view('template/header');
        $this->load->view('template/menu',  $this->data);
	$this->load->view('template/home');
	$this->load->view('template/rodape');   
    }
    
    public function redfactor(){
 
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vOrdemServico')){
           $this->session->set_flashdata('error','Você não tem permissão para pesquisa ordem de serviços.');
           redirect(base_url());
        }
        
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');
        
        if($de == null && $ate == null){
            $this->data['getVE'] = $this->All_model->get();
        }else{
            $this->data['getVE'] = $this->All_model->search($de, $ate);
        }
        
        $this->data['view'] = 'valoreconomico/valoreconomico';
        $this->load->view('template/header');
        $this->load->view('template/menu',  $this->data);
	$this->load->view('template/home');
	$this->load->view('template/rodape');   
    }
        
    public function usuarios() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'pUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para pesquisa usuário.');
            redirect(base_url());
        }

        $this->load->library('pagination');
        $nome = $this->input->get('nome');
        $email = $this->input->get('email');
        $cpf = $this->input->get('cpf');

        if ($nome == null && $email == null && $cpf == null) {

            $usuarios = $this->session->userdata('cliente_id');

            $config['base_url'] = base_url() . 'usuarios/gerenciar';
            $config['total_rows'] = $this->usuarios_model->count('usuarios');
            $config['per_page'] = 10;
            $config['next_link'] = 'Próxima';
            $config['prev_link'] = 'Anterior';
            $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
            $config['cur_tag_close'] = '</b></a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = 'Primeira';
            $config['last_link'] = 'Última';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $this->data['getUsuario'] = $this->usuarios_model->get('usuarios', '*', $usuarios, $config['per_page'], $this->uri->segment(3));
        } else {
            $this->data['getUsuario'] = $this->usuarios_model->search($nome, $email, $cpf);
        }
        $this->data['menuUsuarios'] = 'Usuarios';
        $this->data['view'] = 'usuarios/usuarios';
        $this->load->view('template/header');
        $this->load->view('template/menu', $this->data);
        $this->load->view('template/home');
        $this->load->view('template/rodape');
    }

    public function funcionarios(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'pFuncionario')){
            $this->session->set_flashdata('error','Você não tem permissão para pesquisa Funcionarios.');
            redirect(base_url());
        }

        $this->load->library('pagination');
        $nome = $this->input->get('nome_pf');
        $cpf = $this->input->get('cpf_pf');

        if($nome == null && $cpf == null){

            $config['base_url'] = base_url().'funcionarios/gerenciar';
            $config['total_rows'] = $this->funcionarios_model->count('funcionarios');
            $config['per_page'] = 10;
            $config['next_link'] = 'Próxima';
            $config['prev_link'] = 'Anterior';
            $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
            $config['cur_tag_close'] = '</b></a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = 'Primeira';
            $config['last_link'] = 'Última';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $this->pagination->initialize($config);     
            $this->data['getFuncionarios'] = $this->funcionarios_model->get('funcionarios','*','',$config['per_page'],$this->uri->segment(3));
        } else{
            $this->data['getFuncionarios'] = $this->funcionarios_model->search($nome, $cpf);
        }
        $this->data['menuFuncionarios'] = 'Funcionários';
        $this->data['view'] = 'funcionarios/funcionarios';
        $this->load->view('template/header');
        $this->load->view('template/menu',  $this->data);
        $this->load->view('template/home');
        $this->load->view('template/rodape');
    }

    public function folha_ponto(){
         if(!$this->permission->checkPermission($this->session->userdata('permissao'),'pFolhaPonto')){
            $this->session->set_flashdata('error','Você não tem permissão para pesquisa Folha de Ponto.');
            redirect(base_url());
         }

        $this->load->library('pagination');
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');

        if($de == null && $ate == null){
            $config['base_url'] = base_url().'folha_ponto/gerenciar';
            $config['total_rows'] = $this->folha_ponto_model->count('folha_ponto');
            $config['per_page'] = 10;
            $config['next_link'] = 'Próxima';
            $config['prev_link'] = 'Anterior';
            $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
            $config['cur_tag_close'] = '</b></a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = 'Primeira';
            $config['last_link'] = 'Última';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $this->pagination->initialize($config);  
            $this->data['getFolhaPonto'] = $this->folha_ponto_model->get('folha_ponto','*','',$config['per_page'],$this->uri->segment(3));
        }else{
            if($de != null){
                $de = explode('/', $de);
                $de = $de[2].'-'.$de[1].'-'.$de[0];
                if($ate != null){
                    $ate = explode('/', $ate);
                    $ate = $ate[2].'-'.$ate[1].'-'.$ate[0]; 
                }else{
                    $ate = $de;
                }
            }
            $this->data['getFolhaPonto'] = $this->folha_ponto_model->search($de, $ate);
        }
        $this->data['menuFohaPonto'] = 'Folha de Ponto';
        $this->data['view'] = 'folha_ponto/folha_ponto';
        $this->load->view('template/header');
        $this->load->view('template/menu',  $this->data);
        $this->load->view('template/home');
        $this->load->view('template/rodape');
    }
}
