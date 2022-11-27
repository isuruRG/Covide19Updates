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
===== Run this commands =======

composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan serve
```

### FrontEnd Setup ###
```
Open another terminal in project root path
cd into client/
npm i
npm run serve
```

### Cron Setup ###
```
open new terminal

===== Run this commands =======

crontab -e
select preferred editor (nano or vim)
If you have chosen nano editer follow the steps

copy and paste below line after updating the path-to-project

* * * * * php /path-to-project/artisan schedule:run 1>> /dev/null 2>&1

Ctrl+o
Enter
Ctrl+x

Done!
```

### Notice ####
```
Note: If php artisan serve running at http://localhost:8000
Otherwise you have to update 
below line in client/src/main.js
axios.defaults.baseURL = 'http://127.0.0.1:8000/'

```
