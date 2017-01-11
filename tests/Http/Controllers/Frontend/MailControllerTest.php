<?php
/**
 * Created by PhpStorm.
 * User: Evgenii
 * Date: 11.01.2017
 * Time: 12:21
 */
namespace App\Http\Controllers\Frontend;

use PHPUnit\Framework\TestCase;


class MailControllerTest extends TestCase
{
    public function testMailMe(){
        $data = [
            '_view' => 'callback',
            'name' 	=> 'Евгений',
            'phone' => '+38 (063) 130 34 00',
            'email' => 'te0203@mail.ru',
            'comment' => 'Content string '
        ];
    }
}
