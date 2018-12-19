<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 12.12.2018
     * Time: 10:53
     */

    use Contact\Container\Comments;
    use Contact\Container\Contacts;
    use Contact\Controller;

    require_once('class/Controller.php');
    require_once('class/Container/Contacts.php');
    require_once('class/Container/Comments.php');
    require_once('class/Container/Elements/Contact.php');
    require_once('class/Container/Elements/Comment.php');

    $contacts = new Contacts();
    $comments = new Comments();
    $error = [];

    $controller = new Controller($contacts, $comments);

    require_once('view/hello.php');