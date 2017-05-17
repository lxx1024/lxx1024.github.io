/*
* @Author: 20161024
* @Date:   2017-05-11 10:53:52
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-17 15:06:42
*/

// ---------------点击我的订单 Begin
$(function(){
      // 点击我的订单
      var $cartAdd = $('.dm-shortcut .fore2 a');
      $cartAdd.click(function(){
                window.location.href="go-to-user.php";
      })
})

//点击我的订单End