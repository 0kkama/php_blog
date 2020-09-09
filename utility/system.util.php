<?php

function template (string $path, array $variables = []) : string {
    // $supaDupaFullPathToTemplate = "views/$path.php";
    $supaDupaFullPathToTemplate = "views/$path";
    extract($variables);
    ob_start();
    include($supaDupaFullPathToTemplate);
    return ob_get_clean();
}
