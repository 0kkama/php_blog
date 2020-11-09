<?php
// ucfirst для не латинских символов
function my_mb_ucfirst(string $str) : string {
    $firstCh = mb_strtoupper(mb_substr($str, 0, 1));
    return $firstCh . mb_substr($str, 1);
}

// фуя приводит строку к виду: первая буква заглавная, остальные строчные
    function makeFrstLttrUp (string $str) : string {
        $str = mb_strtolower($str);
        $str = my_mb_ucfirst($str);
        return $str;
    }
