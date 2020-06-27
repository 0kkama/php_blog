<?php
declare(strict_types=1);

function val (string $inputStr, int $key = 1) : string {
//    short-name function for simple strings validation
    $inputStr = trim($inputStr);
    switch ($key) {
        case 1: $inputStr = trim(strip_tags($inputStr)); break;
        case 2: $inputStr = trim(htmlspecialchars($inputStr)); break;
    }
    return $inputStr;
}

