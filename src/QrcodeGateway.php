<?php
/**
 * Created by PhpStorm.
 * User: Jaeger <JaegerCode@gmail.com>
 * Date: 2017/12/6
 * Time: 下午2:50
 */

namespace Omnipay\GlobalAlipay;

use Omnipay\Common\AbstractGateway;

class QrcodeGateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Global Alipay QRCode gateway';
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }


    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }


    public function getEnvironment()
    {
        return $this->getParameter('environment');
    }


    public function setEnvironment($value)
    {
        return $this->setParameter('environment', $value);
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


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\GlobalAlipay\Message\QrcodePurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\GlobalAlipay\Message\CompletePurchaseRequest', $parameters);
    }

}