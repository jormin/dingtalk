<?php

namespace Jormin\Dingtalk;

/**
 * Class BaseObject
 * @package Jormin\Qiniu
 */
class BaseObject
{

    /**
     * 失败
     *
     * @param $message
     * @param null $data
     * @return array
     */
    public function error($message, $data = null)
    {
        is_object($data) && $data = (array)$data;
        $return = ['success' => false, 'message' => $message, 'data' => $data];
        return $return;
    }

    /**
     * 成功
     *
     * @param $message
     * @param null $data
     * @return array
     */
    public function success($message, $data = null)
    {
        is_object($data) && $data = (array)$data;
        $return = ['success' => true, 'message' => $message, 'data' => $data];
        return $return;
    }

    /**
     * 请求
     * @param $url
     * @param $postData
     * @return bool|string
     */
    protected function request($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
}
