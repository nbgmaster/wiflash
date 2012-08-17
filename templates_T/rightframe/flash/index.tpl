 
 {if $section == 'category'} 
 
     <div id="toplists">
             
          <span class="bold font-tpl">Top Rated Flashes</span>
          <p>&nbsp;</p> 
                            
          {foreach from=$ay_f_top_rated key=myId item=t}
              <a href="{$root_dir}flash/{$t.ID}.html">{$t.question}</a> ({$t.rating})
              <p>&nbsp;</p> 
          {/foreach}
          
          <p>&nbsp;</p>
           
          <span class="bold font-tpl">Top Voted Flashes</span>
          <p>&nbsp;</p> 
          
          {foreach from=$ay_f_top_voted key=myId item=t}
              <a href="{$root_dir}flash/{$t.ID}.html">{$t.question}</a> ({$t.total_votes})
              <p>&nbsp;</p> 
          {/foreach}
          
     </div>

 {/if}
 
 {if $section == 'fid'}
 
   What your friends think?

  {*assign var="foo" value="2"*}   
   {foreach from=$ay_flash_single key=myId item=i}

    {if isset($ay_friends_vote[1])}   
    <p>&nbsp;</p> 
    <u>{$i.opt1}</u>
    <p></p> 
    {foreach from=$ay_friends_vote[1] item=f}
    <img src="http://graph.facebook.com/{$f}/picture?type=normal" width="32" height="32" class="img-border">
    {/foreach} 
    {/if}
    
    {if isset($ay_friends_vote[2])}   
    <p>&nbsp;</p> 
    <u>{$i.opt2}</u>
    <p></p> 
    {foreach from=$ay_friends_vote[2] item=f}
    <img src="http://graph.facebook.com/{$f}/picture?type=normal" width="32" height="32" class="img-border">
    {/foreach} 
    {/if}
    
    {if $i.opt3 != ''}<p>&nbsp;</p> {$i.opt3}{/if}
    {if $i.opt4 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt5 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt6 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt7 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt8 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt9 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
    {if $i.opt10 != ''}<p>&nbsp;</p> {$i.opt4}{/if}
      
      {/foreach}
  
 {/if} 