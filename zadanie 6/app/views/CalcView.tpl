{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="kwota">kwota: </label>
			<input id="kwota" type="text" name="kwota" value="{$form->kwota}" />
		</div>
        <div class="pure-control-group">
			<label for="lata">lata: </label>
			<input id="lata" type="text" name="lata" value="{$form->lata}" />
		</div>
                  <div class="pure-control-group">
			<label for="oprocentowanie">oprocentowanie: </label>
			<input id="oprocentowanie" type="text" name="oprocentowanie" value="{$form->oprocentowanie}" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages inf">
	Wynik: {$res->result}
</div>
{/if}

{/block}