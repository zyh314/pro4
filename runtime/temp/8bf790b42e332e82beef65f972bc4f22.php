<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\WEB\PHP\justgo\public/../application/index\view\edit_psw.html";i:1526256830;}*/ ?>
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
  <div class="layui-form-item">
    <label class="layui-form-label">原密码</label>
    <div class="layui-input-block">
      <input type="password" name="oriPsw" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|opsw">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">新密码</label>
    <div class="layui-input-block">
      <input type="password" name="newPsw" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|psw">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">确认新密码</label>
    <div class="layui-input-block">
      <input type="password" name="newPswChk" placeholder="请输入" autocomplete="off" class="layui-input" lay-verify="required|pswChk">
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
<script src="__JS__/vue.js"></script>
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
        opsw: function(value){         
        } ,
        psw: function(value){  
          localStorage.editPsw = value; 
        } ,
        pswChk: function(value){  
          if(localStorage.editPsw != value){
            return '两次输入密码不一致';  
          }  
        }  
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
    data.field.newPswChk = hex_md5(data.field.newPswChk);
    data.field.oriPsw = hex_md5(data.field.oriPsw);
    
    $.ajax({
      url:'<?php echo url("backend/User/chkPsw"); ?>',
      dataType:'json',
      type:'POST',
      data:'eid='+localStorage.editAdminPsw+'&epassword='+data.field.oriPsw,
      success:function(res){
        if(typeof(res) == 'object'){
          $.ajax({
            url:'<?php echo url("backend/User/editAdminPsw"); ?>',
            dataType:'json',
            type:'POST',
            data:'eid='+localStorage.editAdminPsw+'&epassword='+data.field.newPswChk,
            success:function(res){
              localStorage.editPsw = '';
              window.parent.location.reload();

            }
          })
        }else{
          layer.msg('密码不正确', function(){
            return '密码不正确';
          });
        }
        console.log(typeof(res)); 
        
      }.bind(this)
    }) 
  })
   
});  

// document.getElementsByClassName('iframeClose')[0].onclick = function(){
// 	window.parent.document.getElementById("add_admin_iframe").style.display="none";
// }
</script>
</html>