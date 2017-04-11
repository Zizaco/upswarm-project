<?php

namespace App\HelloWorld;

use App\HelloWorld\GreetingService;
use React\EventLoop\LoopInterface;
use RingCentral\Psr7\Request;
use Upswarm\Message;
use Upswarm\Util\Http\ControllerService;

class Controller extends ControllerService
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

        $result = waitfor($message);

        return $result->getData();
    }
}
