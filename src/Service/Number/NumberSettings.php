<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 11/7/16
 * Time: 2:28 PM
 */

namespace Nexmo\Service\Number;


class NumberSettings
{
    /*
     * $msisdn
     * A virtual number that you are renting. For example, 441632960960.
     */
    protected $msisdn;
    /*
     * $country
     * The two character country code in ISO 3166-1 alpha-2 format. For example, ES for Spain.
     */
    protected $country;
    /*
     * $moHttpUrl
     * Nexmo transfers information about inbound messages to this webhook endpoint. This parameter must be URL encoded. For example, https%3a%2f%2fmycallback.servername.
     */
    protected $moHttpUrl;
    /*
     * $moSmppSysType
     * The associated system type for your SMPP client. For example, inbound.
     */
    protected $moSmppSysType;
    /*
     * $voiceCallbackType
     * The voice webhook type. Possible values are:
     *  sip - a SIP endpoint
     *  tel - a telephone number
     *  vxml - a VoiceXML endpoint
     *  app - an Application
     */
    protected $voiceCallbackType;
    /*
     *  $voiceCallbackValue
     * 	Either:
     *    The voice webhook endpoint based on voiceCallbackType
     *    The ID of the Application you are associating with this virtual number
     */
    protected $voiceCallbackValue;
    /*
     * $voiceStatusCallback
     * Nexmo sends a request to this webhook endpoint when a call ends.
     */
    protected $voiceStatusCallback;


    /**
     * @return mixed
     */
    public function getMsisdn()
    {
        return $this->msisdn;
    }

    /**
     * @param mixed $msisdn
     * @return NumberSettings
     */
    public function setMsisdn($msisdn)
    {
        $this->msisdn = $msisdn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return NumberSettings
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoHttpUrl()
    {
        return $this->moHttpUrl;
    }

    /**
     * @param mixed $moHttpUrl
     * @return NumberSettings
     */
    public function setMoHttpUrl($moHttpUrl)
    {
        $this->moHttpUrl = $moHttpUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoSmppSysType()
    {
        return $this->moSmppSysType;
    }

    /**
     * @param mixed $moSmppSysType
     * @return NumberSettings
     */
    public function setMoSmppSysType($moSmppSysType)
    {
        $this->moSmppSysType = $moSmppSysType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoiceCallbackType()
    {
        return $this->voiceCallbackType;
    }

    /**
     * @param mixed $voiceCallbackType
     * @return NumberSettings
     */
    public function setVoiceCallbackType($voiceCallbackType)
    {
        $this->voiceCallbackType = $voiceCallbackType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoiceCallbackValue()
    {
        return $this->voiceCallbackValue;
    }

    /**
     * @param mixed $voiceCallbackValue
     * @return NumberSettings
     */
    public function setVoiceCallbackValue($voiceCallbackValue)
    {
        $this->voiceCallbackValue = $voiceCallbackValue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoiceStatusCallback()
    {
        return $this->voiceStatusCallback;
    }

    /**
     * @param mixed $voiceStatusCallback
     * @return NumberSettings
     */
    public function setVoiceStatusCallback($voiceStatusCallback)
    {
        $this->voiceStatusCallback = $voiceStatusCallback;

        return $this;
    }

}