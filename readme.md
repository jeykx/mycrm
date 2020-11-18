<h1>Web application for commercial management under Symfony 5.1</h1>

The web application is still in the development phase, it is to be taken into account in case of cloning of the repository.

feature 0.1 :

Any user can make a request for documentation via a form.

The user authenticated with the appropriate authorisation (commercial account or administrator) has access to the documentation of the different users. After that, he can call the prospect and report on the call in question. He can then register him for the selected training course and assign him the appropriate trainer according to the speciality. He can also decide on the status of the calls and consult the list of trainers.


<h1>Installation</h1>
<pre>
<code>

# 1: Cloning the repository
https://github.com/jeykx/crm-commercial

# 2: installation of dependencies
composer install

# 3: Creation of the database
php bin/console doctrine:database:create

#  4: Execution of migrations
php bin/console doctrine:migrations:migrate

#  5: Starting the server
symfony:serve or php -S localhost:8000 -t public "
</code>
</pre>

Enjoy !
