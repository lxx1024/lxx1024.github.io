/*
* @Author: 20161024
* @Date:   2017-05-07 10:24:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-10 23:45:48
*/

//  --------------------------------------------------商品总金额 Begin
$(function(){
    getPrice();
    function getPrice(){
        var $num =  $('.product-price .num i');   //  商品数量
        var $price = $('.product-price .price i');   //商品单价
        var $allPrice = $('.get-all .all-price');   //总金额
        var $allNum = $('.get-all .all-num');   //总数
        var sumNum = 0;
        var sumPrice = 0;
        for (var i = 0; i < $num.length; i++) {
                sumNum = sumNum + parseInt($($num[i]).text());
                sumPrice = sumPrice + ($($num[i]).text())*($($price[i]).text());
                console.log(sumPrice);
         }
         $allPrice.text("￥"+sumPrice);
         $allNum.text(sumNum);
      }
})
// 商品总金额 End
//  点击"新增收货地址" Begin
$(function(){
        var $addAddr = $('.box .add-address');   //"新增收货地址按钮"
        var $add = $('.box .add');  //新增地址输入块
        var $addBtn = $('.box .add .add-btn');  //"添加"按钮
        var $addrName = $('.box .add .addr-name');   //收货人姓名
        var $addrAddress = $('.box .add .addr-address');   //收货地址
        var $addrPhone = $('.box .add .addr-phone');   //收货电话
        console.log($add);
        console.log($addAddr);
        console.log($addrName);
        console.log($addrPhone);
        console.log($addrAddress);
        $addAddr.click(function(){
              $add.css("display","block");
        })
        $addBtn.click(function(){
              var addrName=$addrName.val();
              var addrAddress=$addrAddress.val();
              var addrPhone=$addrPhone.val();
              if(addrName && addrAddress && addrPhone){
                    console.log("不为空");   // 然后再判断用户输入的内容是否符合要求
                    console.log(isPhone(addrPhone));   //输入正确的会返归true
                    if(isPhone(addrPhone)==false){
                          alert("手机输入格式不对");
                    }else{
                         // 这里是输入正确信息后进行的操作
                         // 将上面的值传到指定php处理文件,将数据上传到数据库
                         window.location.href="buying-address-add.php?addrName="+addrName+"&addrAddress="+addrAddress+"&addrPhone="+addrPhone;
                    }
              }else{
                    alert("请填完整收货人信息!");
              }


        })


        // 验证手机号
        function isPhone(phone) {
               var pattern = /^1[3|4|5|7|8]\d{9}$/;
               return pattern.test(phone);
        }



})
// 点击"新增收货地址" End