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

class HttpService implements \FastTest\Interfaces\HttpMethod
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
    public function httpFormPost($url, $fields = array())
    {
        $curl = curl_init();

        $payload = http_build_query($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_COOKIESESSION => false,
            CURLOPT_COOKIEJAR => "/tmp/cookies.txt",
            CURLOPT_COOKIEFILE => "/tmp/cookies.txt",
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_USERAGENT => "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
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
    public function httpPostFormDataUrlFull($url, $fields = array())
    {
        $curl = curl_init();

        $fields_string = "";

        foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&'; 
        }
        rtrim($fields_string, '&');

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_POST => count($fields),
            CURLOPT_POSTFIELDS => $fields_string,
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
    public function httpGet($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
            CURLOPT_USERAGENT => "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
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
    public function httpPost($url, $fields = array())
    {
        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
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
    public function httpPut($url, $fields = array())
    {
        $payload = json_encode($fields);

        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
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
    public function httpPatch($url, $fields = array())
    {
        $payload = json_encode($fields);

        $curl = curl_init();

        $payload = json_encode($fields);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_CUSTOMREQUEST => 'PATCH',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
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
    public function httpDelete($url, $fields = array())
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->config['host'] . ':' . $this->config['port'] . $url,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
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