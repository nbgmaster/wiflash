
    <div class="box_04">      
        
        <span class="bold font-tpl">{$connectwithfriends_connectfb_title}</span>

        <p>&nbsp;</p>    
        
        {if $usr_data['fb_ID'] != '0'}{$connectwithfriends_connectfb_desc}
                 
        {else}{$connectwithfriends_connectfb_desc2}{/if}

        <p>&nbsp;</p>     
        <input type="button" class="submit_001" value="{if $usr_data['fb_ID'] != '0'}Update your friendlist{else}Retrieve your friendlist{/if}" onclick="location.href='{$root_dir}account/getdata.html'" />
     
        {if isset($fb_con_status)}

          <p>&nbsp;</p>   
          {if $fb_con_status == 'user_denied' || $fb_con_status == 'con_exist'}
          <img src="{$dir_img}icons/error-x.png" width="16"> Sorry, friendlist could not be retrieved ({$fb_con_status}).{/if}
          {*if $fb_con_status == 'success'}Updated sucessfully.{/if*}
     
        {/if}

        {if $usr_data['fb_ID'] != '0'}
                  
            <p>&nbsp;</p>
            <p>&nbsp;</p>
    
            <span class="bold font-tpl">Invite Friends</span>        
            <p>&nbsp;</p>
               
            You are connected to Facebook but still some of your friends are missing on wiflash? <span class="bold">Then invite them now!</span>    
                  
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          
            <span class="bold font-tpl">Access Control</span>        
            <p>&nbsp;</p>

            Which Flashes are they allowed to see from you.
            <p>&nbsp;</p> 
            
            <form method="get" id="f_sharing" name="f_sharing">
            <fieldset>
            
            <table cellspacing="8" cellpadding="0">
            
                <tr>
                
                    <td>
                    <input type="checkbox" value="1" name="sections_public[]" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" {$f_sharing_1}>
                    </td>
                    <td>
                    World Mood
                    </td>
                    
                    </tr><tr>

                    <td>
                    <input type="checkbox" value="2" name="sections_public[]" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" {$f_sharing_2}>
                    <td>
                    World Preferences
                    </td>
                    
                    </tr><tr>
    
                    <td>
                    <input type="checkbox" value="3" name="sections_public[]" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" {$f_sharing_3}>
                    <td>
                    World Retrospection
                    </td>
                    
                    </tr><tr>
         
                    <td>
                    <input type="checkbox" value="4" name="sections_public[]" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" {$f_sharing_4}>
                    <td>
                    World Prediction
                    </td>
                    
                    </tr><tr>
                  
                    <td>
                    <input type="checkbox" value="5" name="sections_public[]" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" {$f_sharing_5}>
                    </td>
                    <td>
                    World Competition
                    </td>
                    
                </tr>
            
            </table>
            
            <!--p>&nbsp;</p> 
            <p id="sections_public_changed_inp" align="right">                     
            <input type="button" class="submit_001" value="Save" onclick="xajax_save('sections_public', xajax.getFormValues('f_sharing'));" />
            </p-->
            
            </fieldset>
            </form>
        
            <!--p id="sections_public_changed" align="right" style="display:none">Saved.</p-->        

            {if $usr_data.fb_ID != '0'} 

                <p>&nbsp;</p>
                <p>&nbsp;</p>
             
                <span class="bold font-tpl">Disconnect with Facebook</span>  
                        
                <p>&nbsp;</p>
        
                <div class="box_04">
                   <img src="http://graph.facebook.com/{$usr_data.fb_ID}/picture?type=normal" width="75" height="75" class="img-border">
                </div>
                <div class="box_05">           
                    Your wiflash Account is currently connected to the following Facebook User: 
                    <span class="bold">{$usr_data.fb_name}</span>
                </div>
                <div class="clear"></div> 
                <p>&nbsp;</p> 
                If you disconnect, you cannot see the wiflash activities and statistics of your friends anymore.
                <p>&nbsp;</p>       
                <input type="button" onclick="location.href='{$root_dir}account/disconnectwithfriends.html'" value="Disconnect with Facebook Friends" class="submit_001">

           {/if}
        
           {*if isset($fb_con_status)}{if $fb_con_status == 'disconnected'}Disconnect sucessful.{/if}{/if*} 
            
       {/if}
        
    </div>
