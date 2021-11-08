<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GDPRControleler extends Controller
{
    /*  webhook customers/data_request */
    public function customersDataRequest(Request $request)
    {
        return response()->json(
            [

            ], 200
        );
    }

    /*  webhook customers/redact */
    public function customersRedact(Request $request)
    {
        return response()->json(
            [

            ], 200
        );
    }

    /*  webhook shop/redact */
    public function shopRedact(Request $request)
    {
        $getUser = User::where('name', $request->shop_domain)->first();
        if ($getUser) {
           $getUser->delete();
        }
        return response()->json(
            [

            ], 200
        );
    }
}
