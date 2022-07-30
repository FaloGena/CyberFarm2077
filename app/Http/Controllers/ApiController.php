<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @param $data
     * @param int $status
     * @return false|string
     */
    public function makeResponse($data, $status = 200, $errorMsg = '')
    {
        if ($status != 200)
            return $this->makeResponseWithError($data, $status, $errorMsg);

        return response()->json([
            'status' => $status,
            'data' => $data,
        ], $status);
    }

    /**
     * Kinda useless here, but we can expand error handling if we want to
     *
     * @param $data
     * @param int $status
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
