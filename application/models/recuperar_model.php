<?phpdefined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');class recuperar_model extends CI_Model {    function __construct() {        parent::__construct();    }        function getEmail($id) {	$this->db->select('user.email_user, user.codigo, user_perfil.nome_user');	$this->db->from('user');        $this->db->join('user_perfil', 'user.idUser = user_perfil.id_user');	$this->db->where('user.email_user', $id);	$this->db->limit(1);	return $this->db->get()->row();    }        function getSenha($codigo){        $this->db->select('user.email_user, user.codigo, user.nome_user, user.data_expirar, user.senha');	$this->db->from('user');	$this->db->where('user.codigo', $codigo);	$this->db->where('user.data_expirar',' > NOW()');	$this->db->limit(1);	return $this->db->get()->row();    }        function edit($table,$data,$fieldID,$ID){        $this->db->where($fieldID,$ID);        $this->db->update($table, $data);        if ($this->db->affected_rows() >= 0){	    return TRUE;	}	    return FALSE;           }        function getActive($ID){        $this->db->select('*');        $this->db->from('user');        $this->db->where('codigo',$ID);	$this->db->limit(1);        $query = $this->db->get();        return $query->result();;    }    }