
  function ToggleFlash (id)  {
                  
        if (document.getElementById("flash_opt_" + id).style.display == 'none')  { 

                document.getElementById("TImg_" + id).src = root_dir + "media/images/icons/collapse.gif";
                document.getElementById("flash_opt_" + id).style.display = "";
                document.getElementById("TImg_" + id).title = "collapse";

        }

        else  {

                document.getElementById("TImg_" + id).src = root_dir + "media/images/icons/expand.gif";
                document.getElementById("flash_opt_" + id).style.display = "none";
                document.getElementById("TImg_" + id).title = "expand";

        }

  }
