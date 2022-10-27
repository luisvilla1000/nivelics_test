<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## TEST NIVELICS

Este es un test para el cargo de desarollador PHP en la empresa NIVELICS, desarollado bajo el framework Laravel

## PASOS PARA EJECUTAR EL PROYECTO

- el archivo .env.example ya tiene la configuracion de la conexión al cluster de mongoDB 
- quitarle el .example y dejarlo solo ".env"
- Una vez hecho esto debe abrir un terminal y ejecutar los siguientes comandos.

## COMANDOS A EJECUTAR
- composer update / composer install
- php artisan migrate --seed
- php artisan serve

## CREDENCIALES PRECARGADAS
- MANAGER: <br>
user: manager1<br>
pass: 12345678 <br>
- AGENT:<br>
user: agent1<br>
pass: 12345678<br>
user: agent2<br>
pass: 12345678<br>
<hr>

## FUNCIONAMIENTO

- El programa consta de 4 endpoints el primero es api/auth donde debe colocar las credenciales precargadas de usuario. Esta genera un token que se debe usar en las otras 3 endpoints.

# rutas de manager
GET => api/leads <br>
Muestra todos los candidatos <br>
POST => api/lead <br>
Crea un candidato

# rutas de agent
GET => api/lead/{id} <br>
Muestra el candidato si está suscrito a el, si no, muestra un error de no autorizado

##
