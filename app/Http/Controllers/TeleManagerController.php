<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tele;
use Illuminate\Support\Facades\Validator;

class TeleManagerController extends Controller
{


    private $validateFonts = [
        'registration_for' => 'required|in:customers/create,customers/disable,customers/enable,customers/update',
        'tele_id' => 'required|max:10',
    ];

    private $validateFontsErr = [
        'registration_for.required' => 'Please enter registration for!',
        'registration_for.in' => 'Just accept: customers/create, customers/disable, customers/enable, customers/update',

        'tele_id.required' => 'Please enter Id group telegram!',
        'tele_id.max' => 'Id group telegram too long!',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slacks = Auth::user()->tele;
        return view('welcome',compact('slacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->validateFonts, $this->validateFontsErr);
        if ($validator->fails()) {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'Error!',
                    'content' => $validator->errors()->all(),
                ],
                400
            );
        }

        $user = Auth::user();
        $url = "/admin/api/2021-10/webhooks.json";
        return $this->registerWebhook($user, $url, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->validateFonts, $this->validateFontsErr);
        if ($validator->fails()) {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'Error!',
                    'content' => $validator->errors()->all(),
                ],
                400
            );
        }

        $slack = Tele::find($id);
        if ($slack && $slack->user_id == Auth::user()->id) {
            $update = $slack->update([
                'registration_for' => $request->registration_for,
                'tele_id' => $request->tele_id,
                'status' => $request->status,
            ]);
            if ($update) {
                return response()->json([
                    'type' => 'success',
                    'content' => 'Update successfully.',
                ], 200);
            }
        }
        return response()->json(
            [
                'type' => 'error',
                'title' => 'Error!',
                'content' => 'Have a error, Please contect support!',
            ],
            400
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slack = Tele::find($id);
        if ($slack && $slack->user_id == Auth::user()->id) {
            $slack->delete();
            return response()->json([
                'type' => 'success',
                'content' => 'Delete successfully.',
            ], 200);
        }
        return response()->json(
            [
                'type' => 'error',
                'title' => 'Error!',
                'content' => 'Have a error, Please contect support!',
            ],
            400
        );
    }

    public function registerWebhook($shop, $url, $request)
    {

        $postField = [
            "webhook" => [
                "topic" => $request->registration_for,
                "address" => config('app.url').'/webhooks',
                "format" => "json"
            ]
        ];
        $result = $shop->api()->rest('POST', $url, $postField);
        if (!$result['errors']) {
            Tele::create([
                'user_id' => $shop->id,
                'tele_id' => $request->tele_id,
                'registration_for' => $request->registration_for,
                'status' => 1,
            ]);
            return response()->json([
                'type' => 'success',
                'content' => 'Register successfully.',
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'content' => 'An error occurred. Please contact support!',
        ], 500);
    }
}
