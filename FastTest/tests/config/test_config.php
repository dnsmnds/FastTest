<?php

return [
    'host' => 'jsonplaceholder.typicode.com', //sample: localhost
    'port' => '80', //sample: 8080

    'hawk' => [
        'algorithm' => '', //sample: sha256
    ],

    'require_classes' => [
        // sample: '/../../../path/to/file.php',
    ],

    'test_folder'=> '../tests/', //sample: '/path/to/folder'

    'tests' => [
        'Get', // sample: 'Class',
        'Post',
        'Put',
        'Patch',
        'Delete',
    ],
];

?>
