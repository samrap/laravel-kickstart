<?php

namespace Samrap\Kickstart\Exceptions;

use Exception;
use Whoops\Run as Whoops;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
use Illuminate\Http\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        if ($this->shouldUseCustomHandler($e)) {
            $json = $request->ajax();

            return $this->renderExceptionWithWhoops($e, $json);
        }

        return parent::render($request, $e);
    }

    /**
     * Determine if the custom exception handler should be used.
     *
     * @param  \Exception $e
     * @return boolean
     */
    protected function shouldUseCustomHandler(Exception $e)
    {
        // If the error is an instance of any of these exceptions, the custom
        // error handler will not be used.
        $useDefault = [
            $e instanceof ValidationException,
            $e instanceof NotFoundHttpException,
            $e instanceof ModelNotFoundException,
            $e instanceof AuthorizationException,
        ];

        return config('app.debug') && ! in_array(true, $useDefault);
    }

    /**
     * Render an exception using Whoops.
     *
     * @param  \Exception $e    The Exception object
     * @param  string     $json Whether to use the JsonResponseHandler instead
     *                          of the PrettyPageHandler.
     * @return \Illuminate\Http\Response
     */
    protected function renderExceptionWithWhoops(Exception $e, $json = false)
    {
        $whoops = new Whoops;

        if ($json) {
            $whoops->pushHandler(new JsonResponseHandler);
        } else {
            $whoops->pushHandler(new PrettyPageHandler);
        }

        return new Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }
}
