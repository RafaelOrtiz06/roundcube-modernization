<?php

namespace App\Http\Controllers;

use App\Services\IMAPService;
use App\Http\Requests\Auth\LoginRequest;

class IMAPController extends Controller
{
    public function __construct(protected IMAPService $imapService)
    {
    }

    public function login(LoginRequest $request)
    {
        $responseObject = $this->imapService->connectUser($request);

        return response()->json($responseObject->response, $responseObject->statusCode);
    }
}
