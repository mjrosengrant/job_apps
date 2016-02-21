
<div class="col-md-6">
	<div id="welcome"><h2>Hello, {{$username}}</h2> </div>

	{if $results|@count >0} 
		Search Results<br>
	{else}
		Use search bar above to find friends		
	{/if}
	<ul>
	{foreach from=$results item=user}
	    <li>
	    	<a href="index.php?friendSearch=True&firstname={$user['_source']['firstname']}&lastname={$user['_source']['lastname']}&loc={$user['_source']['location']}">
	    	{$user["_source"]["firstname"]} {$user["_source"]["lastname"]} - {$user["_source"]["location"]}
	    	</a>
	    </li>
	{/foreach}
	</ul>

</div>
<div class="col-md-6">
	{include file="google_map.tpl"}
</div>