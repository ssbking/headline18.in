<?php
/* * ********************************************************************
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
 * ********************************************************************** */
include('settings.php');
$ac = $conn->Execute('SELECT * FROM newser WHERE main <> '.$conn->qstr('4').' ORDER by newsid DESC LIMIT 20');
if (!$ac) {
    print $conn->ErrorMsg();
} else {
    while (!$ac->EOF) {
        $newser[] = $ac->fields;
        $ac->MoveNext();
    }
}
$smarty->caching = 1;
$smarty->assign('newser', @$newser);
$smarty->display('rss.php');
$conn->Close();
######################################
##rss.php                       BETA##
######################################
