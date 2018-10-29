# Base CMS
This is a base cms setup with OAuth 2 authentication in vue.js and Laravel 5.5.

## Features
<ul>
	<li>Landing Page</li>
	<li>Login Page</li>
	<li>Role system</li>
	<li>Simple Export to Excel</li>
</ul>

	

## Requirements

<ul>
	<li>PHP 7 or greater</li>
	<li>Laravel 5.5 or newer</li>
	<li>mySql mariaDB or Postgres</li>
	<li>Redis not required</li>
</ul>

## Setup process
```
	git clone https://github.com/bickyraj/base_crm.git
```
```
	composer update
```
<ul>
<li>this would load all the necessary vendor files.</li>
<li>create a database named laravel_base_cms</li>
<li>Also create a database named testing_base_crm</li>
<li>open .env file  and edit the env variables, Default name of project folder is base_cms</li>
</ul>

```
	BASE_URL=localhost/YOUR_PROJECT_FOLDER_NAME/
```

```
	VUE_BASE_URL = /YOUR_PROJECT_FOLDER_NAME/
```
<ul>
	<li>In the .env file enter the database name, username and password of your database in</li>
</ul>

	```
	DB_DATABASE=laravel_base_cms

	DB_USERNAME=

	DB_PASSWORD=
	```

<ul>
	<li>In the cmd prompt run the following command sequentially</li>
</ul>

	```
	php artisan migrate

	php artisan passport:install

	php artisan db:seed
	
	php artisan migrate --database=testing
	```

now go to browser and enter your url, the project is ready.
