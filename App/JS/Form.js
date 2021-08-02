function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagem').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function digitarcamposAUTO(IDdestino, IDvalor)
{
    IDdestino.value = IDvalor.value;
}


function limparCampos() {
    $('#formularioCadastro').each(function () {
        this.reset();
    });
}

function ValidaCampoSTYLE(classecampo) {
    $("." + classecampo).focus();
    $("." + classecampo).velocity({
        // Can't use rgb, hsla, and color keywords
        "borderColor": "#D13438",
        "borderColorAlpha": 1
    }, 500);
    setTimeout(function () {
        $("." + classecampo).velocity({
            // Can't use rgb, hsla, and color keywords
            "borderColor": "#d9d9d9",
            "borderColorAlpha": 1
        }, 500);
    }, 3000);

}
function checarEmail() {
    if (document.formularioCadastro.email.value == ""
            || document.formularioCadastro.email.value.indexOf('@') == -1
            || document.formularioCadastro.email.value.indexOf('.') == -1)
    {
        ValidaCampoSTYLE('email');
        return false;
    }
}
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '')
        return false;
    // Elimina CPFs invalidos conhecidos	
    if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
        return false;
    // Valida 1o digito	
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito	
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}
function ValidaCadastro() {
    nome = document.getElementById('nome').value;
    email = document.getElementById('email').value;
    cpf = document.getElementById('cpf').value;
    telefone = document.getElementById('telefone').value;
    datanascimento = document.getElementById('datanascimento').value;
    sexo = document.getElementById('sexo').value;
    senha = document.getElementById('senha').value;
    comfirmarsenha = document.getElementById('comfirmarsenha').value;
    cep = document.getElementById('cep').value;
    rua = document.getElementById('rua').value;
    bairro = document.getElementById('bairro').value;
    cidade = document.getElementById('cidade').value;
    uf = document.getElementById('uf').value;
    numero = document.getElementById('numero').value;

    if (nome == '') {
        ValidaCampoSTYLE("nome");
        return false;
    }
    if (email == '') {
        ValidaCampoSTYLE("email");
        return false;
    }
    if (checarEmail(email) == false) {
        return false;
    }
    if (cpf == '') {
        ValidaCampoSTYLE("cpf");
        return false;
    }
//    if (validarCPF(cpf) == false) {
//        ValidaCampoSTYLE("cpf");
//        return false;
//    }
    if (telefone == '') {
        ValidaCampoSTYLE("telefone");
        return false;
    }
    if (datanascimento == '') {
        ValidaCampoSTYLE("datanascimento");
        return false;
    }
    if (sexo == '') {
        ValidaCampoSTYLE("sexo");
        return false;
    }

    if (senha == '') {
        ValidaCampoSTYLE("senha");
        return false;
    }
    if (comfirmarsenha == '') {
        ValidaCampoSTYLE("comfirmarsenha");
        ;
        return false;
    }

    if (senha != comfirmarsenha) {
        ValidaCampoSTYLE("senha,.comfirmarsenha");
        return false;
    }
    if (cep == '') {
        ValidaCampoSTYLE("cep");
        return false;
    }
    if (rua == '') {
        ValidaCampoSTYLE("rua");
        return false;
    }
    if (bairro == '') {
        ValidaCampoSTYLE("bairro");
        return false;
    }
    if (cidade == '') {
        ValidaCampoSTYLE("cidade");
        return false;
    }
    if (uf == '') {
        ValidaCampoSTYLE("uf");
        return false;
    }
    if (numero == '') {
        ValidaCampoSTYLE("numero");
        return false;
    }

    return true;
}

function ValidaCadastroModulo() {
    titulo = document.getElementById('titulo').value;
    categoria = document.getElementById('categoria').value;
    servico = document.getElementById('servico').value;
    modoservico = document.getElementById('modoservico').value;
    valor = document.getElementById('valor').value;

    if (titulo == '') {
        ValidaCampoSTYLE("titulo");
        return false;
    }
    if (categoria == '') {
        ValidaCampoSTYLE("categoria");
        return false;
    }
    if (servico == '') {
        ValidaCampoSTYLE("servico2");
        return false;
    }
    if (modoservico == '') {
        ValidaCampoSTYLE("modoservico");
        return false;
    }
    if (valor == '') {
        ValidaCampoSTYLE("valor");
        return false;
    }

    diasdisponiveis = 0;
    for (var i = 0; i < 7; i++) {
        if (document.formularioCadastro["diasdisponiveis[]"][i].checked) {
            salasmontadas++;
        }
    }
    if (diasdisponiveis == 0) {
        ValidaCampoSTYLE("csscheckbox-caixa");
        return false;
    }


    return true;
}
