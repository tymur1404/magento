<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 13:32
 */
$contacts = array(
    array(
        'request_id' => 1,
        'name'     => 'Timur',
        'comment'     => 'Mogento it`s an easy'
    ),
    array(
        'request_id' => 2,
        'name'     => 'Sveta',
        'comment'     => 'I know just how to spell the word "Mogento"'
    ),
    array(
        'request_id' => 3,
        'name'     => 'Vasya',
        'comment'     => 'blah blah blah'
    ),
);

foreach($contacts as $contact){
    Mage::getModel('techtalk/contact')
->setData($contact)
        ->save();
}