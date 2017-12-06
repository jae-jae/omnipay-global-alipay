<?php
/**
 * Created by PhpStorm.
 * User: Jaeger <JaegerCode@gmail.com>
 * Date: 2017/12/6
 * Time: 下午4:17
 */

namespace Omnipay\GlobalAlipay\Message;


use Omnipay\Common\Message\AbstractRequest;
use Omnipay\GlobalAlipay\Helper;

class QrcodePurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $data = [
            'service'               => 'alipay.commerce.qrcode.create',
            'partner'               => $this->getPartner(),
            'notify_url'            => $this->getNotifyUrl(),
            'sign_type'             => $this->getSignType() ?: 'MD5',
            '_input_charset'        => $this->getInputCharset() ?: 'utf-8',//<>
            'timestamp'             => $this->getTimestamp() ?: date('Y-m-d H:i:s'),
            'biz_type'              => $this->getBizType()?: 'OVERSEASHOPQRCODE',
            'biz_data'              => json_encode($this->getBizData())
        ];
        $data['sign'] = Helper::sign($data, 'MD5', $this->getKey());

        return $data;
    }

    public function sendData($data)
    {
        $responseData = array();

        return $this->response = new QrcodePurchaseResponse($this, $responseData);
    }

    public function getEnvironment()
    {
        return $this->getParameter('environment');
    }


    public function setEnvironment($value)
    {
        return $this->setParameter('environment', $value);
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }


    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    public function getInputCharset()
    {
        return $this->getParameter('input_charset');
    }


    public function setInputCharset($value)
    {
        return $this->setParameter('input_charset', $value);
    }

    public function getPartner()
    {
        return $this->getParameter('partner');
    }


    public function setPartner($value)
    {
        return $this->setParameter('partner', $value);
    }


    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }


    public function setNotifyUrl($value)
    {
        return $this->setParameter('notify_url', $value);
    }


    public function getSignType()
    {
        return $this->getParameter('sign_type');
    }


    public function setSignType($value)
    {
        return $this->setParameter('sign_type', $value);
    }


    public function getTimestamp()
    {
        return $this->getParameter('timestamp');
    }


    public function setTimestamp($value)
    {
        return $this->setParameter('timestamp', $value);
    }

    //----

    public function getBizType()
    {
        return $this->getParameter('biz_type');
    }

    public function setBizType($value)
    {
        return $this->setParameter('biz_type', $value);
    }

    public function getBizData()
    {
        return $this->getParameter('biz_data');
    }

    public function setBizData($value)
    {
        return $this->setParameter('biz_data', $value);
    }
}