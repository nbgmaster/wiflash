
  {foreach from=$ay_flashes key=myId item=i}
 
         <table cellspacing="0" cellpadding="0" style="width:100%;border:1px solid #000;background:#a8a8a8">
           <tr>
           
             <td style="width:24px" align="center"><img src="{$dir_img}icons/categories/{$i.category}.png" title="{$ay_flash_categories[{$i.category}]}"></td>
             <td><a href="{$root_dir}flash/{$i.ID}.html">{$i.question}</a></td>
             <td align="right">
               <a href="javascript:ToggleFlash({$i.ID})">
               <img title="{if $myId > 0}expand{else}collapse{/if}" id="TImg_{$i.ID}" src="{$dir_img}icons/{if $myId > 0}expand{else}collapse{/if}.gif" border="0">
               </a>
             </td>
           </tr>
           
           <tr>
             <td style="border:1px solid #000" colspan="3">
    
                 {if !$i.ID|in_array:$ay_flashes_rated} 
                   
                    <div id="p_rate_{$i.ID}">
                    
                                <a href="" onclick="xajax_rate('flash', '{$i.ID}', 'like'); return false;">Like</a>
                                <a href="" onclick="xajax_rate('flash', '{$i.ID}', 'dislike');return false;">Dislike</a>
                                
                    </div>          

                  {/if}
                      
                  <span id="p_likes_{$i.ID}">{$i.likes}</span> Likes | <span id ="p_dislikes_{$i.ID}">{$i.dislikes}</span> Dislikes
                    
                    <span align="right">
                        <img src="{$dir_img}icons/fb-share.jpg" style="cursor:pointer" onclick="javascript:popup('http://www.facebook.com/sharer.php?s=100&p[title]=wiflash.com | My&#160;Current&#160;Mood&p[summary]=I&#160;am&#160;happy!&#160;Tell&#160;me&#160;on&#160;wiflash.com&#160;about&#160;your&#160;current&#160;mood&p[url]=http://www.wiflash.com/worldmoods&p[images][0]=http://www.richter-stefan.info/wiflash/img/logo_share-b.jpg&p[images][1]=http://www.richter-stefan.info/wiflash/img/logo_share-g.jpg');">
                        <a href="" onclick="xajax_save('favorite', '{$i.ID}');return false;">Favorite it!</a>
                        <p id="p_favorited_{$i.ID}"></p>
                    </span>
                                      
              </td>
           </tr>
           <tr>
              <td style="background-color:#eee" colspan="3">
                                
                  <div id="flash_opt_{$i.ID}" {if $myId > 0}style="display:none"{/if}>
          
                      {if $i.ID|in_array:$ay_flashes_voted} 

                             {include file="modules/flash/flash_result.tpl"}
              
                      {else} {include file="modules/flash/flash_form.tpl"} {/if}
                 
                 </div> 
                 
             </td>
          </tr>     
      </table>    

      <p>&nbsp;</p>

  {/foreach}  
   
