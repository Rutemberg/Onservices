$(document).ready(function () {

    setTimeout(function () {
        $(".backgroundFADE").velocity("transition.fadeOut", {duration: 1000, easing: "easeOutQuart"});
        $(".mensagem_aguarde,.mensagem_cadastro,.mensagem_redirecionando").velocity("transition.slideUpIn", {delay: 1000, stagger: 1500, duration: 400, easing: "easeInQuart"});

        $(".mensagem_aguarde").velocity("transition.slideUpOut", {delay: 2500, duration: 400, easing: "easeOutQuart"});
        $(".mensagem_cadastro").velocity("transition.slideUpOut", {delay: 2500, duration: 400, easing: "easeOutQuart"});
        $(".mensagem_redirecionando").velocity("transition.slideUpOut", {delay: 2500, duration: 400, easing: "easeOutQuart"});
    }, 1000);

})

$(document).ready(function () {
    $(".login_titulo_fadeIN").velocity("transition.fadeIn", {delay: 1000, stagger: 1500, duration: 1000, easing: "easeInQuart"});

})


function escalaBACKGROUND(classe) {
    $("." + classe).velocity({scale: "1.05"}, {duration: 700, easing: "easeInQuart"});
}
function esconderIMG(classe) {
    $("." + classe).velocity("transition.fadeIn", {duration: 200, easing: "easeInQuart"});

}

function animatedselect(classeselect, classeoption) {
    $("." + classeselect).velocity("fadeOut", {duration: 50, easing: "easeOutQuart"});
    $("." + classeoption).velocity("transition.slideUpIn", {duration: 200, easing: "easeInQuart"});

}

function servicos(id) {

    value = document.getElementById(id).value;

    if (value == "Casa e serviços gerais") {
        animatedselect('servico', 'casaeservicos');
    }
    if (value == "Construção e reformas") {
        animatedselect('servico', 'construcaoreformas');
    }
    if (value == "Festas e eventos") {
        animatedselect('servico', 'festaseventos');
    }
    if (value == "Serviços domésticos") {
        animatedselect('servico', 'servicosdomesticos');
    }
    if (value == "Informática") {
        animatedselect('servico', 'Informatica');
    }
    if (value == "") {
        animatedselect('servico', '');
    }

}

function limpar(id) {
    document.getElementById(id).value = '';
}