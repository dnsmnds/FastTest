<?php
/*
 * This file is part of FastTest.
 *
 * (c) Dênis Mendes <denisffmendes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FastTest;

require __DIR__ . '/../vendor/autoload.php';

class FastTest
{
    /**
     * @var TODO
     */
    private $config = array();
     /**
     * @var TODO
     */
    private $classes = array();
     /**
     * @var TODO
     */
    public static $httpService;
     /**
     * @var TODO
     */
    public static $httpHawkService;

    /**
     * TODO
     * @param  string TODO
     */
    public function __construct($pathTestConfig)
    {
        $this->config = require $pathTestConfig;
        self::$httpService = new Services\HttpService($this->config);
        self::$httpHawkService = new Services\HawkService($this->config);
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    public function loadRequireClasses()
    {
        if(isset($this->config['require_classes'])){
            foreach($this->config['require_classes'] as $requireClasses){
                require_once $requireClasses;
            }
        }
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    public function loadTests($dir = null) 
    {
        $this->loadRequireClasses();

        if (!isset($this->config['test_folder'])) {
            throw new Exceptions\ConfigException("You need to add parameter test_folder in the file: config/test_config.php");
        }

        if (is_null($dir)) {
            $dir = $this->config['test_folder'];
        }

        if(empty($dir)){
            throw new Exceptions\ConfigException("You need to set path to the test_folder parameter in the config/test_config.php");
        }

        foreach (scandir($dir) as $file) {
            if (is_dir($dir . '/' . $file) && substr($file, 0, 1) !== '.'){
                self::loadTests($dir . '/' . $file . '/');
            }

            if (substr($file, 0, 2) !== '._' && preg_match("/.php$/i", $file)) {
                if (strpos($file, ".test.php") !== false) {
                    require $dir . '/' . $file;
                    $this->classes[] = ucfirst(str_replace(".test.php", "", $file));
                }
            }
        }
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    public function start()
    {
        try{
            $this->loadTests();

            if (!isset($this->config['host'])) {
                throw new Exceptions\ConfigException("You need to set your host!");
            }

            $host = $this->config['host'];

            foreach ($this->config['tests'] as $class) {
                $className = __NAMESPACE__ . "\\" . $class;

                $methods = preg_grep('/^test_/', get_class_methods(new $className()));

                asort($methods);

                foreach ($methods as $method) {
                    call_user_func(__NAMESPACE__ . "\\" . $class . "::" . $method);
                }
            }
        }catch(Exceptions\ConfigException $e){
            print("Configuration Warnings:" . $e->getMessage() . "\n");
            
        }catch(\Exception $e){
            print($e->getMessage() . "\n");
        }
    }
}