        
  <div id="container">
   
		<h1>New Flash</h1> 

     <p>&nbsp;</p>  
                 
        <form id="form_flash" method="post" action="">
            <fieldset>
               <legend>New Flash</legend>
               
                <label for="category" class="inp_title">Section</label>
                
                <div class="float-l">
                
                    <select id="section" name="section" class="reg_sel">    
                    <option value="" id=""></option>          
                    <option value="1" id="">Preference</option>
                    <option value="2" id="">Prediction</option>
                    <option value="3" id="">Retrospection</option>
                    </select>
                    <span id="sectionInfo"></span> 
                		
                </div>
                <div class="clear"></div>
                
                <p>&nbsp;</p>

                <label for="category" class="inp_title">Category</label>
                
                <div class="float-l">
                    
                    <select id="category" name="category" class="reg_sel">    
                    <option value="" id=""></option>          
                    <option value="1" id="">Sports</option>
                    <option value="2" id="">Politics</option>
                    <option value="3" id="">Film</option>
                    <option value="4" id="">Other</option>
                    </select>
                    <span id="categoryInfo">Please choose a category</span> 
                		
                </div>
                <div class="clear"></div>
                
                <p>&nbsp;</p>
                
                <label for="question" class="inp_title">Question</label>
                
                <div class="float-l">
                    <input type="text" id="question" name="question" autocomplete="off" value="" class="reg_inp">
                </div>      
                				
                <span id="questionInfo">Please enter a meaningful question</span> 

                <div class="clear"></div>
                
                <p>&nbsp;</p>     
                
                <label for="type"><div class="inp_title">Type</div></label>
                
                <div class="float-l">
                    
                    <select name="s_type" class="reg_sel">    
                    <option value="" id=""></option>          
                    <option value="radio" id="">Single</option>
                    <option value="checkbox" id="">Multi</option>
                    </select>

                </div>
                <div class="clear"></div>
                
                <p>&nbsp;</p>
  
                <a href="" id="add">Add</a>  
                <a href="" id="remove">Remove</a>  
  
                <div id="p_scents">
        
                    <div id="p_opt1">
                    
                        <label for="p_opt1" class="inp_title">Option 1</label> 
                        <div class="float-l">
                        <input type="text" name="opt[1]" autocomplete="off" value="" class="reg_inp">
                        </div>
                                
                        <div class="clear"></div>
                  
                    </div>
             
                    <div id="p_opt2">    
                    
                        <label for="p_opt2" class="inp_title">Option 2</label> 
                        <div class="float-l">
                        <input type="text" name="opt[2]" autocomplete="off" value="" class="reg_inp">
                        </div>
                                
                        <div class="clear"></div>
                      
                    </div>
        
                </div>
                          
                <p>&nbsp;</p>

                <div align="center">
                    <input id="reg_submit" class="reg_submit" type="submit" value="Create" name="submit_flash" id="submit_flash">
                </div>
                
              </fieldset>
                
            </form>
            
    </div>
    
    <script language="JavaScript" src="{$root_dir}media/js/validation_newflash.js" type="text/JavaScript"></script>
    <script language="JavaScript" src="{$root_dir}media/js/add_fields.js" type="text/JavaScript"></script>