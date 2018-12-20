<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 12.12.2018
     * Time: 10:53
     */

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use Contact\Container\Comments;
    use Contact\Container\Contacts;
    use Contact\Controller;

    require_once('class' . DIRECTORY_SEPARATOR . 'Controller.php');
    require_once('class' . DIRECTORY_SEPARATOR . 'Container' . DIRECTORY_SEPARATOR . 'Contacts.php');
    require_once('class' . DIRECTORY_SEPARATOR . 'Container' . DIRECTORY_SEPARATOR . 'Comments.php');
    require_once('class' . DIRECTORY_SEPARATOR . 'Container' . DIRECTORY_SEPARATOR . 'Elements' . DIRECTORY_SEPARATOR . 'Contact.php');
    require_once('class' . DIRECTORY_SEPARATOR . 'Container' . DIRECTORY_SEPARATOR . 'Elements' . DIRECTORY_SEPARATOR . 'Comment.php');

    $contacts = new Contacts();
    $comments = new Comments();
    $error = [];

    $controller = new Controller($contacts, $comments);

    require_once('view'.DIRECTORY_SEPARATOR .'hello.php');