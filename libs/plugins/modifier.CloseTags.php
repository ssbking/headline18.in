<?php /*

Author: dima.exe <dima [dot] exe [at] gmail [dot] com>

	Additional Programming: Gunnar Tillmann, 
	http://www.gunnart.de?p=353
	März 2008
	Einige Fehlerkorrekturen 
	<del> und andere Tags wurden nicht geschlossen
	HTML-Tags in Großbuchstaben nicht beachtet...

Example usage:

code:

$smarty = new Smarty;
$smarty->assign('string', '<b><i>This is test string</i></b>.');
template:

{$string|truncate:10|CloseTags}
truncate output: "<b><i>This"

CloseTags output: "<b><i>This</i></b>"

*/

/**
* Smarty plugin
*
* @package Smarty
* @subpackage plugins
*/

/**
* Smarty close all unclosed xhtml tags
*
* Type:   modifier<br>
* Name:   CloseTags<br>
*
* @param  string
* @return string
*/

function smarty_modifier_CloseTags($string) {

	// GUNNAR: Andere Vorgehensweise
	$tags = 'a|b|p|i|u|h1|h2|h3|h4|h5|h6|em|strong|code|pre|del|font|span|div|center|table|tr|td|th|form|ul|ol|li|caption|small|dd|dl|dt|fieldset|option|select'; 

	// match opened tags
	//if(preg_match_all('/<([a-z\:\-]+)[^\/]>/', $string, $start_tags)){
	if(preg_match_all('/<('.$tags.')[^\/>]*>/i', $string, $start_tags)){ // <-- GUNNAR
		$start_tags = $start_tags[1];
	
		// match closed tags
		//if(preg_match_all('/<\/([a-z]+)>/', $string, $end_tags)){
		if(preg_match_all('/<\/('.$tags.')>/i', $string, $end_tags)){ // <-- GUNNAR
			$complete_tags = array();
			$end_tags = $end_tags[1];
	
			foreach($start_tags as $key => $val){   
				$posb = array_search($val, $end_tags);
				if(is_integer($posb)){
					unset($end_tags[$posb]);
				} else {
					$complete_tags[] = $val;
				}
			}

		} else {

			$complete_tags = $start_tags;
		}

		$complete_tags = array_reverse($complete_tags);

		for($i = 0; $i < count($complete_tags); $i++){
			$string .= '</' . $complete_tags[$i] . '>';
		}
	}
	return $string;
}
?>