 
 
       <form method="get" id="f_flash_{$i.ID}" id="f_flash_{$i.ID}">
        <fieldset>
        
                              <input type="{$i.type}" name="opt[]" value="1">{$i.opt1}<p>&nbsp;</p> 
                              <input type="{$i.type}" name="opt[]" value="2">{$i.opt2}<p>&nbsp;</p> 
           {if $i.opt3 != ''} <input type="{$i.type}" name="opt[]" value="3">{$i.opt3}<p>&nbsp;</p> {/if}
           {if $i.opt4 != ''} <input type="{$i.type}" name="opt[]" value="4">{$i.opt4}<p>&nbsp;</p> {/if}                      
           {if $i.opt5 != ''} <input type="{$i.type}" name="opt[]" value="5">{$i.opt5}<p>&nbsp;</p> {/if}
           {if $i.opt6 != ''} <input type="{$i.type}" name="opt[]" value="6">{$i.opt6}<p>&nbsp;</p> {/if}
           {if $i.opt7 != ''} <input type="{$i.type}" name="opt[]" value="7">{$i.opt7}<p>&nbsp;</p> {/if}
           {if $i.opt8 != ''} <input type="{$i.type}" name="opt[]" value="8">{$i.opt8}<p>&nbsp;</p> {/if}
           {if $i.opt9 != ''} <input type="{$i.type}" name="opt[]" value="9">{$i.opt9}<p>&nbsp;</p> {/if}
           {if $i.opt10 != ''} <input type="{$i.type}" name="opt[]" value="10">{$i.opt10}<p>&nbsp;</p> {/if}
           
           <input type="hidden" name="flash_type" value="{$i.type}">
           <input type="hidden" name="flashID" value="{$i.ID}">
           
       </fieldset>
       </form>

       <p id="flash_submit_{$i.ID}"><input class="submit" type="button" value="Submit" onclick="xajax_save('flash', xajax.getFormValues('f_flash_{$i.ID}'));return false;" /></p>
