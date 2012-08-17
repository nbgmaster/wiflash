                            
      <h2>Flash Feed</h2>  
      <p>&nbsp;</p> 
      
      <div align="left" class="box_02">
      here insert form for creating new flash
      </div>
      <p>&nbsp;</p>
        
      <div align="left" class="box_03">
                     
         <div class="box_02" align="left">
                
            <div id="flash_cats">{include file="modules/flash/flash_cats.tpl"}</div>        
            <div id="updatefeed"></div><div id="flashfeed">{include file="modules/flash/flashfeed.tpl"}</div>  
              
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
                  xajax_refresh('flashfeed', 'main', time, Math.random());
                  $.ajaxSetup({ cache: false });
                  reload = 0;
              }
          });
          
          $(this).keypress(function (e) {
              idleTime = 0;
              if (reload == 1) {
                  var time = "{$mysqldate}"; 
                  xajax_refresh('flashfeed', 'main', section, time, Math.random());
                  $.ajaxSetup({ cache: false });
                  reload = 0;
              }
          });
      })

  </script>
