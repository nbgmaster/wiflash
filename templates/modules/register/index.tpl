    <div id="form_reg">
    
          <form id="form_register" name="form_register">
            <fieldset>
               <legend>{$form_reg_title}</legend>
               
                <label for="UserEmail"><div class="inp_title">{$form_reg_email}</div></label>
                <div class="float-l">
                <input type="text" name="email" id="email" autocomplete="off" value="" class="reg_inp" maxlength="50">
                </div>
                <span id="emailInfo"></span> 
                <div class="clear"></div>
                
                <p>&nbsp;</p>
                
                <label for="UserEmail"><div class="inp_title">{$form_reg_email}</div></label>
                <div class="float-l">
                <input type="text" name="email_check" id="email_check" autocomplete="off" value="" class="reg_inp" maxlength="50">
                </div>  
                <span id="email2Info"></span> 
                <div class="clear"></div>                
                <p>&nbsp;</p>
                
                <label for="UserPass"><div class="inp_title">{$form_reg_pw}</div></label>
                <div class="float-l">
                <input type="password" name="pw" id="pw" autocomplete="off" value="" class="reg_inp" maxlength="20">
                </div>
                <span id="pass1Info"></span>  
                <div class="clear"></div>
               
                <p>&nbsp;</p>
                
                <label for="UserPass"><div class="inp_title">{$form_reg_pw}</div></label>
                <div class="float-l">
                <input type="password" name="pw_check" id="pw_check" autocomplete="off" value="" class="reg_inp" maxlength="20">
                </div> 
                <span id="pass2Info"></span>    
                <div class="clear"></div>
                                                             
                <p>&nbsp;</p>
                        
                <div align="center">
                
                  <input type="button" value="" id="reg" style="display:none" onclick="xajax_register(xajax.getFormValues('form_register'));">
                  <input id="reg_submit" class="reg_submit" type="submit" value="{$form_reg_signup}" name="submit_register">
                </div>
                
              </fieldset>
                
            </form>
            
            <script language="JavaScript" src="{$root_dir}media/js/validation_register.js" type="text/JavaScript"></script>
            
    </div>
    
    <div id="reg_success" style="display:none">
    Registration successful. Please check your emails to confirm it.
    </div>
            
            