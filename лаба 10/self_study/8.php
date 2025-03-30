<?php

class ValidationException extends Exception {
    public function errorMessage() {
        return 'Ошибка валидации: ' . $this->getMessage();
    }
}

class ShortPasswordException extends ValidationException {
    public function errorMessage() {
        return 'Пароль слишком короткий. Минимум 6 символов.';
    }
}

class InvalidEmailFormatException extends ValidationException {
    public function errorMessage() {
        return 'Неверный формат email.';
    }
}

class EmptyFieldException extends ValidationException {
    public function errorMessage() {
        return 'Все обязательные поля должны быть заполнены.';
    }
}

function validateRegistration($email, $password, $username) {
  
    if (empty($email) || empty($password) || empty($username)) {
        throw new EmptyFieldException();
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidEmailFormatException();
    }

    if (strlen($password) < 6) {
        throw new ShortPasswordException();
    }

    return "Регистрация успешна!";
}

try {
    echo validateRegistration('', '123456', 'user1');
} catch (ValidationException $e) {
    echo $e->errorMessage();
}

echo "\n";

try {
    echo validateRegistration('user@example.com', '123', 'user1');
} catch (ValidationException $e) {
    echo $e->errorMessage();
}

echo "\n"; 

try {
    echo validateRegistration('invalid-email', '123456', 'user1'); 
} catch (ValidationException $e) {
    echo $e->errorMessage();
}

echo "\n"; 

try {
    echo validateRegistration('user@example.com', '123456', 'user1'); 
} catch (ValidationException $e) {
    echo $e->errorMessage();
}
?>