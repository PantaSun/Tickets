<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>超级管理员登录</title>
<!--                       CSS                       -->
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
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>Simpla Admin</h1>
    <!-- Logo (221px width) -->
    <img id="logo" src="/Tickets/Application/Admin/Common/Resources/images/logo.png" alt="Simpla Admin logo" /> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="<?php echo U('Index/loginCheck');?>" method="post">
      <div class="notification information png_bg">
        <div> 尊敬的超级管理员，欢迎登录. </div>
      </div>
      <p>
        <label>账 号：</label>
        <input class="text-input" type="text" name="username" />
      </p>
      <div class="clear"></div>
      <p>
        <label>密 码：</label>
        <input class="text-input" type="password"  name="password"/>
      </p>
      <div class="clear"></div>
      <!--  <p id="remember-password">
        <input type="checkbox" />
        Remember me </p>-->
      <div class="clear"></div>
      <p>
        <input class="button" type="submit" value="登 录" />
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>