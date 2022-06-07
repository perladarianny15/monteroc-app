<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function show($id)
    {
        $response = [];

        $Client = Client::find($id);

        if($Client == null)
        {
            $response['client'][0] = 'Client does not exist';
            return response()->json($response, 404);
        }

        return response()->json($Client, 200);
    }

}
