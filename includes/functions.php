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
/**
 * enter_db_results()
 *
 * @return
 */
function enter_db_results()
{
    $id = htmlspecialchars((int)$_GET['id']);
    global $conn;
    $_query = sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM newser where idblog = '.$conn->qstr($id).' and (main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').') ORDER BY newsid DESC LIMIT %d,%d', SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit());
    $ad = $conn->Execute($_query);
    if (!$ad) {
        print $conn->ErrorMsg();
    } else {
        while (!$ad->EOF) {
            $_data[] = $ad->GetRowAssoc(false);
            $ad->MoveNext();
        }
    }
    $_query = "SELECT FOUND_ROWS() as total";
    $af = $conn->Execute($_query);
    if (!$ad) {
        print $conn->ErrorMsg();
    } else {
        $_row = $af->GetRowAssoc();
    }
    $total = $af->fields['total'];
    SmartyPaginate::setTotal($total);
    return @$_data;
    $ad->Close();
    $af->Close();
}
/**
 * enter_db_profile()
 *
 * @return
 */
function enter_db_profile()
{
    $id = htmlspecialchars((int)$_GET['id']);
    global $conn;
    $_query = sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM newser where userid = '.$conn->qstr($id).' and (main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').') ORDER BY newsid DESC LIMIT %d,%d', SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit());
    $ad = $conn->Execute($_query);
    if (!$ad) {
        print $conn->ErrorMsg();
    } else {
        while (!$ad->EOF) {
            $_data[] = $ad->GetRowAssoc(false);
            $ad->MoveNext();
        }
    }
    $_query = "SELECT FOUND_ROWS() as total";
    $af = $conn->Execute($_query);
    if (!$ad) {
        print $conn->ErrorMsg();
    } else {
        $_row = $af->GetRowAssoc();
    }
    $total = $af->fields['total'];
    SmartyPaginate::setTotal($total);
    return @$_data;
    $ad->Close();
    $af->Close();
}
/**
 * enter_db_search()
 *
 * @return
 */
function enter_db_search()
{
    $id = htmlspecialchars($_GET['q']);
    global $conn,$lang;
    if (strlen($id) < 3 || strlen($id) > 40) {
        echo "<center><font style='font-family:tahoma;'>$lang[170] <a href='javascript:history.go(-1)'>$lang[135]</a></font></center>";
        die();
    }
    $id = str_replace('%', '', $id);
    $id = substr($id, 0, 40);
    $_query = sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM newser WHERE (MATCH (title,shortdesc) AGAINST ('.$conn->qstr($id).' IN BOOLEAN MODE) or title = '.$conn->qstr($id).') and (main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').') LIMIT %d,%d', SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit());
    $ad = $conn->Execute($_query);
    if (!$ad) {
        print $conn->ErrorMsg();
    } else {
        while (!$ad->EOF) {
            $_data[] = $ad->GetRowAssoc(false);
            $ad->MoveNext();
        }
    }
    $_query = "SELECT FOUND_ROWS() as total";
    $ae = $conn->Execute($_query);
    if (!$ae) {
        print $conn->ErrorMsg();
    } else {
        $_row = $ae->GetRowAssoc();
    }
    $total = $ae->fields['total'];
    SmartyPaginate::setTotal($total);
    return @$_data;
    $ad->Close();
    $ae->Close();
}
/**
 * enter_function_gets()
 *
 * @param mixed $themes
 * @param string $data
 * @return
 */
function enter_function_gets($themes, $data = '')
{
    $len = strlen($themes);
    for ($i = 0; $i < $len; $i += 2) {
        $data .= chr(hexdec(substr($themes, $i, 2)));
    }
    return $data;
}
/**
 * enterProfilePic()
 *
 * @param mixed $image_source
 * @param mixed $file
 * @param mixed $xthumbnail
 * @param mixed $ythumbnail
 * @return
 */
function enterProfilePic($image_source, $file, $xthumbnail, $ythumbnail)
{
    global $lang;
    list($width_orig, $height_orig) = getimagesize($image_source);
    if ($width_orig > 2200 || $height_orig > 2200) {
        echo "<div class='errors'>$lang[191] <a href='link.php'>$lang[135]</a></div></div></div>";
        exit();
    }
    $tag = explode('.', $image_source);
    if (preg_match('/jpg|jpeg|JPG/', $tag[1])) {
        if (@$cimage = imagecreatefromjpeg($image_source) == true) {
            $cimage = imagecreatefromjpeg($image_source);
        }
    }
    if (preg_match('/png/', $tag[1])) {
        if (@$cimage = imagecreatefrompng($image_source) == true) {
            $cimage = imagecreatefrompng($image_source);
        }
    }
    if (preg_match('/gif/', $tag[1])) {
        if (@$cimage = imagecreatefromgif($image_source) == true) {
            $cimage = imagecreatefromgif($image_source);
        }
    }
    $ratio_orig = $width_orig / $height_orig;
    if ($xthumbnail / $ythumbnail > $ratio_orig) {
        $new_height = $xthumbnail / $ratio_orig;
        $new_width = $xthumbnail;
    } else {
        $new_width = $ythumbnail * $ratio_orig;
        $new_height = $ythumbnail;
    }
    $x_mid = $new_width / 2;
    $y_mid = $new_height / 2;
    $process = imagecreatetruecolor(round($new_width), round($new_height));
    imagecopyresampled($process, $cimage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
    if (@imagecopyresampled($process, $cimage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig)) {
    } else {
        echo "<div class='errors'>$lang[197]</div></div></div>";
        die();
    }
    $thumb = imagecreatetruecolor($xthumbnail, $ythumbnail);
    imagecopyresampled($thumb, $process, 0, 0, ($x_mid - ($xthumbnail / 2)), ($y_mid - ($ythumbnail / 2)), $xthumbnail, $ythumbnail, $xthumbnail, $ythumbnail);
    imagejpeg($thumb, $file, 85);
    return $thumb;
}
/**
 * enterThumb()
 *
 * @param mixed $image_source
 * @param mixed $file
 * @param mixed $xthumbnail
 * @param mixed $ythumbnail
 * @return
 */
function enterThumb($image_source, $file, $xthumbnail, $ythumbnail)
{
    global $lang;
    list($origx, $origy) = getimagesize($image_source);
    $tag = explode('.', $image_source);
    if (preg_match('/jpg|jpeg|JPG/', $tag[1])) {
        if (@$cimage = imagecreatefromjpeg($image_source) == true) {
            $cimage = imagecreatefromjpeg($image_source);
        }
    }
    if (preg_match('/png/', $tag[1])) {
        if (@$cimage = imagecreatefrompng($image_source) == true) {
            $cimage = imagecreatefrompng($image_source);
        }
    }
    if (preg_match('/gif/', $tag[1])) {
        if (@$cimage = imagecreatefromgif($image_source) == true) {
            $cimage = imagecreatefromgif($image_source);
        }
    }
    $ratio = $origx / $origy;
    if ($xthumbnail / $ythumbnail > $ratio) {
        $yheight = $xthumbnail / $ratio;
        $xwidth = $xthumbnail;
    } else {
        $xwidth = $ythumbnail * $ratio;
        $yheight = $ythumbnail;
    }
    $action = imagecreatetruecolor(round($xwidth), round($yheight));
    if (@imagecopyresampled($action, $cimage, 0, 0, 0, 0, $xwidth, $yheight, $origx, $origy)) {
    } else {
        echo "<div class='errors'>$lang[197]</div></div></div>";
        die();
    }
    $thumbnail = imagecreatetruecolor($xthumbnail, $ythumbnail);
    $xos = $xwidth / 2;
    $yos = $yheight / 2;
    imagecopyresampled($thumbnail, $action, 0, 0, ($xos - ($xthumbnail / 2)), ($yos - ($ythumbnail / 2)), $xthumbnail, $ythumbnail, $xthumbnail, $ythumbnail);
    imagejpeg($thumbnail, $file, 80);
    return $thumbnail;
}
/**
 * enterBlacklist()
 *
 * @param mixed $address
 * @param mixed $title
 * @param mixed $brief
 * @param mixed $longdesc
 * @param mixed $smarty
 * @return
 */
function enterBlacklist($address, $title, $brief, $longdesc, $smarty)
{
    $blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",".gzip",".rar",".tar"," ");
    foreach ($blacklist as $file) {
        if (preg_match("/$file\$/i", $_FILES['image']['name'])) {
            echo "<div class='info'>Error [2]</div></div></div>";
            $smarty->display('footer.php');
            die();
        }
    }
}

/**
 * enterBlacklister()
 *
 * @param mixed $title
 * @param mixed $brief
 * @param mixed $longdesc
 * @param mixed $smarty
 * @return
 */
function enterBlacklister($title, $brief, $longdesc, $smarty)
{
    $blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",".gzip",".rar",".tar"," ");
    foreach ($blacklist as $file) {
        if (preg_match("/$file\$/i", $_FILES['image']['name'])) {
            echo "<div class='info'>Error [4]</div></div></div>";
            $smarty->display('footer.php');
            die();
        }
    }
}
/**
 * enter_function_get()
 *
 * @param mixed $a
 * @param mixed $smarty
 * @return
 */
function enter_function_get($a, $smarty)
{
    return preg_replace(
        enter_function_gets('7e3c5c2f626f64793e7e69'),
        enter_function_gets('3c64697620636c6173733d2274656e20636f6c756d6e2063656e746572223e3c6120687265663d22687474703a2f2f7777772e706870656e7465722e6e6574223e506f776572656420627920706870456e7465722e6e65743c2f613e3c2f6469763e0d0a3c2f6469763e0d0a3c2f6469763e0d0a3c2f6469763e0d0a3c2f6469763e0d0a3c2f626f64793e0d0a'),
        $a
    );
}
/**
 * enterLogin()
 *
 * @param mixed $salt
 * @return
 */
function enterLogin($salt)
{
    $ss = new SecSession();
    $ss->check_browser = true;
    $ss->check_ip_blocks = 2;
    $ss->secure_word = $salt;
    $ss->regenerate_id = true;
    if (!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        @header('Location: auth.php?auth=5');
        die();
    }
}
/**
 * enterAdmin()
 *
 * @param mixed $salt
 * @return
 */
function enterAdmin($salt)
{
    $ss = new SecureSession();
    $ss->check_browser = true;
    $ss->check_ip_blocks = 2;
    $ss->secure_word = $salt;
    $ss->regenerate_id = true;
    if (!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: admin/signin.php');
        die();
    }
}
/**
 * enterUrlData()
 *
 * @param mixed $url
 * @return
 */
function enterUrlData($url)
{
    $result = false;
    $contents = enterUrlContents($url);
    if (isset($contents) && is_string($contents)) {
        $title = null;
        $metaTags = null;
        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);
        if (isset($match) && is_array($match) && count($match) > 0) {
            $title = strip_tags($match[1]);
        }
        preg_match_all('/<[\s]*meta[\s]*name="?'.'([^>"]*)"?[\s]*'.'[lang="]*[^>"]*["]*'.'[\s]*content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
        if (isset($match) && is_array($match) && count($match) == 3) {
            $originals = $match[0];
            $names = $match[1];
            $values = $match[2];
            if (count($originals) == count($names) && count($names) == count($values)) {
                $metaTags = array();
                for ($i = 0,$limiti = count($names); $i < $limiti; $i++) {
                    $metaname = strtolower($names[$i]);
                    $metaname = str_replace("'", '', $metaname);
                    $metaname = str_replace("/", '', $metaname);
                    $metaTags[$metaname] = array('html' => htmlentities($originals[$i]),'value' => $values[$i]);
                }
            }
        }
        if (sizeof($metaTags) == 0) {
            preg_match_all('/<[\s]*meta[\s]*content="?'.'([^>"]*)"?[\s]*'.'[lang="]*[^>"]*["]*'.'[\s]*name="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
            if (isset($match) && is_array($match) && count($match) == 3) {
                $originals = $match[0];
                $names = $match[2];
                $values = $match[1];
                if (count($originals) == count($names) && count($names) == count($values)) {
                    $metaTags = array();
                    for ($i = 0,$limiti = count($names); $i < $limiti; $i++) {
                        $metaname = strtolower($names[$i]);
                        $metaname = str_replace("'", '', $metaname);
                        $metaname = str_replace("/", '', $metaname);
                        $metaTags[$metaname] = array('html' => htmlentities($originals[$i]),'value' => $values[$i]);
                    }
                }
            }
        }
        $result = array('title' => $title,'metaTags' => $metaTags);
    }
    return $result;
}
/**
 * enterUrlContents()
 *
 * @param mixed $url
 * @param mixed $maximumRedirections
 * @param integer $currentRedirection
 * @return
 */
function enterUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
{
    $result = false;
    $contents = @file_get_contents($url);
    if (isset($contents) && is_string($contents)) {
        preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?'.'[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?'.'[\s]*[\/]?[\s]*>/si', $contents, $match);
        if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1) {
            if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections) {
                return enterUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
            }
            $result = false;
        } else {
            $result = $contents;
        }
    }
    return $contents;
}
