<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 13:32
 */
$contacts = array(
    array(
        'name'     => 'Timur',
        'comment'     => 'Mogento it`s an easy'
    ),
    array(
        'name'     => 'Sveta',
        'comment'     => 'I know just how to spell the word "Mogento"'
    ),
    array(
        'name'     => 'Vasya',
        'comment'     => 'blah blah blah'
    ),
);

foreach($contacts as $contact){
    Mage::getModel('techtalk/contact')
->setData($contact)
        ->save();
}
