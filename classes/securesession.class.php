<?php

/*
  SecureSession class
  Written by Vagharshak Tozalakyan <vagh@armdex.com>
  Released under GNU Public License
*/

class SecSession
{
    // Include browser name in fingerprint?
    var $check_browser = true;

    // How many numbers from IP use in fingerprint?
    var $check_ip_blocks = 0;

    // Control word - any word you want.
    var $secure_word = 'SECURESTAFF';

    // Regenerate session ID to prevent fixation attacks?
    var $regenerate_id = true;

    // Call this when init session.
    function Open()
    {
        $_SESSION['ss_fprint'] = $this->_Fingprint();
        $this->_RegenerateId();
    }

    // Call this to check session.
    function Check()
    {
        $this->_RegenerateId();
        return (isset($_SESSION['ss_fprint']) && $_SESSION['ss_fprint'] == $this->_Fingprint());
    }

    // Internal function. Returns MD5 from fingerprint.
    function _Fingprint()
    {
        $fingprint = $this->secure_word;
        if ($this->check_browser) {
            $fingprint .= $_SERVER['HTTP_USER_AGENT'];
        }
        if ($this->check_ip_blocks) {
            $num_blocks = abs(intval($this->check_ip_blocks));
            if ($num_blocks > 4) {
                $num_blocks = 4;
            }
            $blocks = explode('.', $_SERVER['REMOTE_ADDR']);
            for ($i = 0; $i < $num_blocks; $i++) {
                $fingprint .= @$blocks[$i] . '.';
            }
        }
        return md5($fingprint);
    }

    // Internal function. Regenerates session ID if possible.
    function _RegenerateId()
    {
        if ($this->regenerate_id && function_exists('session_regenerate_id')) {
            if (version_compare(phpversion(), '5.1.0', '>=')) {
                @session_regenerate_id(true);
            } else {
                @session_regenerate_id();
            }
        }
    }
}

?>