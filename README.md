<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Api para consultar mútiplos CEP's
### Para testar , entre no link que disponibilizei abaixo
https://teste-backend-cep-0e383ecc1c76.herokuapp.com/search/local/${CEP's}
### Substituir a variavel ${CEP's} por cep's separados por ','

# Exemplo: 
https://teste-backend-cep-0e383ecc1c76.herokuapp.com/search/local/02760010,02750-060,02760050,02710060,02710050

# Como foi criado o projeto
#### composer create-project --prefer-dist laravel/laravel ${NOME DO PROJETO}
### Depois crie uma rota para testar no arquivo web.php
#### Route::get('/search/local/{ceps}', 'CepController@search');

## Gera um novo controlador 
### No controller você faz suas regras conforme será seu projeto
#### php artisan make:controller NomeController

## Testar o servidor 
#### php artisan serve

### Depois instale as dependencias `uzzlehttp/guzzle` do laravel para realizar requisições HTTP
#### composer require guzzlehttp/guzzle



- Author - [Hélio Franklin](https://www.linkedin.com/in/helio-franklin-293bb9119/)


