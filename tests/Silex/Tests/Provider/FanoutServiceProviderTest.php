<?php

namespace Silex\Tests\Provider;

use Silex\Application;
use Silex\Provider\SerializerServiceProvider;
use Silex\Provider\FanoutServiceProvider;
/*
 * FanoutServiceProviderTest
 */
class FanoutServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /*
     * testRegister
     */
    public function testRegister()
    {
        $realm = 'realm';
        $realmkey = 'realmkey';
        $app = new Application();
        $app->register(new FanoutServiceProvider(), array(
                "fanout.realm" => $realm,
                "fanout.realmkey" => $realmkey
            ));
        $tp = $app['fanout'];

        $this->assertInstanceOf("\\Fanout\\Fanout", $tp);
    }
}