<?php 
namespace App\Views;

use App\Config\Config;
use App\Views\BaseTemplate;

class UserTemplate extends BaseTemplate
{
    /*
        Формирование страницы "Вход пользователя"
    */
    public static function getUserTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Вход пользователя';
        $content = <<<HTML
        <main class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 15px; border: none;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="bg-danger bg-opacity-10 d-inline-flex p-3 rounded-circle mb-3">
                                    <i class="bi bi-box-arrow-in-right fs-1 text-danger"></i>
                                </div>
                                <h2 class="fw-bold mb-2" style="color: #d32f2f;">Вход в аккаунт</h2>
                                <p class="text-muted">Введите свои учетные данные</p>
                            </div>
        HTML;
        $content .= self::getFormLogin();
        $content .= "</div></div></div></div></main>";

        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    /* 
        Форма входа (логин, пароль)
    */
    public static function getFormLogin(): string {
        $html = <<<HTML
                <form action="/login" method="POST">
                    <!-- Логин -->
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label fw-semibold">
                            <i class="bi bi-person-fill me-2 text-secondary"></i>Логин или Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" name="username" class="form-control border-start-0 ps-1" 
                                   id="usernameInput" placeholder="Введите логин или email" required
                                   style="border-radius: 8px;">
                        </div>
                    </div>
                    
                    <!-- Пароль -->
                    <div class="mb-4">
                        <label for="passwordInput" class="form-label fw-semibold">
                            <i class="bi bi-lock-fill me-2 text-secondary"></i>Пароль
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-lock text-muted"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 ps-1" 
                                   id="passwordInput" placeholder="Введите пароль" required
                                   style="border-radius: 8px;">
                        </div>
                        <div class="text-end mt-2">
                            <a href="/forgot-password" class="text-decoration-none small" 
                               style="color: #6c757d; transition: color 0.2s ease;"
                               onmouseover="this.style.color='#d32f2f';"
                               onmouseout="this.style.color='#6c757d';">
                                Забыли пароль?
                            </a>
                        </div>
                    </div>
                    
                    <!-- Кнопка входа -->
                    <button type="submit" class="btn btn-danger w-100 py-2 mb-3 fw-bold" 
                            style="border-radius: 8px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(211, 47, 47, 0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Войти
                    </button>
                    
                    <!-- Ссылка на регистрацию -->
                    <div class="text-center pt-3">
                        <p class="text-muted mb-0">Еще нет аккаунта?</p>
                        <a href="/register" class="text-decoration-none fw-semibold" style="color: #d32f2f; transition: color 0.2s ease;"
                           onmouseover="this.style.color='#b71c1c';"
                           onmouseout="this.style.color='#d32f2f';">
                            <i class="bi bi-person-plus me-1"></i>Зарегистрироваться
                        </a>
                    </div>
                </form>
        HTML;
        return $html;
    }

    /**
     * Форма редактирования профиля
     */
    public static function getProfileForm(array $userData = []): string {
        $template = parent::getTemplate();
        $title = 'Редактирование профиля';
    
        $username = htmlspecialchars($userData['username'] ?? '');
        $email = htmlspecialchars($userData['email'] ?? '');
        $address = htmlspecialchars($userData['address'] ?? '');
        $phone = htmlspecialchars($userData['phone'] ?? '');
        $avatar = htmlspecialchars($userData['avatar'] ?? '/assets/images/default-avatar.png');
    
        $content = <<<HTML
        <main class="container">
            <div class="row justify-content-center align-items-start min-vh-100 py-5">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 15px; border: none;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="bg-danger bg-opacity-10 d-inline-flex p-3 rounded-circle mb-3">
                                    <i class="bi bi-person-gear fs-1 text-danger"></i>
                                </div>
                                <h2 class="fw-bold mb-2" style="color: #d32f2f;">Редактирование профиля</h2>
                                <p class="text-muted">Обновите свои данные</p>
                            </div>
                            
                            <form action="/profile" method="POST" enctype="multipart/form-data">
                                <!-- Имя пользователя -->
                                <div class="mb-3">
                                    <label for="usernameInput" class="form-label fw-semibold">
                                        <i class="bi bi-person-fill me-2 text-secondary"></i>Имя пользователя
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person text-muted"></i>
                                        </span>
                                        <input type="text" name="username" class="form-control border-start-0 ps-1" 
                                               id="usernameInput" value="{$username}" required
                                               style="border-radius: 8px;">
                                    </div>
                                </div>
                                
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label fw-semibold">
                                        <i class="bi bi-envelope-fill me-2 text-secondary"></i>Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope text-muted"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control border-start-0 ps-1" 
                                               id="emailInput" value="{$email}" required
                                               style="border-radius: 8px;">
                                    </div>
                                </div>
                                
                                <!-- Адрес -->
                                <div class="mb-3">
                                    <label for="addressInput" class="form-label fw-semibold">
                                        <i class="bi bi-geo-alt-fill me-2 text-secondary"></i>Адрес
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-geo-alt text-muted"></i>
                                        </span>
                                        <input type="text" name="address" class="form-control border-start-0 ps-1" 
                                               id="addressInput" value="{$address}"
                                               style="border-radius: 8px;">
                                    </div>
                                </div>
                                
                                <!-- Телефон -->
                                <div class="mb-4">
                                    <label for="phoneInput" class="form-label fw-semibold">
                                        <i class="bi bi-telephone-fill me-2 text-secondary"></i>Телефон
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-telephone text-muted"></i>
                                        </span>
                                        <input type="text" name="phone" class="form-control border-start-0 ps-1" 
                                               id="phoneInput" value="{$phone}"
                                               style="border-radius: 8px;">
                                    </div>
                                </div>
                                
                                <!-- Кнопка сохранения -->
                                <button type="submit" class="btn btn-danger w-100 py-2 fw-bold" 
                                        style="border-radius: 8px; transition: all 0.3s ease;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(211, 47, 47, 0.3)';"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-save me-2"></i>Сохранить изменения
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        HTML;
    
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    public static function getHistoryTemplate(?array $data): string {
        $template = parent::getTemplate();
        $title = 'История заказов';
    
        // Если нет данных
        if (!is_array($data) || empty($data)) {
            $content = <<<EMPTY
            <main class="container">
                <div class="row justify-content-center align-items-center min-vh-100">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-sm" style="border-radius: 15px; border: none;">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold mb-3" style="color: #d32f2f;">
                                        <i class="bi bi-clock-history me-2"></i>История заказов
                                    </h2>
                                    <p class="text-muted">У вас пока нет заказов</p>
                                </div>
                                <div class="text-center">
                                    <a href="/catalog" class="btn btn-danger py-2 px-4 fw-bold" 
                                       style="border-radius: 8px; transition: all 0.3s ease;"
                                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(211, 47, 47, 0.3)';"
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                        <i class="bi bi-cart me-2"></i>Перейти в каталог
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            EMPTY;
            return sprintf($template, $title, $content);
        }
    
        $content = <<<HTML
        <main class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm" style="border-radius: 15px; border: none;">
                        <div class="card-body p-4">
                            <div class="text-center mb-5">
                                <h2 class="fw-bold" style="color: #d32f2f;">
                                    <i class="bi bi-clock-history me-2"></i>История заказов
                                </h2>
                            </div>
                            
                            <div class="orders-list">
        HTML;
    
        foreach ($data as $row) {
            $orderDate = date("d.m.Y в H:i", strtotime($row['created']));
            $nameStatus = Config::getStatusName($row['status']);
            $colorStyle = Config::getStatusColor($row['status']);
            $orderSum = number_format($row['all_sum'], 0, '', ' ');
            
            $content .= <<<HTML
                                <div class="order-card mb-4 p-4" style="
                                    border-radius: 12px;
                                    background: #fff;
                                    border-left: 4px solid #d32f2f;
                                    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                                    transition: all 0.3s ease;
                                " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.12)';"
                                  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Заказ #{$row['id']}</h5>
                                        <span class="badge {$colorStyle} py-2 px-3" style="font-size: 0.9rem; border-radius: 8px;">{$nameStatus}</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between text-muted mb-2">
                                        <div>
                                            <i class="bi bi-calendar me-2"></i>
                                            <span>{$orderDate}</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-currency-ruble me-2"></i>
                                            <span class="fw-semibold" style="color: #212529;">{$orderSum} ₽</span>
                                        </div>
                                    </div>
                                    
                                    <div class="text-end mt-3">
                                        <a href="/order/{$row['id']}" class="btn btn-outline-danger btn-sm py-1 px-3" 
                                           style="border-radius: 8px; font-size: 0.85rem; transition: all 0.2s ease;"
                                           onmouseover="this.style.backgroundColor='#d32f2f'; this.style.color='white';"
                                           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#d32f2f';">
                                            Подробнее <i class="bi bi-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
            HTML;
        }
    
        $content .= <<<HTML
                            </div>
                            
                            <div class="text-center mt-4">
                                <a href="/catalog" class="btn btn-outline-danger py-2 px-4 fw-bold" 
                                   style="border-radius: 8px; transition: all 0.3s ease;"
                                   onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(211, 47, 47, 0.1)';"
                                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <i class="bi bi-arrow-left me-2"></i>Вернуться в каталог
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        HTML;
    
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }
}