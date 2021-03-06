# Инструкция по развертке проекта
1. Устанавливаем [Docker](https://www.docker.com/community-edition). 
1. Клонируем репозиторий: `git clone https://github.com/zavodnoi/task-short-links.git`
1. Переходим в папку проекта: `cd task-short-links`
1. Копируем .env.example в .env: `cp .env.example .env`
1. Устанавливаем переменную IDUSER=$UID: для macOS -> `sed -i '' -e "s/IDUSER=/IDUSER=$UID/g" .env` для GNU -> `sed -i  "s/IDUSER=/IDUSER=$UID/g" .env`
1. Поднимаем сервис Docker: `docker-compose up -d`
1. Устанавливаем зависимости: `docker-compose exec app composer install`
1. Генерируем ключ приложения: `docker-compose exec app php artisan key:generate`
1. Выполняем миграции: `docker-compose exec app php artisan migrate`
1. Вводим адрес http://localhost:8100 в адресной строке браузера
1. Выключаем проект: `docker-compose down`

# Задание от Admitad
## Сокращатель ссылок

Пользователю предоставляется поле для ввода URL, по нажатию кнопки «Уменьшить» пользователю предоставляется короткая ссылка с текущим доменом сайта. При переходе по уменьшенной ссылке юзер будет перенаправлен на исходную страницу.

Пользователь имеет возможность:
<ul>
<li>создать свою короткую ссылку;</li>
<li>возможность создавать ссылки с ограниченным сроком жизни;</li>
<li>
Необязательно: пользователь, создающий ссылку также получает ссылку на статистику переходов. В статистике отобразить данные пользователей, осуществивших переход по сокращённой ссылке:
<ul>
<li>дата и время перехода;</li>
<li>гео-информацию (страна, город);</li>
<li>строку User-Agent (возможно привести к виду “Наименование и версия браузера и ОС”).</li>
</ul>
</li>
</ul>

Решить поставленную задачу используя:
<ul>
<li>Laravel/Lumen</li>
<li>PHP 5.6+</li>
</ul>

Будет хорошим плюсом​, если проект будет содержать конфигурацию для запуска в Docker и код будет покрыт unit-­тестами.

Решение прислать в виде ссылки на код проекта на https://github.com/. В репозитории разместить файл README.md, содержащий пошаговую инструкцию по развёртыванию  и использованию проекта.
