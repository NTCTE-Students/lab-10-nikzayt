<?php
class ShopException extends Exception {
    public function errorMessage() {
        return 'Ошибка магазина: ' . $this->getMessage();
    }
}

class InsufficientFundsException extends ShopException {
    public function errorMessage() {
        return 'Ошибка: недостаточно средств на счете. ' . $this->getMessage();
    }
}

class ProductNotFoundException extends ShopException {
    public function errorMessage() {
        return 'Ошибка: товар не найден. ' . $this->getMessage();
    }
}

function purchaseProduct($productId, $userBalance) {
  
    $products = [
        1 => ['name' => 'Товар 1', 'price' => 100],
        2 => ['name' => 'Товар 2', 'price' => 150],
    ];

    if (!isset($products[$productId])) {
        throw new ProductNotFoundException("ID товара: {$productId}");
    }

    if ($userBalance < $products[$productId]['price']) {
        throw new InsufficientFundsException("Цена товара: " . $products[$productId]['price']);
    }

    return "Покупка успешна: " . $products[$productId]['name'];
}

try {
    echo purchaseProduct(3, 50); 
} catch (ShopException $e) {
    echo $e->errorMessage();
}

try {
    echo purchaseProduct(1, 50);
} catch (ShopException $e) {
    echo $e->errorMessage();
}

try {
    echo purchaseProduct(1, 150); 
} catch (ShopException $e) {
    echo $e->errorMessage();
}
?>
