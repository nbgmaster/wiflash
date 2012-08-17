                             
     {if ($section == 'fid' AND isset($already_voted))}
     
           {assign var="this" value="opt{$already_voted}"} 
           already voted | Your Choice: {$i.$this}
           <p>&nbsp;</p>
         
     {/if}
     
      {if $section != 'fid'}
      
          already voted
      
      {/if}
     
                      
    <span class="bold">Results</span>
    
    <p>&nbsp;</p> 
    
    {$i.opt1}: {$i.opt1_votes} votes
    <p>&nbsp;</p> 
    {$i.opt2}: {$i.opt2_votes} votes
    {if $i.opt3 != ''}<p>&nbsp;</p> {$i.opt3}: {$i.opt3_votes} votes{/if}
    {if $i.opt4 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt4_votes} votes{/if}
    {if $i.opt5 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt5_votes} votes{/if}
    {if $i.opt6 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt6_votes} votes{/if}
    {if $i.opt7 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt7_votes} votes{/if}
    {if $i.opt8 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt8_votes} votes{/if}
    {if $i.opt9 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt9_votes} votes{/if}
    {if $i.opt10 != ''}<p>&nbsp;</p> {$i.opt4}: {$i.opt10_votes} votes{/if}
