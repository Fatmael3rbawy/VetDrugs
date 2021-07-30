$(document).ready(function(){
 
// show password
$(".fa-eye").on("click",function(){
    $(this).toggleClass('show');

    if($(this).hasClass("show")){
        $(this).prev("input").attr('type','text');
    }else{
        $(this).prev("input").attr('type','password');
    }
})
// nice scroll
$("html").niceScroll();


//loading page

    $(".load-page").fadeOut(1000);

//menu chat

$(".menu-button").on("click",function(){
    $(".chat-setting ul").slideToggle(1000);
});


$(".fa-upload").on("click",function(){
    $(".upload-file ul").slideToggle(1000);
})


$(".fa-search").on("click",function(){
    $(".search-chat input").toggle(1000);
})

// products and events button control

$(".button-control li ").on('click',function(){
    $(this).addClass("active").siblings().removeClass("active");
})
//show my profile
$(".dropdown.image_profile").on("click",function(){
    $(".profile_info").slideToggle(1000);
})
//show login and sign up


});
