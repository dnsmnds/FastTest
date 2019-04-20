<?php
/*
 * This file is part of FastTest.
 *
 * (c) Dênis Mendes <denisffmendes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FastTest\Helpers;

class Messages
{    
    public static function success($name_of_test)
    {
        echo "\033[32m  Success: " . $name_of_test . " \033[0m \n";
    }

    public static function error($name_of_test)
    {
        echo "\033[31m  Fail: " . $name_of_test . " \033[0m \n";
    }
}
