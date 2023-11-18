<?php

use Twilio\Rest\Client;

function sendMessage($msg, $status, $code)
{
    $res = [
        'status' => $status,
        'message' => $msg,
    ];
    return response()->json($res, $code);
}
