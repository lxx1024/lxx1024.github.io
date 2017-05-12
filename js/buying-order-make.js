/*
* @Author: 20161024
* @Date:   2017-05-07 10:24:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-12 16:35:10
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
                // console.log(sumPrice);
         }
         $allPrice.text("￥"+sumPrice);
         $allNum.text(sumNum);
      }
})
// 商品总金额 End
//  ---------------------------------------------------点击"新增收货地址" Begin
$(function(){
        var $addAddr = $('.box .add-address');   //"新增收货地址按钮"
        var $add = $('.box .add');  //新增地址输入块
        var $addBtn = $('.box .add .add-btn');  //"添加"按钮
        var $addrName = $('.box .add .addr-name');   //收货人姓名
        var $addrAddress = $('.box .add .addr-address');   //收货地址
        var $addrPhone = $('.box .add .addr-phone');   //收货电话
        // console.log($add);
        // console.log($addAddr);
        // console.log($addrName);
        // console.log($addrPhone);
        // console.log($addrAddress);
        $addAddr.click(function(){
              if($addAddr.text()=="新增收货地址"){
                     $add.css("display","block");
                     $addAddr.text("取消新增地址");
              }else{
                    $add.css("display","none");
                     $addAddr.text("新增收货地址");
              }
        })
        $addBtn.click(function(){
              var addrName=$addrName.val();
              var addrAddress=$addrAddress.val();
              var addrPhone=$addrPhone.val();
              if(addrName && addrAddress && addrPhone){
                    // console.log("不为空");   // 然后再判断用户输入的内容是否符合要求
                    // console.log(isPhone(addrPhone));   //输入正确的会返归true
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
// ---------------------------------点击"收货人姓名"选择收货地址  Begin
$(function(){
      var $addrName=$('.box .address .addr-name');
      var $addrId = $('.box .address i');
      var $id = $('#addrId');
      $id.val($($addrId[0]).text());
      $($addrName[0]).css('border','1px solid red');  //默认选中第一个地址
      for (var i = 0; i < $addrName.length; i++) {
            var addrName = $addrName[i];
            addrName.index = i;
            $(addrName).click(function(){
                    var index = this.index;
                    var addrId = $($addrId[index]).text();   //获得当前选中的id
                    // console.log(addrId);
                    $id.val(addrId);   //赋值给隐藏的input值,以便传值
                    $addrName.css('border','1px solid #ccc');
                     $(this).css('border','1px solid red');
            })
      }
})
// 点击"收货人姓名"选择收货地址  End
//  ---------------------------------------------------点击"编辑收货地址" Begin
$(function(){
        var $editAddr = $('.box .address .addr-edit');   //"编辑"按钮
        var $edit = $('.box .edit');  //编辑地址输入块
        var $editBtn = $('.box .edit .add-btn');  //"修改"按钮--修改
        var $editName = $('.box .edit .edit-name');   //收货人姓名--修改
        var $editAddress = $('.box .edit .addr-address');   //收货地址 -- 修改
        var $editPhone = $('.box .edit .addr-phone');   //收货电话--修改

        var $addrId = $('.box .address i');   //收货地址id---原来
        var $addrName=$('.box .address .addr-name');  //收货人姓名 --原来
        var $addrAddress=$('.box .address .addr-address'); //收货地址 --原来
        var $addrPhone=$('.box .address .addr-phone');//联系电话--原来
        // console.log($($addrId[0]).text()+"地址id");  //第一个收货地址id---原来
        // console.log($($addrName[0]).text()+"收货人姓名"); //第一个收货人姓名--原来
        // console.log($($addrAddress[0]).text()+"收货地址"); //第一个收货地址--原来
        // console.log($($addrPhone[0]).text()+"联系电话"); //第一个联系电话--原来
        for (var i = 0; i < $editAddr.length; i++) {
                $editAddr[i].index = i;
                 $($editAddr[i]).click(function(){    //编辑按钮--显示修改文本框
                        var index = this.index;
                        if($(this).text()=="编辑"){
                               $($edit[index]).css("display","block");
                               $(this).text("取消");
                                                       console.log($($addrId[index]).text());
                               // $($editName[index]).val($($addrName[index]).text());
                               // $($editAddress[index]).val($($addrAddress[index]).text());
                               // $($editPhone[index]).val($($addrPhone[index]).text());
                        }else{
                              $($edit[index]).css("display","none");
                               $(this).text("编辑");
                        }
                  })
                 $editBtn[i].index = i;
                  $($editBtn[i]).click(function(){     //修改按钮--提交数据
                        var index = this.index;
                        var editName=$($editName[index]).val();
                        var editAddress=$($editAddress[index]).val();
                        var editPhone=$($editPhone[index]).val();
                        if(editName && editAddress && editPhone){
                              console.log("不为空");   // 然后再判断用户输入的内容是否符合要求
                              console.log(isPhone(editPhone));   //输入正确的会返归true
                              if(isPhone(editPhone)==false){
                                    alert("手机输入格式不对");
                              }else{
                                   // 这里是输入正确信息后进行的操作
                                   // 将上面的值传到指定php处理文件,将数据上传到数据库
                                   window.location.href="buying-address-edit.php?addrId="+$($addrId[index]).text()+"&addrName="+editName+"&addrAddress="+editAddress+"&addrPhone="+editPhone;
                              }
                        }else{
                              alert("请填完整收货人信息!");
                        }
                 })
        }
        // 验证手机号
        function isPhone(phone) {
               var pattern = /^1[3|4|5|7|8]\d{9}$/;
               return pattern.test(phone);
        }
})
// 点击"编辑收货地址" End