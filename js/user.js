/*
* @Author: 20161024
* @Date:   2017-05-17 15:59:09
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-17 17:18:18
*/
// 修改密码 Begin
$(function(){
    var $form = $('.user .form');
    var $cancel = $('.user .cancel');
    $cancel.click(function(){
        console.log($cancel);
          if($(this).text()=="修改密码"){
                $cancel.text("取消修改");
                console.log($(this).text());
                $form.css("display","block");
          }else{
                $cancel.text("修改密码");
                $form.css("display","none");
          }
    })
})
// 修改密码 End
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
      for (var i = 0; i < $addrName.length; i++) {
            var addrName = $addrName[i];
            addrName.index = i;
            $(addrName).mouseenter(function(){
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

// 设置同样高度 Begin
$(function(){
    var $orders=$('.order-box .orders');
    for (var i = 0; i < $orders.length; i++) {
        var $prod = $orders.eq(i).find(".product");
        console.log($prod);
        var $other= $orders.eq(i).find(".other");
        var $array = [];
        for (var j = 0; j < $other.length; j++) {
            $array.push($($other[j]).height());
        }
        $max = Math.max.apply(null, $array);
        if($max>$prod.height()){
            $other.height($max);
            $prod.height($max);
        }else{
            $other.height($prod.height());
       }

    }

})

// 设置同样高度End