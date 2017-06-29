<?php
/**
 * @author Evgeny Novoselov <e.novoselov@tree-soft.com>
 */
namespace Nortido\ApiGisAdapter\Interfaces;

interface GisInterface
{
    /**
     * @param array $data
     * @return GisInterface
     */
    public function setLocation(array $data);

    /**
     * @return array
     */
    public function getLocation();

    /**
     * @param string $category
     * @return GisInterface
     */
    public function setQuery(string $category);

    /**
     * @return string
     */
    public function getQuery();
}