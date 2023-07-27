<?php

namespace App\Http\Controllers;

use Webklex\IMAP\Facades\Client;

use Illuminate\Http\Request;

class IMAPController extends Controller
{
    public function index() {
        $mailbox = Client::account('default');
        $mailbox->connect();
    }
}
