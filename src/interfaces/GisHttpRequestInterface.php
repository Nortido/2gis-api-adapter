<?php
/**
 * @author Evgeny Novoselov <e.novoselov@tree-soft.com>
 */

namespace Nortido\ApiGisAdapter\Interfaces;

use HttpResponseException;

interface GisHttpRequestInterface {

    /**
     * @return array
     */
    public function getParams();

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url);

    /**
     * @return array
     */
    public function send();
}