<?php

namespace FastTest;

use \FastTest\Constraints\Assert;

class Put 
{
    public function test_0_put()
    {
        $fields = array(
            'id' => 1,
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1
        );

        $result = FastTest::$httpService->httpPut("/posts/1", $fields);

        Assert::isEqual(
            __FUNCTION__,
            $result['info']['http_code'], 
            200
        );

        Assert::isEqual(
            __FUNCTION__,
            $result['response']['id'], 
            1
        );
    }
}