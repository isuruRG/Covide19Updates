***Project Setup***
#### Project Clone ####
```

clone the project
cd into project
open a terminal in project root path
```

#### env setup ####
```
create .env file by running
cp .env.example .env

create new database and update .env
```

### Backend Setup ####
```
run composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan serve
```

### FrontEnd Setup ###
```
Open another terminal in project root path
cd into frontend/
npm i
npm run serve
```

### Cron Setup ###
```
open new terminal

run crontab -e
select preferred editor (nano or vim)
assume that you have chosen nano

copy and paste below line after updating the path-to-project

* * * * * php /path-to-project/artisan schedule:run 1>> /dev/null 2>&1

Ctrl+o
Enter
Ctrl+x

Done!
```

### Notice ####
```
Browse http://localhost:8080 (assume npm run serve running at http://localhost:8080/)

Note: assume php artisan serve running at http://localhost:8000
Otherwise you have to update 
below line in client/src/main.js
axios.defaults.baseURL = 'http://127.0.0.1:8000/'

```
