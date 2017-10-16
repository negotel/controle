$(document).ready(function () {
   

    
    $(document).on('click', '#marcardesmarcar', function () {
	$('.marca').each(function () {
	    if (this.checked) {
		$(this).attr("checked", false);
		$("#btnMostrar").html("Marcar Todos");
	    } else {
		$(this).prop("checked", true);
		$("#btnMostrar").html("Desmarcar");
	    }
	});
    });
    $(".alert").fadeTo(5000, 4200).slideUp(4200, function () {
	$(".alert").slideUp(4200);
    });
    
    
    $(".box-adicionar-imagem").on('click', function () {
	var el = $(this).data('input');
	$("#" + el).trigger('click');
    });

    $(".upload-image").on('change', function (ev) {
	var target = $(this).data('target');
	var f = ev.target.files[0];
	var fr = new FileReader();
	fr.onload = function (ev2) {
	    $('#' + target).html('<img src="' + ev2.target.result + '" />');
	};

	fr.readAsDataURL(f);
    });
    $(document).on('click', '#situacao1', function (event) {
        var ativar = $(this).attr('ativar');
        $('#ativaPermissao').val(ativar);
    });


    $(document).on('click', '#situacao2', function (event) {
        var bloquear = $(this).attr('bloquear');
        $('#bloquearPermissao').val(bloquear);
    });
});
function mostrarResultado(box, num_max, campospan) {
    var contagem_carac = box.length;
    if (contagem_carac != 0) {
        document.getElementById(campospan).innerHTML = "<strong style='color:#FF0000;'>" + contagem_carac + "</strong> caracteres digitados, ";
        if (contagem_carac == 1) {
            document.getElementById(campospan).innerHTML = "<strong style='color:#FF0000;'>" + contagem_carac + "</strong> caracter digitado, ";
        }
        if (contagem_carac >= num_max) {
            document.getElementById(campospan).innerHTML = "Limite de caracteres excedido!";
        }
    } else {
        document.getElementById(campospan).innerHTML = "";
    }
}
function contarCaracteres(box, valor, campospan) {
    var conta = valor - box.length;
    document.getElementById(campospan).innerHTML = "  Você tem mais  <strong style='color:#FF0000;'>" + conta + "</strong> caracteres";
    if (box.length >= valor) {
        document.getElementById(campospan).innerHTML = "Opss.. você não pode mais digitar..";
        document.getElementById("campo").value = document.getElementById("campo").value.substr(0, valor);
    }
}

$(document).ready(function () {
    getcountry(0);
    $("#load_more").click(function (e) {
        e.preventDefault();
        var page = $(this).data('val');
        getcountry(page);
    });
});
var getcountry = function (page) {
    $("#loader").show();
    $.ajax({
        url: "imagens/imagesLista",
        type: 'GET',
        data: {page: page}
    }).done(function (response) {
        $("#ajax_div").append(response);
        $("#loader").hide();
        $('#load_more').data('val', ($('#load_more').data('val') + 1));
        scroll();
    });
};
var scroll = function () {
    $('html, body').animate({
        scrollTop: $('#load_more').offset().top
    }, 1000);
};

function aparece(){
    if(document.getElementById("tPessoa").selectedIndex == "fisica"){
        document.getElementById("cpf").style.display = "block";
        document.getElementById("cnpj").style.display="none";
    } else {
        document.getElementById("cnpj").style.display="block";
        document.getElementById("cpf").style.display="none";
    }
}

function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function cpfCnpj(v){
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
    if (v.length <= 14) { //CPF
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    } else { //CNPJ
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
    }
    return v
}

$('#dadosProduto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    // Extract info from data-* attributes
    var recipient = button.data('whatever')
    var recipient1 = button.data('whatever1')
    var recipient2 = button.data('whatever2')
    var recipient3 = button.data('whatever3')
    var recipient4 = button.data('whatever4')
    var recipient5 = button.data('whatever5')
    var recipient6 = button.data('whatever6')
    var recipient7 = button.data('whatever7')
    var recipient8 = button.data('whatever8')
    var recipient9 = button.data('whatever9')
    var recipient10 = button.data('whatever10')
    var modal = $(this)
    modal.find('.codigo').text(recipient);
    modal.find('.descricao').text(recipient1);
    modal.find('.ncm').text(recipient2);
    modal.find('.cest').text(recipient3);
    modal.find('.uc').text(recipient4);
    modal.find('.vuc').text(recipient5);
    modal.find('.ut').text(recipient6);
    modal.find('.qt').text(recipient7);
    modal.find('.vut').text(recipient8);
    modal.find('.data-cadastro').text(recipient9);
    modal.find('.data-modificado').text(recipient10);
    modal.find('.editar').html('<a class="btn btn-bold btn-pure btn-info" href="produtos/editar'+recipient+'"> Editar </a>');
    modal.find('.excluir').html('<a class="btn btn-bold btn-pure btn-danger" href="produtos/excluirProduto/'+recipient+'"> Excluir </a>');
});