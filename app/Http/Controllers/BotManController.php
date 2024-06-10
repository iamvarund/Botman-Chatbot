<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends \Illuminate\Routing\Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi') {
                $this->askName($botman);
            }
            
            else{
                $botman->reply("Start a conversation by saying hi.");
            }

        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) use ($botman) {
    
            $name = $answer->getText();
    
            $botman->reply('Nice to meet you '.$name);
        });
    }
}
