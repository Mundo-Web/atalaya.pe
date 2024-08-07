<?php

namespace App\Jobs;

use App\Http\Controllers\SettingController;
use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SoDe\Extend\Fetch;
use SoDe\Extend\Text;
use App\Http\Controllers\UtilController;

class SendNewLeadNotification implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function handle()
  {
    $client = $this->client;
    try {
      $to = Text::keep(SettingController::get('whatsapp-new-lead-notification-waid'), '0123456789@gc.us');
      $content = SettingController::get('whatsapp-new-lead-notification-message');

      foreach ($client->toArray() as $key => $value) {
        $content = str_replace('{{' . $key . '}}', $value, $content);
      }

      new Fetch('https://wajs.factusode.xyz/api/send', [
        'method' => 'POST',
        'headers' => [
          'Content-Type' => 'application/json'
        ],
        'body' => [
          'from' => 'atalaya',
          'to' => [$to],
          'content' => UtilController::html2wa($content)
        ]
      ]);
    } catch (\Throwable $th) {
      dump($th->getMessage());
    }
  }
}
