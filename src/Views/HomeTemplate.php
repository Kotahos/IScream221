<?php 

namespace App\Views;

use App\Views\BaseTemplate;

class HomeTemplate extends BaseTemplate
{
    public static function getTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Gelato Paradise - Премиальное мороженое';
        $content = <<<HTML
        <style>
            /* Переменные дизайна */
            :root {
                --primary: #ff6b9d;
                --secondary: #6a5af9;
                --accent: #4ecdc4;
                --dark: #2d3436;
                --light: #f7f9fc;
                --gradient: linear-gradient(135deg, #ff6b9d 0%, #6a5af9 100%);
                --shadow: 0 8px 30px rgba(0,0,0,0.12);
                --radius: 20px;
            }

            /* Базовые стили */
            body {
                font-family: 'Segoe UI', system-ui, sans-serif;
                margin: 0;
                padding: 0;
                background: var(--light);
                color: var(--dark);
                overflow-x: hidden;
            }

            /* Анимации */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }

            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            /* Стиль карусели */
            .carousel-section {
                padding: 4rem 0 2rem;
                position: relative;
                overflow: hidden;
            }

            .carousel-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 100%;
                background: var(--gradient);
                opacity: 0.1;
                z-index: -1;
            }

            .carousel-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }

            .carousel-inner {
                height: 70vh;
                border-radius: var(--radius);
                overflow: hidden;
                box-shadow: var(--shadow);
                position: relative;
            }

            .carousel-item {
                position: relative;
                height: 100%;
                transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .carousel-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: brightness(0.9);
                transition: transform 0.8s ease;
            }

            .carousel-item:hover img {
                transform: scale(1.05);
            }

            .carousel-caption {
                position: absolute;
                bottom: 20%;
                left: 10%;
                text-align: left;
                color: white;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
                animation: fadeInUp 1s ease;
            }

            .carousel-caption h2 {
                font-size: 3.5rem;
                margin: 0 0 1rem;
                background: linear-gradient(45deg, #fff, #ffd6e7);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: 800;
            }

            .carousel-caption p {
                font-size: 1.3rem;
                margin: 0;
                opacity: 0.9;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 60px;
                height: 60px;
                background: rgba(255,255,255,0.2);
                border-radius: 50%;
                backdrop-filter: blur(10px);
                top: 50%;
                transform: translateY(-50%);
                margin: 0 2rem;
                transition: all 0.3s ease;
            }

            .carousel-control-prev:hover,
            .carousel-control-next:hover {
                background: rgba(255,255,255,0.3);
                transform: translateY(-50%) scale(1.1);
            }

            /* Стиль основного контента */
            .text-section {
                padding: 6rem 2rem;
                position: relative;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 3rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            .feature-card {
                background: white;
                padding: 3rem 2rem;
                border-radius: var(--radius);
                text-align: center;
                box-shadow: var(--shadow);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                opacity: 0;
                transform: translateY(30px);
            }

            .feature-card.animated {
                animation: fadeInUp 0.8s ease forwards;
            }

            .feature-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: var(--gradient);
                transform: scaleX(0);
                transition: transform 0.4s ease;
            }

            .feature-card:hover {
                transform: translateY(-10px);
            }

            .feature-card:hover::before {
                transform: scaleX(1);
            }

            .feature-icon {
                width: 80px;
                height: 80px;
                margin: 0 auto 1.5rem;
                background: var(--gradient);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: white;
                animation: float 3s ease-in-out infinite;
            }

            .feature-card h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
                color: var(--dark);
                font-weight: 700;
            }

            .feature-card p {
                color: #666;
                line-height: 1.7;
                font-size: 1rem;
            }

            /* Стиль призыва к действию */
            .cta-section {
                background: var(--gradient);
                padding: 5rem 2rem;
                text-align: center;
                color: white;
                position: relative;
                overflow: hidden;
            }

            .cta-section::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
                transform: rotate(45deg);
                animation: gradientShift 8s ease infinite;
            }

            .cta-content {
                position: relative;
                z-index: 2;
                max-width: 600px;
                margin: 0 auto;
            }

            .cta-content h2 {
                font-size: 3rem;
                margin-bottom: 1.5rem;
                font-weight: 800;
            }

            .cta-content p {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }

            .cta-button {
                display: inline-block;
                padding: 1.2rem 3rem;
                background: white;
                color: var(--primary);
                text-decoration: none;
                border-radius: 50px;
                font-weight: 700;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                animation: pulse 2s ease-in-out infinite;
            }

            .cta-button:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            }

            /* Адаптивность */
            @media (max-width: 768px) {
                .carousel-inner {
                    height: 50vh;
                }
                
                .carousel-caption h2 {
                    font-size: 2rem;
                }
                
                .carousel-caption p {
                    font-size: 1rem;
                }
                
                .features-grid {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }
                
                .cta-content h2 {
                    font-size: 2rem;
                }
                
                .carousel-control-prev,
                .carousel-control-next {
                    margin: 0 1rem;
                    width: 50px;
                    height: 50px;
                }
            }

            /* Дополнительные декоративные элементы */
            .floating-elements {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 1;
            }

            .floating-element {
                position: absolute;
                font-size: 2rem;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .floating-element:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
            .floating-element:nth-child(2) { top: 20%; right: 10%; animation-delay: 1s; }
            .floating-element:nth-child(3) { bottom: 30%; left: 15%; animation-delay: 2s; }
            .floating-element:nth-child(4) { bottom: 20%; right: 5%; animation-delay: 3s; }
        </style>

        <!-- Карусель с улучшенным дизайном -->
        <section class="carousel-section">
            <div class="floating-elements">
                <div class="floating-element">🍦</div>
                <div class="floating-element">🍨</div>
                <div class="floating-element">🧊</div>
                <div class="floating-element">✨</div>
            </div>
            
            <div class="carousel-container">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./assets/images/1.png" class="d-block w-100" alt="Мороженое ванильное">
                            <div class="carousel-caption">
                                <h2>Нежное Ванильное</h2>
                                <p>Тающее во рту наслаждение с натуральной ванилью</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/images/2.png" class="d-block w-100" alt="Шоколадное мороженое">
                            <div class="carousel-caption">
                                <h2>Богатый Шоколад</h2>
                                <p>Премиальный бельгийский шоколад в каждой ложке</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/images/3.png" class="d-block w-100" alt="Фруктовое мороженое">
                            <div class="carousel-caption">
                                <h2>Фруктовый Микс</h2>
                                <p>Свежие сезонные фрукты в освежающем десерте</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Особенности -->
        <section class="text-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚚</div>
                    <h3>Быстрая доставка</h3>
                    <p>Доставляем за 30 минут или мороженое за наш счёт! Сохраняем идеальную температуру при транспортировке.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌱</div>
                    <h3>Натуральные ингредиенты</h3>
                    <p>Только свежее молоко, натуральные фрукты и качественные продукты. Без консервантов и искусственных добавок.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>Эксклюзивные вкусы</h3>
                    <p>Ежедневно обновляемое меню с сезонными предложениями и авторскими рецептами от наших шеф-поваров.</p>
                </div>
            </div>
        </section>

        <!-- Призыв к действию -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Попробуйте настоящее наслаждение!</h2>
                <p>Закажите сейчас и получите скидку 15% на первую покупку</p>
                <a href="/order" class="cta-button">Заказать сейчас 🍦</a>
            </div>
        </section>

        <script>
            // Дополнительные анимации при скролле
            document.addEventListener('DOMContentLoaded', function() {
                // Анимация появления элементов при скролле
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animated');
                        }
                    });
                }, observerOptions);

                // Наблюдаем за карточками особенностей
                document.querySelectorAll('.feature-card').forEach(card => {
                    observer.observe(card);
                });

                // Параллакс эффект для карусели
                window.addEventListener('scroll', function() {
                    const scrolled = window.pageYOffset;
                    const carousel = document.querySelector('.carousel-section');
                    if (carousel) {
                        carousel.style.transform = 'translateY(' + (scrolled * 0.1) + 'px)';
                    }
                });
            });
        </script>
        HTML;
        
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }
}