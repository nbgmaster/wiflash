      
      {foreach from=$ay_flash_single key=myId item=i}
      
      <h2>{$i.question}</h2>
  
      {/foreach}
      
      <p>&nbsp;</p>
      
      <div align="left" class="box_02">
      
            {if !isset($already_voted)} 
            
                <div class="float-l" style="margin-right:60px">
                
                {include file="modules/flash/flash_form.tpl"}
                
                </div>
                
            {/if}
            
            <div class="float-l">
            {include file="modules/flash/flash_result.tpl"}
            </div>
            
            <div class="clear"></div>
      
            <p>&nbsp;</p>
            Share link                 <p>&nbsp;</p>
            Favorite it              <p>&nbsp;</p>
                          <p>&nbsp;</p>           
            <div id="fb-root"></div>
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                <fb:comments href="http://127.0.0.1/html/wiflash/flash/{$flashID}.html" num_posts="10" width="450">
                </fb:comments>
          
      </div>
