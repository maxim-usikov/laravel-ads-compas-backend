Backend for [vue-ads-compas-frontend](https://github.com/maxim-usikov/vue-ads-compas-frontend)

# Build setup
* [Installation](https://laravel.com/docs/5.8/installation)
* [Homestead](https://laravel.com/docs/5.8/homestead)

```bash
composer install
cp .env.example .env
# after copy fill values

artisan key:generate
artisan migrate
artisan db:seed

artisan passport:install 
# copy password grant client credentials for vue-ads-compas-frontend env
# it will be with ID: 2

# or generate new ones
artisan passport:install --force
```

# Example clients
Take `Password grant client` for [vue-ads-compas-frontend](https://github.com/maxim-usikov/vue-ads-compas-frontend)

```
Personal access client created successfully.
Client ID: 1
Client secret: YuDYK9Yc7kVpUFcRkcEJHKSKrfyPKHJl3kguh90V

Password grant client created successfully.
Client ID: 2
Client secret: HwBxt8GBEMw53KdiVmfiBCusDSpJOjGdS73aLSyI
```

# Task: Laravel & VueJS Хранилище книг
Одна книга может иметь несколько авторов. Один автор может относиться к
нескольким книгам. Создание тестовых авторов/книг можно сделать в seeders, т.е.
не реализовывать роуты.  Искать книги может только авторизованый пользователь.
Список книг доступен для всех. Backend API на Laravel. 
Routes:
- аутентификация
- получение списка книг (пагинация, множественный фильтр по автору и названию) -
- поиск книги (<=10 подходящих) по автору/названию, строка поиска от 3 символов
- Frontend Использовать NuxtJS, Vuetify Страницы для поиска книг и для вывода
  списка книг с фильтрацией

