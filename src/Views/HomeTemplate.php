<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class HomeTemplate extends BaseTemplate
{
    public static function getTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Главная страница';
        $content = <<<HTML
        <style>
            /* Общий стиль */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                color: #333;
                line-height: 1.6;
            }
    
            /* Стиль секции карусели */
            .carousel-section {
                padding: 2rem 0;
                text-align: center;
                margin: 0 auto;
                max-width: 800px;
            }
            .carousel-inner img {
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 100%;
                height: auto;
            }
    
            /* Стиль основного контента */
            .text-section {
                max-width: 800px;
                margin: 0 auto;
                padding: 2rem;
                text-align: center;
            }
            .text-content {
                width: 100%;
                margin: 0 auto;
            }
            .text-content p {
                font-size: 1rem;
                color: #555;
                line-height: 1.8;
                margin-bottom: 1rem;
                text-align: center;
                font-family: 'Winky Rough', cursive;
            }
    
            /* Стиль футера */
            footer {
                text-align: center;
                padding: 1rem 0;
                font-size: 0.875rem;
                color: #fff;
                background-color: #333;
            }
        </style>

        <!-- Карусель -->
        <section class="carousel-section">        
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="height:65vh;">
                    <div class="carousel-item active">
                        <img src="./assets/images/1.png" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/2.png" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/3.png" class="d-block w-100 h-100" alt="...">
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
        </section>
    
        <!-- Текст под каруселью -->
        <section class="text-section">
            <div class="text-content">
                <p>Тающее во рту удовольствие: закажите настоящее мороженое сейчас!" 🍦✨</p>
                <p>Широкий ассортимент, низкие цены, быстрая доставка!</p>
            </div>
        </section>        
        HTML;
        
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }
}