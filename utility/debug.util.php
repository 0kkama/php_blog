<?php
declare(strict_types=1);
function err_catcher (int $errNo, string $errMsg, string $errFile, string $errLine) : void {
    if ( $errNo === E_USER_ERROR ) {
        // если ошибка сурьёзная
        echo 'We Sorry...';
        $msgStr = date('H:i:s') . " - $errNo - $errMsg in $errFile line:$errLine";
        error_log("$msgStr\n",3,'logs/errors/error '. date('d-m-Y') . '.log');
    } else {
        // если ошибка не такая сурьёзная
        echo 'Bad news, everyone!';
        $msgStr = date('H:i:s') . " - $errNo - $errMsg in $errFile line:$errLine";
        error_log("$msgStr\n",3,'logs/errors/errNotice '. date('d-m-Y') . '.log');
    }
}

function var_dump_pre($mixed = null) {
    echo '<pre>';
    var_dump($mixed);
    echo '</pre>';
    return null;
}
