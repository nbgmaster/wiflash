                  
      <h2>Friends on wiflash</h2>  
      <p>&nbsp;</p> 
 
      <div align="left" class="box_03">
                     
         <div class="box_02" align="left">
         
             {if $usr_data['fb_ID'] != '0' AND $number_of_friends > 0}
              
                  <form method="get" id="f_friends" name="f_friends">
                  <fieldset>
                        
                  <p id="friendslist">   
                  {include file="modules/account/friendslist.tpl"}
                  </p>
                                    
                  </fieldset>
                  </form>
                    
                 {if $total_pages > 1}

                      <div align="right" class="fix_margin_2px">   
    
                          <p id="pagenavi_friendslist">
                          {include file="pagenavi_ajax.tpl"}
                          </p>
                      
                      </div>
                      
                  {/if}
                  
            {else}
            
            <img src="{$dir_img}icons/no_friends.jpg" width="75" height="75" class="img-border fix_img">
             
            {/if}
        
        </div>
        
        {if $usr_data['fb_ID'] != '0' AND $number_of_friends > 0}
            <p>&nbsp;</p>  
            <p class="font-tpl bold">{$connectwithfriends_deselect_info}</p>
            <p>&nbsp;</p>
        {/if}      
                       
    </div>        

    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>