<?php
/*
 * This file is part of FastTest.
 *
 * (c) Dênis Mendes <denisffmendes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FastTest\Services;

class HawkService
{
    private $config = null;

    public function __construct($config){
        $this->config = $config;
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    static public function httpPut($url, $fields = array(), $hawk = array())
    {
        $key = $hawk["key"];
        $algorithm = self::$config["hawk"]["algorithm"];
        $id = $hawk["id"];

        $credentials = new \Dflydev\Hawk\Credentials\Credentials(
            $key,        // shared key
            $algorithm,  // default: sha256
            $id          // identifier, default: null
        );

        $payload = json_encode($fields);

        $client = \Dflydev\Hawk\Client\ClientBuilder::create()->build();
        $request = $client->createRequest(
            $credentials,
            self::$config['host'] . ':' . self::$config['port'] . $url,
            'PUT',
            array(
                'content_type' => 'application/json',
                'content_length' => strlen($payload),
                'payload' => $payload,
            )
        );

        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => self::$config['host'] . ':' . self::$config['port'] . $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                $request->header()->fieldName().': '.$request->header()->fieldValue(),
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error_message = null;
        if(curl_errno($curl)) {
            $error_message = curl_strerror($errno);
        }
        curl_close($curl);

        return [
            "response"=>json_decode($response, true), 
            "info"=>$info, 
            "html" => htmlentities($response), 
            "error" => $error_message,
        ];
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    static public function httpPost($url, $fields = array(), $hawk = array())
    {
        $key = $hawk["key"];
        $algorithm = self::$config["hawk"]["algorithm"];
        $id = $hawk["id"];

        $credentials = new \Dflydev\Hawk\Credentials\Credentials(
            $key,        // shared key
            $algorithm,  // default: sha256
            $id          // identifier, default: null
        );

        $payload = json_encode($fields);

        $client = \Dflydev\Hawk\Client\ClientBuilder::create()->build();
        $request = $client->createRequest(
            $credentials,
            self::$config['host'] . ':' . self::$config['port'] . $url,
            'POST',
            array(
                'content_type' => 'application/json',
                'content_length' => strlen($payload),
                'payload' => $payload,
            )
        );

        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => self::$config['host'] . ':' . self::$config['port'] . $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                $request->header()->fieldName().': '.$request->header()->fieldValue(),
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload),
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error_message = null;
        if(curl_errno($curl)) {
            $error_message = curl_strerror($errno);
        }
        curl_close($curl);

        return [
            "response"=>json_decode($response, true), 
            "info"=>$info, 
            "html" => htmlentities($response), 
            "error" => $error_message,
        ];
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    static public function httpGet($url, $fields = array(), $hawk = array())
    {
        $key = $hawk["key"];
        $algorithm = self::$config["hawk"]["algorithm"];
        $id = $hawk["id"];

        $credentials = new \Dflydev\Hawk\Credentials\Credentials(
            $key,        // shared key
            $algorithm,  // default: sha256
            $id          // identifier, default: null
        );

        if(strpos($url, "?") === false){
            $urlWithoutQuery = $url;
        }else{
            $urlWithoutQuery = substr($url, 0 ,strpos($url, "?"));
        }

        $client = \Dflydev\Hawk\Client\ClientBuilder::create()->build();
        $request = $client->createRequest(
            $credentials,
            self::$config['host'] . ':' . self::$config['port'] .$urlWithoutQuery,
            'GET',
            array()
        );

        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => self::$config['host'] . ':' . self::$config['port'] . $url,
            CURLOPT_HTTPHEADER => array(
                $request->header()->fieldName().': '.$request->header()->fieldValue(),
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error_message = null;
        if(curl_errno($curl)) {
            $error_message = curl_strerror($errno);
        }
        curl_close($curl);

        return [
            "response"=>json_decode($response, true), 
            "info"=>$info, 
            "html" => htmlentities($response), 
            "error" => $error_message,
        ];
    }

    /**
     * TODO
     * @param  TODO
     * @return TODO?
     */
    static public function httpDelete($url, $fields = array(), $hawk = array())
    {
        $key = $hawk["key"];
        $algorithm = self::$config["hawk"]["algorithm"];
        $id = $hawk["id"];

        $credentials = new \Dflydev\Hawk\Credentials\Credentials(
            $key,        // shared key
            $algorithm,  // default: sha256
            $id          // identifier, default: null
        );

        $client = \Dflydev\Hawk\Client\ClientBuilder::create()->build();
        $request = $client->createRequest(
            $credentials,
            self::$config['host'] . ':' . self::$config['port'] . $url,
            'DELETE',
            array()
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => self::$config['host'] . ':' . self::$config['port'] . $url,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                $request->header()->fieldName().': '.$request->header()->fieldValue(),
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error_message = null;
        if(curl_errno($curl)) {
            $error_message = curl_strerror($errno);
        }
        curl_close($curl);

        return [
            "response"=>json_decode($response, true), 
            "info"=>$info, 
            "html" => htmlentities($response), 
            "error" => $error_message,
        ];
    }

}