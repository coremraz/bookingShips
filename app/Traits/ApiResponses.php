<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message, $data)
    {
        return $this->success($message, $data, 200);
    }
    public function success($message, $data,$statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode,
            'data' => $data,
        ], $statusCode);
    }

    public function error($message, $data, $statusCode)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode,
            'data' => $data,
        ], $statusCode);
    }
}
