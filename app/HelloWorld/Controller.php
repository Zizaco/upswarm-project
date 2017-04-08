<?php

namespace App\HelloWorld;

use App\HelloWorld\GreetingService;
use React\EventLoop\LoopInterface;
use React\Http\Request;
use Upswarm\Message;
use Upswarm\Util\Http\Controller as BaseController;
use Upswarm\Util\Http\HttpRequest;
use Upswarm\Util\Http\HttpResponse;

class Controller extends BaseController
{
    public function serve(LoopInterface $loop)
    {
        // Service initialization
    }

    public function welcome()
    {
        return "Welcome to Upswarm";
    }

    public function hello(Request $request, string $name = 'world')
    {
        $message = new Message($name, GreetingService::class, true);
        $promise = $this->sendMessage($message)->getPromise();

        $result = waitfor($promise);

        return $result->getData();
    }
}
