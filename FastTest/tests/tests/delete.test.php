<?php

namespace FastTest;

use \FastTest\Constraints\Assert;

class Delete 
{
    public function test_0_delete()
    {
        $result = FastTest::$httpService->httpDelete("/posts/1");

        Assert::isEqual(
            __FUNCTION__,
            $result['info']['http_code'], 
            200
        );
    }
}