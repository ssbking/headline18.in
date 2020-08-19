<?php session_start();
/* * ********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]org
*  All rights reserved
*
*  This script is part of the PHP Enter project. 
*  The PHP Enter project is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public License
*  as published by the Free Software Foundation; either version 2
*  of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
*  MA  02110-1301, USA.
*
*  This copyright notice MUST appear in all copies of the script!
* ********************************************************************** */
Header("Content-type: image/png");
$Width = 75;
$Height = 28;
$img = ImageCreateTrueColor($Width,$Height);
$bg = imagecolorallocate($img,255,255,255);
imagefill($img,0,0,$bg);
$randgrid = rand(3,11);
$grid = imagecolorallocate($img,255,255,255);
imagesetstyle($img,array($bg,$grid));
imagegrid($img,$Width,$Height,$randgrid,IMG_COLOR_STYLED);
$randangle = rand(0,0);
$randay = rand(22,24);
$randfnt = rand(22,24);
$font=getcwd()."/fonts/cour.ttf";
$white = imagecolorallocate($img,0,128,234);
$word = rand(1111,9999);
$where = imagettfbbox($randfnt,0,$font,$word);
$_SESSION['check'] = ($word);
imagettftext($img,22,$randangle,($Width - $where[4]) / 2,$randay,$white,$font,$word);
ImagePNG($img);
ImageDestroy($img);
/**
 * imagegrid()
 * 
 * @param mixed $image
 * @param mixed $w
 * @param mixed $h
 * @param mixed $s
 * @param mixed $color
 * @return
 */
function imagegrid($image,$w,$h,$s,$color) {
	for($iw = 1; $iw < $w / $s; $iw++) {
		imageline($image,$iw * $s,0,$iw * $s,$w,$color);
	}
	for($ih = 1; $ih < $h / $s; $ih++) {
		imageline($image,0,$ih * $s,$w,$ih * $s,$color);
	}
}
##############################
##captcha.php           BETA##
##############################
?>