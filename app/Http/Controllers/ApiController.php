<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Make JSON response
     *
     * @param $data
     * @param int $status
     * @param string $errorMsg
     * @return false|string
     */
    public function makeResponse($data, $status = 200, $errorMsg = '')
    {
        if ($status != 200 || $errorMsg)
            return $this->makeResponseWithError($data, $status, $errorMsg);

        return response()->json([
            'status' => $status,
            'data' => $data,
        ], $status);
    }

    /**
     * Make JSON response with error message\status
     * Kinda useless here, but we can expand error handling if we want to
     *
     * @param $data
     * @param int $status
     * @param string $errorMsg
     * @return false|string
     */
    private function makeResponseWithError($data, int $status, string $errorMsg)
    {
        return response()->json([
            'error' => $errorMsg,
            'status' => $status,
            'data' => $data,
        ], $status);
    }
}
