<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function apiResponse($data, $message = null, $code = 200, $status = ApiEnumeration::SUCCESS)
    {
        $response = array();

        $response['success'] = $status == ApiEnumeration::SUCCESS ? true : false;

        if ($status != ApiEnumeration::ERROR) {
            $response['data'] = $data;
        }

        if ($status == ApiEnumeration::ERROR) {
            $response['errors'] = $data;
        }

        if (isset($message) && !is_null($message)) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }
}
