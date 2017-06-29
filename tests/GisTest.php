<?php
/**
 * @author Evgeny Novoselov <e.novoselov@tree-soft.com>
 */

namespace Nortido\ApiGisAdapter\Tests;

use Nortido\ApiGisAdapter\Gis;
use Nortido\ApiGisAdapter\GisHttpRequest;
use PHPUnit\Framework\TestCase;

class GisTest extends TestCase
{
    /**
     * Successful request of 2gis objects list by query
     */
    function testGisRequest()
    {
        $response = (new Gis(new GisHttpRequest()))->setQuery("шаурма")->get();
        $this->assertArrayHasKey(0, $response);
    }

    /**
     * Failure request of 2gis objects list without query
     */
    function testGisRequestWithoutQuery()
    {
        $response = (new Gis(new GisHttpRequest()))->get();
        $this->assertArrayNotHasKey(0, $response);
    }
}
