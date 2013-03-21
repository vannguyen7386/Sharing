<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function create_username_alias($str) {
    $str = mb_strtolower($str, 'UTF-8');

    $regs = array(
        '/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/u' => 'a',
        '/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/u' => 'e',
        '/(ì|í|ị|ỉ|ĩ)/u' => 'i',
        '/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/u' => 'o',
        '/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/u' => 'u',
        '/(ỳ|ý|ỵ|ỷ|ỹ)/u' => 'y',
        '/đ/u' => 'd'
    );

    foreach ($regs as $reg => $repl) {
        $str = preg_replace($reg, $repl, $str);
    }

    $str = preg_replace('/[^a-z0-9]+/u', '-', $str);

    return $str;
}

?>
