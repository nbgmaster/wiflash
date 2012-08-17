
<form id="login_form" method="post" action="{$root_dir}">
  <fieldset>

  <table cellspacing="0 cellpadding="0" class="tbl_01">
  <tr>
      <td> &nbsp; </td>
      <td> <label class="header_txt">{$form_logon_email}</label> </td>
      <td> <label class="header_txt">{$form_logon_password}</label> </td>
      <td> &nbsp; </td> 
  </tr>
  <tr>
      <td class="td_004" style="padding-bottom:8px"> 
      
          {if isset($logon_failure)}
          <table cellspacing="0" cellpadding="0">
          <tr>
              <td> <img src="{$dir_img}icons/error-x.png" width="16"> </td>
              <td> <span class="header_txt">&nbsp;Login unsucessful</span> <td>
          </tr>
          </table>
           
          {else}&nbsp;{/if}
          
      </td>
  
      <td style="padding-bottom:8px"> <input type="text" name="UserEmail" autocomplete="on" class="login_inp"> </td>
      <td style="padding-bottom:8px"> <input type="password" name="UserPass" autocomplete="on" class="login_inp"> </td>
      <td style="padding-bottom:8px"> <input id="login_submit" class="submit" type="submit" value="{$form_logon_login}" name="login"> </td>
      
  </tr>
  
  <tr>
      <td>&nbsp;</td>
      <td>  
          <table cellspacing="0" cellpadding="0">
          <tr>
              <td class="td_005"> <input type="checkbox" name="autologon" value="1" checked="checked"> </td>
              <td > <label class="logon_add">&nbsp;&nbsp;Remember Login?</label> </td>
          </tr>
          </table>

      </td>
      <td> 
            <span class="logon_add">Forgot Password?</span> 
       </td>
  </tr>
  </table>

</fieldset>
</form>
    