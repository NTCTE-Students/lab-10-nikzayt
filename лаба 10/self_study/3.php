<?php

class DivisionByZeroException extends Exception {
    public function __construct($message = "Деление на ноль", $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

function divide($dividend, $divisor) {
    if ($divisor == 0) {
        throw new DivisionByZeroException();
    }
    return $dividend / $divisor;
}

try {
    $result1 = divide(10, 2);
    echo "10 / 2 = " . $result1 . "\n";

    $result2 = divide(10, 0);
    echo "10 / 0 = " . $result2 . "\n"; 

} catch (DivisionByZeroException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}
?>

