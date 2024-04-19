<?php
/* Smarty version 4.5.2, created on 2024-04-19 20:24:55
  from 'C:\xampp\htdocs\Projekty\zadanie 5a\app\views\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6622b6f7de4638_56001181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c861d70fbede8e92eb9efe42e8d8dc095471ee46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekty\\zadanie 5a\\app\\views\\CalcView.html',
      1 => 1713550883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6622b6f7de4638_56001181 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4188353906622b6f7dcfa90_28946492', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14224504846622b6f7dd3b57_73358692', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_4188353906622b6f7dcfa90_28946492 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_4188353906622b6f7dcfa90_28946492',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_14224504846622b6f7dd3b57_73358692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14224504846622b6f7dd3b57_73358692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
	<fieldset>
		<label for="kwota">Kwota:</label>
		<input id="kwota" min="0" type="number" placeholder="wartość kwota" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">			
		<label for="lata">Lata:</label>
		<input id="lata" min="0"  type="number" placeholder="wartość lata" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
">
        <label for="oprocentowanie">Oprcoentowanie</label>
		<input id="oprocentowanie" min="0"  type="number" placeholder="wartość oprocentowanie" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }?>
	
		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }?>
	
	<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
		<h4>Wynik</h4>
		<p class="res">
		<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

		</p>
	<?php }?>
	
	</div>
	
	<?php
}
}
/* {/block 'content'} */
}
