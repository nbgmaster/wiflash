 
    $(function() { 
    
        var other_inputs = 0;
        var scntDiv = $('#p_scents');
    
        var i = $('#p_scents input').size() + 1 - other_inputs; 
      
        $('a#add').click(function() { 
          if(i < 11 + other_inputs) {
              $('<div id="p_opt'+i+'"><label for="opt'+i+'" class="inp_title">Option '+i+'</label><div class="float-l"><input type="text" class="reg_inp" name="opt[' + i + ']" value="" /></div><div class="clear"></div></div>').appendTo(scntDiv); 
              i++;
          }
          return false;
        });  
      
        $('a#remove').click(function() { 
          if(i > 3) { 
             t = i - 1;
             $('#p_opt'+t).remove(); 
             i--; //deduct 1 from i so if i = 3, after i--, i will be i = 2  
          }  
          return false;
        }); 
        

        
    });