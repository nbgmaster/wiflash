{if isset($e)}

You completed the registration successfully. Now you can login above.

{else}

    {if isset($validity)}
    
        {if $validity == 1}
        
                <p>&nbsp;</p>
                <p>&nbsp;</p>    
                <p>&nbsp;</p>
                
                  <div style="width:600px;">
           
                  <div class="float-l" style="width:370px; margin-right:30px">
        
                   <form id="form_register" method="post" action="#">
                   <fieldset>
                   <legend>Update your data</legend>
                   
    
                    <label for="nationality"><div class="inp_title">{$form_reg_nationality}</div></label>
                    <div class="float-l">
                    <select name="nationality" id="nationality" class="reg_sel">    
                    <option value="" id="">{$form_reg_nationality_desc}</option>          
                    {foreach from=$ay_countries item=country name=country}
                    <option value="{$country.ID}" id="{$country.ID}">{$country.$lang_active}</option>
                    {/foreach}
                    </select>
                    <span id="nationalityInfo"></span>    
                    </div>
                    <div class="clear"></div>
    
                    <p>&nbsp;</p>
    
                    <label for="residence"><div class="inp_title">{$form_reg_residence}</div></label>
                    <div class="float-l">
                    <select name="residence" id="residence" class="reg_sel"> 
                    <option value="" id="">{$form_reg_residence_desc}</option>               
                    {foreach from=$ay_countries item=country name=country}
                    <option value="{$country.ID}" id="{$country.ID}">{$country.$lang_active}</option>
                    {/foreach}
                    </select>
                    <span id="residenceInfo"></span>   
                    </div>
                    <div class="clear"></div>
    
                    <p>&nbsp;</p>
                                    
                    <label for="age"><div class="inp_title">{$form_reg_gender}</div></label>
                    <div class="float-l">
                    <select name="gender" id="gender" class="reg_sel">              
    
                    <option value="" id=""></option>
                    <option value="m" id="m">{$form_reg_gender_male}</option>
                    <option value="w" id="w">{$form_reg_gender_female}</option>
                    
                    </select>
                    <span id="genderInfo"></span>                   
                    </div>
                    <div class="clear"></div>
    
                    <p>&nbsp;</p>
    
                    <label for="born_m"><div class="inp_title">Birthday</div></label>
                    <div class="float-l">
                    <select name="born_m" id="born_m" class="reg_sel" style="width:50px"> 
                    <option value="" id=""></option>               
    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    
                    </select>
                    <span id="born_mInfo"></span>                   
                    </div>
                                                       
                    <div class="float-l">
                    <select name="born_d" id="born_d" class="reg_sel" style="width:50px"> 
                    <option value="" id=""></option>               
    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    
                    </select>
                    <span id="born_dInfo"></span>                   
                    </div>
    
                    <div class="float-l">
                    <select name="born_y" id="born_y" class="reg_sel" style="width:80px"> 
                    <option value="" id=""></option>               
                    {foreach from=$ay_born item=born}
                    <option value="{$born}" id="">{$born}</option>
                    {/foreach}
                    </select>
                    <span id="born_yInfo"></span>                   
                    </div>
                    <div class="clear"></div>
                    
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>   
                       
                    <div align="center">
                      <input type="hidden" value="{$t}" name="t"> 
                      <input id="reg_submit" class="reg_submit" type="submit" value="Complete registration" name="reg_submit">
                    </div>
                    
                  </fieldset>
                    
                </form>
                
                </div>
                
                <div class="float-l bold" style="width:200px;margin-top:50px;" align="center">
                Why? to compare data among groups worldwide etc. explanation bla bla
                </div>
                
                <div class="clear"></div>         
                
                </div>    
                
                <script language="JavaScript" src="{$root_dir}media/js/validation_activation.js" type="text/JavaScript"></script>
             
        {else}
        This account is either not existing or already activated.
        {/if}
    
    {/if}
    
{/if}
