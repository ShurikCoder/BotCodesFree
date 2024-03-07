<?php
ob_start();
$token = 'token';
$admin = '5809283774';
define('API_KEY', $token '7180451141:AAGI8z6Ud7BuGkORYE0Jt3v_to7bbRbL3HU');

// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1

function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$uid = $message->from->id; 
$ty = $message->chat->type;
$name = $message->from->first_name;
$mid = $message->message_id;
$audio = $message->audio;
$data = $update->callback_query->data;
$cmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$qid = $update->callback_query->id; 
$ctext = $update->callback_query->message->text; 
$callfrid = $update->callback_query->from->id; 
$callfname = $update->callback_query->from->first_name;  
$calltitle = $update->callback_query->message->chat->title; 
$calluser = $update->callback_query->message->chat->username; 
$channel = $update->channel_post; //shu
$channel_text = $channel->text;
$channel_mid = $channel->message_id; 
$channel_id = $channel->chat->id; 
$channel_title = $channel->chat->title;
$channel_user = $channel->chat->username; 
$chanel_doc = $channel->document; 
$chanel_vid = $channel->video; 
$chanel_mus = $channel->audio; 
$chanel_voi = $channel->voice; 
$chanel_gif = $channel->animation; 
$chanel_fot = $channel->photo; //shu
$chanel_txt = $channel->text; 
$caption =$channel->caption; 
$chat_id = $message->chat->id;
// @VzlomGeymerUz  @VzlomGeymerUz
mkdir("stat");
$guruhlar = file_get_contents("stat/group.db");
$userlar = file_get_contents("stat/user.db");
$xabar = file_get_contents("xabarlar.txt");
     
if($tx == "/start") {
	   $userlar = file_get_contents("stat/user.db");
   if(stripos($userlar,"$cid")!==false){
    }else{
    file_put_contents("stat/user.db","$userlar\n$cid");
       }     
bot('sendMessage',[
'chat_id'=>$cid,
'parse_mode'=>"markdown",
'text'=>"*ðŸ‘‹ðŸ˜Š Assalomu alaykum! $name
ðŸ˜ŠMeni kanalingizga admin qiling va men kanalingizga tashlangan musiqalarga avtomatik kanal @username sini qo'yib beraman

Bot faqat kanallarda ishlaydiðŸŽ§

ðŸ’£Kanalimiz* [@VZLOM_MOD_GAMES1]",
]);
}
// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
     if (isset($message->audio)){
     	if(stripos($guruhlar,"$channel_id")!==false){
    }else{
    file_put_contents("stat/group.db","$guruhlar\n$channel_id");
    }  
$file_id = $message->audio->file_id;

      $get = bot('getfile',['file_id'=>$file_id]);
      $patch = $get->result->file_path;

// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
      file_put_contents('test.mp3', file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch));

copy('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch, 'music.mp3');
}
if (isset($channel->audio)){
	if(stripos($guruhlar,"$channel_id")!==false){
    }else{
    file_put_contents("stat/group.db","$guruhlar\n$channel_id");
    }  // @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
$file_id = $channel ->audio->file_id;
$title = $channel ->audio->title;
$performer = $channel ->audio->performer;
      $get = bot('getfile',['file_id'=>$file_id]);
      $patch = $get->result->file_path;


      file_put_contents('music.mp3', file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch));

bot('deletemessage',[
    'chat_id'=>$channel_id,
    'message_id'=>$channel_mid,
  ]);
bot('sendaudio',[
'chat_id'=>$channel_id,
'audio'=>new CURLFile("music.mp3"),
'title'=>"$performer - $title",
'performer'=>'@'.$channel_user,
 'caption'=>"â™¬ $performer - $title 

$caption",
]);
} 
// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
if($tx=="/send" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>" Yuboriladigan  xabar matnini kiriting ",
    'parse_mode'=>"html",
]);
    file_put_contents("xabarlar.txt","user");
}
if($xabar=="user" and $cid==$admin){
if($tx=="/otmen"){
  file_put_contents("xabarlar.txt","");
}else{
  $lich = file_get_contents("stat/user.db");
  $lichka = explode("\n",$lich);
  foreach($lichka as $lichkalar){
  $okuser=bot("sendmessage",[
    'chat_id'=>$lichkalar,
    'text'=>$tx,
    'parse_mode'=>'html'
]);
}// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1

if($okuser){
  bot("sendmessage",[
    'chat_id'=>$admin,
    'text'=>"Hamma userlarga yuborildi!",
    'parse_mode'=>'html',
]);
  file_put_contents("xabarlar.txt","");
}
}
}
if($tx=="/sendchannel" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Kanallarga yuboriladigan xabar matnini kiriting!",
    'parse_mode'=>"html",
  ]);
  file_put_contents("xabarlar.txt","guruh");
}// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
if($xabar=="guruh" and $cid==$admin){
  if($tx=="/otmen"){
  file_put_contents("xabarlar.txt","");
}else{
  $gr = file_get_contents("stat/group.db");
  $grup = explode("\n",$gr);
foreach($grup as $chatlar){
  $okguruh=bot("sendmessage",[
    'chat_id'=>$chatlar,
    'text'=>$tx,
    'parse_mode'=>'html',
]);
}
if($okguruh){ // @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
  bot("sendmessage",[
    'chat_id'=>$admin,
    'text'=>"Hamma kanallarga yuborildi!",
    'parse_mode'=>'html',
]);
  file_put_contents("xabarlar.txt","");
}
}
} // @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
if($tx == "/stat"){
$gr = substr_count($guruhlar,"\n"); 
$us = substr_count($userlar,"\n"); 
$obsh = $gr + $us;
   bot('sendMessage',[
   'chat_id'=>$cid,
    'text'=> "Bot statistikasi:

ðŸ‘¤A'zolar: <b>$us</b>

ðŸ“¡Kanallar: <b>$gr</b>

ðŸ“£Umumiy: <b>$obsh</b>\n",
'parse_mode' => 'html',
]);
}
// @VZLOM_MOD_GAMES1  @VZLOM_MOD_GAMES1
?>