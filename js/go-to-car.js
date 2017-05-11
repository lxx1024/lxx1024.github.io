/*
* @Author: 20161024
* @Date:   2017-05-11 10:53:52
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-11 10:55:41
*/

// ---------------点击购物车 Begin
$(function(){
      // 点击添加到购物车
      var $cartAdd = $('.dm-header .cart a');
      $cartAdd.click(function(){
                window.location.href="go-to-car.php";
      })
})

//点击购物车End