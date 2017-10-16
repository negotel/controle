<?php
defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');

class Dashboard_model extends CI_Model {
   
    function __construct() {
        parent::__construct();
    }

    
    function getOsAbertas($table, $where, $where_client) {
	$this->db->select('ordem_servico.*');
	$this->db->from($table);
        $this->db->where('usuarios_id', $where);
        $this->db->where('cliente_id', $where_client);
        $this->db->or_where('cliente_id', $where_client);
        $this->db->where('usuarios_id', $where);
        $this->db->limit(15);
        $this->db->order_by('data','desc');
	return $this->db->get()->result();
    }
   
    function getListaTarefa($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        $this->db->select('lista_tarefa.*, usuarios.*');
        $this->db->from($table);
        $this->db->join('usuarios', 'usuarios.idUsuarios = lista_tarefa.usuario_id');
        $this->db->where('usuario_id', $where);
        $this->db->order_by('criado','desc');
        $this->db->limit($perpage,$start);
        $query = $this->db->get();
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    //Id de usuario logado
    function getById($id){
        $this->db->from('usuarios');
        $this->db->select('*');
        $this->db->join('permissoes', 'permissoes.idPermissao = usuarios.permissoes_id', 'left');
        $this->db->join('clientes', 'clientes.idClientes = usuarios.cliente_id', 'left');
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    
     function getUsuarios() {
        $this->db->select('*');
        $this->db->where('situacao', '0');
        $q = $this->db->get('usuarios');
        $count = $q->result();
        return $count;
    }

    function pesquisar($termo){
         $data = array();
         // buscando clientes
         $this->db->like('nomeCliente',$termo);
         $this->db->limit(5);
         $data['clientes'] = $this->db->get('clientes')->result();

         // buscando os
         $this->db->like('idOs',$termo);
         $this->db->limit(5);
         $data['os'] = $this->db->get('os')->result();

         // buscando produtos
         $this->db->like('descricao',$termo);
         $this->db->limit(5);
         $data['produtos'] = $this->db->get('produtos')->result();

         //buscando serviços
         $this->db->like('nome',$termo);
         $this->db->limit(5);
         $data['servicos'] = $this->db->get('servicos')->result();

         return $data;


    }

    //select  distinct id, CONCAT(nome, "(",count(id),")") as Nome from teste group by nome;
//    function () {
//        $this->db->select('ordem_servico.*, usuarios.*');
//        $this->db->from('ordem_servico');
//	$this->db->join('usuarios', 'usuarios.idUsuarios = ordem_servico.usuarios_id');
//        $q = $this->db->get();
//        $count = $q->result();
//        return $count;
//    }
        
    function getOsEmProducao(){
        $this->db->select('status');
        $this->db->where('status','Em Produçao');
        $q = $this->db->get('os');
        $count = $q->result();
        return count($count);
    }
    function getOsCancelado(){
        $this->db->select('status');
        $this->db->where('status','Cancelado');
        $q = $this->db->get('os');
        $count = $q->result();
        return count($count);
    }
    function getOsFinalizado(){
        $this->db->select('status');
        $this->db->where('status','Finalizado');
        $q = $this->db->get('os');
        $count = $q->result();
        return count($count);
    }
    
    function add($table, $data) {
	$this->db->insert($table, $data);
	if ($this->db->affected_rows() == '1') {
	    return TRUE;
	}

    }
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0){
	    return TRUE;
	}
	    return FALSE;       
    }
    
    function getBancos(){
        $this->db->select('*');
        $this->db->from('bancos');
        $query = $this->db->get();
        return $query->result();;
    }
}