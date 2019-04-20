# FastTest
It is a tool to do tests on web applications.
The mean goal is to be simple and fast.

While other tools are complex to configure and to start to use, FastTest is easier and simpler.

Look below how to set up and start to use:

## First
Put configuration in FastTest/config/test_config.php

## Second
You need to create a bootstrap file, look this example:

```php
<?php

include_once "../vendor/autoload.php";

$FastTest = new FastTest\FastTest('./config/test_config.php');
$FastTest->start();
```

After these steps, you can run:

```
php bootstrap.php 
```

### Done!

# Testing the FastTest
You need to go to folder  `FastTest/tests`

And run `php bootstrap.php`

The result is:

```
Success: test_0_get  
Success: test_0_get  
Success: test_0_post  
Success: test_0_post  
Success: test_0_put  
Success: test_0_put  
Success: test_0_patch  
Success: test_0_patch  
Success: test_0_delete
```

FastTest use [JSONPlaceholder - Fake online REST API for developers](http://jsonplaceholder.typicode.com) to create a Fake REST API.

# MIT License
```
Copyright (c) 2019 Dênis Mendes

Permission is hereby granted, free of charge, to any person obtaining a
copy of this software and associated documentation files (the "Software"),
to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
```
