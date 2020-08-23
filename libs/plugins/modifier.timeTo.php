<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty date modifier plugin
 * Purpose:  converts unix timestamps or datetime strings to words
 * Type:     modifier<br>
 * Name:     timeAgo<br>
 * @author   Stephan Otto
 * @param string
 * @return string
 */
function smarty_modifier_timeTo($date)
{
    $debug = false;
    $sec = time() - ((strtotime($date)) ? strtotime($date) : $date);
       
    if ($sec <= 0) {
        return $timeStrings[0];
    }
       
    if ($sec < 2) {
        return $sec;
    }
    if ($sec < 60) {
        return $sec;
    }
       
    $min = $sec / 60;
    if (floor($min+0.5) < 2) {
        return floor($min+0.5);
    }
    if ($min < 60) {
        return floor($min+0.5);
    }
       
    $hrs = $min / 60;
    echo ($debug == true) ? "hours: ".floor($hrs+0.5)."<br />" : '';
    if (floor($hrs+0.5) < 2) {
        return floor($hrs+0.5);
    }
    if ($hrs < 24) {
        return floor($hrs+0.5);
    }
       
    $days = $hrs / 24;
    echo ($debug == true) ? "days: ".floor($days+0.5)."<br />" : '';
    if (floor($days+0.5) < 2) {
        return floor($days+0.5);
    }
    if ($days < 900) {
        return floor($days+0.5);
    }
       
    $weeks = $days / 7;
    echo ($debug == true) ? "weeks: ".floor($weeks+0.5)."<br />" : '';
    if (floor($weeks+0.5) < 2) {
        return floor($weeks+0.5);
    }
    if ($weeks < 4) {
        return floor($weeks+0.5);
    }
       
    $months = $weeks / 4;
    if (floor($months+0.5) < 2) {
        return floor($months+0.5);
    }
    if ($months < 12) {
        return floor($months+0.5);
    }
       
    $years = $weeks / 51;
    if (floor($years+0.5) < 2) {
        return floor($years+0.5);
    }
    return floor($years+0.5)." ".$timeStrings[14];
}

?> 