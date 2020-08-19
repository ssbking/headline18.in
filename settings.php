<?php
/**********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]net
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
************************************************************************/
$filename = 'admin/version.php';
if(!file_exists($filename)) {
 echo "<a href='install/index.php'><font style='color:#555555;font-family:verdana'>It seems to be script is not installed.</font></a>";
 die();
}
error_reporting(E_ALL & ~ E_STRICT & ~ E_NOTICE);
include ('admin/config.php');
include ('classes/adodb/adodb.inc.php');
$dbdriver = "mysqli";
######################################
#$ADODB_CACHE_DIR = 'db/ADODB_cache';#
######################################
$conn = ADONewConnection($dbdriver);
$conn->Connect($server,$user,$password,$database);
##############################
#$conn->debug = true;
#$ab = $conn->CacheExecute(3600, 'SELECT optionid, nameopt, valueopt, module, active FROM abcoption');
##############################
$ab = $conn->Execute('SELECT optionid, nameopt, valueopt, module, active FROM abcoption');
if(!$ab)
 print $conn->ErrorMsg();
else
 while(!$ab->EOF) {
  if($ab->fields['active'] == 2) {
   $startmenu[] = $ab->fields;
  }
  $option[$ab->fields[0]] = $ab->fields[2];
  $ab->MoveNext();
 }
$sitetitle = $option[1];
$metadesc = $option[2];
$keywords = $option[3];
$sitepath = $option[4];
$langs = $option[5];
$caching = $option[6];
$themes = $option[7];
$sitemail = $option[8];
$sitedisabled = $option[9];
$rewritemod = $option[10];
$toplinks = $option[11];
$frontext = $option[12];
$customheader = $option[13];
$signuprole = $option[14];
$signupapp = $option[15];
$newson = $option[16];
$newstext = $option[17];
$siteabout = $option[18];
$siteprivacy = $option[19];
$siteterms = $option[20];
$messaging = $option[21];
$maxposting = $option[22];
$editortrue = $option[23];
$paginate = $option[24];
$logoon = $option[25];
$maxtopic = $option[26];
$hottopic = $option[27];
$adsoffon = $option[28];
$senseup = $option[29];
$sensedown = $option[30];
$stopspam = $option[31];
$incitem = $option[32];
$keypublic = $option[33];
$slider = $option[35];
$efslide = $option[36];
$logotext = $option[50];
include ('libs/Smarty.class.php');
$smarty = new smarty();
$smarty->template_dir = 'themes/'.$themes;
$smarty->compile_dir = 'temp/templates_c';
$smarty->config_dir = 'temp/config';
$smarty->cache_dir = 'temp/cache';
require_once ("includes/functions.php");
require_once ('languages/lang_'.$langs.'.php');
$smarty->assign('lang',$lang);
$smarty->assign('sitetitle',$sitetitle);
$smarty->assign('keywords',$keywords);
$smarty->assign('metadesc',$metadesc);
$smarty->assign('sitepath',$sitepath);
$smarty->assign('langs',$langs);
$smarty->assign('themes',$themes);
$smarty->assign('rewritemod',$rewritemod);
$smarty->assign('frontext',$frontext);
$smarty->assign('customheader',$customheader);
$smarty->assign('toplinks',$toplinks);
$smarty->assign('newson',$newson);
$smarty->assign('newstext',$newstext);
$smarty->assign('siteabout',$siteabout);
$smarty->assign('siteprivacy',$siteprivacy);
$smarty->assign('siteterms',$siteterms);
$smarty->assign('editortrue',$editortrue);
$smarty->assign('paginate',$paginate);
$smarty->assign('logoon',$logoon);
$smarty->assign('hottopic',$hottopic);
$smarty->assign('maxtopic',$maxtopic);
$smarty->assign('adsoffon',$adsoffon);
$smarty->assign('senseup',$senseup);
$smarty->assign('sensedown',$sensedown);
$smarty->assign('keypublic',$keypublic);
$smarty->assign('slider',$slider);
$smarty->assign('efslide',$efslide);
$smarty->assign('logotext',$logotext);
if(isset($startmenu)) {
 $smarty->assign('startmenu',$startmenu);
}
$ab->Close();
if($sitedisabled == 1){
echo"<center><img src='themes/classic/styles/images/under.gif' /></center>";
die();
}
if ( !is_readable("themes/".$themes ."/main.php") ) { include ('includes/notfound.php'); die(); }
if (file_exists("install/index.php") or file_exists("install/index.php") or file_exists("install/install1.php") or file_exists("install/install2.php") or file_exists("install/install3.php") or file_exists("install/install4.php")){
    echo"<center style='color:red'>Please remove install directory from your server.</center>"; die(); 
}
######################################
##settings.php                  BETA##
######################################
?>