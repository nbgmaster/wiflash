
<form method="post" action="{$root_dir}">
   <fieldset>
  
   <table cellspacing="0 cellpadding="0" class="tbl_02">
   <tr>
   
       <td align="right">
          <table cellspacing="0" cellpadding="0">
          <tr>
              <td> <img src="{$dir_img}icons/account.png" onclick="location.href='{$root_dir}account/index.html'" width="16" class="img-a" title="{$header_link_account}"> </td>
              <td> <span class="header-font">&nbsp;&nbsp;{$usr_data.UserEmail}</span> </td>
          </tr>
          </table>
          
       </td>
       <td align="right" class="td_006"> <input class="submit" type="submit" value="{$form_logon_logout}" name="logout"> </td>
       
   </tr>
   </table>
   
   </fieldset>     
</form>