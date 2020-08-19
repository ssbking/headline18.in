<?php 
/* 
* Smarty plugin 
* ------------------------------------------------------------ 
* Type: modifier 
* Name: bbcode2html 
* Purpose: Converts BBCode style tags to HTML 
* Author: André Rabold 
* Version: 1.3c 
* Remarks: Notice that this function does not check for 
* correct syntax. Try not to use it with invalid 
* BBCode because this could lead to unexpected 
* results ;-) 
* It seems that this function ignores manual 
* line breaks. IMO this can be fixed by adding 
* '/\n/' => "<br>" to $preg 
* 
* What's new: - Fixed a bug with <li>...</li> tags (thanks 
* to Rob Schultz for pointing this out) 
* 
* Version 1.3b 
* - Added more support for phpBB2: 
* [list]...[/list:u] unordered lists 
* [list]...[/list:o] ordered lists 
* 
* Version 1.3 
* - added support for phpBB2 like tag identifier 
* like [b:b6a0cef7ea]This is bold[/b:b6a0cef7ea] 
* (thanks to Rob Schultz) 
* - added support for quotes within the quote tag 
* so [ quote="foo" ] bar[ /quote ] does work now 
* correctly 
* - removed str_replace functions 
* 
* Version 1.2 
* - now supports CSS classes: 
* ng_email (mailto links) 
* ng_url (www links) 
* ng_quote (quotes) 
* ng_quote_body (quotes) 
* ng_code (source code) 
* ng_list (html lists) 
* ng_list_item (list items) 
* - replaced slow ereg_replace() functions 
* - Alterned [quote] and [code] to use CSS classes 
* instead of HTML <blockquote />, <hr />, ... tags. 
* - Additional BBCode tags [list] and [*] to display 
* nice HTML lists. Example: 
*
*
first item 
*
second item 
*
third item 
*
* The [list] tag can have an additional parameter: 
* [list] unorderer list with bullets 
* [list=1] ordered list 1,2,3,4,... 
* [list=i] ordered list i,ii,iii,iv,... 
* [list=I] ordered list I,II,III,IV,... 
* [list=a] ordered list a,b,c,d,... 
* [list=A] ordered list A,B,C,D,... 
* - produces well-formed output 
* - cleaned up the code 
* ------------------------------------------------------------ 
*/ 
function smarty_modifier_bbcode2html($message) { 
$preg = array( 
// Font and text manipulation ( [color] [size] [font] [align] ) 
'/\[code(?::\w+)?\](.*?)\[\/code(?::\w+)?\]/si' => "<div class=\"justTop\">Code:<div class=\"prettyprint\">\\1</div></div>",
// [url] 
'/\[url(?::\w+)?\]www\.(.*?)\[\/url(?::\w+)?\]/si' => "<a href=\"http://www.\\1\" target=\"_blank\" class=\"ng_url\">\\1</a>", 
'/\[url(?::\w+)?\](.*?)\[\/url(?::\w+)?\]/si' => "<a href=\"\\1\" target=\"_blank\" class=\"ng_url\">\\1</a>", 
'/\[url=(.*?)(?::\w+)?\](.*?)\[\/url(?::\w+)?\]/si' => "<a href=\"\\1\" target=\"_blank\" class=\"ng_url\">\\2</a>",
'/\[b(?::\w+)?\](.*?)\[\/b(?::\w+)?\]/si' => "<b>\\1</b>", 
'/\[i(?::\w+)?\](.*?)\[\/i(?::\w+)?\]/si' => "<i>\\1</i>", 
'/\[u(?::\w+)?\](.*?)\[\/u(?::\w+)?\]/si' => "<u>\\1</u>",
'/\[quote(?::\w+)?\](.*?)\[\/quote(?::\w+)?\]/si' => "<blockquote>\\1</blockquote>", 
'/\[quote=(?:&|"|\')?(.*?)["\']?(?:&|"|\')?\](.*?)\[\/quote(?::\w+)?\]/si' => "<div class=\"ng_quote\">Quote \\1:<div class=\"ng_quote_body\">\\2</div></div>"
); 
$message = preg_replace(array_keys($preg), array_values($preg), $message); 
return $message; 
} 
?>