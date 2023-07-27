<?php

namespace App\Services;

use stdClass;

use Webklex\IMAP\Client;
use Webklex\IMAP\Exceptions\ConnectionFailedException;

use App\Http\Requests\Auth\LoginRequest;


class IMAPService
{
    public function connectUser(LoginRequest $user)
    {
        $responseObject = new stdClass();

        $responseObject->response = '';
        $responseObject->statusCode = 200;

        try {
            $client = $this->generateIMAPConnection($user);

            unset($client->password);

            $responseObject->response = $client;
        } catch (ConnectionFailedException $e) {
            $responseObject->response = 'Error: ' . $e->getMessage();
            $responseObject->statusCode = 401;
        }

        return $responseObject;
    }

    private function generateIMAPConnection(LoginRequest $user)
    {
        $client = new Client([
            'host' => env('IMAP_HOST'),
            'port' => env('IMAP_PORT'),
            'encryption' => env('IMAP_ENCRYPTION'),
            'validate_cert' => env('IMAP_VALIDATE_CERT'),
            'username' => $user->input('username'),
            'password' => $user->input('password')
        ]);

        return $client->connect(1);
    }
}
