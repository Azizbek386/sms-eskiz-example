<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class EskizController extends Controller
{
    public function sendSms()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken(),
        ])->asForm()->post('https://api.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => '998931123387',
            'message' => 'Afisha Market MCHJ Tasdiqlovchi kodni kiriting:12345',
            'from' => '4546', 
            'callback_url' => '',
        ]);

        return $response->json();
    }

    protected function getToken()
    {
        $token = Cache::get('eskiz_api_token');

        if (!$token) {
            $response = Http::asForm()->post('https://api.eskiz.uz/api/auth/login', [
                'email' => config('services.eskiz.email'),
                'password' => config('services.eskiz.password'),
            ]);

            $token = $response['data']['token'];
            Cache::put('eskiz_api_token', $token, now()->addDays(30));
        }

        return $token;
    }
}
