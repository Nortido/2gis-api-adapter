<?php
/**
 * @author Evgeny Novoselov <e.novoselov@tree-soft.com>
 */

namespace Nortido\ApiGisAdapter;

use Nortido\ApiGisAdapter\Interfaces\GisHttpRequestInterface;
use Nortido\ApiGisAdapter\Interfaces\GisInterface;

class Gis implements GisInterface
{
    /**
     * @var array
     */
    private $config;
    /**
     * @var array
     */
    private $location;

    /**
     * @var string
     */
    private $query = "";

    /**
     * @var int
     */
    private $listLength;

    /**
     * @var GisHttpRequestInterface
     */
    private $request;

    /**
     * Gis constructor.
     * @param GisHttpRequestInterface $request
     */
    function __construct(GisHttpRequestInterface $request)
    {
        $this->request = $request;
        $this->config = include(__DIR__.'/../config.php');
    }

    /**
     * @return array
     */
    public function getLocation(): array
    {
        return $this->location;
    }

    /**
     * @param array $location
     * @return Gis
     */
    public function setLocation(array $location): Gis
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return Gis
     */
    public function setQuery(string $query): Gis
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return array
     */
    public function get()
    {
        $list = $this->request
            ->setUrl($this->config->url)
            ->setParams([
                "q" => $this->query,
                "region_id" => $this->config->region_id,
                "fields" => $this->config->fields,
                "key" => $this->config->key
            ])
            ->send()
        ;

        if (!isset($list["result"]["items"])) {
            return [];
        }

        return $list["result"]["items"];
    }
}