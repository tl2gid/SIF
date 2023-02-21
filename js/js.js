
$(document).ready(function(){


    /*메뉴 버튼*/
    $(".menu_btn").on('click',function(){
        $(this).toggleClass('menu_btn_c');
        $(".content").toggleClass("display_no");
        $(".nav").toggle();
    });

    /*언어 버튼*/
    $(".lang_btn").on('click',function(){
        $(this).toggleClass('lang-click');
        if($(".lang_btn").hasClass("lang-click") === true) {
            $(".ko").css("display","none");
            $(".en").css("display","flex"); 
            $(".v-wrap .en").css("display","block");
            $(".r-wrap .en").css("display","block");
            $(".category").css("width","100%");
        } else {
            $(".ko").css("display","flex");
            $(".en").css("display","none"); 
            $(".v-wrap .ko").css("display","block");
            $(".r-wrap .ko").css("display","block");
            $(".category").css("width","80%");
        }
    });




    /*painter-items hover*/
    $(".item-tumb img").hover(function(){
        $(this).css({
            "position":"relative",
            "bottom":"7px",
            "transition":"0.5s",
            "opacity":"80%"
        });
    },function(){
        $(this).css({
            "position":"relative",
            "bottom":"0px",
            "transition":"0.2s",
            "opacity":"100%"
        });
    });
    /*SIFV.14 카테고리 버튼 클릭*/
    $(".category ul li").on('click',function(){
        $(this).addClass("all-btn");
        $(".category ul li").not($(this)).removeClass("all-btn");
    });

    /*painter 검색하면 보이기*/
    $("#search").keyup(function(){
        var search = $(this).val();
        $(".s-item").hide();
        var temp = $(".s-item:contains('"+ search +"')");
        $(temp).show();

    });
    $("#search-en").keyup(function(){
        var search = $(this).val();
        $(".s-item").hide();
        var temp = $(".s-item:contains('"+ search +"')");
        $(temp).show();

    });
    $.extend($.expr[":"], { //소문자 대문자 구별안하는 법
        "contains": function(elem, i, match, array) { 
            return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0; 
        } 
    });
     
    /*category 버튼*/
    $(".all-btn").on('click',function(){
        $(".s-item").css("display","block");
        $('.dsp').css("display","none");
    });
    $(".illust-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.illust').css("display","block");
        $('.dsp').css("display","none");
        
    });
    $(".character-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.character').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".pic-book-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.pic-book').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".webtoon-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.webtoon-btn').css("display","block");
        $('.dsp').css("display","block");
    });
    $(".indep-pubilc-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.indep-pubilc').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".grap-des-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.grap-des').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".game-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.game').css("display","block");
        $('.dsp').css("display","block");
    });
    $(".animat-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.animat').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".calli-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.calli').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".convers-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.convers').css("display","block");
        $('.dsp').css("display","none");
    });
    $(".art-toy-btn").on('click',function(){
        $('.s-item').css("display","none");
        $('.art-toy').css("display","block");
        $('.dsp').css("display","none");
    });

   
   
   

    //FAQ 카테고리 버튼 클릭
    $(".enter").on('click',function(){
        $(".part-list").css("display","none");
        $(".enter-list").css("display","block");
    });
    $(".part").on('click',function(){
        $(".enter-list").css("display","none");
        $(".part-list").css("display","block");
    });



});

window.onload = function(){
    //웹 hover가 모바일 터치되게 하기
    document.addEventListener("touchstart", function() {}, true);

    //스크롤바 없애기
    var swiper = new Swiper('.swiper-container', {
        scrollbarHide: true,
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 30,
        grabCursor: true
    });

    

  


};

