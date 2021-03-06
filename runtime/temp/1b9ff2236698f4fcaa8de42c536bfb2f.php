<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"C:\AppServ\www\hf171029-stage4\hf1710-justgo\public/../application/backend\view\fabu.html";i:1525768941;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="__STATIC__/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
       
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>商品发布</legend>
</fieldset>
 
<form method="post" enctype="multipart/form-data" class="layui-form" action="<?php echo url('backend/goods/uploadgoods'); ?>">
	<div class="layui-form-item">
	    <label class="layui-form-label">促销方式</label>
	    <div class="layui-input-block">
			<input lay-filter="salesway" type="radio" name="sale" value="普购" title="普购" checked>
			<input lay-filter="salesway" type="radio" name="sale" value="秒杀" title="秒杀">
	    </div>
	</div>
	
	<div class="layui-form-item">
	    <label class="layui-form-label">商品名称</label>
	    <div class="layui-input-block">
	      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入商品名称" class="layui-input">
	    </div>
	</div>
  
	<div class="layui-form-item">
	    <div class="layui-inline">
	    	<label class="layui-form-label">价格</label>
	    	<div class="layui-input-inline">
	    	<input type="tel" name="price" lay-verify="required|number|decimal" autocomplete="off" class="layui-input">
	    	</div>
	    </div>
	    <div class="layui-inline">
	    	<label class="layui-form-label">数量</label>
	    	<div class="layui-input-inline">
	    		<input type="text" name="quantity" lay-verify="required|number|positiveint" autocomplete="off" class="layui-input">
	    	</div>
	    </div>
	</div>
	
	<!--归属地-->
	<div class="layui-form-item">
		<label class="layui-form-label">归属地</label>
		<div class="layui-input-inline">
			<select id="province" lay-filter="province">
				<option value="" selected="">请选择省</option>
				<?php foreach($location as $value): ?>
				<option value="<?php echo $value['locateid']; ?>"><?php echo $value['locate']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="layui-input-inline">
			<select id="cities" name="locateid">
				<option value="" selected="">请选择市</option>
			</select>
		</div>
	</div>
	
	<!--商品主图-->
	<div class="layui-form-item">
		<label class="layui-form-label">商品主图</label>
		<div class="layui-upload-drag layui-input-inline" style="margin:20px ;" id="test10">
			<i class="layui-icon"></i>
			<p>点击上传，或将文件拖拽到此处</p>
		</div>
		<div class="layui-input-inline">
			<div class="layui-upload-list">
	    <img class="layui-upload-img" id="demo1" style="height: 152px;">
	    <p id="demoText"></p>
	  </div>
		</div>
	</div>
	
	<!--简介-->
	<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">简单介绍</label>
    <div class="layui-input-block">
      <textarea name="intro" placeholder="请输入内容" class="layui-textarea" lay-verify="required"></textarea>
    </div>
  </div>
 	
 	<!--促销部分-->
 	<div style="display: none;" id="salediv">
	  	<!--促销价/限量-->
		<div class="layui-form-item">
		    <div class="layui-inline">
		      <label class="layui-form-label">促销价：</label>
		      <div class="layui-input-inline">
		        <input id="saleprice" type="tel" name="saleprice" autocomplete="off" class="layui-input">
		      </div>
		    </div>
		    <div class="layui-inline">
		      <label class="layui-form-label">每单限量：</label>
		      <div class="layui-input-inline">
		        <input type="text" id="qtylimit" name="qtylimit" autocomplete="off" class="layui-input">
		      </div>
		    </div>
		</div>
			
		<!--时段选择-->
		<div class="layui-form-item">
		    <div class="layui-inline">
		      <label class="layui-form-label">促销时段</label>
		      <div class="layui-input-inline">
		        <select id="period" name="modules" lay-search="">
		          <option value="">点击选择任意字段</option>
		          <option value="8">08：00 - 10：00</option>
		          <option value="10">10：00 - 12：00</option>
		          <option value="12">12：00 - 14：00</option>
		          <option value="14">14：00 - 16：00</option>
		          <option value="16">16：00 - 18：00</option>
		          <option value="18">18：00 - 20：00</option>
		          <option value="20">20：00 - 22：00</option>
		          <option value="22">22：00 - 24：00</option>
		          <option value="24">24：00 - 02：00</option>
		        </select>
		      </div>
		    </div>
		</div>
	</div>
	
	<!--立即上架-->
	<div class="layui-form-item">
	    <label class="layui-form-label">立即上架？</label>
	    <div class="layui-input-block">
	      <input type="checkbox" name="shelf" lay-skin="switch" lay-text="是|否">
	    </div>
	</div>
		
	<!--提交按钮-->
	<div class="layui-form-item">
	    <div class="layui-input-block">
	      <button type="submit" id="uploadBTN" class="layui-btn" lay-submit="" lay-filter="upload">立即提交</button>
	      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
	    </div>
	</div>
	
</form>
 
          
<script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
<script src="__JS__/jquery.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form','jquery', 'upload'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,upload = layui.upload
  ,$ = layui.jquery;
 	
 	/*监听单选框*/
	form.on('radio(salesway)', function(data){
		if(data.value=="秒杀"){
			$('#salediv').css('display','block');
			$('#saleprice').attr("lay-verify","required|number|decimal");
			$('#qtylimit').attr("lay-verify","required|number|positiveint");
			$('#period').attr("lay-verify","required");
		}else{
			$('#salediv').css('display','none');
			$('#saleprice').attr("lay-verify","");
			$('#qtylimit').attr("lay-verify","");
			$('#period').attr("lay-verify","");
		}
	});
	
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,content: function(value){
      layedit.sync(editIndex);
    }
    ,decimal:[
    	/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/
    	,'金额输入格式不正确,请确认!'
    ]
    ,positiveint:[
    	/^[+]{0,1}(\d+)$/
    	,'数量格式不正确，请重输！'
    ]
  });
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
      offset: '6px'
    });
  });
  
  //监听提交
//form.on('submit(upload)', function(data){
//	console.log(data);
//	$.ajax({
//	  	type:"post",
//	  	url:"../goods/getcities",
//	  	data:data,
//	  	dataType: "json", 
//		success: function(data){ 
//			$("#cities option:not(:first)").empty();
//				for(var i=0; i<data.length; i++){
//					$('#cities').append($('<option value='+data[i].locateid+'>'+data[i].locate+'</option>'))
//				}
//				form.render('select');
//		} 
//	  })
//});
  
  //省份切换显示不同城市
  form.on('select(province)', function(data){
	  console.log(data.value); //得到被选中的值
	  $.ajax({
	  	type:"post",
	  	url:"../goods/getcities",
	  	data:{fid:data.value},
	  	dataType: "json", 
  		success: function(data){ 
  			$("#cities option:not(:first)").empty();
				for(var i=0; i<data.length; i++){
					$('#cities').append($('<option value='+data[i].locateid+'>'+data[i].locate+'</option>'))
				}
				form.render('select');
  		} 
	  });
	}); 
  
  //普通图片上传,拖拽上传
  var uploadInst = upload.render({
    elem: '#test10'
    ,auto: false
    ,exts: 'gif|jpg|jpeg|png|bmp|png' //只允许上传压缩文件
    ,size: 600 //限制文件大小，单位 KB
    //,url: '../goods/uploadimg/'
    /*,bindAction: '#uploadBTN'*/
    ,choose: function(obj){
    	console.log(obj);
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result); //图片链接（base64）
      });
    }
    /*,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传失败');
      }
      //上传成功
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText');
      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
      demoText.find('.demo-reload').on('click', function(){
        uploadInst.upload();
      });
    }*/
  });
  
});
</script>

</body>
</html>