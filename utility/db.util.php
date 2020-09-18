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
function getQuery(string $sql, array $params = [], string $fetchType = 'all') : array {
    $query = makeQueryToDB($sql, $params);
        $result = [];

    switch ($fetchType):
        // разобраться с ошибкой в случае неверного запроса
        case 'all': $result = $query->fetchAll(); break;
        case 'one': $result = $query->fetch(); break;
    endswitch;

        if (is_array($result)) {
            return $result;
        } else {
            return [];
        }
    // switch ($fetchType):
    //     // разобраться с ошибкой в случае неверного запроса
    //     case 'all': return (array) $query->fetchAll(); break;
    //     case 'one': return (array) $query->fetch(); break;
    // endswitch;
}


