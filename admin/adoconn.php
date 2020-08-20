<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('../classes/adodb/adodb.inc.php');
include('config.php');
$dbdriver = "mysqli";
##$ADODB_CACHE_DIR = '../db/ADODB_cache';
$conn = ADONewConnection($dbdriver);
$conn->Connect($server, $user, $password, $database);
########$conn->debug = true;
$recordSet = $conn->Execute('SELECT optionid, nameopt, valueopt, module, active FROM abcoption');
if (!$recordSet) {
    print $conn->ErrorMsg();
} else {
    while (!$recordSet->EOF) {
        if ($recordSet->fields['module'] == 1) {
            $arr[] = $recordSet->fields;
        }
        $option[$recordSet->fields[0]] = $recordSet->fields[2];
        $recordSet->MoveNext();
    }
}
$sitetitle = $option[1];
$metadesc = $option[2];
$keywords = $option[3];
$sitepath = $option[4];
$language = $option[5];
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
/**************************************
* Revision: v.beta
***************************************/
