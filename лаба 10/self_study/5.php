<?php

function logException(Exception $e) {
    $logFilePath = 'error.log';
    $logMessage =  date('Y-m-d H:i:s') . " - " . get_class($e) . ": " . $e->getMessage() . " в файле " . $e->getFile() . " на строке " . $e->getLine() . "\n";
    $logMessage .= $e->getTraceAsString() . "\n"; 

file_put_contents($logFilePath, $logMessage, FILE_APPEND | LOCK_EX); 
}


try {
    $file = fopen('nonexistent_file.txt', 'r');
    if (!$file) {
        throw new Exception('Не удалось открыть файл');
    }
    fclose($file);

} catch (Exception $e) {
    logException($e);
    echo "Произошла ошибка, записано в файл error.log\n";
}


?>


