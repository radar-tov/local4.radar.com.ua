<?php
/**
 * Created by PhpStorm.
 * User: Evgenii
 * Date: 18.01.2017
 * Time: 14:14
 */

namespace App\Http\Controllers\Frontend;


class MailControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testMailMe(){
        $request = [
            '_view' => 'callback',
            'phone' => '+38(063)130-34-00',
            'name' => 'Евгений',
            'email' => '8818383@gmail.com',
            'comment' => 'Комментарий'
        ];

        $test = MailController::mailMe($request);

        //Assert
        $this->assertTrue($test);
    }
}
