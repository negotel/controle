<?php

class Registro extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model','',TRUE);
        if (($this->session->userdata('logado'))) {
	    $this->session->set_flashdata('error','Você esta logado, é você não tem permissão paracessa essa pagina');
	    redirect('dashboard');
	}
	$this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->library('My_PHPMailer');
        $this->load->helper('ordem_aleatoria_helper');
        $this->load->model('all_model','',TRUE);
	$this->data['config'] = $this->all_model->getConfig('config_sistema', '1');
    }

    public function index(){
        
	$this->data['config'] = $this->all_model->getConfig('config_sistema', '1');
        
        $verifica = $this->data['config'];
        $verifica = unserialize($verifica->configs_sistema);
        
        if(!$verifica['cUsuario'] == '1'){
            $this->session->set_flashdata('error','Você não pode acessa esta pagina'); 
            redirect(base_url('login'));
        }
	$this->load->view('dashboard/registro', $this->data);
    }
    
    function newcadastro() {
        sleep(3);
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean');
        
        $query = $this->db->get_where('usuarios',array('email ' => $this->input->post('email')));
        $result = $query->result_array();
        if(count($result) > 0) { 
             echo json_encode(array('result' => false, 'mensagen' => 'Ops, E-mail já cadastrado'));
        }else{
            
            if ($this->form_validation->run() == false) {
                echo json_encode(array('result' => false, 'mensagen' => validation_errors() ? validation_errors() : false));
            } else {
                
                $nome_completo =  $this->input->post('nome').' '. $this->input->post('snome');
                $codigo         =   $this->input->post('codigo');
                $email = $this->input->post('email');
                
                $data = array(
                    'nome' => $nome_completo,
                    'email' => $email,
                    'senha' => $this->encrypt->sha1($this->input->post('senha')),
                    'situacao' => '2',
                    'codigo' => $codigo,
                    'dataCadastro' => date('Y-m-d H:i:s')
                );
                
                if ($this->usuarios_model->add('usuarios', $data) == TRUE) {
                   
                    $dados = $this->input->post(); 
                    
                   $conteudo = $this->load->view('template/confirmacaoCadastro', $dados, true);
                   
                    $Email = new PHPMailer();
                    $Email->SetLanguage("br");
                    $Email->IsSMTP(); // Habilita o SMTP
                    $Email->SMTPAuth = true; //Ativa e-mail autenticado
                    $Email->Host = 'smtp.printrv.com.br'; // Servidor de envio
                    $Email->Port = '587'; // Porta de envio
                    $Email->Username = 'noreplay@printrv.com.br'; //e-mail que ser autenticado
                    $Email->Password = '#2017RVgrafica@'; // senha do email
                    // ativa o envio de e-mails em HTML, se false, desativa.
                    $Email->IsHTML(true);
                    // email do remetente da mensagem
                    $Email->From = 'noreplay@printrv.com.br';
                    // nome do remetente do email
                    $Email->FromName = utf8_decode('Confirmação de Cadastro');
                    // Endere�o de destino do emaail, ou seja, pra onde voc� quer que a mensagem do formul�rio v�?
                    $Email->AddReplyTo($email, '$email');
                    $Email->AddAddress("$email"); // para quem ser� enviada a mensagem
                    // informando no email, o assunto da mensagem
                    $Email->Subject = utf8_decode("Confirmação de Cadastro");
                    // Define o texto da mensagem (aceita HTML)
                    $Email->Body .=utf8_decode($conteudo);
                    //Validando o servidor SMTP
                    if(!$Email->Send()):
                        echo json_encode(array('result' => false, 'mensagen' => 'Ops, houve um error!'));
                    else:
                        echo json_encode(array('result' => true, 'mensagen' => '<span class="titulo text-center">Seu cadastro foi inserido com sucesso!</span> <br><br> agora é necessário ativação da conta,<br> verifique seu e-mail.'));
                    exit;
                    endif;
                   
                    
                } else {
                    echo json_encode(array('result' => false, 'mensagen' => 'Ops, houve um error!'));
                }
            }
        }
    }
    public function codigo($param) {
        
        $query = $this->db->get_where('usuarios',array('codigo ' => $param));
        $result = $query->result_array();
        if(count($result) > 0) { 
            
            $data = array(
                'permissoes_id' => '2',
                'situacao' => '1',
                'codigo' => ''
            );
            
            if ($this->usuarios_model->edit('usuarios', $data, 'codigo', $param) == TRUE) {
                $this->session->set_flashdata('success','E-mail cofirmado com sucesso'); 
                redirect(base_url('login'));
            }else{
                $this->session->set_flashdata('error','Cadastro não pode ser finalizado. <br> contate o administrador'); 
                redirect(base_url('login'));
            }
        }else{
            $this->session->set_flashdata('error','Cadastro não pode ser finalizado. <br> contate o administrador'); 
            redirect(base_url('login'));
        }
        
        
    }
    
    //debugar como vai ser enviado o email para o usuario
    /*function templateEmail(){
        $this->load->view('template/confirmacaoCadastro');
    }*/
}
