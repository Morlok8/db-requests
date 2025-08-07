<h2>Установка</h2>
<ol>
    <li> Скопировать URL репозитория; </li>
    <li> Выбрав нужную директорию локального сервера в командной строке, ввести git clone; </li>
    <li> Отредактировать файл env (или env.example и убрать example), добавив туда название новой базы и заменив sqlite на mysql в строке DB_CONNECTION; 
        <ul>
            <li>DB_HOST=mikehost57.beget.tech</li>
            <li>DB_PORT=3306</li>
            <li>DB_DATABASE=mikehost57_t</li>
            <li>DB_USERNAME=mikehost57_t</li>
            <li>DB_PASSWORD=4252gDJh5i</li>
        </ul>   
    </li>
    <li> Выполнить команду composer install; </li>
    <li> Выполнить команду php artisan migrate; </li>
    <li> Выполнить команду php artisan db:seed; </li>
    <li> Выполнить команду php artisan key:generate; </li>
    <li> Запустить сервер, используя команду php artisan serve; </li>    
</ol>

<h3>Маршруты API</h3>
<p>get: host/api/stock/show --- получить список товаров со склада и записать их в бд </p>

<h4>Админ панель базы данных:</h4>

<p>https://cobra.beget.com/phpMyAdmin/db_structure.php?db=mikehost57_t</p>
<p>login: mikehost57_t</p>
<p>password: inGPn4yBMa</p>

