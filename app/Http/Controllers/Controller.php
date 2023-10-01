<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function error(string $message = 'Error!', int $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message,
        ], $code);
    }

    protected function success(array|object $data = null, string $message = 'Success!', int $code = Response::HTTP_OK)
    {
        $response = [
            'success'   => true,
            'message'   => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    protected function fail(array|object $data = null, string $message = 'Failed!', int $code = Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'success'   => false,
            'message'   => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        };

        return response()->json($response, $code);
    }
}
