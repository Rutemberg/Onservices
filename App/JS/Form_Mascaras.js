$(document).ready(function () {
    $('.cep').mask('00000-000');
    $('.cepDigitado').mask('00000-000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.telefone').mask('(00) 00000-0000');
})
