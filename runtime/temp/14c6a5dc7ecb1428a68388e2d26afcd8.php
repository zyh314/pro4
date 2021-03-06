<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\WEB\PHP\justgo\public/../application/backend\view\add_role.html";i:1525761327;}*/ ?>
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
<body>
<form class="layui-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
  <div class="layui-form-item">
    <label class="layui-form-label">角色名称</label>
    <div class="layui-input-block">
      <input type="text" name="rname" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|rname" >
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">角色描述</label>
    <div class="layui-input-block">
      <input type="text" name="rintro" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required">
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="*" id = 'add_admin_sub'>立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
</form>
</body>
<script src="__JS__/jquery-3.2.1.min.js"></script>
<!-- <script src="__JS__/vue.js"></script> -->
<script src="__JS__/md5.js"></script>
<script src="__STATIC__/layui/layui.all.js"></script>
<script type="text/javascript">

layui.use(['form', 'layedit', 'laydate'], function(){  
  var form = layui.form
  ,layer = layui.layer  
  ,layedit = layui.layedit  
  ,laydate = layui.laydate;  
   
  //自定义验证规则  
  form.verify({  
        rname: function(value){  
          $.ajax({
            url:'<?php echo url("backend/User/roleSame"); ?>',
            dataType:'json',
            type:'POST',
            data:'name='+value,
            success:function(res){
              // console.log(res);
              if(res == 1){
                // return '用户名重名';
                layer.msg('用户名重名', function(){
                  return '用户名重名';
                //关闭后的操作
                });
              }
            }  
        })}, username: function(value){  
          if(value.length < 4){  
            return '请输入至少4位的用户名';  
          }  
        }, psw: function(value){  
          if(value.length < 4){  
            return '密码请输入至少4个字符';  
          }  
        }  
        ,phone: [/^1[3|4|5|7|8]\d{9}$/, '手机必须11位，只能是数字！']  
        ,email: [/^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$/, '邮箱格式不对']  
  });
    
  form.on("submit(*)" , function(data){
    // console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
    // console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
    console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
    $.ajax({
      url:'<?php echo url("backend/User/roleSame"); ?>',
      dataType:'json',
      type:'POST',
      data:'name='+data.field.rname,
      success:function(res){
      // console.log(res);
        if(res == 1){
          // return '用户名重名';
          layer.msg('用户名重名', function(){
          return '用户名重名';
          //关闭后的操作
          })
        }else{
          $.ajax({
            url:'<?php echo url("backend/User/addRole"); ?>',
            dataType:'json',
            type:'POST',
            data:data.field,
            success:function(res){
              window.parent.location.reload();
              console.log(res);
              layer.closeAll();
            }
          })
        }
      }
    })
  })
}) 
</script>
</html>