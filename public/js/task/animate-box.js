$(document).ready(function(){
    let isUp = true;
    setInterval(function(){
        if(isUp)
            $(".box").attr("id","bottomright");
        else
            $(".box").attr("id","topleft");

        isUp = !isUp;
    },2000); });