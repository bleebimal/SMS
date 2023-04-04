<?php /* Smarty version Smarty-3.1.8, created on 2015-08-04 17:50:50
         compiled from "templates/bootstrap/source/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183241876155bfa89fcf5f80-83758884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0492cdbe725c522cd2d85304dc5350581f667ec' => 
    array (
      0 => 'templates/bootstrap/source/header.tpl',
      1 => 1438689950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183241876155bfa89fcf5f80-83758884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55bfa89fd29036_65097658',
  'variables' => 
  array (
    'title' => 0,
    'stylesheets' => 0,
    'sheeturl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bfa89fd29036_65097658')) {function content_55bfa89fd29036_65097658($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta http-equiv="Refresh" content="60"/>

		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/featherlight.min.css" rel="stylesheet">
		
		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<?php if (isset($_smarty_tpl->tpl_vars['stylesheets']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['sheeturl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sheeturl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sheeturl']->key => $_smarty_tpl->tpl_vars['sheeturl']->value){
$_smarty_tpl->tpl_vars['sheeturl']->_loop = true;
?><link href="<?php echo $_smarty_tpl->tpl_vars['sheeturl']->value;?>
" rel="stylesheet"><?php } ?>
		<?php }?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>



		<div class="container"><?php }} ?>