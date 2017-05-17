/*
* @Author: 20161024
* @Date:   2017-05-11 10:53:52
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-16 13:50:37
*/

// ---------------点击我的订单 Begin
$(function(){
      // 点击我的订单
      var $cartAdd = $('.dm-shortcut .fore3 a');
      $cartAdd.click(function(){
                window.location.href="go-to-order.php";
      })
})

//点击我的订单End