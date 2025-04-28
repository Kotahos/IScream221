<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class RegisterTemplate extends BaseTemplate
{
    /*
        Формирование страницы "Регистрация" с иконками и анимациями
    */
    public static function getRegisterTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Регистрация нового пользователя';
        $content = <<<HTML
        <main class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 15px; border: none;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="bg-danger bg-opacity-10 d-inline-flex p-3 rounded-circle mb-3">
                                    <i class="bi bi-person-plus-fill fs-1 text-danger"></i>
                                </div>
                                <h2 class="fw-bold mb-2" style="color: #d32f2f;">Создать аккаунт</h2>
                                <p class="text-muted">Заполните форму для регистрации</p>
                            </div>
        HTML;
        $content .= self::getFormRegister();
        $content .= "</div></div></div></div></main>";

        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    public static function getVerifyTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Подтверждение нового пользователя';
        $content = <<<HTML
        <main class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg text-center" style="border-radius: 15px; border: none;">
                        <div class="card-body p-5">
                            <div class="bg-success bg-opacity-10 d-inline-flex p-3 rounded-circle mb-3">
                                <i class="bi bi-check-circle-fill fs-1 text-success"></i>
                            </div>
                            <h2 class="fw-bold mb-3" style="color: #d32f2f;">Регистрация завершена!</h2>
                            <p class="mb-4"><i class="bi bi-envelope-check me-2"></i>Ваш email успешно подтвержден</p>
                            <a href="/login" class="btn btn-danger w-100 py-2" style="border-radius: 8px;">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Войти в аккаунт
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        HTML;

        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    /* 
        Форма регистрации с иконками и анимацией кнопки
    */
    public static function getFormRegister(): string {
        $html = <<<HTML
                <form action="/register" method="POST">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label fw-semibold">
                            <i class="bi bi-person-fill me-2 text-secondary"></i>Имя пользователя
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" name="username" class="form-control border-start-0 ps-1" id="nameInput" required
                                   placeholder="Введите ваше имя" style="border-radius: 8px;">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="emailInput" class="form-label fw-semibold">
                            <i class="bi bi-envelope-fill me-2 text-secondary"></i>Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-envelope text-muted"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0 ps-1" id="emailInput"
                                   placeholder="example@mail.com" style="border-radius: 8px;">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label fw-semibold">
                            <i class="bi bi-lock-fill me-2 text-secondary"></i>Пароль
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-lock text-muted"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 ps-1" id="passwordInput"
                                   placeholder="Не менее 6 символов" style="border-radius: 8px;">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="confirm_passwordInput" class="form-label fw-semibold">
                            <i class="bi bi-lock-fill me-2 text-secondary"></i>Подтверждение пароля
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-shield-lock text-muted"></i>
                            </span>
                            <input type="password" name="confirm_password" class="form-control border-start-0 ps-1" id="confirm_passwordInput"
                                   placeholder="Повторите пароль" style="border-radius: 8px;">
                        </div>
                    </div>      
                    
                    <button type="submit" class="btn btn-danger w-100 py-2 mb-3 fw-bold" 
                            style="border-radius: 8px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(220, 53, 69, 0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        <i class="bi bi-person-plus me-2"></i>Зарегистрироваться
                    </button>
                    
                    <div class="text-center pt-3">
                        <p class="text-muted mb-0">Уже есть аккаунт?</p>
                        <a href="/login" class="text-decoration-none fw-semibold" style="color: #d32f2f; transition: color 0.2s ease;"
                           onmouseover="this.style.color='#b71c1c';"
                           onmouseout="this.style.color='#d32f2f';">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Войти в систему
                        </a>
                    </div>
                </form>
        HTML;
        return $html;
    }
}