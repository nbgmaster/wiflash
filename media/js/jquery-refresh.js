
     var idleTime = 0;
     var reload = 0;
      
      function getCookie(c_name)  {
          var i,x,y,ARRcookies=document.cookie.split(";");
          for (i=0;i<ARRcookies.length;i++) {
                x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                x=x.replace(/^\s+|\s+$/g,"");
                if (x==c_name)
                  {
                  return unescape(y);
                  }
          }
      }

      function timerIncrement() {  

        var logon = getCookie("l");
 
          if(logon) {
              idleTime = idleTime + 1;      // 20 seconds
              if (idleTime > 1) reload = 1;       
          } 
          else {
                  window.location.reload();
          }
      }
      
