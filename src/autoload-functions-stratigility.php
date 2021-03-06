<?php
/**
 * Provide aliases for zend-stratigilty functions.
 *
 * @see       https://github.com/laminas/laminas-zendframework-bridge for the canonical source repository
 * @copyright Copyright (c) 2019 Laminas Foundation (https://getlaminas.org)
 * @license   https://github.com/laminas/laminas-zendframework-bridge/blob/master/LICENSE.md New BSD License
 */

namespace Zend\Stratigility;

use Laminas\Stratigility\Middleware\CallableMiddlewareDecorator;
use Laminas\Stratigility\Middleware\DoublePassMiddlewareDecorator;
use Laminas\Stratigility\Middleware\HostMiddlewareDecorator;
use Laminas\Stratigility\Middleware\PathMiddlewareDecorator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;

use function Laminas\Stratigility\doublePassMiddleware as laminasDoublePassMiddleware;
use function Laminas\Stratigility\host as laminasHost;
use function Laminas\Stratigility\middleware as laminasMiddleware;
use function Laminas\Stratigility\path as laminasPath;

// Only define functions if one or more known functions do not exist
if (! function_exists(__NAMESPACE__ . '\middleware')) {
    function doublePassMiddleware(
        callable $middleware,
        ResponseInterface $response = null
    ) : DoublePassMiddlewareDecorator {
        return laminasDoublePassMiddleware($middleware, $response);
    }

    function host(string $host, MiddlewareInterface $middleware) : HostMiddlewareDecorator
    {
        return laminasHost($host, $middleware);
    }

    function middleware(callable $middleware) : CallableMiddlewareDecorator
    {
        return laminasMiddleware($middleware);
    }

    function path(string $path, MiddlewareInterface $middleware) : PathMiddlewareDecorator
    {
        return laminasPath($path, $middleware);
    }
}
