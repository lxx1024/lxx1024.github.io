// -------------------------------------------------------------搜索栏 Begin
$(function(){
    var $txt = $('.dm-header .search .search-txt');
    var $btn = $('.dm-header .search .search-btn');
    $btn.click(function(){
        console.log($txt.val());
        if($txt.val()==""){
            alert("请输入搜索关键字!");
        }else{
            window.location.href="prod-search.php?search="+$txt.val();
        }
    })
})

// 搜索栏End