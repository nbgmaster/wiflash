   <div id="p_favorites">{include file="modules/account/favorites_list.tpl"}</div>
  
   {if $total_pages > 1}

      <div align="right" class="fix_margin_2px">   

          <p id="pagenavi_favorites">
          {include file="pagenavi_ajax.tpl"}
          </p>
      
      </div>
      
  {/if}