<?php
/*
 * This file is part of FastTest.
 *
 * (c) Dênis Mendes <denisffmendes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FastTest\Constraints;

use \FastTest\Helpers\Messages;

class Assert
{
    public static function isEqual($test, $param_one, $param_two)
    {
        if ($param_one === $param_two) {
            return Messages::success($test);
        }

        return Messages::error($test);
    }

    public static function notEqual($test, $param_one, $param_two)
    {
        if ($param_one !== $param_two) {
            return Messages::success($test);
        }

        return Messages::error($test);
    }
}
