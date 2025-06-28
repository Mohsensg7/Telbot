<?php
/*
اراعه شده توسط سورس کده 🗣
اصکی نرو ناموصتو حفظ کن !
@Sourrce_kade
*/
define('API_KEY','7995866290:AAFo0YTHsFGzz6m0MGbTVdvGBYSF8z2FLwc');  //توکن ربات
//functions
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function SendPhoto($chat_id, $link, $text) {
bot('SendPhoto', [
'chat_id' => $chat_id, 
'photo' => $link, 
'caption' => $text
]) ;
}
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"html"
 ]);
 }
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
//Variables
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$from_id = $message->from->id;
$first = $message->from->first_name;
$last = $message->from->last_name;
$username = $message->from->username;
$first2 = $update->callback_query->message->chat->first_name;
$last2 = $update->callback_query->message->chat->last_name;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$photo = $message->photo;
$sudo = ['93939','183033652','00000000']; //ایدی مدیر ها
$admin = "7732285841"; //ایدی عددی ادمین
if (!file_exists("data/$from_id/$from_id.json")){mkdir("data/$from_id");}
$datas = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$coin1 = $datas1["coin"];
$step = $datas["step"];
$inv = $datas["inv"];
$coin = $datas["coin"];
$type = $datas["type"];
$sefaresh = $datas["sefaresh"];
$warn = $datas["warn"];
$ads = $datas["ads"];
$invcoin = $datas["invcoin"];
if(file_exists("data/starttext.txt")){
$starttext = file_get_contents("data/starttext.txt");
$starttext = str_replace('NAME',$first,$starttext);
$starttext = str_replace('LAST',$last,$starttext);
$starttext = str_replace('USER',$username,$starttext);
$starttext = str_replace('ID',$from_id,$starttext);
$botsorce = $update->message->reply_to_message->forward_from->id;
}else{
$starttext = "سلام به ربات ممبر گیر الماسی خوش آمدید 🔭
 
با استفاده از این ربات می توانید برای خود ممبر بگیرید اونم به صورت رایگان 🧨

@$idbot 🌹";
}
if(file_exists("data/zirtext.txt")){
$zirtext = file_get_contents("data/zirtext.txt");
$zirtext = str_replace('NAME',$first2,$zirtext);
$zirtext = str_replace('LAST',$last2,$zirtext);
$idbot = "SOURCE_FRANCE"; // ایدی ربات
$zirtext = str_replace('LINK',"https://t.me/$idbot?start=$chatid",$zirtext);
$zirtext = str_replace('ID',$chatid,$zirtext);
}else{
$zirtext = "💎ممبرگیر الماسی (نسخه جدید)💎
✅ سرعت بسیار بالا
✅سرعت بالا برای واریز اعضا
✅اعضا کاملا واقعی
✅دریافت 10 الماس رایگان با استفاده از لینک زیر
✅کاملا رایگان 📊
https://t.me/$idbot?start=$from_id";
}
$sup = "https://t.me/Source_Home"; //ایدی پشتیبانی بدون @
$dar = "درگاه پرداخت"; //درگاه پرداخت
$chads = "@MembersSG7"; //آیدی کانال
$chor = file_get_contents("data/ch.txt");
$channels = json_decode(file_get_contents("https://api.telegram.org/botتوکن/getChatMember?chat_id=@$chor&user_id=".$from_id or $chatid));
$to = $channels->result->status;
$reply = $update->message->reply_to_message->forward_from->id;
//============================================================================//
//co
if(!empty($from_id)){
$hhhh = explode("\n",file_get_contents("data/$from_id/channels.txt"));
foreach($hhhh as $chaaa){
     if( $chaaa != "" and $chaaa != "raf"){
 $channels5555 = json_decode(file_get_contents("https://api.telegram.org/bot847589887:AAFpopUQfv88IE7vXB15vbdt5tpfMrO_k10/getChatMember?chat_id=$chaaa&user_id=$from_id"));
 $tod5555 = $channels5555->result->status;
 if($tod5555 != 'member' && $tod5555 != 'creator' && $tod5555 != 'administrator'){
   $foiii = file_get_contents("data/$from_id/channels.txt");
   $str = str_replace("$chaaa","raf",$foiii);
   file_put_contents("data/$from_id/channels.txt","$str");
   $hjvhvh = str_replace("@","T.me/",$chaaa);
$newin = $coin -2;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
  bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"♦️ به دلیل ترک کانال زیر 
$hjvhvh ✔️
2 الماس از حساب شما کم شد 📣"
]);
}
}
}
}
if(strpos($text == "/start") !== false  && $text !=="/start"){
$id=str_replace("/start ","",$text);
$amar=file_get_contents("data/ozvs.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$datas["step"] = "free";
$datas["type"] = "empty";
$datas["inv"] = "0";
$datas["coin"] = "10";
$datas["warn"] = "0";
$datas["ads"] = "0";
$datas["sub"] = "$id";
$datas["invcoin"] = "0";
$datas["panel"] = "free";
$datas["timepanel"] = "null";
$datas['dafeee'] = "first";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$datas12 = json_decode(file_get_contents("data/$id/$id.json"),true);
$invite1 = $datas12["inv"];
$coin1 = $datas12["coin"];
settype($invite1,"integer");
$newinvite = $invite1 + 1;
$datas12["inv"] = $newinvite;
$outjson = json_encode($datas12,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"♦️ یک نفر با لینک دعوت شما به ربات پیوست
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
🔶 وقتی که اولین عضویت خود را در یک کانال انجام دهد 10 الماس به شما واریز خواهد شد
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$idbot 📣
",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"10 الماس به شما اضافه شد🏆",
'reply_to_message_id'=>$message_id,
]);
}
}
if (!file_exists("data/$from_id/$from_id.json")) {
$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$datas["step"] = "free";
$datas["type"] = "empty";
$datas["inv"] = "0";
$datas["coin"] = "0";
$datas["warn"] = "0";
$datas["ads"] = "0";
$datas["invcoin"] = "0";
$datas["panel"] = "free";
$datas["timepanel"] = "null";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
}
if($text == "/start" or $text == "/start"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$starttext
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//اپن شد توسط فرانسه سورس 
if($text == "📍دریافت الماس رایگان"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📣به بخش 💲دریافت الماس💲 خوش آمدید 📣
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ پنل رایگان [🏅] دارای ضریب 1 می باشد یعنی با دیدن 100 تبلیغ می توانید 100 الماس دریافت کنید
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ پنل طلایی [🎖] دارای 1.6 ضریب می باشد یعنی با دیدن 100 تبلیغ می توانید 160 الماس دریافت کنید
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
🔶 اگر می خواهید پنل خود را به طلایی تبدیل کنید به بخش فروشگاه مراجعه کنید 🔈
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
✔️ برای وارد شدن به کانال و دریافت الماس رایگان روی دکمه شیشه ای بزنید 🔸
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
📣 توجه برای ازای لفت از هر کانال تا قبل از 1 هفته 2 الماس از حساب شما کسر خواهد شد 📣
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$idbot 🔊",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "️🌵ورود به کانال تبلیغات🌵", 'url' => "https://t.me/$chads"]
],
]
])
]);
}
if($text == "🎯قوانین و مقررات"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🎯قوانین و مقررات
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ کانال شما نباید شامل موارد زیر باشد 📣
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ خلاف قوانین جمهوری اسلامی ایران
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ فحاشی و توهین
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ محتوای جنسی و بزرگسالان
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ مزاحمت و پخش اطلاعات افراد
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ کلاهبرداری و پخش موارد جعلی
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ سایت ها و ربات های شرط بندی
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ تبلیغ ربات های مشابه و غیر واقعی
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ فریب افراد و کاربران 
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ هک و نفوذ به برنامه ها
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
➕ و .......
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
📣توجه داشته باشید در صورتی که کانال شما شامل موارد بالا باشد سفارش آن لغو و الماس های باقی مانده پس نخواهد شد📣
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
🛢قوانین و مقررات دائما در حال به روز شدن هست و کلیه کاربران موظف به مطالعه این صفحه به صورت مکرر می باشند🛢
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
⚰ @$idbot 💰
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
if($text == "📕پیگیری خریدها"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما هیچ خریدی نداشته اید ⚘",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
if($text == "🗒پیگیری سفارشات"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if($sefaresh != null and $sefaresh != "0"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚱ تعداد سفارش اخیر شما ⚱
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
$sefaresh 
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
جهت پیگیری آن ها وارد کانال تبلیغات شوید 👀
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
و در زیر پست های خود روی پیگیری سفارش بزنید ✔️
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$chads ➿",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"➿متاسفانه شما هیچ سفارشی ثبت نکرده اید➿
🙈هرچه زودتر سفارش دهید🙈",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
if($text == "🛒فروشگاه"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"برای ⚘خرید الماس⚘ به آیدی زیر مراجعه فرمایید👇
$sup
پس هم اکنون اقدام کنید📍
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "💎50 الماس هزارتومن💎", 'callback_data' => "buy50"]
                    ],
                    [
['text' => "💎100 الماس دوهزارتومن💎", 'callback_data' => "buy100"]
                    ],
                    [
['text' => "💎200 الماس چهار هزارتومن💎", 'callback_data' => "buy200"]
                    ],
                    [
['text' => "💎500 الماس هفت هزارتومن💎", 'callback_data' => "buy500"]
                    ],
[
['text' => "💎1000 الماس ده هزارتومن💎", 'callback_data' => "buy1000"]
],
]
])
]);
}
if($data == "buy50"){
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
بسته ی 50 الماسی انتخاب شد💳
لطفا وارد لینک زیر شوید🛒
$dar
سپس مبلغ را 2000 تومان وارد کنید و پس از شات از رسید را به پشتیبانی تحویل دهید و امتیاز خود را دریافت کنید🛍
",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id2,
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "پرداخت🛍️", 'url' => "$dar"],['text' => "🔉پشتیبانی", 'url' => "$sup"]
],
]
])
]); 
}
if($data == "buy100"){
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
بسته ی 100 الماسی انتخاب شد💳
لطفا وارد لینک زیر شوید🛒
$dar
سپس مبلغ را 4000 تومان وارد کنید و پس از شات از رسید را به پشتیبانی تحویل دهید و امتیاز خود را دریافت کنید🛍
",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id2,
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "پرداخت🛍️", 'url' => "$dar"],['text' => "🔉پشتیبانی", 'url' => "$sup"]
],
]
])
]); 
}
if($data == "buy200"){
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
بسته ی 200 الماسی انتخاب شد💳
لطفا وارد لینک زیر شوید🛒
$dar
سپس مبلغ را 8000 تومان وارد کنید و پس از شات از رسید را به پشتیبانی تحویل دهید و امتیاز خود را دریافت کنید🛍
",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id2,
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "پرداخت🛍️", 'url' => "$dar"],['text' => "🔉پشتیبانی", 'url' => "$sup"]
],
]
])
]); 
}
if($data == "buy500"){
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
بسته ی 500 الماسی انتخاب شد💳
لطفا وارد لینک زیر شوید🛒
$dar
سپس مبلغ را 20000 تومان وارد کنید و پس از شات از رسید را به پشتیبانی تحویل دهید و امتیاز خود را دریافت کنید🛍
",
'parse_mode'=>"html",
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "پرداخت🛍️", 'url' => "$dar"],['text' => "🔉پشتیبانی", 'url' => "$sup"]
],
]
])
]); 
}
if($data == "buy1000"){
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"
بسته ی 1000الماسی انتخاب شد💳
لطفا وارد لینک زیر شوید🛒
$dar
سپس مبلغ را 35000 تومان وارد کنید و پس از شات از رسید را به پشتیبانی تحویل دهید و امتیاز خود را دریافت کنید🛍
",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id2,
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "پرداخت🛍️", 'url' => "$dar"],['text' => "🔉پشتیبانی", 'url' => "$sup"]
],
]
])
]); 
}
if($text == "🌵دریافت ممبر"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند لحظه صبر کنید ...",
'reply_to_message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚘تعداد عضو مورد نظر خود رو انتخاب کنید⚘",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "20 عضو👤|💎40 الماس", 'callback_data' => "seen45"]],[['text' => "40 عضو👤|💎80 الماس", 'callback_data' => "seen80"]
                    ],
                    [
['text' => "50 عضو👤|💎100 الماس", 'callback_data' => "seen130"]],[['text' => "80 عضو👤|💎150 الماس", 'callback_data' => "seen150"]
                    ],
                    [
['text' => "110 عضو👤|💎180 الماس", 'callback_data' => "seen180"]],[['text' => "130 عضو👤|💎200 الماس", 'callback_data' => "seen220"]
                    ],
                    [
['text' => "150 عضو👤|💎220 الماس", 'callback_data' => "seen250"]],[['text' => "180 عضو👤|💎260 الماس", 'callback_data' => "seen280"]
                    ],
                    [
])
]);
}
if ($data == "seen45") {
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$datas1["ted"] = "20";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$in = $datas1["coin"];
if ($in >= "40") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
                        
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen80") {
$datas1["ted"] = "40";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "80") {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
 ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen130") {
$datas1["ted"] = "50";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >= "100") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen150") {
$datas1["ted"] = "80";
$outjson = json_encode($datas,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >="150") {
        $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
    } if ($data == "seen180") {
$datas1["ted"] = "110";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
        $datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
        $in = $datas1["coin"];
        if ($in >="180") {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "تعداد  الماس های شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        } else {
            $datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
          ]);
        }
    }
    if ($data == "seen220") {
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$datas1["ted"] = "130";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$in = $datas1["coin"];
if ($in >= "200") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
                        
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
        if ($data == "seen250") {
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$datas1["ted"] = "150";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$in = $datas1["coin"];
if ($in >= "220") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
                        
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
        if ($data == "seen280") {
$datas1 = json_decode(file_get_contents("data/$chatid/$chatid.json"),true);
$datas1["ted"] = "180";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
$in = $datas1["coin"];
if ($in >= "260") {
$datas1["step"] = "seen2";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "🔸لطفا ایدی کانال خود را بدون @ وارد کنید🔸

🔺قبل از ارسال حتما ربات ممبرگیر را با ایدی @$idbot را در کانال خود مدیر کنید🔺",
                        
            ]);
        } else {
             bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "موجودی شما جهت سفارش کافی نیست🔖",
                'reply_markup' => json_encode([
                 "resize_keyboard"=>true,'one_time_keyboard' => true,
                'inline_keyboard' => [
                            [
            ['text' => "⚘خرید الماس⚘", 'callback_data' => "buycoin"]
                            ],
                        ]
                    ])
            ]);
        }
if ($step == "seen2") {
    $get = bot('getChat',[
        'chat_id'=>'@'.$text
        ]);
        if($get->result->type == 'channel'){
			$sef = file_get_contents('data'.$from_id.'sef.txt');
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا کمی صبر کنید.....🔥",
'reply_to_message_id'=>$message_id,
]);
$text=str_replace('@','',$text);
$channels255 = json_decode(file_get_contents("https://api.telegram.org/botتوکن/getChatMember?chat_id=@$text&user_id=847589887")); //توکن
$tod = $channels255->result->status;
if(!file_exists("ads/cont/$text.txt")){
if($tod == 'member' or $tod == 'creator' or $tod == 'administrator'){
$get = bot('getchat',[
    'chat_id'=>"@$text"
    ])->result->photo->big_file_id;
     $esm = bot('getchat',[
    'chat_id'=>"@$text"
    ])->result->title;
  if(!is_null($get)){
    $pic = bot('getfile',[
    'file_id'=>$get
    ])->result->file_path;
    $re = rand(111,999);
    file_put_contents('prof/P_'.$re.'.png',file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$pic));
    echo $phot = '#####/P_'.$re.'.png'; //لینک عکس
  }else{
    echo $phot = '#####'; //لینک عکس
  }
$post_id = bot('SendPhoto', [
'chat_id' =>"@$chads", 
'photo' =>$phot,
'caption' =>  "
🔸 نام کانال : [$esm] 🔸

🎗 برای دریافت الماس ابتدا در کانال زیر عضو شوید و بعد بر روی دکمه 💎دریافت الماس💎 بزنید 🍌",
'parse_mode' => "html",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🌵عضویت در کانال🌵",'url' => "https://t.me/$text"]],
[['text' => "💎دریافت الماس💎", 'callback_data' => "getcoin-$text"]],
[['text' => "🌴ورود به ممبرگیر🌴", 'url' => "https://t.me/$idbot"]],
]
])
])->result->message_id;
if($post_id>0){
$al = $datas["ted"];
$fksdgnkfe = $al *2;
$getsho = $coin - $fksdgnkfe;
$datas["coin"] = "$getsho";
$nu = $sefaresh + 1;
$datas["sefaresh"] = "$nu";
$outjson = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
file_put_contents("ads/postid/$text.txt", $post_id);
file_put_contents("ads/cont/$text.txt",$al);
file_put_contents("ads/admin/$text.txt",$chat_id);
file_put_contents("ads/seen/$text.txt","0");
file_put_contents("ads/user/$text.txt","");
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'reply_to_message_id'=>$message_id,
'text' => "️کانال شما با موفقیت ثبت شد ✔️
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ ربات ممبرگیر را به هیچ وجه از ادمینی درنیارید چون سفارش شما لغو خواهد شد 
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ در طول سفارش ایدی کانال خود را عوض نکنید
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$idbot ✔️",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>'✅برای دیدن تبلیغ خود در کانال دکمه را لمس کنید.','url'=>"http://t.me/$chads/$post_id"]],
]
])
            ]);
            bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❇️ صفحه اصلی

برای انجام عملیات مورد نظر، لطفا از دکمه های پایین استفاده نمایید.",
'reply_to_message_id'=>$message_id,
]);
}else{
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "خطا در ثبت سفارش شما 💢
لطفا مجدد تلاش کنید 〽️
توجه برای ثبت مجدد ربات ممبرگیر را از ادمین بودن خارج کرده و دوباره ادمین کنید و تمام دسترسی هارو برای ربات فعال کنید 〽️",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
        } else {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ربات ممبرگیر @$idbot در کانال شما ادمین نیست😐🤦‍♂

لطفا ربات را ادمین کانال کنید سپس سفارش خود را انجام دهید 🔸",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
} else {
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$chat_id/$chat_id.json",$outjson);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "شما یک سفارش برای این کانال ثبت کرده اید 💤

لطفا تا اتمام سفارش صبور باشید و دیگر اقدام به سفارش نکنید ✔️",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
}else{
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"لطفا ایدی یک کانال را ارسال کنید😕"
	]);
}
}
if (strpos($data, "getcoin-") !== false) {
$newd = str_replace("getcoin-",'',$data);
$fromm_id = $update->callback_query->from->id;
@$ue = file_get_contents("ads/user/$newd.txt");
@$se = file_get_contents("ads/seen/$newd.txt");
$get = bot('getChatMember',[
'chat_id'=>'@'.$newd,
'user_id'=>$fromm_id
]);
if($get->result->status == 'administrator' or $get->result->status == 'creator'){
	bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما سازنده یا ادمین این کانال هستید😐",
'show_alert' => false
]);
die();
}else{
if (strpos($ue, "$fromm_id") !== false) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما قبلا الماس خود را از این سفارش دریافت کرده اید😐",
'show_alert' => false
]);
} else {
// برسی ادمین بودن ربات
$channels23 = json_decode(file_get_contents("https://api.telegram.org/bot847589887:AAFpopUQfv88IE7vXB15vbdt5tpfMrO_k10/getChatMember?chat_id=@$newd&user_id=847589887"));
$tod3 = $channels23->result->status;
if($tod3 != 'administrator'){
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
bot('sendMessage', [
'chat_id' => $ad,
'text'=>"شما ربات را از ادمین بودن خارج کردید⚠️
سفارش شما پایان یافت 〽️
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ ایدی کانال سفارش داده شده :[@$newd]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر درخواستی برای کانال :[$co]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر های دریافتی :[$co]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
با تشکر ✔️",
'parse_mode' =>"html",
]);
@$don = file_get_contents("data/done.txt");
$getdon = $don + 1;
file_put_contents("data/done.txt", $getdon);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$post_id = file_get_contents("ads/postid/$newd.txt");
$de = $newd + 1;
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' => $post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
die();
}
// برسی ادمین بودن ربات
$channels23 = json_decode(file_get_contents("https://api.telegram.org/bot847589887:AAFpopUQfv88IE7vXB15vbdt5tpfMrO_k10/getChatMember?chat_id=@$newd&user_id=".$fromm_id));
$tod3 = $channels23->result->status;
if($tod3 == 'member' or $tod3 == 'creator' or $tod3 == 'administrator'){
$user = file_get_contents("ads/user/$newd.txt");
$members = explode("\n", $user);
if (!in_array($fromm_id, $members)) {
$add_user = file_get_contents("ads/user/$newd.txt");
$add_user .= $fromm_id . "\n";
file_put_contents("ads/user/$newd.txt", $add_user);
}
$getse = $se + 1;
file_put_contents("ads/seen/$newd.txt", $getse);
$datas3 = json_decode(file_get_contents("data/$fromm_id/$fromm_id.json"),true);
$coin2 = $datas3["coin"];
$getsho = $coin2 + 1;
$datas3["coin"] = "$getsho";
$outjson = json_encode($datas3,true);
file_put_contents("data/$fromm_id/$fromm_id.json",$outjson);
$coing = $datas3["coin"];
$myfile2 = fopen("data/$fromm_id/channels.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "@$newd\n");
fclose($myfile2);
$sub = $datas3["sub"];
if($sub != null){
	$subdata = json_decode(file_get_contents("data/$sub/$sub.json"),true);
$invcoin = $subdata["invcoin"];
$inv = $subdata["inv"];
$newinv= $inv + 0;
$newinvcoin= $invcoin + 0;
if($datas3['dafeee'] == 'first'){
		$tiksh = $subdata['coin'];
		$ziiii = $tiksh +10;
		$subdata["coin"] = "$ziiii";
		bot('sendMessage',[
		'chat_id'=>$sub,
		'text'=>"تبریک ✔️
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
یکی از زیر مجموعه های شما اولین عضویت خود را در یک کانال انجام داد 📣
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
10 الماس به حساب شما تعلق گرفت 💲
➖➖➖➖➖➖➖➖➖➖➖➖➖➖",
		]);
		$datas3["dafeee"] = "$newinv";
		$outjson = json_encode($datas3,true);
		file_put_contents("data/$fromm_id/$fromm_id.json",$outjson);
		}
$subdata["inv"] = "$newinv";
$subdata["invcoin"] = "$newinvcoin";
$outjson = json_encode($subdata,true);
file_put_contents("data/$sub/$sub.json",$outjson);
}
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما یک الماس گرفتید موجودی جدید💎 : $coing",
'show_alert' => false
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "😐شما هنوز در کانال عضو نشده اید😐",
'show_alert' => true
]);
}
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($end >= $co) {
bot('sendMessage', [
'chat_id' => $ad,
'text' => "سفارش شما پایان یافت 〽️
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ ایدی کانال سفارش داده شده :[@$newd]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر درخواستی برای کانال :[$co]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر های دریافتی :[$co]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
با تشکر ✔️",
'parse_mode' =>"html",
]);
@$don = file_get_contents("data/done.txt");
$getdon = $don + 1;
file_put_contents("data/done.txt", $getdon);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$post_id = file_get_contents("ads/postid/$newd.txt");
$de = $newd + 1;
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' => $post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
}
}
}
}
if (strpos($data, "cancel-") !== false) {
$newd = str_replace("cancel-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$coo = $co *2;
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($fromm_id == $ad) {
$rcoin = $coo - $end;
$datas3 = json_decode(file_get_contents("data/$fromm_id/$fromm_id.json"),true);
$coin2 = $datas3["coin"];
$getsho = $coin2 + $rcoin;
$datas3["coin"] = "$getsho";
$outjson = json_encode($datas3,true);
file_put_contents("data/$fromm_id/$fromm_id.json",$outjson);
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "سفارش شما لغو شد و $rcoin سکه باقی مانده شما پس داده شد",
'show_alert' => false
]);
bot('sendMessage', [
'chat_id' => $ad,
'text' => "کاربر گرامی سفارش شما با موفقیت لغو شد 🔱
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ الماس های باقی مانده برگشت داد شد
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ الماس های برگشت داده شده [$rcoin]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
با تشکر ✔️
@$chads 📣",
'parse_mode' => "html"
]);
@$enn = file_get_contents("data/enf.txt");
$getenf = $enn + 1;
file_put_contents("data/enf.txt", $getenf);
$newd = str_replace("cancel-",'',$data);
$post_id = file_get_contents("ads/postid/$newd.txt");
bot('deletemessage', [
'chat_id' =>"@$chads",
'message_id' =>$post_id
]);
unlink("ads/seen/$newd.txt");
unlink("ads/admin/$newd.txt");
unlink("ads/cont/$newd.txt");
unlink("ads/time/$newd.txt");
unlink("ads/user/$newd.txt");
unlink("ads/date/$newd.txt");
unlink("ads/postid/$newd.txt");
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "این سفارش متعلق به شما نیست🔴",
'show_alert' => false
]);
}
}
if (strpos($data, "goz-") !== false) {
$newd = str_replace("goz-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
$po = file_get_contents("ads/postid/$newd.txt");
if ($fromm_id != $ad) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "گزارش شما ثبت شد و به ادمین اطلاع داده شد⭕️",
'show_alert' => false
]);
bot('sendMessage', [
'chat_id' =>$admin,
'text' => "سلام مدیر گرامی 📣
این پست 👇
https://t.me/$chads/$po
توسط کاربر زیر گزارش شده است 🙌
<a href='tg://user?id=$fromm_id'>$fromm_id</a>
اطلاعات پست 🏳
پیوی کاربر سفارش دهنده 👇
<a href='tg://user?id=$ad'>$ad</a>
تعداد ممبر های سفارش شده [$co]
تعداد ممبر دریافتی [$end]
@$idbot 👐",
'parse_mode' => "html"
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما نمیتوانید پست خود را گزارش کنید🎈",
'show_alert' => false
]);
}
}
if (strpos($data, "pay-") !== false) {
$newd = str_replace("pay-",'',$data);
$fromm_id = $update->callback_query->from->id;
$end = file_get_contents("ads/seen/$newd.txt");
$ad = file_get_contents("ads/admin/$newd.txt");
$co = file_get_contents("ads/cont/$newd.txt");
$te = file_get_contents("ads/time/$newd.txt");
$de = file_get_contents("ads/date/$newd.txt");
if ($fromm_id == $ad) {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "🔸اطلاعات سفارش شما به شرح زیر است🔸
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر سفارش داده شما [$co]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد ممبر دریافتی [$end]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$chads 〽️",
'show_alert' => true
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "این سفارش متعلق به شما نیست🔴",
'show_alert' => false
]);
}
}
if($data == "home"){
$datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "عملیات با موفقیت لغو شد ✔️
به منوی اصلی برگشتید 🔸
لطفا یک گزینه را انتخاب کنید ♦️",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//اپن شد توسط فرانسه سورس 🇫🇷
//Source_Home|Source_Home
//تا باشد شاخ نشود با این ممبرگیر 😐🍌
//اسکی بری منبع نزنی کص ننت 🤟
if($data == "buycoin"){
$datas1["step"] = "free";
$outjson = json_encode($datas1,true);
file_put_contents("data/$chatid/$chatid.json",$outjson);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"برای ⚘خرید الماس⚘ به آیدی زیر مراجعه فرمایید👇
$sup
پس هم اکنون اقدام کنید📍
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text' => "💎50 الماس هزارتومن💎", 'callback_data' => "buy50"]
                    ],
                    [
['text' => "💎100 الماس دوهزارتومن💎", 'callback_data' => "buy100"]
                    ],
                    [
['text' => "💎200 الماس چهارهزارتومن💎", 'callback_data' => "buy200"]
                    ],
                    [
['text' => "💎500 الماس هفت هزارتومن💎", 'callback_data' => "buy500"]
                    ],
                    [
['text' => "💎1000 الماس ده هزارتومن💎", 'callback_data' => "buy1000"]
],
]
])
]);
}
elseif($text == "🕯ارتباط با پشتیبانی"){
save("data/$from_id/com.txt","sup");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید",
]);
}
elseif($bot == "sup"){
save("data/$from_id/com.txt","none");
bot("ForwardMessage",[
'chat_id' =>$admin,
'from_chat_id' =>$chat_id,
'message_id' =>$message_id,
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیامتون با موفقیت ارسال شد،درصورت نیاز،منتظر پاسخ ادمین بمانید✨",
'parse_mode'=>'MarkDown',
]);
} elseif($botsorce != "" && $from_id == $admin){
Bot('SendMessage',[
'chat_id'=>$botsorce,
'text'=>$text,
'parse_mode'=>'MarkDown',
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام به کاربر ارسال شد",
'parse_mode'=>'MarkDown',
]);
}
if($text == "♦️زیر مجموعه گیری"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌در سیستم زیر مجموعه گیری ممبرگیر الماسی می توانید با ارسال لینک اختصاصی خود به افراد دیگر، آنها را به این ربات دعوت کرده و الماس دریافت کنید😄

هر نفر که زیر مجموعه شما شود 10 الماس دریافت می کنید😄

پورسانت دهی 👈 به زودی ...


برای دریافت بنر بر روی دکمه زیر کلیک کنید👇
http://telegram.me/ZiroSource?start=$from_id

",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'    =>  false,
'reply_markup' => json_encode([
"resize_keyboard"=>true,'one_time_keyboard' => true,
'inline_keyboard' => [
[
['text' => "📤دریافت بنربا لینک اختصاصی شما", 'callback_data' => "mam"]
],
]
])
]); 
}
if($data == "mam"){
 $pic="http://uupload.ir/files/ths1_photo_2017-08-22_20-25-43.jpg";
bot('SendPhoto',[
'chat_id' => $chatid,
    'photo'=>$pic,
'message_id' => $message_id2,
'caption'=>"$zirtext",
]);
}
//اپن شد توسط فرانسه سورس 🇫🇷
if($text == "🔖مشخصات من"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ شماره کاربری شما 👈 :[$chat_id]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ نوع پنل شما 👈 :[free]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ مدت اعتبار پنل 👈 :[نامحدود]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد زیر مجموعه های شما 👈 :[$inv]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ موجودی شما 👈 :[$coin]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد اخطار های شما 👈 :[$warn]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد سکه پورسانت شما 👈 :[$invcoin]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$chads 👐",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[

],
]
])
]); 
}
$in_msg = $update->inline_query->query;
if($in_msg == "acc"){  
$inid = $update->inline_query->from->id;
$datas = json_decode(file_get_contents("data/$inid/$inid.json"),true);
$step = $datas["step"];
$inv = $datas["inv"];
$coin = $datas["coin"];
$type = $datas["type"];
$warn = $datas["warn"];
$ads = $datas["ads"];
$invcoin = $datas["invcoin"];
bot("answerInlineQuery",[
"inline_query_id"=>$update->inline_query->id,
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(rand(5,555)),
"title"=>"acc",
"thumb_url"=>"https://janebi.com/janebi/9fd2/files/158755.jpg",
"input_message_content"=>["parse_mode"=>"html","message_text"=>"
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ شماره کاربری شما 👈 :[$chat_id]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ نوع پنل شما 👈 :[free]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ مدت اعتبار پنل 👈 :[نامحدود]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد زیر مجموعه های شما 👈 :[$inv]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ موجودی شما 👈 :[$coin]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد اخطار های شما 👈 :[$warn]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد سکه پورسانت شما 👈 :[$invcoin]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@$chads 👐"],
"reply_markup"=>["inline_keyboard"=>[
[
['text' => "👥عضویت در ممبرگیر ما و دریافت ممبر👤️", 'url' => "https://t.me/$idbot"]
],
],
]
]])
]);
}
if($text == '/creator'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'@source_france'
]);
}
elseif($text == "🏆راهنما ممبرگیر"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ℹ️ اموزش استفاده از ربات :
      
1️⃣ سکه بگیر
📍با استفاده از دکمه جمع اوری الماس  رایگان در منوی اصلی ربات میتوانید الماس جمع کنید پس از عضوت در هر کانال و کلیک بر دکمه دریافت الماس💎 1 الماس برای شما واریز میشود .

📍 در وجود هر نوع مشکل و کانال غیر اخلاقی یا عضویت در کانال و دریافت نکردن الماس از دکمه گزارش استفاده کنید .

2️⃣ عضو بگیر
📍 پس از دریافت و جعع کردن الماس نوبت به دریافت عضو برای کانال خودتان هست برای دریافت عضو شما باید حداقل 30 الماس داشته باشید
📍 ربات در کانال سفارش داده شده باید ادمین باشد تا بتواند درست کار کند در صورت برداشتن ربات از ادمینی سفارش شما لغو خواهد شد
📍 کانال سفارش داده شده حتما باید کانال عمومی باشد

3️⃣ زیر مجموعه
📍 با دعوت دوستان خود به ربات با لینک اختصاصی خود میتوانید الماس دریافت کنید

4⃣ اموزش ادمین کردن ربات به صورت متنی 
      
1️⃣ ابتدا به قسمت تنظیمات کانال بروید
2️⃣ سپس به قسمت adminstrators بروید
3️⃣ سپس روی add adminstrators کلیک کنید
4️⃣ بر روی علامت ذره بین کلیک کنید و سپس یوزرنیم ربات ای ممبر را وارد کنید [@$idbot]
5️⃣ سپس در لیست زیر روی نام ربات کلیک کنید و بعد از تیک بالای صفحه را بزنید
6⃣برای دریافت ویدیو اموزشی ادمین کردن در ربات دستور  /help  را بفرستین

📍 مشاهده میکنید که نام ربات در لیست مدیران قرار گرفته است.

5⃣ چرا باید ربات را ادمین کنم 
      
📍 ربات برای دیدن لیست عضو های کانال  شما و محاسبه دریافت سکه یا کم کردن سکه باید در کانال شما ادمین باشد 

📍 درصورت خارج کردن ربات از ادمینی کانال سفارش شما لغو و بقیه الماس برگشت نخواهد کرد


6⃣ مباحث الماس | عضو 
      
● با عضویت در هر کانال 1 سکه دریافت میکنید
● با لفت دادن از کانال های عضو شده کمتر از 5 روز دو الماس منفی دریافت میکنید
● برای دریافت هر عضو شما باید 2 الماس پرداخت کنید

🤖 @$idbot
🆑 @$chads",
]);
}
if($text == "➕برگشت به خانه➕"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا گزینه مورد نظر خود را انتخاب کنید ⚘",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"♦️زیر مجموعه گیری"],['text'=>"🌵دریافت ممبر"],['text'=>"🔖مشخصات من"]],
[['text'=>"📍دریافت الماس رایگان"]],
[['text'=>"🎯قوانین و مقررات"],['text'=>"🛒فروشگاه"]],
[['text'=>"📕پیگیری خریدها"],['text'=>"🗒پیگیری سفارشات"]],
[['text'=>"🕯ارتباط با پشتیبانی"],['text'=>"🏆راهنما ممبرگیر"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif($text == "مدیریت" or $text == "پنل" or $text == "/panel"){
if(in_array($chat_id,$sudo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام مدیر گرامی به پنل خوش آمدید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
//----------------------------------------------------------------------
elseif(in_array($chat_id,$sudo) and $text == "⚘آمار ربات"){	
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki);
$done = file_get_contents("data/done.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🍌 @$idbot 🍌
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد کاربران ربات شما [$allusers]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
♦️ تعداد تبلیغات انجام شده [$done]
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
🍌 @$idbot 🍌",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) and $text == "➕تنظیم کانال"){
	$datas["step"] = "setcha";
	$outjson = json_encode($datas,true);
	file_put_contents("data/$from_id/$from_id.json",$outjson);
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"➕ایدی کانال خود را بدون @ وارد کنید➕",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "setcha" && $text != "/start"){ 
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/ch.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد😐🍌",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif(in_array($chat_id,$sudo) and $text == "تنظیم متن استارت"){	
$datas["step"] = "starttext";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📣متن استارت را وارد کنید 🔔
[به جای نام NAME]
[به جای یوزرنیم @USER]
[به جای نام خانوادگی LAST]
[به جای ایدی عددی ID]
را در متن قرار دهید☑️
@$idbot
@$chads",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "starttext" && $text != "/start"){ 
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/starttext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد😐🍌",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//اپن شد توسط فرانسه سورس 🇫🇷
elseif(in_array($chat_id,$sudo) and $text == "💎اهدای الماس"){	
$datas["step"] = "getid";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی کاربر را ارسال کنید ➕",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($from_id,$sudo) && $step == "getid" && $text != "/start"){ 
if(!file_exists("data/$text.json")){
$datas["step"] = "sendcoin";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند الماس اضافه شود ➕",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این کاربر در ربات ما موجود نمی باشد 📣",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
elseif(in_array($chat_id,$sudo) && $step == "sendcoin" && $text != "/start"){ 
if(is_numeric($text)){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$sssss = $datas["coin"];
$newin = $sssss + $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>" از طرف مدیریت به شما $text الماس ارسال شد",
'parse_mode'=>"html",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سکه ارسال گردید!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//اپن شد توسط فرانسه سورس 🇫🇷
elseif(in_array($chat_id,$sudo) and $text == "☠کسر الماس"){	
$datas["step"] = "getids";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"آیدی عددی فرد را ارسال کنید!",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "getids" && $text != "/start"){ 
$datas["step"] = "kasr";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"چند الماس از کاربر کسر شود؟!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "kasr" && $text != "/start"){ 
if(is_numeric($text)){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$datas = json_decode(file_get_contents("data/$id/$id.json"),true);
$errewar = $datas["coin"];
$newin = $errewar - $text;
$datas["coin"] = "$newin";
$outjson = json_encode($datas,true);
file_put_contents("data/$id/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>" از طرف مدیریت از شما $text الماس کم شد",
'parse_mode'=>"html",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"😐حاجی الماس کسر شد بازم خواستی کسر کنی در خدمتم😑",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عدد ارسال کنید!",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}}
//----------------------------------------------------------------------
elseif(in_array($chat_id,$sudo) and $text == "تنظیم متن زیرمجموعه"){	
$datas["step"] = "zirtext";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن زیرمجموعه گیری را ارسال کنید
به جای نام NAME
به جای لینک LINK
و به جای نام خانوادگی LAST
و به جای آیدی عددی ID

را در متن قرار دهید تا جایگزین شود!",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "zirtext" && $text != "/start"){ 
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
file_put_contents("data/zirtext.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد😐🍌",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif(in_array($chat_id,$sudo) and $text == "📓پیام همگانی"){	
$datas["step"] = "send2all";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود رو بفرست",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif(in_array($chat_id,$sudo) && $step == "send2all" && $text != "/start"){ 
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$text,
'parse_mode'=>"html",
]);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام به همه ارسال شد",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//اپن شد توسط فرانسه سورس 🇫🇷
elseif(in_array($chat_id,$sudo) and $text == "🌿فوروارد همگانی"){
$datas["step"] = "f2all";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خودت رو فور بده اینجا",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"/start "]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif($text != "/start" && in_array($chat_id,$sudo) && $step == "f2all"){
$datas["step"] = "free";
$outjson = json_encode($datas,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}    
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"فروارد همگانی به همه اعضای ربات فروارد شد",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚘آمار ربات"]],
[['text'=>"📓پیام همگانی"],['text'=>"🌿فوروارد همگانی"]],
[['text'=>"💎اهدای الماس"],['text'=>"☠کسر الماس"]],
[['text'=>"➕تنظیم کانال"]],
[['text'=>"➕برگشت به خانه➕"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
unlink('error_log');
/*
اراعه شده توسط سورس کده 🗣
اصکی نرو ناموصتو حفظ کن !
@Sourrce_kade
?>
