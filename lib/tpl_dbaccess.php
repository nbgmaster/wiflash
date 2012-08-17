<?php

  function db_template_cms ($tpl_name, &$tpl_source, &$smarty_obj)  {

      include('./settings/config.php');

      $source = new SelectEntrys();

      $source->cols      = $_GET["cat"];
      $source->table     = 'cms';
      $source->condition = " lang = '$lang_active' ";
      $source->limit     = "1";

      if ($IE) $tpl_source = "<br>";
      $tpl_source .= $source->row();

      unset($source);

      require_once('./lib/replace.php');

      $tpl_source = replaceBBcode($tpl_source, $set[0]["width_images"], 0);

      return empty($tpl_source) ? false : true;

  }

  function db_template_blocks ($tpl_name, &$tpl_source, &$smarty_obj)  {

      // include('./settings/config.php');
      include('./settings/template.php');

      $source = new SelectEntrys();

      $source->cols      = 'id, block, tpl_name, status';
      $source->table     = 'blocks';      
      $source->order     = 'id';
      $source->multiSelect = "1";

      $tpl_array = $source->row();

      $tpl_source   = "<form method='post' name='form'>";
      $tpl_source  .= $tpl_main_start;
      $tpl_source  .= $tpl_head_start;
      $tpl_source  .= $set_head_000;
      $tpl_source  .= $tpl_head_end;

      $tpl_source .= "<table align='center' class='table_011'><tr>";

      $count = 1;

      foreach( $tpl_array as $array1 => $array2)  {

               if ( $array2["status"] == 1 ) $check_status = "checked";
               else $check_status = "";
               
               $tpl_source .= "<td>";
               $tpl_source .= $array2["tpl_name"];
               //if ($array2["block"] == 'reference') $tpl_source .= ' (2)';
               $tpl_source .= "</td><td>";
               $tpl_source .= "<input type='checkbox' $check_status name='block_status[$array2[id]]' class='check_001'>";
               $tpl_source .= "<input type='hidden' name='block_id[]' value='$array2[id]'>";
               $tpl_source .= "&nbsp;&nbsp;&nbsp;</td>";

                if ( $count % 5 == 0 && $count < count($tpl_array) ) {

                     $tpl_source .= "</tr><tr>";

                }

                $count++;

      }

      $tpl_source .= "</tr></table>";

      unset($source);

      return empty($tpl_source) ? false : true;

  }

  function db_timestamp($tpl_name, &$tpl_timestamp, &$smarty_obj)  {

      $tpl_timestamp = time();
      return true;

  }

  function db_secure($tpl_name, &$smarty_obj)  {
      return true;
  }

  function db_trusted($tpl_name, &$smarty_obj)  {
  }
