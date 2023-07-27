<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IMAPController extends Controller
{
    public function index() {
        $mailbox = Client::account('default');
        $mailbox->connect();
    }
}
