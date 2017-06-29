<?php
/**
 * @author Evgeny Novoselov <e.novoselov@tree-soft.com>
 */

namespace Nortido\ApiGisAdapter;

use Nortido\ApiGisAdapter\Interfaces\GisHttpRequestInterface;
use GuzzleHttp\Client;

class GisHttpRequest implements GisHttpRequestInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $params;

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function send()
    {
        $client = new Client();

            $res = $client->get($this->url, ['query' => $this->params]);

        if ($res->getStatusCode() == 200) {
            $resArr = json_decode($res->getBody(), true);

            if (is_array($resArr)) {
                return $resArr;
            }
        }

        return [];
    }
}