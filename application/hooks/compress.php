<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 05/11/14
 * Time: 06:29
 */
function compress(){
    $CI =& get_instance();
    $buffer = $CI->output->get_output();

    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s', // shorten multiple whitespace sequences
        '#(?://)?<!\[CDATA\[(.*?)(?://)?\]\]>#s' //leave CDATA alone
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        "//&lt;![CDATA[\n".'\1'."\n//]]>"
    );

    $buffer = preg_replace($search, $replace, $buffer);

    $CI->output->set_output($buffer);
    $CI->output->_display();
}
?>