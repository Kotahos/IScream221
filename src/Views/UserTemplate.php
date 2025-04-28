<?php 
namespace App\Views;

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
}