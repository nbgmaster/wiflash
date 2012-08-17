
    </div>

    <p>&nbsp;</p> 

    <div id="footer"> 
    
        <div class="footerline-main" align="center">          
        
            <p class="space-small">&nbsp;</p>
            
            <div class="layout_width" align="center">
            
            <div class="div-twosections copyright" align="left">
              <div class="spacer-l">
                {$footer_copyright}
              </div>
            </div>
            
            <div class="div-twosections" align="right">
              <div class="spacer-r">
                <a href="{$root_dir}home/contact.html">{$footer_href_contact}</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#">{$footer_href_imprint}</a>
              </div>
            </div>
                             
            <div class="clear"></div>  
            
            </div>
            
            {if !isset($usr_data['ID'])}
            
                <div class="footer_lang">
        
                {foreach from=$ay_languages key=myId item=i}
                
                <img src="{$dir_img}flags/{$i.language}.png">
          
                <a href="?lang={$i.language}" class="footer">{$i.language_name}</a>
                &nbsp;&nbsp;
                
                {/foreach}  
                </div>
              
            {/if}
            
            Page was generated in {$rendering_time} seconds
        </div> 
            
    </div>
    

    
</div>

</body>
</html>