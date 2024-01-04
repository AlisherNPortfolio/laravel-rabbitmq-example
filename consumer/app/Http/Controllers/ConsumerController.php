<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PDOException;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class ConsumerController extends Controller
{
    protected $channel;
    public function __construct(protected AMQPStreamConnection $connection)
    {
        $this->channel = $connection->channel();
    }

    public function __invoke(Request $request)
    {
        $this->channel->queue_declare('rabbitmq_test', false, false, false, false);

        $this->channel->basic_consume('rabbitmq_test', '', false, false, false, false, function ($message) {
            $data = json_decode($message->body);

            Post::query()->create([
                'title' => $data->title,
                'body' => $data->body,
                'image' => $data->image,
                'status' => $data->status
            ]);

            $message->ack();
        });

        try {
            $this->channel->consume();
            return response()->json('Received');
        } catch (PDOException $e) {
            return response()->json($e->getMessage());
        } catch (\Throwable $e) {
            return response()->json($e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
