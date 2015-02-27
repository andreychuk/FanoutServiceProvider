<?php

namespace Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class FanoutServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['fanout'] = $app->share(
            function () use ($app) {
                if (!isset($app['fanout.realm'])) {
                    throw new \Exception('fanout.realm undefined');
                }
                if (!isset($app['fanout.realmkey'])) {
                    throw new \Exception('fanout.realmkey undefined');
                }

                $fanout = new \Fanout(
                    $app['fanout.realm'], $app['fanout.realmkey']
                );

                return $fanout;
            }
        );
    }

    public function boot(Application $app)
    {
    }
}