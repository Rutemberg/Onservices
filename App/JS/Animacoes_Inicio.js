
$(document).ready(function () {
    setTimeout(function () {
        $(".inicioEFEITO").velocity("transition.slideUpIn", {stagger: 100, duration: 400, easing: "easeInQuart"});
    }, 1000);
    setTimeout(function () {
        $(".inicioEFEITOConteiner").velocity("transition.slideUpIn", {duration: 400, easing: "easeInQuart"});
    }, 5200);
});

function InSession(classe, backclasse) {
    var animationSequence = [{e: $('.' + classe), p: {translateX: [0, "100%"]}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + backclasse).velocity("transition.fadeIn", {delay: 600, duration: 700, easing: "easeOutQuart"});
}
function OutSession(classe, backclasse) {
    var animationSequence = [{e: $('.' + classe), p: {translateX: ["100%", 0]}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    $("." + backclasse).velocity("transition.fadeOut", {duration: 100, easing: "easeOutQuart"});
}

//$(document).ready(function () {
//
//    $('.sessaousuario').mouseleave(function () {
//        var animationSequence = [{e: $('.sessaousuario'), p: {translateX: ["100%", 0]}, o: {duration: 600, easing: "easeInQuart"}}];
//        $.Velocity.RunSequence(animationSequence);
//        $(".backusuariosessao").velocity("transition.fadeOut", {duration: 100, easing: "easeOutQuart"});
//
//    })
//
//});


function InMenu(Padding, width) {
    var animationSequence = [
        {e: $("." + Padding), p: {paddingLeft: "250px"}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence);
    var animationSequence2 = [
        {e: $("." + width), p: {width: "250px"}, o: {duration: 600, easing: "easeInQuart"}}];
    $.Velocity.RunSequence(animationSequence2);

}
//function OutMenu(Padding, width) {
//    var animationSequence = [
//        {e: $("." + Padding), p: {paddingLeft: "60px"}, o: {duration: 600, easing: "easeInQuart"}}];
//    $.Velocity.RunSequence(animationSequence);
//    var animationSequence2 = [
//        {e: $("." + width), p: {width: "60px"}, o: {duration: 600, easing: "easeInQuart"}}];
//    $.Velocity.RunSequence(animationSequence2);
//
//}

$(document).ready(function () {
    $('.menulateral').mouseleave(function () {
        var animationSequence = [
            {e: $(".paddingcorpo3"), p: {paddingLeft: "60px"}, o: {duration: 600, easing: "easeInQuart"}}];
        $.Velocity.RunSequence(animationSequence);
        var animationSequence2 = [
            {e: $(".menulateral"), p: {width: "60px"}, o: {duration: 600, easing: "easeInQuart"}}];
        $.Velocity.RunSequence(animationSequence2);
    });
});
function abrirEmIframe(id, link) {
    document.getElementById(id).src = link;
}


$(document).ready(function () {
    $(".transitionENTRADA").velocity("transition.slideUpIn", {stagger: 200, duration: 400, easing: "easeInQuart"});
});