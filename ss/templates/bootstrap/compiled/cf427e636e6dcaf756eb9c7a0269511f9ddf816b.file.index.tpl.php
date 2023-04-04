<?php /* Smarty version Smarty-3.1.8, created on 2016-09-07 01:57:37
         compiled from "templates/bootstrap/source/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160707509555bfa89fa5cad1-19221513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf427e636e6dcaf756eb9c7a0269511f9ddf816b' => 
    array (
      0 => 'templates/bootstrap/source/index.tpl',
      1 => 1473187805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160707509555bfa89fa5cad1-19221513',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55bfa89fcf1f40_08075020',
  'variables' => 
  array (
    'providers' => 0,
    'provider' => 0,
    'server' => 0,
    'memperc' => 0,
    'diskperc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bfa89fcf1f40_08075020')) {function content_55bfa89fcf1f40_08075020($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#all" data-toggle="tab">All</a>
				</li>
<?php  $_smarty_tpl->tpl_vars['provider'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['provider']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['providers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['provider']->key => $_smarty_tpl->tpl_vars['provider']->value){
$_smarty_tpl->tpl_vars['provider']->_loop = true;
?><?php if (!empty($_smarty_tpl->tpl_vars['provider']->value->servers)){?>
				<li><a href="#<?php echo $_smarty_tpl->tpl_vars['provider']->value->shortname;?>
" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['provider']->value->name;?>
</a></li>
<?php }?><?php } ?>
			</ul>
			<div class="tab-content">
				<div id="all" class="tab-pane active">
				</div>
<?php  $_smarty_tpl->tpl_vars['provider'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['provider']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['providers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['provider']->key => $_smarty_tpl->tpl_vars['provider']->value){
$_smarty_tpl->tpl_vars['provider']->_loop = true;
?><?php if (!empty($_smarty_tpl->tpl_vars['provider']->value->servers)){?>
				<div id="<?php echo $_smarty_tpl->tpl_vars['provider']->value->shortname;?>
" class="tab-pane active">
					<h3><?php echo $_smarty_tpl->tpl_vars['provider']->value->name;?>
</h3>
					<table class="table table-bordered table-hover table-center">
						<thead>
							<tr>
								<th class="span2" scope="col">Name</th>
								<th class="span2" scope="col">Uptime</th>
								<th class="span3" scope="col">RAM</th>
								<th class="span3" scope="col">Disk</th>
								<th class="span2" scope="col">Load</th>
								<th class="span2" scope="col">Network</th>
								<th class="span2" scope="col">Last Updated</th>
							</tr>
						</thead>
						<tbody>
<?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provider']->value->servers; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value){
$_smarty_tpl->tpl_vars['server']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars["memperc"] = new Smarty_variable($_smarty_tpl->tpl_vars['server']->value->membuffers/$_smarty_tpl->tpl_vars['server']->value->memtotal*100, null, 0);?>
<?php $_smarty_tpl->tpl_vars["diskperc"] = new Smarty_variable($_smarty_tpl->tpl_vars['server']->value->diskused/$_smarty_tpl->tpl_vars['server']->value->disktotal*100, null, 0);?>
							<tr style="text-align: center">
								<td>
									<a href="graphs.php?s=<?php echo $_smarty_tpl->tpl_vars['server']->value->serverid;?>
" data-featherlight="ajax"><?php echo $_smarty_tpl->tpl_vars['server']->value->name;?>
</a>
								</td>
								<td><?php echo $_smarty_tpl->tpl_vars['server']->value->uptime;?>
</td>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['server']->value->membuffers;?>
MB/<?php echo $_smarty_tpl->tpl_vars['server']->value->memtotal;?>
MB
									<div class="custombar progress <?php echo progressClass($_smarty_tpl->tpl_vars['memperc']->value);?>
">
										<div class="bar" style="width: <?php echo $_smarty_tpl->tpl_vars['memperc']->value;?>
%;"></div>
									</div>
								</td>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['server']->value->diskused;?>
GB/<?php echo $_smarty_tpl->tpl_vars['server']->value->disktotal;?>
GB
									<div class="custombar progress <?php echo progressClass($_smarty_tpl->tpl_vars['diskperc']->value);?>
">
										<div class="bar" style="width: <?php echo $_smarty_tpl->tpl_vars['diskperc']->value;?>
%;"></div>
									</div>
								</td>
								<td>
									<span class="label label-success"><?php echo number_format($_smarty_tpl->tpl_vars['server']->value->load1,2);?>
</span>
									<span class="label label-success"><?php echo number_format($_smarty_tpl->tpl_vars['server']->value->load5,2);?>
</span>
									<span class="label label-success"><?php echo number_format($_smarty_tpl->tpl_vars['server']->value->load15,2);?>
</span>
								</td>
								<td>
<?php if (!empty($_smarty_tpl->tpl_vars['server']->value->netin)&&!empty($_smarty_tpl->tpl_vars['server']->value->netout)){?>
									In: <?php echo $_smarty_tpl->tpl_vars['server']->value->netin;?>
/s<br />
									Out: <?php echo $_smarty_tpl->tpl_vars['server']->value->netout;?>
/s
<?php }else{ ?>
									
<?php }?>									<?php echo $_smarty_tpl->tpl_vars['server']->value->interfaces;?>

								</td>
								<td><span class="countup" data-time="<?php echo $_smarty_tpl->tpl_vars['server']->value->time;?>
"><?php echo sec_human(time()-$_smarty_tpl->tpl_vars['server']->value->time);?>
</span></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
				</div>
<?php }?><?php } ?>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>