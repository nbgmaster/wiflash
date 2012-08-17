
 <table cellpadding="0" cellspacing="0" style="width:100%;" align="left"> 
     
      <tr>
                  
          {counter start=0 assign="count"} 

          {foreach from=$usr_data.fb_friends key=myId item=i}
          
              {if $myId >= $start_friendslist AND $count < $per_page_friendslist} 
                                
                    {if $count % 5 == 0 && $count != 0}
                    </tr>
                    <tr>
                    {/if} 
                    
                    <td class="td_120px" valign="top" align="left">
                     
                         <table cellspacing="0" cellpadding="0">
                             <tr>
                                 <td align="left" colspan="2">
                                 <fb:profile-pic uid='{$i.fb_ID}' width='75' height='75' linked="false"></fb:profile-pic>
                                 <!--img src="http://graph.facebook.com/{$i.fb_ID}/picture?type=normal" width="75" height="75" class="img-border"-->
                                 </td>
                             </tr>
                             <tr>
                                 <td class="td_001" align="left" valign="top">
                                 <input type="checkbox" value="{$i.fb_ID}" name="f_restriction[{$i.fb_ID}]" onclick="xajax_save('friends', 'id_{$i.friendID}');" {if $i.restricted == 0}checked="checked"{/if}>
                                 </td>
                                 <td class="font-small bold td_002" align="left" valign="top">
                                 {$i.fb_name}
                                 </td>
                             </tr>
                         </table>
                   
                      </td> 
                       
                      {counter}

                 {/if}            
                        
            {/foreach}
  
       </tr>
  
  </table> 
