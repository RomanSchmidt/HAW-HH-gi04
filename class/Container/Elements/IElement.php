<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 17.12.2018
     * Time: 10:10
     */

    namespace Contact\Container\Element;


    interface IElement
    {
        public function toJSON(): object;
    }