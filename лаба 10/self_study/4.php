<?php

class DatabaseConnectionException extends Exception {
    
    private $errorCode;
    private $errorInfo;


    public function __construct($message, $errorCode = null, $errorInfo = null, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->errorCode = $errorCode;
        $this->errorInfo = $errorInfo;
    }


    public function getErrorCode(){
        return $this->errorCode;
    }

    public function getErrorInfo(){
        return $this->errorInfo;
    }
}

try {
    $connection = new PDO('mysql:host=localhost;dbname=mydatabase', 'user', 'password');
} catch (PDOException $e) {
    throw new DatabaseConnectionException("Ошибка подключения к базе данных: " . $e->getMessage(), $e->getCode(), $e->errorInfo);
} catch (DatabaseConnectionException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
    if($e->getErrorCode()){
        echo "Код ошибки: " . $e->getErrorCode() . "\n";
    }
    if($e->getErrorInfo()){
        echo "Информация об ошибке: " . print_r($e->getErrorInfo(), true) . "\n";
    }
}
?>


