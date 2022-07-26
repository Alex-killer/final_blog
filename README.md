## Запуск Проекта


- Создать в корне файл .env и выполнить в нем настройки.
- Запустить Docker: docker-compose up -d --build.
- Зайти в контейнер: "docker-compose exec app sh" и выполнить команду "composer install".
- Создать ссылку на картинки: php artisan storage:link.
- Запустить миграции и сиды в контейнре.

