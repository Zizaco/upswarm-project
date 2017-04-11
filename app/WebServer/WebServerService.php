<?php

namespace App\WebServer;

use React\EventLoop\LoopInterface;
use React\Http\Request;
use React\Socket\ConnectionException;
use Upswarm\Service;
use Upswarm\Util\Http\HttpServer;

/**
 * Application WebServer. The contact point with the world of internetz.
 */
class WebServerService extends Service
{
    /**
     * Provide the given service. This is the initialization point of the
     * service. In this case, creates a new HttpServer and register it's routes.
     *
     * @param LoopInterface $loop ReactPHP Loop.
     *
     * @return void
     */
    public function serve(LoopInterface $loop)
    {
        $server = new HttpServer($this);

        $server->routes(function ($router) {
            require __DIR__.'/routes.php';
        });

        echo "Listening on port 8081\n";
        $server->listen(8081);
    }

    /**
     * Welcome action
     *
     * @param  Request $request Upswarm http request object.
     * @param  string  $name    Parameter in path.
     *
     * @return mixed HttpResponse object or string.
     */
    public function welcome(Request $request, string $name = 'world')
    {
        return "Welcome $name!";
    }
}
