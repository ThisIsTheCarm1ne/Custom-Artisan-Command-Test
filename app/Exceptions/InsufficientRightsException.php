<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsufficientRightsException extends Exception
{
    /**
     * Report the exception.
     */
    public function __construct(
        $message = "User does not have sufficient rights to perform this action.",
        $code = 403,
        Exception $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

    if (!$user->canCreatePost()) {
        throw new \App\Exceptions\InsufficientRightsException();
    }

    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        if ($exception instanceof \App\Exceptions\InsufficientRightsException) {
            return response()->json([
                'error' => 'Insufficient rights',
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return parent::render($request, $exception);
    }
}
