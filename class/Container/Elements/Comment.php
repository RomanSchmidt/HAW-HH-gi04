<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 17.12.2018
     * Time: 09:55
     */

    namespace Contact\Container\Element;

    require_once('Contact.php');


    class Comment implements IElement
    {
        public const TIME_FORMAT = 'Y-m-d\TH:i:s';

        /**
         * @var string
         */
        private $_comment = '';

        /**
         * @var Contact
         */
        private $_author = null;

        /**
         * @var \DateTime
         */
        private $_creationDate = null;

        public function __construct(string $comment, \DateTime $creationDate, Contact $contact)
        {
            $this->_author = $contact;
            $this->_creationDate = $creationDate;
            $this->_comment = $comment;
        }

        public function toJSON(): object
        {
            return (object)[
                'comment' => $this->_comment,
                'authorFirstName' => $this->_author->getFirstName(),
                'authorSecondName' => $this->_author->getSecondName(),
                'authorAvatar' => $this->_author->getAvatar(),
                'date' => $this->_creationDate->format(Comment::TIME_FORMAT)
            ];
        }

        public function getAuthor(): Contact
        {
            return clone $this->_author;
        }

        public function getComment(): string
        {
            return $this->_comment;
        }

        public function getCreationDate(): \DateTime
        {
            return clone $this->_creationDate;
        }
    }