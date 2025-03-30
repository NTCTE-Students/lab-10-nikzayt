<?php

class FileReadException extends Exception {
    
}

function readFile($filename) {
    if (!file_exists($filename)) {
        throw new FileReadException("Файл '$filename' не найден.");
    }

    if (!is_readable($filename)) {
        throw new FileReadException("Файл '$filename' не доступен для чтения.");
    }

    $contents = file_get_contents($filename);
    if ($contents === false) {
        throw new FileReadException("Ошибка при чтении файла '$filename'.");
    }
    return $contents;
}


try {
    $filename = 'my_file.txt'; 
    if(!file_exists($filename)){
        file_put_contents($filename, "test content");
    }

    $fileContents = readFile($filename);
    echo "Содержимое файла: " . $fileContents . "\n";
} catch (FileReadException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
} finally {
    
    if(file_exists($filename)){
        unlink($filename);
    }
}
?>


