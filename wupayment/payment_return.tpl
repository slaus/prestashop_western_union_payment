{if $status == 'ok'}
	<p>{l s='Your order on' mod='wupayment'} <span class="bold">{$base_dir_ssl}</span> {l s='is complete.' mod='wupayment'}
		<br /><br />
		{l s='Please send us a Western Union transfer with:' mod='wupayment'}
		<br /><br />- {l s='an amout of' mod='wupayment'} <span class="price">{$total_to_pay}</span>
		<br /><br />- {l s='to the account owner of' mod='wupayment'} <span class="bold">{if $wupaymentOwner}{$wupaymentOwner}{else}___________{/if}</span>
		<br /><br />
		- {l s='Address:' mod='wupayment'} <span class="bold">{if $wupaymentDetails}{$wupaymentDetails}{else}___________{/if}</span>
		<br /><br />
		- {l s='Country:' mod='wupayment'} <span class="bold">{if $wupaymentAddress}{$wupaymentAddress}{else}___________{/if}</span>
		<br /><br />
	    - {l s='Western Union: ' mod='wupayment'}<a href="http://www.westernunion.com/" target="_blank">{l s='www.westernunion.com' mod='wupayment'}</a>
      	<br /><br />
	{l s='You can leave message the above information in your order. Or you can contact our' mod='wupayment'} <a href="{$base_dir_ssl}contact-form.php">{l s='customer support' mod='wupayment'}</a>.	</p>
{else}
	<p class="warning">
		{l s='We noticed a problem with your order. If you think this is an error, you can contact our' mod='wupayment'} 
		<a href="{$base_dir_ssl}contact-form.php">{l s='customer support' mod='wupayment'}</a>.	</p>
{/if}
