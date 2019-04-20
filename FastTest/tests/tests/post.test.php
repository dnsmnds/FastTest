<?php

namespace FastTest;

use \FastTest\Constraints\Assert;

class Post 
{
    public function test_0_post()
    {
        $fields = array(
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1
        );

        $result = FastTest::$httpService->httpPost("/posts", $fields);

        Assert::isEqual(
            __FUNCTION__,
            $result['info']['http_code'], 
            201
        );

        Assert::isEqual(
            __FUNCTION__,
            $result['response']['id'], 
            101
        );
    }
}