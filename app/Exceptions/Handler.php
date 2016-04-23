<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

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
        $whoops = new \Whoops\Run;

        if ($json) {
            $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);
        } else {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        }

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }
}
