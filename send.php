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
include ('settings.php');
if(get_magic_quotes_gpc()) {
 $rating = stripslashes(htmlspecialchars((int)$_POST['rating']));
 $id = stripslashes(htmlspecialchars((int)$_POST['id']));
} else {
 $rating = htmlspecialchars((int)$_POST['rating']);
 $id = htmlspecialchars((int)$_POST['id']);
}
if(isset($_COOKIE['rateds'.$id])) {
 echo "$lang[164]";
} else {
 $ac = $conn->Execute('SELECT * FROM newser WHERE newsid = '.$conn->qstr($id).' LIMIT 1');
 if(!$ac)
  print $conn->ErrorMsg();
 else
  while(!$ac->EOF) {
   if($rating > 5 || $rating < 1) {
    echo "Rating can't be below 1 or more than 5";
   }
   setcookie("rateds".$id,$id,time() + 60 * 60 * 24 * 365);
   $total_ratings = $ac->fields['total_ratings'];
   $total_rating = $ac->fields['total_rating'];
   $current_rating = $ac->fields['rating'];
   $new_total_rating = $total_rating + $rating;
   $new_total_ratings = $total_ratings + 1;
   $new_rating = $new_total_rating / $new_total_ratings;
   $sql = $conn->Prepare('UPDATE newser SET total_rating = '.$conn->qstr($new_total_rating).' WHERE newsid = '.$conn->qstr($id).' LIMIT 1');
   if($conn->Execute($sql) === false) {
    print '<div class="error">'.$conn->ErrorMsg().'</div>';
   }
   $sql2 = $conn->Prepare('UPDATE newser SET rating = '.$conn->qstr($new_rating).' WHERE newsid = '.$conn->qstr($id).' LIMIT 1');
   if($conn->Execute($sql2) === false) {
    print '<div class="error">'.$conn->ErrorMsg().'</div>';
   }
   $sql3 = $conn->Prepare('UPDATE newser SET total_ratings = '.$conn->qstr($new_total_ratings).' WHERE newsid = '.$conn->qstr($id).' LIMIT 1');
   if($conn->Execute($sql3) === false) {
    print '<div class="error">'.$conn->ErrorMsg().'</div>';
   }
   echo "$lang[165]";
   $ac->MoveNext();
  }
}
$conn->Close();
######################################
##send.php                      BETA##
######################################
?>