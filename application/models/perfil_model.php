<?php
defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');

class Perfil_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function edit($table, $data, $fieldID, $ID) {
	$this->db->where($fieldID, $ID);
	$this->db->update($table, $data);
	if ($this->db->affected_rows() >= 0) {
	    return TRUE;
	}
	return FALSE;
    }
    
    public function alterarSenha($newSenha,$oldSenha,$id){

        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuarios')->row();

        $senha = $this->encryption->decrypt($usuario->senha);

        if($senha != $oldSenha){
            return false;
        }
        else{
            $this->db->set('senha',$this->encryption->encrypt($newSenha));
            $this->db->where('idUsuarios',$id);
            return $this->db->update('usuarios');    
        }

        
    }
    
}