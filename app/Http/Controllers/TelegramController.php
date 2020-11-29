<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


use Illuminate\Http\Request;
use App\TelegramMember;
use App\TelegramAnnounce;
Use Exception;

class TelegramController extends Controller
{

     protected $botToken;
     protected $telegram_url;

     public function __construct(){
          $this->botToken = '1255978101:AAEwIjtn8M4l3UbdkNLhivCwc28EtNOGUwg';
          $this->telegram_url = 'https://api.telegram.org/bot'.$this->botToken;
     }

     // Telegram API and Methods

    public function getTelegramMessages(){

      // **************|| Webhook Set ||********************
         Logger('message', ['mydata'=>request()->all()]); // Check request in log
           $request = request()->all();

           $addData = new TelegramMember();
           $addData->chat_id = $request['message']['from']['id'];
           $addData->user_name = $request['message']['from']['first_name'];
           $addData->text =$request['message']['text'];
           $addData->save();

       $members = TelegramMember::all();
       foreach($members as $member){
        file_get_contents($this->telegram_url."/sendmessage?chat_id=".$member->chat_id."&text=".urlencode("ሰላም ").$member->user_name."\n\n".urlencode (" ይህ የባህር ዳር ዩኒቨርሲቲ የጨረታና ልዩ ልዩ ማስታወቂያ መከታተያ Bot ነው። እንኳን ደህና መጡ።"));
          }
       return response()->json(['Data Successfully Saved & Sent!'], 200);

      }

      public function sendMessage(Request $request){
       $members = TelegramMember::all();
       define('nam','jofnf');

          foreach($members as $member){
              file_get_contents($this->telegram_url."/sendmessage?chat_id=".$member->chat_id."&text=".urlencode($request['title'])."\n\n".urlencode($request['content']));
          }

          $announce = new TelegramAnnounce();
          $announce->title = $request['title'];
          $announce->content = $request['content'];
          $announce->save();

          return response()->json(['Message Sent Successfully'], 200);
   }


}
