<?php

class ValidationException extends Exception {}

function isValidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("Неверный формат email-адреса: $email");
    }
    return true;
}


try {
    $email = "test@example.com";
    isValidEmail($email);
    echo "Email '$email' корректен.\n";


    $email = "invalid-email";
    isValidEmail($email);
    echo "Email '$email' корректен.\n";
} catch (ValidationException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

?>
