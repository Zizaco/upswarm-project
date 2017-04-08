<?php

namespace App\HelloWorld;

use React\EventLoop\LoopInterface;
use Upswarm\Service;
use Upswarm\Message;

class GreetingService extends Service
{
    public function serve(LoopInterface $loop)
    {
        // Service initialization
    }

    public function handleMessage(Message $message, LoopInterface $loop)
    {
        // Handles received messages
        switch ($message->getDataType()) {
            case 'string':
                $responseMessage = new Message('Hello '.$message->getData());
                $message->respond($responseMessage);
                break;

            default:
                echo "Unknow message type lol";
                break;
        }
    }
}
