<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class OrderTemplate extends BaseTemplate
{
    /*
        Формирование страницы "Создание заказа"
    */
    public static function getOrderTemplate(?array $products, float $all_sum): string {
        $template = parent::getTemplate();
        $title = 'Оформление заказа';
        $content = <<<HTML
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <style>
                .order-container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .cart-header {
                    background-color: #f8f9fa;
                    border-bottom: 1px solid #eaeaea;
                    padding: 15px 20px;
                    border-radius: 8px 8px 0 0;
                }
                .cart-item {
                    border-bottom: 1px solid #eee;
                    padding: 15px 0;
                    transition: all 0.3s ease;
                }
                .cart-item:hover {
                    background-color: #f9f9f9;
                }
                .item-price {
                    font-weight: 600;
                    color: #d32f2f;
                }
                .total-sum {
                    font-size: 1.2rem;
                    font-weight: 700;
                    color: #d32f2f;
                }
                .btn-checkout {
                    background-color: #d32f2f;
                    border: none;
                    padding: 12px 30px;
                    font-size: 1.1rem;
                    transition: all 0.3s ease;
                }
                .btn-checkout:hover {
                    background-color: #b71c1c;
                    transform: translateY(-2px);
                }
                .delivery-form {
                    background-color: #f8f9fa;
                    border-radius: 8px;
                    padding: 25px;
                    margin-top: 30px;
                }
                .form-control:focus {
                    border-color: #d32f2f;
                    box-shadow: 0 0 0 0.25rem rgba(211, 47, 47, 0.25);
                }
                .empty-cart {
                    text-align: center;
                    padding: 50px 0;
                    color: #6c757d;
                }
                .remove-btn {
                    color: #dc3545;
                    background: none;
                    border: none;
                    cursor: pointer;
                    transition: all 0.2s ease;
                }
                .remove-btn:hover {
                    color: #b02a37;
                    transform: scale(1.1);
                }
                .quantity-control {
                    display: flex;
                    align-items: center;
                }
                .quantity-btn {
                    width: 30px;
                    height: 30px;
                    border: 1px solid #dee2e6;
                    background: #f8f9fa;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                }
                .quantity-input {
                    width: 50px;
                    text-align: center;
                    border: 1px solid #dee2e6;
                    margin: 0 5px;
                }
                .cart-section {
                    margin-top: 50px;
                }
            </style>
        </head>
        <body>
        <main class="order-container">
            <h1 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Оформление заказа</h1>
            
            <div class="cart-section">
                <div class="card mb-4">
                    <div class="cart-header">
                        <h3 class="mb-0"><i class="fas fa-boxes me-2"></i>Ваши товары</h3>
                    </div>
                    <div class="card-body p-0">
        HTML;
        
        $content .= self::getProductList($products);
        $content .= self::getSummaryInfo($all_sum);
        
        $content .= <<<HTML
                    </div>
                </div>
            </div>
            
            <div class="delivery-form">
                <h3 class="mb-4"><i class="fas fa-truck me-2"></i>Данные для доставки</h3>
                <form action="/order" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fioInput" class="form-label">ФИО *</label>
                            <input type="text" name="fio" class="form-control" id="fioInput" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phoneInput" class="form-label">Телефон *</label>
                            <input type="tel" name="phone" class="form-control" id="phoneInput" required>
                        </div>
                        <div class="col-12">
                            <label for="addressInput" class="form-label">Адрес доставки *</label>
                            <input type="text" name="address" class="form-control" id="addressInput" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="emailInput">
                        </div>
                        <div class="col-md-6">
                            <label for="commentInput" class="form-label">Комментарий к заказу</label>
                            <input type="text" name="comment" class="form-control" id="commentInput">
                        </div>
                    </div>
            
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-checkout btn-lg">
                            <i class="fas fa-check-circle me-2"></i>Подтвердить заказ
                        </button>
                    </div>
                </form>
            </div>
        </main>
        
        <script>
            // Обработчики для кнопок изменения количества
            document.querySelectorAll('.quantity-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.parentNode.querySelector('.quantity-input');
                    let value = parseInt(input.value);
                    
                    if (this.classList.contains('plus')) {
                        value++;
                    } else if (this.classList.contains('minus') && value > 1) {
                        value--;
                    }
                    
                    input.value = value;
                    // Здесь можно добавить AJAX запрос для обновления количества на сервере
                });
            });
            
            // Обработчики для кнопок удаления
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Здесь можно добавить AJAX запрос для удаления товара
                    this.closest('.cart-item').remove();
                });
            });
        </script>
        </body>
        </html>
        HTML;

        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    /*
        Отображение списка товаров заказа
    */
    public static function getProductList(?array $products): string {
        if (empty($products)) {
            return <<<HTML
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h4>Ваша корзина пуста</h4>
                    <p class="text-muted">Добавьте товары, чтобы продолжить оформление заказа</p>
                </div>
            HTML;
        }

        $content = '';
        foreach ($products as $product) {
            $name = htmlspecialchars($product['name']);
            $price = number_format($product['price'], 2, '.', ' ');
            $quantity = $product['quantity'];
            $sum = number_format($price * $quantity, 2, '.', ' ');

            $content .= <<<HTML
                <div class="cart-item px-4">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h5 class="mb-1">{$name}</h5>
                        </div>
                        <div class="col-md-3">
                            <div class="quantity-control">
                                <button class="quantity-btn minus" data-id="{$product['id']}">-</button>
                                <input type="text" class="quantity-input" value="{$quantity}" data-id="{$product['id']}">
                                <button class="quantity-btn plus" data-id="{$product['id']}">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <span class="item-price">{$sum} ₽</span>
                        </div>
                        <div class="col-md-2 text-end">
                            <button class="remove-btn" data-id="{$product['id']}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            HTML;
        }
        return $content;
    }

    /*
        Общие итоги под списком товаров заказа
    */
    public static function getSummaryInfo(float $all_sum): string {
        $all_sum_formatted = number_format($all_sum, 2, '.', ' ');
        
        if ($all_sum == 0) {
            return '';
        }

        return <<<HTML
            <div class="px-4 py-3 bg-light">
                <div class="row align-items-center">
                    <div class="col-md-7 text-end">
                        <h4 class="mb-0">Итого к оплате:</h4>
                    </div>
                    <div class="col-md-3 text-end">
                        <h4 class="mb-0 total-sum">{$all_sum_formatted} ₽</h4>
                    </div>
                    <div class="col-md-2 text-end">
                        <form action="/basket_clear" method="POST">
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash me-1"></i> Очистить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        HTML;
    }
}