
        {if isset($usr_data.ID)}{include file="modules/home/main.tpl"}
         
        {else}
        
           <div class="layout_width">
        
                <div class="div-twosections"> 
                
                    <div class="title layout_margin_l">
                        {$wiflash_description}
                    </div>
                    
                </div>
                
                <div class="div-twosections form_register" align="left"> 
                        
                    <div class="layout_margin_r">
                        {include file="modules/register/index.tpl"}  
                    </div>
            
                </div>
                          
                <div class="clear"></div>
            
            </div>
           
        {/if}