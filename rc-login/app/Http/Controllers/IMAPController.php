<?php

namespace App\Http\Controllers;

use Exception;

use App\Services\IMAPService;
use App\Http\Requests\Auth\LoginRequest;

class IMAPController extends Controller
{

    private IMAPService $imapService;

    public function __construct(IMAPService $imapService)
    {
        $this->imapService = $imapService;
    }

    public function login(LoginRequest $request)
    {
        try {
            $responseObject = $this->imapService->connectUser($request);

            return response()->json($responseObject->response, $responseObject->statusCode);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to connect to IMAP server.'], 500);
        }
    }
}
