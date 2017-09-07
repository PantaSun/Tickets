<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品鉴会管理</title>
<!--                       CSS                       -->
<link rel="shortcut icon" href="/Tickets/Application/Admin/Common/Resources/images/icons/weblogo.jpg" />
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/Tickets/Application/Admin/Common/Resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/Tickets/Application/Admin/Common/Resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/Tickets/Application/Admin/Common/Resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="/Tickets/Application/Admin/Common/Resources/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">管理</a></h1>
      <!-- Logo (221px wide) -->
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 
        <br />
        <a href="#" title="register"></a> 你好，超级管理员 <?php echo session('username');?></br> <a href="<?php echo U('Index/logout');?>" title="Sign Out">退 出</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        
        <li> <a href="#" class="nav-top-item current"> 品鉴会管理</a>
          <ul>
          	<li><a   href="<?php echo U('Tasting/allTasting');?>">所有品鉴会</a></li>
          	<li><a href="<?php echo U('Tasting/addTasting');?>">添加单个品鉴会</a></li>
          	<li><a href="<?php echo U('Tasting/addAllTasting');?>">批量添加连续品鉴会</a></li> 
          	<li><a href="<?php echo U('Tasting/addAllShopTasting');?>">为所有门店添加品鉴会</a></li>  
          	<li><a href="<?php echo U('Tasting/addPartShopTasting');?>">为部分门店添加品鉴会</a></li>               
          </ul>
        </li>
        
         <li> <a href="#" class="nav-top-item current"> 门店管理</a>
          <ul>
          	<li><a href="<?php echo U('Shop/allShop');?>">所有门店</a></li>
          	<li><a href="<?php echo U('Shop/addShop');?>">添加门店</a></li>
                         
          </ul>
        </li>
        
         <li> <a href="#" class="nav-top-item current ">
          <!-- Add the class "current" to current menu item -->
          销售员管理 </a>
          <ul>
           <li><a href="<?php echo U('User/allSalesman');?>">所有销售员信息</a></li>
            <li><a href="<?php echo U('User/selectSalesman');?>">修改销售员信息</a></li>
             <li><a href="<?php echo U('User/addSalesman');?>">添加销售员</a></li>
          </ul>
        </li>

        <li> <a href="#" class="nav-top-item current"> 其他设置 </a>
          <ul>
            <li><a href="<?php echo U('Index/modifyPassword');?>">修改密码</a></li>
            <li><a href="<?php echo U('Index/pushSMExcel');?>">下载销售信息</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        <h3>3 Messages</h3>
        <p> <strong>17th May 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>25th April 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <form action="#" method="post">
          <h4>New Message</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">Send to...</option>
            <option value="option2">Everyone</option>
            <option value="option3">Admin</option>
            <option value="option4">Jane Doe</option>
          </select>
          <input class="button" type="submit" value="Send" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
    <h2>品鉴会管理</h2>
    <p id="page-intro">What would you like to do?</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>为部分门店添加品鉴会（注：相同日期、时间，不同门店）</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <form action="<?php echo U('Tasting/addPartShop');?>" method="post">
           <table>
            <thead>
              <tr>
                <th>序 号</th>
                <th>门 店</th>    
                <th>选 择</th>  
              </tr>
            </thead>
           <tbody>
           <?php if(is_array($list)): foreach($list as $key=>$shop): ?><tr>
                <td><?php echo ($id++); ?></td>
                <td><?php echo ($shop["shop_name"]); ?></td>
              	<td><input name="<?php echo ($id-1); ?>" type="checkbox" value="<?php echo ($shop["shop_name"]); ?>">  </td>
              	
              </tr><?php endforeach; endif; ?>
           		
              <tfoot>
              
              <tr>
                <td colspan="6">
                <p>
      				 <strong>品鉴会日期：</strong> 
          			<select name="date_y">
       					<?php $__FOR_START_24721__=2016;$__FOR_END_24721__=2500;for($i=$__FOR_START_24721__;$i < $__FOR_END_24721__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
          			</select> 年
          			<select name="date_m">
       					<?php $__FOR_START_31734__=1;$__FOR_END_31734__=13;for($i=$__FOR_START_31734__;$i < $__FOR_END_31734__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
         			</select> 月
        		 	<select name="date_d">
       					<?php $__FOR_START_27639__=1;$__FOR_END_27639__=32;for($i=$__FOR_START_27639__;$i < $__FOR_END_27639__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
        			</select> 日
      			</p>
      			<div class="clear"></div>
      			<p>
       			<strong>品鉴会时间：</strong> 
       			<select name="time_h">
       			<?php $__FOR_START_27236__=0;$__FOR_END_27236__=24;for($i=$__FOR_START_27236__;$i < $__FOR_END_27236__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
       			 </select> 时
        		<select name="time_m">
       			<?php $__FOR_START_29901__=0;$__FOR_END_29901__=60;for($i=$__FOR_START_29901__;$i < $__FOR_END_29901__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
        		</select> 分
      			</p>
     		 <div class="clear"></div>
                  <div class="bulk-actions align-lift">
                  <input class="button" type="submit" value="批量添加选中项" />
                    </div>
					
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
                  
            </tfoot>
            </tbody>
          </table>
          </form>
        </div>
        <!-- End #tab1 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    
   
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- End Notifications -->
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2016 Your Company | <a href="#">联系我们</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>