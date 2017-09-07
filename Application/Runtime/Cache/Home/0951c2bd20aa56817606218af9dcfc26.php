<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品鉴会售票</title>
<!--                       CSS                       -->
<link rel="shortcut icon" href="/Tickets/Application/Home/Common/Resources/images/icons/weblogo.jpg" />
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/Tickets/Application/Home/Common/Resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/Tickets/Application/Home/Common/Resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/Tickets/Application/Home/Common/Resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="/Tickets/Application/Home/Common/Resources/scripts/jquery.date.js"></script>
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
        <a href="#" title="register"></a> 你好，普通管理员 <?php echo session('username2');?></br> <a href="<?php echo U('Index/logout');?>" title="Sign Out">退 出</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        
        <li> <a href="#" class="nav-top-item current"> 品鉴会自助售票</a>
          <ul>
          	<li><a   href="<?php echo U('Show/index');?>">点击售票</a></li>
          	        
          </ul>
        </li>

        <li> <a href="#" class="nav-top-item current"> 其他设置 </a>
          <ul>
            <li><a href="<?php echo U('Index/modifyPassword');?>">修改密码</a></li>
          
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
    <h2>未来一周内品鉴会列表</h2>
    <p id="page-intro">What would you like to do?</p>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo ($shop["shop_name"]); ?></h3>
        <h3>每场人数：<?php echo ($shop["shop_limit"]); ?> 人</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
           <table border="1">
            <thead>
              <tr>
                <th>日 期</th>
                <th>星 期</th>
                 <?php if(is_array($timepoint)): $i = 0; $__LIST__ = $timepoint;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th><?php echo substr($vo,0,5);?></th><?php endforeach; endif; else: echo "" ;endif; ?>
              </tr>
            </thead>
           <tbody>
      
              <tr>       
                <td><?php echo ($date["date"]["0"]); ?></td>               
                <td>星期<?php echo ($date["week"]["0"]); ?> </td>
                <?php if(is_array($data['0'])): $i = 0; $__LIST__ = $data['0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?> <font color="red"><?php echo ($vo["tasting_count"]); ?></font>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>   
              <tr>       
                <td><?php echo ($date["date"]["1"]); ?></td>               
                <td>星期<?php echo ($date["week"]["1"]); ?> </td>
                <?php if(is_array($data['1'])): $i = 0; $__LIST__ = $data['1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              <tr>       
                <td><?php echo ($date["date"]["2"]); ?></td>               
                <td>星期<?php echo ($date["week"]["2"]); ?> </td>
                 	<?php if(is_array($data['2'])): $i = 0; $__LIST__ = $data['2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
                            <?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>          		
							<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              <tr>       
                <td><?php echo ($date["date"]["3"]); ?></td>               
                <td>星期<?php echo ($date["week"]["3"]); ?> </td>
                <?php if(is_array($data['3'])): $i = 0; $__LIST__ = $data['3'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              <tr>       
                <td><?php echo ($date["date"]["4"]); ?></td>               
                <td>星期<?php echo ($date["week"]["4"]); ?> </td>
                 <?php if(is_array($data['4'])): $i = 0; $__LIST__ = $data['4'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              <tr>       
                <td><?php echo ($date["date"]["5"]); ?></td>               
                <td>星期<?php echo ($date["week"]["5"]); ?> </td>
                 <?php if(is_array($data['5'])): $i = 0; $__LIST__ = $data['5'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              <tr>       
                <td><?php echo ($date["date"]["6"]); ?></td>               
                <td>星期<?php echo ($date["week"]["6"]); ?> </td>
                 <?php if(is_array($data['6'])): $i = 0; $__LIST__ = $data['6'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['tasting_count'] == '无' ): ?><td><?php echo ($vo["tasting_count"]); ?></td>
              		<?php elseif($vo['tasting_count'] == $shop['shop_limit']): ?><td><font color="red"><?php echo ($vo["tasting_count"]); ?></font></td>
					<?php else: ?> <td><a href="<?php echo U('BuyTickets/buyTickets',array('tasting_id'=>$vo['tasting_id']));?>" onclick="return confirm('是否确认购买？');"><?php echo ($vo["tasting_count"]); ?></a> </td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </tr>       
              
            </tbody>
          </table>
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