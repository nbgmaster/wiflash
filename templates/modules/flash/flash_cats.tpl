
        Filter:
        
        <form method="get" id="f_cats" name="f_cats">
        {foreach from=$ay_flash_categories key=myId item=c}

        <input type="checkbox" value="{$myId}" name="flash_cats[]" onclick="xajax_save('flash_cat', xajax.getFormValues('f_cats'));" {$flash_cat_{$myId}}> {$c}
        
        {/foreach}
        </form>
        
        <p>&nbsp;</p> 
        <hr>
        <p>&nbsp;</p>          
