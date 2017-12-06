<?php
/**
 * Created by PhpStorm.
 * User: Jaeger <JaegerCode@gmail.com>
 * Date: 2017/12/6
 * Time: 下午4:39
 */

namespace Omnipay\GlobalAlipay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class QrcodePurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $endpoint = 'https://mapi.alipay.com/gateway.do';

    protected $endpointSandbox = 'https://openapi.alipaydev.com/gateway.do';


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return true;
    }


    public function isRedirect()
    {
        return true;
    }

    /**
     * Gets the redirect target url.
     */
    public function getRedirectUrl()
    {
        return sprintf('%s?%s', $this->getEndpoint(), http_build_query($this->getRedirectData()));
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        return $this->request->getData();
    }

    /**
     * Get the required redirect method (either GET or POST).
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }


    /**
     * @return string
     */
    protected function getEndpoint()
    {
        if ($this->request->getEnvironment() == 'sandbox') {
            return $this->endpointSandbox;
        } else {
            return $this->endpoint;
        }
    }
}