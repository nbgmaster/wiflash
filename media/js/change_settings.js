
  var selected_tpl = "";
  //var selected_lang = "";

  if (document.cookie)  {

        cookies = document.cookie.split(";");

        for (i=0;i<cookies.length;i++)  {

             tpl = cookies[i].search(/tpl.+/);

             if (tpl != -1)  {

                 tpl_id = i;
                 break;

             }

        }

        /*for (i=0;i<cookies.length;i++)  {

            lang = cookies[i].search(/lang.+/);

            if (lang != -1) {

                lang_id = i;
                break;

            }

        }*/


        if (tpl != -1)  {

           selected_tpl = cookies[tpl_id].split("=");
           selected_tpl = selected_tpl[1];

        }

        /*if (lang != -1) {

           selected_lang = cookies[lang_id].split("=");
           selected_lang = selected_lang[1];

        }*/

  }

  //if (selected_lang == "2") document.getElementById("change_lang").selectedIndex = selected_lang - 2;
  //if (selected_lang == "3") document.getElementById("change_lang").selectedIndex = selected_lang - 2;
  
  if (selected_tpl == "") selected_tpl = "1";

  document.getElementById("change_tpl").selectedIndex  = document.getElementById(selected_tpl).index;
  

  function reload_tpl()   {

      document.getElementById("change_tpl").selectedIndex  = document.getElementById(selected_tpl).index;

  }

  
  function setCookie( name, value, expires, path, domain, secure )  {

    var today = new Date();
    today.setTime( today.getTime() );


    if ( expires )  {
         expires = expires * 1000 * 60 * 60 * 24 * 365;
    }

    var expires_date = new Date( today.getTime() + (expires) );

    document.cookie = name + "=" +escape( value ) +
    ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + 
    ( ( path ) ? ";path=" + path : "" ) + 
    ( ( domain ) ? ";domain=" + domain : "" ) +
    ( ( secure ) ? ";secure" : "" );

  }


  function change_tpl(value)  {

          setCookie( 'tpl', value, '1', '/', '', '' );

          location.reload();

  }


  /*function change_lang(id)  {
  
          id = id + 2;

          setCookie( 'lang', id, '1', '/', '', '' );

          location.reload();

  } */
