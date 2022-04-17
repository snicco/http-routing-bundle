<?php

declare(strict_types=1);

namespace Snicco\Bundle\HttpRouting\Tests\fixtures\Middleware;

use Psr\Http\Message\ResponseInterface;
use Snicco\Component\HttpRouting\Http\Psr7\Request;
use Snicco\Component\HttpRouting\Middleware\Middleware;
use Snicco\Component\HttpRouting\Middleware\NextMiddleware;

final class MiddlewareOne extends Middleware
{
    protected function handle(Request $request, NextMiddleware $next): ResponseInterface
    {
        $response = $next($request);

        $response->getBody()
            ->write(':middleware_one');

        return $response;
    }
}
