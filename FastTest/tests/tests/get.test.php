<?php

namespace FastTest;

use \FastTest\Constraints\Assert;

class Get 
{
    public function test_0_get()
    {
        $result = FastTest::$httpService->httpGet("/posts/1");

        Assert::isEqual(
            __FUNCTION__,
            $result['info']['http_code'], 
            200
        );

        Assert::isEqual(
            __FUNCTION__,
            $result['response']['title'], 
            'sunt aut facere repellat provident occaecati excepturi optio reprehenderit'
        );
    }
}