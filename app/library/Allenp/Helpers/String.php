<?php namespace Allenp\Helpers;

use Andrew13\Helpers\String as AString;

class String extends AString {

    public static function slug($str, $separator = '-', $lowercase = FALSE)
    {
        if ($separator == 'dash') {
            $separator = '-';
        } else if ($separator == 'underscore') {
            $separator = '_';
        }

        $q_separator = preg_quote($separator);

        $trans = array(
            '&.+?;'                 => '',
            '[^a-z0-9 _-]'          => '',
            '\s+'                   => $separator,
            '('.$q_separator.')+'   => $separator
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#".$key."#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            $str = strtolower($str);
        }

        return trim($str, $separator);
    }
}
