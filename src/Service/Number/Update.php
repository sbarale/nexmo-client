<?php

namespace Nexmo\Service\Number;

use Nexmo\Exception;
use Nexmo\Service\Service;

/**
 * Update a number's settings
 *
 * @author Sebastian Barale <sebasinar@gmail.com>
 */
class Update extends Service
{
    /**
     * @inheritdoc
     */
    public function getRateLimit()
    {
        // Max number of requests per second. Nexmo developer API claims 3/sec max, but actually more than 2/sec causes error 429 Too Many Requests.
        return 2;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return 'number/update';
    }

    /**
     * @param NumberSettings $parameters
     *
     * @return boolean
     * @throws Exception
     */
    public function invoke(NumberSettings $parameters = null)
    {
        if (!$parameters->getCountry()) {
            throw new Exception("\$country parameter cannot be blank");
        }
        if (!$parameters->getMsisdn()) {
            throw new Exception("\$msisdn parameter cannot be blank");
        }

        return $this->exec([
            // Nexmo API requires $country value to be uppercase.
            'country'             => strtoupper($parameters->getCountry()),
            'msisdn'              => $parameters->getMsisdn(),
            'moHttpUrl'           => $parameters->getMoHttpUrl(),
            'moSmppSysType'       => $parameters->getMoSmppSysType(),
            'voiceCallbackType'   => $parameters->getVoiceCallbackType(),
            'voiceCallbackValue'  => $parameters->getVoiceCallbackValue(),
            'voiceStatusCallback' => $parameters->getVoiceStatusCallback(),
        ], 'POST');
    }


    /**
     * @inheritdoc
     */
    protected function validateResponse(array $json)
    {
        if (!isset($json['error-code'])) {
            throw new Exception('no error code');
        }

        switch ($json['error-code']) {
            case '200':
                return true;

            case '401':
                throw new Exception('error 401 wrong credentials');

            case '420':
                throw new Exception('error 420 wrong parameters');

            default:
                throw new Exception('unknown error code');
        }
    }
}
