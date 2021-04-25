<?php


namespace App\Exception\Handler;


use App\Constants\ErrorCode;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Exception\HttpException;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Codec\Json;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BaseExceptionHandler extends ExceptionHandler
{

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        if ($throwable instanceof HttpException) {
            $this->stopPropagation();
            $code = $throwable->getStatusCode();
            $message = ErrorCode::getMessage($code);
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
        return true;
    }
}