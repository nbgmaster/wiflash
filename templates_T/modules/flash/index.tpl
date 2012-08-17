
  {if $section == 'newflash'}
  {include file="modules/flash/newflash.tpl"}
  
  {else}
  
        {if $section == 'category'}
                    
            <h2>Flash Feed :: {$flashID}</h2>  
            <p>&nbsp;</p> 
            
            <div align="left" class="box_02">
            here insert form for creating new flash
            </div>
            
            <p>&nbsp;</p>
                   
            <div align="left" class="box_03">
                           
               <div class="box_02" align="left">
           
                  <div id="flashfeed"><div id="updatefeed"></div>{include file="modules/flash/flashfeed.tpl"}</div>  
                  
               </div>  
                      
            </div>  
                         
            <script src="{$root_dir}media/js/jquery-refresh.js"></script>
            <script language="JavaScript">
                       
              $(document).ready(function () {
          
                  var idleInterval = setInterval("timerIncrement()", 16000); 
              
                  $(this).mousemove(function (e) {
                      idleTime = 0;
                      if (reload == 1) {
                          var time = "{$mysqldate}"; 
                          xajax_refresh('flashfeed', '{$cid}', time, Math.random());
                          $.ajaxSetup({ cache: false });
                          reload = 0;
                      }
                  });
                  
                  $(this).keypress(function (e) {
                      idleTime = 0;
                      if (reload == 1) {
                          var time = "{$mysqldate}"; 
                          xajax_refresh('flashfeed', '{$cid}', section, time, Math.random());
                          $.ajaxSetup({ cache: false });
                          reload = 0;
                      }
                  });
              })
        
           </script>
          
        {else if $id_existing == 1}
        
        {include file="modules/flash/flash_single.tpl"}
  
        {else} {include file="errorpage.tpl"}
       
        {/if}
       
  {/if}
    