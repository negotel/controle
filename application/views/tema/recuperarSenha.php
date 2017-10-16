<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>White Lion - Troca de Senha de Acesso</title>

<link rel="icon" href="<?php echo base_url('favicon.png'); ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo base_url('favicon.png'); ?>" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<style>

    html{
        font-family: 'Roboto', sans-serif;
    }

    .cor1{
        color:#8e8e8e;
    }

    .cor2{
        color:#333333;
    }

    .nomewl{
        text-align: center;
        text-transform: uppercase;
        font-size: 22px;
    }

    .subnomewl{
        text-align: center;
        text-transform: uppercase;
        font-size: 13px;
        color: #8e8e8e;
        line-height: -20px;
    }

    .subnomewl{
        text-align: center;
        text-transform: uppercase;
        font-size: 13px;
        color: #8e8e8e;
        line-height: -20px;
    }

    .avisotitulo{
        text-align: center;
        text-transform: uppercase;
        font-size: 27px;
        color: #333333;
    }

    .avisonome{
        text-align: center;
        font-size: 13px;
        color: #333333;
    }

    .avisotexto{
        text-align: center;
        text-transform: uppercase;
        font-size: 13px;
        color: #333333;
    }

    .alinhamento{
        line-height: -10px;
    }

    .alinhamentowl{
        line-height: -30px;
    }

    .m-t-20{
        margin-top:-30px;
    }

    .botao {
        background-color: #009cde;
        border: none;
        color: white;
        padding: 10px 70px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius:3px;
        text-transform: uppercase;
    }
</style>


</head>
<body>


<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td><img src="<?php echo base_url('assets/img/header.jpg'); ?>" alt=""></td>
    </tr>
    <tr>
        <td class="nomewl"><p>sky painel</p><br>
        <p class="subnomewl alinhamento m-t-20">controle</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td><p class="avisotitulo">Redefinição de Senha</p><br>
        <p class="avisonome m-t-20">Olá, <strong class="cor2"><?php echo $result->nome_user; ?></strong>. <br>Clique no botão abaixo para redefinir a sua nova senha de acesso.</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/newcontrole/login/codigo/'. rtrim(strtr(base64_encode($result->email_user), '+/', '-_'), '='); ?>" target="_blank" class="botao">Redefinir nova Senha</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td><p class="avisonome"><i>Se você não solicitou a alteração desta senha, ignore este e-mail e sua senha não será alterada.</i></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td><img src="<?php echo base_url('assets/img/footer.jpg'); ?>" alt=""></td>
    </tr>
  </tbody>
</table>


</body>
</html>
