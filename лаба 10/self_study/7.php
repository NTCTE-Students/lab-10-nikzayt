<?php

function processData($data) {
    try {
        if (!is_numeric($data)) {
            throw new InvalidArgumentException("Входные данные должны быть числами");
        }

        $result = 100 / $data;

        if ($result > 1000) {
            throw new RuntimeException("Результат слишком большой");
        }

        return $result;

    } catch (InvalidArgumentException | RuntimeException | DivisionByZeroException $e) {
        echo "Произошла ошибка: " . $e->getMessage() . PHP_EOL;
    
        return null; 
    }
}


$testData = [10, 0, "abc", 0.01];

foreach ($testData as $data) {
    echo "Обработка данных: " . $data . PHP_EOL;
    $result = processData($data);
    if ($result !== null) {
        echo "Результат: " . $result . PHP_EOL;
    }
    echo "--------------------" . PHP_EOL;
}

?>


