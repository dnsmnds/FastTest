<?php
/*
 * This file is part of FastTest.
 *
 * (c) Dênis Mendes <denisffmendes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FastTest\Interfaces;

interface HttpMethod 
{
    public function httpGet($url);
    public function httpPost($url, $fields = array());
    public function httpPut($url, $fields = array());
    public function httpPatch($url, $fields = array());
    public function httpDelete($url, $fields = array());
}