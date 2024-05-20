<?php
    require 'config.php';
    require 'functions.php';
    require 'App.php';
    require 'Controller.php';
    require 'Database.php';
    require 'Link.php';
    require 'Model.php';
    require 'php-mailer/vendor/autoload.php';
    require 'Mailer.php';

    spl_autoload_register(function ($class_name){
        require '../app/models/' . $class_name . '.php';
    });
    