<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 17.12.2018
     * Time: 09:17
     */

    namespace Contact\Container\Element;

    require_once('IElement.php');


    class Contact implements IElement
    {
        /**
         * @var string
         */
        private $_firstName = '';

        /**
         * @var string
         */
        private $_secondName = '';

        /**
         * @var string
         */
        private $_avatar = '';

        public function __construct(String $firstName, String $secondName, String $avatar)
        {
            $this->_firstName = $firstName;
            $this->_secondName = $secondName;
            $this->_avatar = $avatar;
        }

        public function toJSON(): object
        {
            return (object)[
                'firstName' => $this->_firstName,
                'secondName' => $this->_secondName,
                'avatar' => $this->_avatar
            ];
        }

        public function getFirstName(): string
        {
            return $this->_firstName;
        }

        public function getSecondName(): string
        {
            return $this->_secondName;
        }

        public function getAvatar(): string
        {
            return $this->_avatar;
        }
    }