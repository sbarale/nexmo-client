<?php

namespace Nexmo\Service;

use Nexmo\Exception;

/**
 * Class Service
 *
 * @package Nexmo\Service
 */
abstract class Service extends Resource
{
    /**
     * @return mixed
     */
    abstract public function invoke();

    /**
     * @return array
     */
    public function __invoke()
    {
        return call_user_func_array([ $this, 'invoke' ], func_get_args());
    }

    /**
     * @param $params
     * @throws Exception
     * @return array
     */
    protected function exec($params, $method = 'GET')
    {
        $params = array_filter($params);

        //Add default params
        $params += $this->getDefaultQuery();

        if ('GET' == $method) {
            $response = $this->client->get($this->getEndpoint(), [
                'query' => $params,
            ]);
        } else {
            $response = $this->client->post($this->getEndpoint(), [
                'form_params' => $params,
            ]);
        }


        $body = $response->getBody()->getContents();

        // Because validateResponse() expects an array, we can only do so if the response body is not empty (which in some cases is a valid response), otherwise $json will be null.
        if (strlen($body) > 0) {
            $json = @json_decode($body, true);

            //Check for json decode errors and throw exception if any
            $jsonErrorCode = json_last_error();
            if ($jsonErrorCode) {
                throw new Exception(
                    json_last_error_msg(),
                    $jsonErrorCode
                );
            }
        } else {
            $json = [];
        }

        $this->validateResponse($json);

        return $json;
    }

    /**
     * @return string
     */
    abstract public function getEndpoint();


    /**
     * @param array $json
     * @return bool
     */
    abstract protected function validateResponse(array $json);
}
