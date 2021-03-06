<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\WEB\PHP\justgo\public/../application/index\view\edit_info.html";i:1526278967;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="__CSS__/iframe.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css">
	<style type="text/css">
	</style>
</head>
<body ng-app = 'adminApp' ng-controller = 'admin'>
<!-- <div class = 'iframeClose'>×</div> -->

<form class="layui-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
  <div class="layui-form-item"  style = "display : none">
    <label class="layui-form-label">用户ID</label>
    <div class="layui-input-block">
      <input id = 'eid' type="text" name="userid" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">用户昵称</label>
    <div class="layui-input-block">
      <input id = 'nickname' type="text" name="nickname" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|username">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">用户电话</label>
    <div class="layui-input-block">
      <input id = 'uphoneNo' type="number" name="uphoneNo" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|phone">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">用户邮箱</label>
    <div class="layui-input-block">
      <input id = 'uemail' type="text" name="uemail" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|email">
    </div>
  </div>
<!--   <div class="layui-form-item">
    <label class="layui-form-label">用户权限</label>
    <div class="layui-input-block">
      <select id = 'add_admin_role' name = 'rid'>
      	<option></option>
      </select>
    </div>
  </div> -->
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*" id = 'edit_info'>修改</button>
    </div>
  </div>
  <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
</form>
</body>
<script src="__JS__/jquery-3.2.1.min.js"></script>
<script src="__JS__/vue.js"></script>
<script src="__JS__/md5.js"></script>
<script src="__STATIC__/layui/layui.all.js"></script>
<script type="text/javascript">

layui.use(['form', 'layedit', 'laydate'], function(){  
  var form = layui.form
  ,layer = layui.layer  
  ,layedit = layui.layedit  
  ,laydate = layui.laydate;  
  $.ajax({
    url:'<?php echo url("index/User/getUserOne"); ?>',
    dataType:'json',
    type:'GET',
    success:function(data){
      // console.log(data)
      // data = data.data;
      $('#userid').val(data.userid);
      $('#nickname').val(data.nickname);
      $('#uphoneNo').val(data.uphoneNo);
      $('#uemail').val(data.uemail);
      form.render();



    }.bind(this)
  })
  //自定义验证规则  
  form.verify({  
        admin_id: function(value){  
          if(value.length < 5){  
            return '标题至少得3个字符啊';  
          }  
        }, username: function(value){  
          if(value.length < 1){  
            return '请输入至少1位的用户名';  
          }  
        }, psw: function(value){  
          if(value.length < 1){  
            return '密码请输入至少1个字符';  
          }  
        }  
        ,phone: [/^1[3|4|5|7|8]\d{9}$/, '手机必须11位，只能是数字！']  
        ,email: [/^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$/, '邮箱格式不对']  
  });  
    
  //创建一个编辑器  
  layedit.build('LAY_demo_editor');  
    
  //监听提交  
  form.on('change(*)', function(data){  
    layer.alert(JSON.stringify(data.field), {  
      title: '最终的提交信息'  
    })  
    return false;  
  });  

   form.on("submit(*)" , function(data){
    // console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
    // console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
    console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
    $.ajax({
      url:'<?php echo url("index/User/editUser"); ?>',
      dataType:'json',
      type:'POST',
      data:data.field,
      success:function(res){
        window.location.reload();
      }
    })
  })
   
});  
</script>
</html>