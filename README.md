<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## To do app

For this To do app I used the following technologies:

- [Laravel framework](https://laravel.com/docs).
- [Laravel Fortify for auth generation](https://laravel.com/docs/9.x/fortify#what-is-fortify).
- [Laravel sanctum for API authentication](https://laravel.com/docs/9.x/sanctum#introduction).
- [Laravel sail for docker management](https://laravel.com/docs/9.x/sail).
- MySQL for data storage

### Running the app

Before running the app I suggest you to add the following in your `/etc/hosts`
```
127.0.0.1    api.todo.local
127.0.0.1    app.todo.local
```
This is in order to avoid cors problems and in order for Laravel sanctum to work. 
`api.todo.local` is for this api, while `app.todo.local` is for the frontend part

Also, please make sure `Docker` is installed on your system and is running

Finally, to run it execute the following command
This will also run the project as well.
```
make install
```

After install you can only run
```
make serve
```

the api will be available at [api.todo.local](http://api.todo.local)
