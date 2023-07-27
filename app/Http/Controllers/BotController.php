<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{
    protected $telegram;

    /**
     * Create a new controller instance.
     *
     * @param  Api  $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function updatedActivity()
    {
        $activity = Telegram::commandsHandler(true);

        Log::info('telegram $activity', [$activity]);

        return 'ok';
    }
}
