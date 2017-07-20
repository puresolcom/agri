<?php
namespace Awok\Foundation\Http\Jobs;

use Awok\Foundation\Job;
use Laravel\Lumen\Http\ResponseFactory;

class JsonResponseJob extends Job
{
    protected $status;

    protected $content;

    protected $headers;

    protected $options;

    public function __construct($content, $status = 200, array $headers = [], $options = 0)
    {
        $this->content = $content;
        $this->status  = $status;
        $this->headers = $headers;
        $this->options = $options;
    }

    public function handle(ResponseFactory $factory)
    {
        $response = [
            'data'   => $this->content,
            'status' => $this->status,
        ];

        return $factory->json($response, $this->status, $this->headers, $this->options);
    }
}