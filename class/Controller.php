<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 19.12.2018
     * Time: 12:34
     */

    namespace Contact;

    require_once 'Container'.DIRECTORY_SEPARATOR .'Elements'.DIRECTORY_SEPARATOR .'Contact.php';
    require_once 'Container'.DIRECTORY_SEPARATOR .'Elements'.DIRECTORY_SEPARATOR .'Comment.php';
    require_once 'Container'.DIRECTORY_SEPARATOR .'Contacts.php';
    require_once 'Container'.DIRECTORY_SEPARATOR .'Comments.php';

    use Contact\Container\Comments;
    use Contact\Container\Contacts;
    use Contact\Container\Element\Comment;
    use Contact\Container\Element\Contact;

    class Controller
    {
        /**
         * @var Contacts
         */
        private $_contacts = null;

        /**
         * @var Comments
         */
        private $_comments = null;

        public function __construct(Contacts $contacts, Comments $comments)
        {
            $this->_contacts = $contacts;
            $this->_comments = $comments;

            if (sizeof($_POST)) {
                switch (true) {
                    case array_key_exists('addContact', $_POST):
                        $this->addContact($_POST['firstName'], $_POST['lastName'], $_POST['avatar']);
                        break;
                    case array_key_exists('addComment', $_POST):
                        $this->addComment((int)$_POST['contactNo'], $_POST['comment']);
                        break;
                    case array_key_exists('deleteComment', $_POST):
                        $this->deleteComment((int)$_POST['deleteComment']);
                        break;
                    case array_key_exists('deleteContact', $_POST):
                        $this->deleteContact((int)$_POST['deleteContact']);
                        break;
                }
                header('Location: /');
            }
        }

        private function addContact(string $firstName, string $lastName, string $avatar): void
        {
            $comment = new Contact($firstName, $lastName, $avatar);
            $this->_contacts->add($comment);
            $this->_contacts->save();
        }

        private function addComment(int $contactNo, string $comment): void
        {
            $contact = $this->_contacts->getById($contactNo - 1);
            if (!$contact) {
                array_push($error, 'Wrong Contact Index: ' . $contactNo);
            } else {
                $comment = new Comment($comment, new \DateTime(), $contact);
                $this->_comments->add($comment);
                $this->_comments->save();
            }
        }

        private function deleteComment(int $commentId)
        {
            if ($this->_comments->removeById($commentId)) {
            } else {
                array_push($error, 'Unknown Comment Key: ' . $commentId);
            }
            $this->_comments->save();
        }

        private function deleteContact(int $contactId)
        {
            if ($this->_contacts->removeById($contactId)) {
                $this->_contacts->save();
            } else {
                array_push($error, 'Unknown Contact Key: ' . $contactId);
            }
        }
    }