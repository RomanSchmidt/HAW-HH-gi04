<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 17.12.2018
     * Time: 09:49
     */

    namespace Contact\Container;

    require_once('Elements\Comment.php');

    use Contact\Container\Element\Comment;
    use Contact\Container\Element\Contact;
    use Contact\Container\Element\IElement;
    use mysql_xdevapi\Exception;

    class Comments extends AContainer
    {
        private const JSON_FILE = './db/comments.json';

        protected function getJSONFile(): string
        {
            return Comments::JSON_FILE;
        }

        protected function _init(): void
        {
            $string = file_get_contents(Comments::JSON_FILE);
            $comments = json_decode($string, true);
            $comments = array_reverse($comments);
            foreach ($comments as $comment) {
                $contact = new Contact($comment['authorFirstName'], $comment['authorSecondName'], $comment['authorAvatar']);
                $contactObject = new Comment($comment['comment'], \DateTime::createFromFormat(Comment::TIME_FORMAT, $comment['date']), $contact);
                $this->add($contactObject);
            }
        }

        public function add(IElement $comment): int
        {
            if (!($comment instanceof Comment)) {
                throw new Exception('comment is not instance of Comment');
            }
            return parent::add($comment);
        }
    }