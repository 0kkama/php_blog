<?php
    // declare(strict_types=1);
// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
    include_once ('utility/debug.util.php');
    set_error_handler('err_catcher');
    include_once ('utility/db.util.php');
    include_once ('utility/validat.util.php');
    include_once ('utility/logs.util.php');
    include_once ('utility/arr.util.php');

    include_once ('model/art.mod.php');
    include_once ('model/users.mod.php');
    include_once ('model/category.mod.php');

