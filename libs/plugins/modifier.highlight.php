<?php 
/** 
* Highlights a text by searching a word in it. 
* by bimal Smarty Elite http://www.smarty.net/forums/viewtopic.php?p=58264
*/ 
function smarty_modifier_highlight(&$text='', $word='') 
{ 
   $new_text = $text; 
   if($word) 
   { 
      $word = ucwords($word); 
      $new_text = str_ireplace($word, "<span class='highlight'>{$word}</span>", $text); 
   } 
   return($new_text); 
} 
?>