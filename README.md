# Center_PO
## устанвока
Скопируйте файл окружения и настройте его:
```sh
cp .env.example .env
```
настроить файл .env
```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
API_KEY=secret_api_key
```
установка зависимостей:
```sh
composer install
```
Выполните миграции и сидеры:
```sh
app php artisan migrate:fresh --seed
```
сгенерировать документацию 
```sh
php artisan l5-swagger:generate
```
Запуск приложение без сервера
```sh
php artisan serve
```
Проверка работы приложения:
После запуска приложение будет доступно по адресу http://localhost
А документацию по адресу http://localhost/api/documentation
