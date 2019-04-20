<?php

namespace FastTest;

use \FastTest\Constraints\Assert;

class Patch 
{
    public function test_0_patch()
    {
        $fields = array(
            'title' => 'foo'
        );

        $result = FastTest::$httpService->httpPut("/posts/1", $fields);

        Assert::isEqual(
            __FUNCTION__,
            $result['info']['http_code'], 
            200
        );

        Assert::isEqual(
            __FUNCTION__,
            $result['response']['title'], 
            'foo'
        );
    }
}