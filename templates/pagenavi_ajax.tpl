
   Page

        {counter start=1 assign="count_p"} 
        {while $count_p <= $total_pages}
        
            {if $count_p == $current_page}<span class="bold" style="color:{$tpl_hexcode};">[{$count_p}]</span>
            {else}  
                    
            <a href="#" onclick="xajax_page('{$category}', {$count_p}, {$total});" style="color:{$tpl_hexcode};font-weight:bold">{$count_p}</a>
            {/if}

        {counter}
        {/while}
  