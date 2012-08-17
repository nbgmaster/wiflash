 <center>
    
        <div align="center" class="layout_width">

        <div class="float-l layout_col_left" align="left">
    
            <p>&nbsp;</p>
            <table cellspacing="0" cellpadding="0"><tr>
             <td><img src="{$dir_img}icons/categories/feed.png"></td>
             <td> &nbsp;&nbsp;<a href="{$root_dir}">Flash Feed</a>
            </td></tr></table>  
            
            <p>&nbsp;</p>
    
             <p>&nbsp;</p>
             
            {foreach from=$n_categories key=myId item=c}
            
                 <table cellspacing="0" cellpadding="0"><tr>
                 <td><img src="{$dir_img}icons/categories/{$c.ID}.png"></td>
                 <td>&nbsp;&nbsp;<a href="{$root_dir}flash/{$c.category|lower}.html">{$c.category}</a>  
                 </td></tr></table>     
                  
                 <p>&nbsp;</p>
            
             {/foreach}
             
             <hr style="background:{$tpl_hexcode};color:{$tpl_hexcode};height:0.1em">
           
             <p>&nbsp;</p>
             <a href="{$root_dir}flash/newflash.html">New Flash</a>
    
             <p>&nbsp;</p>
             <a href="{$root_dir}account/index.html">Account</a>
             <p>&nbsp;</p>
    
        </div>
                      
        <div class="float-l layout_col_middle" align="left">
                