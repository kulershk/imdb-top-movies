**Backend**

```bash
1)cd backend
2)composer install
3)Make .env file of .env.example (Chanage variables)
4) Set up nginx for laravel 7 (https://laravel.com/docs/7.x/deployment#nginx)
5)php artisan migrate
6)Add cronjob
6.1)Run this in commmand line `crontab -e`
6.2)`* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`
6.3)(Optional) Fetch Movie database manualy with this command `php artisan movies:fetch`
```

**Frontend(Development)**

```bash
1)yarn install
2)Make .env file of .env.example (Chanage variables)
3)yarn run dev
```