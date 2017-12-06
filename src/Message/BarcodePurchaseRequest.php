<?php
/**
 * Created by PhpStorm.
 * User: Jaeger <JaegerCode@gmail.com>
 * Date: 2017/12/6
 * Time: 下午5:18
 */

namespace Omnipay\GlobalAlipay\Message;


use Omnipay\Common\Message\AbstractRequest;
use Omnipay\GlobalAlipay\Helper;

class BarcodePurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $data = [
            'service'               => 'alipay.acquire.overseas.spot.pay',
            'partner'               => $this->getPartner(),
            'sign_type'             => $this->getSignType() ?: 'MD5',
            '_input_charset'        => $this->getInputCharset() ?: 'utf-8',//<>

            'alipay_seller_id'     => $this->getAlipaySellerId(),
            'quantity'             => $this->getQuantity(),
            'trans_name'           => $this->getTransName(),
            'partner_trans_id'     => $this->getPartnerTransId(),
            'currency'             => $this->getCurrency(),
            'trans_amount'         => $this->getTransAmount(),
            'buyer_identity_code'  => $this->getBuyerIdentityCode(),
            'identity_code_type'   => $this->getIdentityCodeType(),
            'trans_create_time'    => $this->getTransCreateTime()?: date('YmdHis'),
            'memo'                 => $this->getMemo(),
            'biz_product'          => $this->getBizProduct(),
            'extend_info'          => json_encode($this->getExtendInfo())
        ];
        $data['sign'] = Helper::sign($data, 'MD5', $this->getKey());

        return $data;
    }

    public function sendData($data)
    {
        $responseData = array();

        return $this->response = new BarcodePurchaseResponse($this, $responseData);
    }

    public function getEnvironment()
    {
        return $this->getParameter('environment');
    }


    public function setEnvironment($value)
    {
        return $this->setParameter('environment', $value);
    }


    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }


    public function getKey()
    {
        return $this->getParameter('key');
    }


    public function getPartner()
    {
        return $this->getParameter('partner');
    }


    public function setPartner($value)
    {
        return $this->setParameter('partner', $value);
    }


    public function getSignType()
    {
        return $this->getParameter('sign_type');
    }


    public function setSignType($value)
    {
        return $this->setParameter('sign_type', $value);
    }

    public function getInputCharset()
    {
        return $this->getParameter('input_charset');
    }


    public function setInputCharset($value)
    {
        return $this->setParameter('input_charset', $value);
    }


    public function getAlipaySellerId()
    {
        return $this->getParameter('alipay_seller_id');
    }


    public function setAlipaySellerId($value)
    {
        return $this->setParameter('alipay_seller_id', $value);
    }


    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }


    public function getTransName()
    {
        return $this->getParameter('trans_name');
    }


    public function setTransName($value)
    {
        return $this->setParameter('trans_name', $value);
    }



    public function getPartnerTransId()
    {
        return $this->getParameter('partner_trans_id');
    }

    public function setPartnerTransId($value)
    {
        return $this->setParameter('partner_trans_id', $value);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }


    public function getTransAmount()
    {
        return $this->getParameter('trans_amount');
    }

    public function setTransAmount($value)
    {
        return $this->setParameter('trans_amount', $value);
    }


    public function getBuyerIdentityCode()
    {
        return $this->getParameter('buyer_identity_code');
    }

    public function setBuyerIdentityCode($value)
    {
        return $this->setParameter('buyer_identity_code', $value);
    }


    public function getIdentityCodeType()
    {
        return $this->getParameter('identity_code_type');
    }

    public function setIdentityCodeType($value)
    {
        return $this->setParameter('identity_code_type', $value);
    }

    public function getTransCreateTime()
    {
        return $this->getParameter('trans_create_time');
    }

    public function setTransCreateTime($value)
    {
        return $this->setParameter('trans_create_time', $value);
    }


    public function getMemo()
    {
        return $this->getParameter('memo');
    }

    public function setMemo($value)
    {
        return $this->setParameter('memo', $value);
    }

    public function getBizProduct()
    {
        return $this->getParameter('biz_product');
    }

    public function setBizProduct($value)
    {
        return $this->setParameter('biz_product', $value);
    }

    public function getExtendInfo()
    {
        return $this->getParameter('extend_info');
    }

    public function setExtendInfo($value)
    {
        return $this->setParameter('extend_info', $value);
    }

}