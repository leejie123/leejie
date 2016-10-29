// 全部商品分类
$(function(){
    $(".navbar-header").hover(
        function(){
             $(this).find(".all_menu").show();
        },
         function(){
            $(this).find(".all_menu").hide();
        }
        );
    $(".li_bg").hover(
        function(){
            $(this).find(".pd_ul").show();
        },
        function(){
            $(this).find(".pd_ul").hide();
        }
        );
    $(".li_b").hover(
        function(){
            $(this).find(".pd_u").show();
        },
        function(){
            $(this).find(".pd_u").hide();
        }
        );
});

