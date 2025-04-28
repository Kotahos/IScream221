<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class ProductTemplate extends BaseTemplate
{
    public static function getAllTemplate(array $arr): string 
    {
        $template = parent::getTemplate();
        $title = 'Каталог продукции';
        $content = <<<HTML
    <style>
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem 0;
        }
        .product-item {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .product-item:hover {
            transform: translateY(-5px);
        }
        .product-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .product-body {
            padding: 1rem;
        }
        .product-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .product-title h2 {
            all: unset;
            display: block;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
            cursor: pointer;
        }
        .product-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-price {
            font-size: 1rem;
            font-weight: bold;
            color:rgb(166, 63, 63);
            margin-bottom: 1rem;
        }
        .btn-primary {
            background: rgb(221, 92, 92);
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-radius: 6px;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background:rgb(108, 30, 30);
        }

        product-title h2 {
            all: unset;
            display: block;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
            cursor: pointer;
            transition: color 0.2s ease; /* Плавное изменение цвета */
        }
        
        .product-title:hover h2 {
            color:rgb(166, 63, 63); /* Изменение цвета при наведении */
        }
    </style>
    <main class="container">
        <h1 class="text-center my-5">{$title}</h1>
        <div class="products-grid">
HTML;

        foreach($arr as $item) {
            $content .= <<<HTML
            <div class="product-item">
                <img src="{$item['image']}" class="product-img" alt="{$item['name']}">
                <div class="product-body">
                    <div class="product-title" onclick="window.location='/products/{$item['id']}'">
                        <strong><h2>{$item['name']}</h2></strong>
                    </div>
                    <p class="product-description">{$item['description']}</p>
                    <div class="product-price">{$item['price']} ₽</div>
                    <form action="/basket" method="POST">
                        <input type="hidden" name="id" value="{$item['id']}">
                        <button type="submit" class="btn btn-primary">В корзину</button>
                    </form>
                </div>
            </div>
HTML;
        }

        $content .= <<<HTML
            </div>
        </main>
HTML;

        return sprintf($template, $title, $content);
    }
    
}