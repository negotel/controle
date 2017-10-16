<?php
defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');
class Os extends CI_Controller {
    
    private  $tabela = 'os';
         
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('all_model','',TRUE);
        $this->load->library('pagination');
        $this->load->helpers('data_helper');
        $this->load->helpers('modal_helper');
        $this->data['os'] = 'Ordem Servico';
        $this->data['title'] = 'Ordem de Serviço';
	$this->data['dadosUsuario'] = $this->all_model->obterID('user', 'user_perfil', 'user_perfil.id_user = user.idUser', 'idUser', $this->session->userdata('idUser'));
        $this->data['config'] = $this->all_model->obterID('config_sistema','','','idConfig', '1');
    }



    public function index(){
        $this->paginas();
    }
    
    public function adicionar() {
        /*if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aOS')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar ordem de serviço.');
           redirect(base_url('os'));
        }*/
        $this->data['contarID'] = $this->all_model->contarRegistro($this->tabela);
        $this->data['aOS'] = 'Ordem Servico';
	$this->data['view'] = 'os/adicionar';
        $this->load->view('tema/home',  $this->data);
    }
    
    function inserirDados() {
        $endereco_entrega = $this->input->post('rua').' nº '.$this->input->post('numero').', '.$this->input->post('bairro').' - '.$this->input->post('cidade').'/'.$this->input->post('uf');
        $dados = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'usuario_id' => $this->session->userdata('idUser'),
            'protocolo' => $this->input->post('protocolo'),
            'status' => $this->input->post('status'),
            'cep_entrega' => $this->input->post('cep_entrega'),
            'endereco_entrega' => $endereco_entrega,
            'data_hora_cadastro' => date('Y-m-d H:i:s')
        );

        if ($this->all_model->inserirDados($this->tabela, $dados) == TRUE) {
            $this->session->set_flashdata('success','Ordem de Serviço inciada com sucesso!'); 
            redirect(base_url('os/produtos/'.$this->input->post('url'))); 
        } else {
             $this->session->set_flashdata('error','Ops, houve um error!'); 
            redirect(base_url('os'));
        }
    }
    
    public function produtos($obterID) {
        
        /*if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eOS')){
           $this->session->set_flashdata('error','Você não tem permissão para editar ordem de serviço.');
           redirect(base_url('os'));
        }*/
        
        $getRestrito = $this->all_model->obterIDs($this->tabela, 'clientes', 'clientes.id_clientes = os.cliente_id', 'id_os', $obterID);
        
	if (!$getRestrito) {
	    $this->session->set_flashdata('error', ' Ordem de Serviço não encontrado!');
	    redirect(base_url('os'));
	} else {
	    $this->data['osID'] = $getRestrito;
	}
        $this->data['buscarProdutos'] = $this->all_model->obterDado('produtos');
        $this->data['obterProdutos'] = $this->all_model->obterDadosID('produtos_os', 'produtos', 'produtos.id_produtos = produtos_os.produto_id', 'os_id', $obterID);
        $this->data['eOS'] = 'Ordem Servico';
	$this->data['view'] = 'os/adicionar_produtos';
        $this->load->view('tema/home',  $this->data);
    }
    
   public function buscaConteudo() {
        $opcao = $this->input->get('opcao') ? $this->input->get('opcao') : '';
        $valor = $this->input->get('valor') ? $this->input->get('valor') : '';
        if (!empty($opcao)) {
            switch ($opcao) {
                case 'produtos': {
                     echo  $this->getAllProdutos();
                    break;
                }
                case 'vunitario': {
                     echo $this->getFilterVUnitario($valor);
                    break;
                }
            }
        }
   }
   
   function excluirProduto() {
       $id =  $this->input->post('id');

	if($this->all_model->deletaDados('produtos_os','id_produtos_os',$id) == TRUE){
             echo json_encode(array('result' => true, 'mensagem' => 'Produto excluido com sucesso'));
        } else {
            echo json_encode(array('result' => false, 'mensagem' => 'Ops, houve um error!'));
        } 
   }
   
   function getAllProdutos(){
        $this->db->select('*');
        $this->db->from('produtos');
        $query = $this->db->get()->result();
        echo json_encode($query);	
    }
    function getFilterVUnitario($vu){
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->where('id_produtos', $vu);
        $query = $this->db->get()->result();
        echo json_encode($query);	
    }
    
    function adicionarProduto() {
        $data = array(
            'produto_id' => $this->input->post('produto_id'),
            'os_id' => $this->input->post('id_os'),
            'valor_unitario' => $this->input->post('valor_produto'),
            'quantidade' => $this->input->post('quantidade'),
            'sub_total' => $this->input->post('sub_total'),
            'data_inserido' => date('Y-m-d H:i:s')
        );
        if ($this->all_model->inserirDados('produtos_'.$this->tabela, $data) == TRUE) {
            echo json_encode(array('result' => true, 'mensagem' => 'Produto adicionado com sucesso'));
        } else {
            echo json_encode(array('result' => false, 'mensagem' => 'Ops, houve um error!'));
        }
    }
    
     
    
}