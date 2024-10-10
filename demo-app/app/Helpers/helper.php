<?php

// -------------------------------------------------------------------



if (!function_exists('messageHelper')) {
    function messageHelper($msg, $task = null)
    {
        return response()->json($task ? ['message' => $msg,  'task' => $task] : ['message' => $msg], 201);
    }
}
// -------------------------------------------------------------------

if (!function_exists('jsonResponse')) {
    function jsonResponse($data, $status = 200, $message = 'Success') {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }
}

// -------------------------------------------------------------------

if (!function_exists('errorResponse')) {
    function errorResponse($errors = [], $message = 'An error occurred', $status = 500 ) {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}



