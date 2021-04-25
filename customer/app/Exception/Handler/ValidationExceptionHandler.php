<?php


namespace App\Exception\Handler;


use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Codec\Json;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ValidationExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        if ($throwable instanceof ValidationException) {
            $this->stopPropagation();
            /** @var \Hyperf\Validation\ValidationException $throwable */
            $message = $throwable->validator->errors()->first();
            $code = $throwable->status;
            return $response->withStatus($code)->withBody(new SwooleStream(Json::encode([
                'message' => $message,
                'result' => [],
                'code' => $code
            ])));
        }
        return $response;
    }

    public function isValid(Throwable $throwable): bool
    {
        // TODO: Implement isValid() method.
        return true;
    }
}