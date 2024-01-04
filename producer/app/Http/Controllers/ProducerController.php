<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ProducerController extends Controller
{
    protected $channel;
    public function __construct(protected AMQPStreamConnection $connection)
    {
        $this->channel = $connection->channel();
    }

    public function __invoke(PostRequest $request)
    {
        $data = $request->validated();

        $fileName = time() . '_' . $data['image']->getClientOriginalName();
        $path = $data['image']->storeAs('posts', $fileName, 'public');
        $data['image'] = $path;

        try {
            $this->channel->queue_declare('rabbitmq_test', false, false, false, false);

            $message = new AMQPMessage(json_encode($data));
            $this->channel->basic_publish($message, '', 'rabbitmq_test');

            return response()->json('Success');
        } catch (Exception $e) {
            return response()->json('Error');
        }
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
