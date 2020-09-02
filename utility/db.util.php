<?php
include_once ('utility/config.util.php');
    // создает новый объект соединения с БД или возвращает уже существующий
function makeCnnctToDB() : PDO {
    static $dbConnection;

    if($dbConnection === null){
    $dbConnection = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR,
        DB_USER,DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    return $dbConnection;
}
// подготавливает запрос и исполняет его. проверяет ошибки запроса. Возвращает объ. результат запроса
function makeQueryToDB(string $sql, array $params = []) : PDOStatement {
    $connection = makeCnnctToDB();
    $query = $connection->prepare($sql);
    $query->execute($params);
    checkQueryErr($query);
    return $query;
}
//
function checkQueryErr(PDOStatement $query) : bool {
    $errInfo = $query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE) {
        trigger_error($errInfo[2], E_USER_ERROR);
        exit();
        }
    return true;
}
// передает запрос и параметры методам PDO и возращает массив с данными
function getQuery(string $sql, array $params = [], int $fetchType = 1) : array {
    $query = makeQueryToDB($sql, $params);
    switch ($fetchType):
        case 1: return $query->fetchAll();
        case 2: return $query->fetch();
    endswitch;
        // return $query->fetchAll();
}

// switch ($key) {
//         case 1: $inputStr = trim(strip_tags($inputStr)); break;
//         case 2: $inputStr = trim(htmlspecialchars($inputStr)); break;
//         // case 2: $inputStr = trim($inputStr); break;
//     }
//     return $inputStr;
