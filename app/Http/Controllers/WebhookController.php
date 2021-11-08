<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tele;
class WebhookController extends Controller
{
    public function listenWebhooks(Request $request)
    {
        if($request->header('x-shopify-topic')){
            return $this->pushNotifiToSlack($request);
        }
        return response()->json(['title' => "successfully"], 200);
    }

    public function pushNotifiToSlack($request)
    {
        $user = User::where('name', $request->header('x-shopify-shop-domain'))->first();
        if ($user) {
            $slack = Tele::where('user_id', $user->id)->where('registration_for', $request->header('x-shopify-topic'))->first();
            if ($slack) {
                $bodyText = ['text' => 'Shop name: ' . $request->header('x-shopify-shop-domain') . "\n" . 'Status order: ' . $request->header('x-shopify-topic') . "\n" . 'ID customer: ' . $request->id . "\n" . 'Email: ' . $request->email . "\n" . 'Phone: ' . $request->phone . "\n" . 'Last name: ' . $request->last_name . "\n" . 'First name: ' . $request->first_name . "\n" . 'Currency: ' . $request->currency ];
                if ($slack->status) {
                    $url = 'https://api.telegram.org/bot'.config('telegram_info.token').'/sendMessage?chat_id=-'.$slack->tele_id;
                    
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_POSTFIELDS => $bodyText
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);
                }
            }
        }
        return response()->json(['title' => "successfully"], 200);
    }
}
