function AnimationTranslateBottomOUT(translate, fade, translatecadastro) {
    $("#item-entrar").addClass("bloquear");
    $("#item-cadastrar").addClass("bloquear");
    var animationSequence = [{e: $('.' + translate + ',.' + translatecadastro), p: {translateY: ["100%", 0]}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + fade).velocity("transition.fadeIn", {delay: 600, duration: 700, easing: "easeOutQuart"});

}
function AnimationTranslateBottomIN(translate, fade, translatecadastro) {
    $("." + fade).velocity("transition.fadeOut", {duration: 700, easing: "easeOutQuart"});
    $("#item-entrar").removeClass("bloquear");
    $("#item-cadastrar").removeClass("bloquear");
    var animationSequence = [{e: $('.' + translate + ',.' + translatecadastro), p: {translateY: [0, "100%"]}, o: {delay: 700, duration: 600, easing: "easeOutQuart"}}];
    $.Velocity.RunSequence(animationSequence);
}


function InForm(Padding, transition, transitioncadastro) {
    $("." + transition).velocity("transition.slideDownOut", {stagger: 100, duration: 400, easing: "easeOutQuart"});
    var animationSequence = [{e: $("." + Padding), p: {paddingTop: "220px"}, o: {delay: 600, duration: 600, easing: "easeOutQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + transitioncadastro).velocity("transition.slideUpIn", {delay: 1000, stagger: 100, duration: 400, easing: "easeInQuart"});

}

function OutForm(Padding, transition, transitioncadastro) {
    $("." + transitioncadastro).velocity("transition.slideDownOut", {stagger: 100, duration: 400, easing: "easeOutQuart"});
    var animationSequence = [{e: $("." + Padding), p: {paddingTop: "110px"}, o: {delay: 600, duration: 600, easing: "easeOutQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + transition).velocity("transition.slideUpIn", {delay: 1000, stagger: 100, duration: 400, easing: "easeInQuart"});
    $('#formularioCadastro').each(function () {
        this.reset();
    });

}

function redirection(endereco) {
    window.location.href = endereco;
}

function InSession(classe, backclasse) {
    var animationSequence = [{e: $('.' + classe), p: {translateX: [0, "100%"]}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + backclasse).velocity("transition.fadeIn", {delay: 600, duration: 700, easing: "easeOutQuart"});
}

$(document).ready(function () {

    $('.backusuariosessao').click(function () {
        var animationSequence = [{e: $('.sessaousuario'), p: {translateX: ["100%", 0]}, o: {duration: 600, easing: "easeInQuart"}}];
        $.Velocity.RunSequence(animationSequence);
        $(".backusuariosessao").velocity("transition.fadeOut", {duration: 100, easing: "easeOutQuart"});

    })

});

function InFormCompact(transition, transitioncadastro) {
    $("." + transition).velocity("transition.slideDownOut", {stagger: 200, duration: 400, easing: "easeOutQuart"});
    $("." + transitioncadastro).velocity("transition.slideUpIn", {delay: 1000, stagger: 100, duration: 400, easing: "easeInQuart"});

}

function OutFormCompact(transition, transitioncadastro) {
    $("." + transitioncadastro).velocity("transition.slideDownOut", {stagger: 200, duration: 400, easing: "easeInQuart"});
    $("." + transition).velocity("transition.slideupIn", {delay: 1000, stagger: 200, duration: 400, easing: "easeOutQuart"});

}


function indados(classeOUT, classeIN) {
    $("." + classeOUT).velocity("transition.slideLeftOut", {stagger: 200, duration: 400, easing: "easeInQuart"});
    $("." + classeIN).velocity("transition.slideRightIn", {delay: 400, stagger: 200, duration: 400, easing: "easeOutQuart"});
}