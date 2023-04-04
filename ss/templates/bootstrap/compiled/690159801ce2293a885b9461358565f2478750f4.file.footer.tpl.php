<?php /* Smarty version Smarty-3.1.8, created on 2016-08-22 21:46:44
         compiled from "templates/bootstrap/source/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26702060855bfa89fd2b537-44263442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '690159801ce2293a885b9461358565f2478750f4' => 
    array (
      0 => 'templates/bootstrap/source/footer.tpl',
      1 => 1471762398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26702060855bfa89fd2b537-44263442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55bfa89fd68d01_44899637',
  'variables' => 
  array (
    'version' => 0,
    'scripts' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bfa89fd68d01_44899637')) {function content_55bfa89fd68d01_44899637($_smarty_tpl) {?>		
			<hr>
			<footer class="footer">
		        <p class="pull-right"><a href="#">Back to top</a></p>
		       	<!-- <p>&copy; 2015 Shankar Bhattarai - <a href="http://github.com/shankarbhattarai/ss">Powered by Server Security v<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</a></p> -->
			<p>&copy; 2016 Bimal Gaire </p>		
	      	</footer>
		</div> <!-- /container -->
		
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/featherlight.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<?php if (isset($_smarty_tpl->tpl_vars['scripts']->value)&&is_array($_smarty_tpl->tpl_vars['scripts']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['url'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['url']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['url']->key => $_smarty_tpl->tpl_vars['url']->value){
$_smarty_tpl->tpl_vars['url']->_loop = true;
?><script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"></script><?php } ?>
		<?php }?>
	</body>
</html>
<?php }} ?>