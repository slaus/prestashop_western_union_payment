<p class="payment_module">
{if $psversion < "1.5.0.0"}
	<a href="{$this_path_ssl}payment.php" title="{l s='Pay by Western Union' mod='wupayment'}">
    {else}
    	<a href="{$link->getModuleLink('wupayment', 'payment', [], true)}" title="{l s='Pay by Western Union' mod='wupayment'}">


    {/if}
    
		<img src="{$this_path}wupayment.jpg" alt="{l s='Pay by Western Union' mod='wupayment'}" />
		{l s='Pay by Western Union' mod='wupayment'}	</a>
</p>
