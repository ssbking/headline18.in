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
require ('libs/SmartyPaginate.class.php');
SmartyPaginate::connect();
SmartyPaginate::setLimit($paginate);
SmartyPaginate::setUrl('categories.php');
$smarty->caching = $caching;
$smarty->assign('newser',enter_db_results());
SmartyPaginate::assign($smarty);
$smarty->assign('categori',@$categori);
$smarty->assign('subcat',@$subcat);
$id = htmlspecialchars((int)$_GET['id']);
@$next = htmlspecialchars((int)$_GET['next']);
$cid = $id.$next;
$smarty->display('categories.php',$cid);
SmartyPaginate::reset();
$conn->Close();
######################################
##categories.php                BETA##
######################################
?>