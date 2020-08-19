<?php session_start();
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
include ('settings.php');
$name = htmlspecialchars($_GET['name']);
$cat = htmlspecialchars($_GET['cat']);
$ac = $conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if(!$ac)
 print $conn->ErrorMsg();
else
 while(!$ac->EOF) {
  if($ac->fields['cord'] == 0) {
   $categori[] = $ac->fields;
  } else {
   $subcat[] = $ac->fields;
  }
  $ac->MoveNext();
 }
$ad = $conn->Execute('(SELECT * FROM newser WHERE univer = '.$conn->qstr($name).' and (main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').') LIMIT 1) UNION (SELECT * FROM newser WHERE idblog = '.$conn->qstr($cat).' and (main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').') ORDER BY hits LIMIT 5)');
if(!$ad)
 print $conn->ErrorMsg();
else
 while(!$ad->EOF) {
  if($ad->fields['univer'] == $name) {
   $main = $ad->fields['main'];
   $helper = $ad->fields['helper'];
   $idblog = $ad->fields['idblog'];
   $userid = $ad->fields['userid'];
   $date = $ad->fields['date'];
   $date =  date('c', strtotime($date));
   $newser[] = $ad->fields;
   } else {
   $similar[] = $ad->fields;
  }
  $ad->MoveNext();
 }
$ae = $conn->Execute('SELECT * FROM reviews WHERE comrev = '.$conn->qstr($name).' ORDER BY revid DESC LIMIT 4');
if(!$ae)
 print $conn->ErrorMsg();
else
 while(!$ae->EOF) {
  $reviews[] = $ae->fields;
  $ae->MoveNext();
 }
$af = $conn->Execute('SELECT * FROM users WHERE usid = '.$conn->qstr($userid).' LIMIT 1');
if(!$af)
 print $conn->ErrorMsg();
else
 while(!$af->EOF) {
  $profile[] = $af->fields;
  $af->MoveNext();
 }
if(@$_SESSION['hits'] <> $name.$_SERVER['SERVER_NAME']) {
 $ag = $conn->Prepare('UPDATE newser SET hits = hits +  '.$conn->qstr('1').' WHERE univer = '.$conn->qstr($name).'');
 if($conn->Execute($ag) === false) {
  print $conn->ErrorMsg();
 }
}
$_SESSION['hits'] = $name.$_SERVER['SERVER_NAME'];
$rand = rand(100,900);
$smarty->caching = $caching;
$smarty->assign('rand',$rand);
$smarty->assign('incname',$name);
$smarty->assign('categori',@$categori);
$smarty->assign('subcat',@$subcat);
$smarty->assign('newser',$newser);
$smarty->assign('similar',@$similar);
$smarty->assign('helper',@$helper);
$smarty->assign('idblog',@$idblog);
$smarty->assign('reviews',@$reviews);
$smarty->assign('profile',@$profile);
$smarty->assign('date',@$date);
$smarty->display('news.php',$name);
$conn->Close();
######################################
##news.php                      BETA##
######################################
?>