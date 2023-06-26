<?php

define('API_KEY', '6269029654:AAEIujFauiDnSmACg69oTob6PxGizi3iKk4');
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

function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}


function ForwardMessage($chatid, $from_chat, $message_id)
{
    bot('ForwardMessage', [
        'chat_id' => $chatid,
        'from_chat_id' => $from_chat,
        'message_id' => $message_id
    ]);
}

function SendPhoto($chatid, $photo, $keyboard, $caption)
{
    bot('SendPhoto', [
        'chat_id' => $chatid,
        'photo' => $photo,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}

function SendAudio($chatid, $audio, $keyboard, $caption, $sazande, $title)
{
    bot('SendAudio', [
        'chat_id' => $chatid,
        'audio' => $audio,
        'caption' => $caption,
        'performer' => $sazande,
        'title' => $title,
        'reply_markup' => $keyboard
    ]);
}

function save($filename, $TXTdata)
{
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, "$TXTdata");
    fclose($myfile);
}

function SendDocument($chatid, $document, $keyboard, $caption)
{
    bot('SendDocument', [
        'chat_id' => $chatid,
        'document' => $document,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}

function SendSticker($chatid, $sticker, $keyboard)
{
    bot('SendSticker', [
        'chat_id' => $chatid,
        'sticker' => $sticker,
        'reply_markup' => $keyboard
    ]);
}

function SendVideo($chatid, $video, $keyboard, $duration)
{
    bot('SendVideo', [
        'chat_id' => $chatid,
        'video' => $video,
        'duration' => $duration,
        'reply_markup' => $keyboard
    ]);
}

function SendVoice($chatid, $voice, $keyboard, $caption)
{
    bot('SendVoice', [
        'chat_id' => $chatid,
        'voice' => $voice,
        'caption' => $caption,
        'reply_markup' => $keyboard
    ]);
}

function SendContact($chatid, $first_name, $phone_number, $keyboard)
{
    bot('SendContact', [
        'chat_id' => $chatid,
        'first_name' => $first_name,
        'phone_number' => $phone_number,
        'reply_markup' => $keyboard
    ]);
}

function SendChatAction($chatid, $action)
{
    bot('sendChatAction', [
        'chat_id' => $chatid,
        'action' => $action
    ]);
}

function KickChatMember($chatid, $user_id)
{
    bot('kickChatMember', [
        'chat_id' => $chatid,
        'user_id' => $user_id
    ]);
}

function LeaveChat($chatid)
{
    bot('LeaveChat', [
        'chat_id' => $chatid
    ]);
}

function GetChat($chatid)
{
    bot('GetChat', [
        'chat_id' => $chatid
    ]);
}

function GetChatMembersCount($chatid)
{
    bot('getChatMembersCount', [
        'chat_id' => $chatid
    ]);
}

function GetChatMember($chatid, $userid)
{
    $truechannel = json_decode(file_get_contents('https://api.telegram.org/bot' . API_KEY . "/getChatMember?chat_id=" . $chatid . "&user_id=" . $userid));
    $tch = $truechannel->result->status;
    return $tch;
}

function AnswerCallbackQuery($callback_query_id, $text, $show_alert)
{
    bot('answerCallbackQuery', [
        'callback_query_id' => $callback_query_id,
        'text' => $text,
        'show_alert' => $show_alert
    ]);
}

function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard)
{
    bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'reply_markup' => $keyboard
    ]);
}

function EditMessageCaption($chat_id, $message_id, $caption, $keyboard, $inline_message_id)
{
    bot('editMessageCaption', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'caption' => $caption,
        'reply_markup' => $keyboard,
        'inline_message_id' => $inline_message_id
    ]);
}

function rwchatcount($id, $count)
{
    file_put_contents("user/$id/chatcount.txt", $count);
}
/*
keyboard place :)
*/




$button_official = json_encode(['keyboard' => [
    [['text' => '🛒خرید اکانت🛒']],
    [['text' => '💲 مالی 💲'], ['text' => '🎓آموزش استفاده🎓']],
	    [['text' => '📌برنامه مورد نیاز📌'], ['text' => '🥇شرایط و قوانین🥇']],
    [['text' => '👨‍💻تماس با پشتیبانی👨‍💻'], ['text' => '👑مشخصات اکانت👑']],
], 'resize_keyboard' => true]);
$button_back = json_encode(['keyboard' => [
    [['text' => '🔙 بازگشت به منو اصلی 🔙']],
], 'resize_keyboard' => true]);
$button_mali = json_encode(['keyboard' => [
    [['text' => '💰 شارژ حساب 💰']],
    [['text' => 'ℹ️موجودی کیف پول منℹ️']],
    [['text' => '🔙 بازگشت به منو اصلی 🔙']],
], 'resize_keyboard' => true]);
$button_lagv = json_encode(['keyboard' => [
    [['text' => '❌لغو❌']],
], 'resize_keyboard' => true]);
$button_dice_num = json_encode(['keyboard' => [
    [['text' => '✔️تایید مبلغ✔️']],
], 'resize_keyboard' => true]);

$button_manager = json_encode(['keyboard'=>[
    [['text'=>'تعداد اعضای فعال ربات']],
    [['text'=>'شارژ حساب کاربر'],['text'=>'موجودی حساب کاربر']],
	[['text' => 'افزودن سرور'],['text' => 'تعداد سرور های موجود']],
],'resize_keyboard'=>true]);
$button_leadercancel = json_encode(['keyboard' => [
    [['text' => 'ولش']],
], 'resize_keyboard' => true]);
$button_leaderconfirm = json_encode(['keyboard' => [
    [['text' => 'خود خودشه']],
], 'resize_keyboard' => true]);

$button_laghv = json_encode(['keyboard' => [
    [['text' => 'بیخیالش']],
], 'resize_keyboard' => true]);

$button_cancel = json_encode(['keyboard' => [
    [['text' => 'منصرف شدم']],
], 'resize_keyboard' => true]);

$button_operator = json_encode(['keyboard' => [
    [['text' => '🟡ایرانسل🟡'],['text' => '🟢همراه اول،مخابرات🟢']],
    [['text' => '🔙 بازگشت به منو اصلی 🔙']],
], 'resize_keyboard' => true]);

$button_irancell = json_encode(['keyboard' => [
    [['text' => '✔️تایید خرید سرور ایرانسل✔️']],
    [['text' => '🔙 بازگشت به منو اصلی 🔙']],
], 'resize_keyboard' => true]);



//not done buttons : deposite , withdraw 

















$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$usrn = $update->callback_query->message->chat->username;
$usrn1 = $update->callback_query->message->from->username;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$textmessage = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo) - 1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$datetime = json_decode(file_get_contents("https://api.feelthecode.xyz/date/?timezone=Asia/tehran"));
$time = $datetime->time;
$date = $datetime->date;
$allmember = file_get_contents('data/allmember.txt');
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$kharid = file_get_contents("user/" . $from_id . "/kharid.txt");
$step = file_get_contents("user/" . $from_id . "/step.txt");
$command = file_get_contents("user/" . $from_id . "/command.txt");
$randtrue = file_get_contents("user/" . $from_id . "/rand.txt");
$balance = file_get_contents("user/" . $from_id . "/balance.txt");
$address = file_get_contents("user/" . $from_id . "/address.txt");
$jayeze = file_get_contents("user/" . $from_id . "/jayeze.txt");
$mablaq = file_get_contents("user/" . $from_id . "/mablaq.txt");
$num = file_get_contents("user/" . $from_id . "/num.txt");
$ali = file_get_contents("user/" . $from_id . "/ali.txt");
$mojudi = file_get_contents("user/" . $from_id . "/mojudi.txt");
$buy = file_get_contents("user/" . $from_id . "/buy.txt");
$charge = file_get_contents("user/charge.txt");
$usercharge = file_get_contents("user/usercharge.txt");
$getmojudi = file_get_contents("user/getmojudi.txt");
$addserver = file_get_contents("user/addserver.txt");
$userchargemablaq = file_get_contents("user/userchargemablaq.txt");
$entercode = file_get_contents("user/" . $from_id . "/voucher/entercode.txt");
@mkdir('user/' . $from_id);
$admin = "5880001006";
$adminn = "5296109018";





$inch = file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@VpnStore_Org&user_id=" . $from_id);
if (strpos($inch, '"status":"left"') == true) {
    SendMessage($chat_id, "🎗سلام !🎗
🤩به ربات وی پی ان استور خوش اومدی🤩
💯برای استفاده از ربات ابتدا باید توی کانال ما عضو بشی💯
پس از عضویت مجدد /start رو برای من بفرست", 'html', 'true', json_encode(['inline_keyboard' => [
        [['text' => "join Channel", 'url' => "https://telegram.me/VpnStore_Org"]]
    ], 'resize_keyboard' => true]));
    return false;
}


if(strpos($textmessage,'/start')  !== false) {
  if (!file_exists("user/$from_id/Userid.txt")) {
			
			 save("user/$from_id/Userid.txt", "$from_id");
							
					SendMessage($chat_id, "⚙️در حال ساخت اکانت شما⚙️", "html", "true",$button_admin1);
					
								SendMessage($chat_id, "✅اکانت شما با موفقیت در ربات ساخته شد✅

🆔آیدی اکانت شما : $from_id 🆔", "html", "true",$button_admin1);
									
						SendMessage($chat_id, "سلام🙋‍♂️
به ربات وی پی ان استور خوش اومدی ! 💻
اینجا می تونی بهترین سرورای وی پی ان رو بخری و باهاشون فیلترینگ رو خیلی راحت دور بزنی✅
برای شروع یکی از دکمه های زیر رو انتخاب کن🖲
							", "html", "true", $button_official);
			
			
  }
  else {      SendMessage($chat_id,"❗️ای وای❗️
🔰شما قبلا توی ربات ثبت نام رو انجام دادین پس نیازی به ارسال این دستور نبود !🔰
🖲یکی از دکمه های زیر رو انتخاب کنین🖲","html","true",$button_official);
	  
  }
}

elseif($textmessage == '🔙 بازگشت به منو اصلی 🔙'){
 SendMessage($chat_id,"🔱 به منوی اصلی برگشتید 🔱","html","true",$button_official);
}






elseif($textmessage == '💲 مالی 💲'){
 SendMessage($chat_id,"ℹ️ خب توی این بخش میتونی موجودی حسابت رو ببینی یا اونو شارژ کنی ℹ️","html","true",$button_mali);
}

elseif($textmessage == 'ℹ️موجودی کیف پول منℹ️'){
 SendMessage($chat_id,"موجودی حساب شما : $mojudi تومان","html","true",$button_mali);
}







elseif($textmessage == '👑مشخصات اکانت👑'){
 SendMessage($chat_id,"👑مشخصات اکانت👑
ایدی اکانت شما : $chat_id
موجودی حساب شما : $mojudi تومان
وضعیت اکانت شما : بدون محدودیت","html","true",$button_official);
}


elseif($textmessage == '👨‍💻تماس با پشتیبانی👨‍💻'){
 SendMessage($chat_id,"🔰سوالی داری ؟
توی روند خرید مشکلی برات پیش اومده ؟
نمیدونی چجور از وی پی ان ما استفاده کنی ؟
سوال دیگه ای داری؟
مشکلی نداره 🙋🏻‍♂️
ما از ابتدا تا انتها همراهتونیم 
برای ارتباط با پشتیبانی میتونین به یکی از ایدی های پشتیبانی ما پیام بدین :
1) @tsvitamin
2) @unknow_member","html","true",$button_official);
}

elseif($textmessage == '🥇شرایط و قوانین🥇'){
 SendMessage($chat_id,"🥇( شرایط و قوانین Vpn Store)

 🔺سرویس های ما صرفا جهت دور زدن تحریم های اینترنتی ارائه می گردد و عواقب هرگونه سو‌ء استفاده احتمالی از سرویس ها (فعالیت های سیاسی و فعالیت های مغایرت امنیت ملی و …) بر عهده مصرف کننده نهایی میباشد !

🔺با توجه به افزایش فیلترینگ و محدودیت اپراتور ها, چنانچه اختلالی در سرور ها ایجاد شود کاملا طبیعیست!","html","true",$button_official);
}






elseif($textmessage == '💰 شارژ حساب 💰'){
				save("user/$from_id/kharid.txt", "mablaq");
 SendMessage($chat_id,"🛃 مبلغی که میخوای حسابت رو باهاش شارژ کنی با اعداد انگلیسی به تومان برام بفرست 🛃
❗️ حداقل مبلغ برای شارژ اکانت 50000 تومان می باشد ❗️","html","true",$button_lagv);
}

elseif($textmessage == '❌لغو❌'){
	save("user/$from_id/kharid.txt", "none");
	save("user/$from_id/mablaq.txt", "none");
	save("user/$from_id/num.txt", "none");
	save("user/$from_id/resid.txt", "none");
 SendMessage($chat_id,"🔱 به منوی اصلی برگشتید 🔱","html","true",$button_official);
}



elseif ($kharid == 'mablaq' ) {
		if ($textmessage >=50000){
    save("user/$from_id/kharid.txt", "kharid");
    save("user/$from_id/mablaq.txt", "$textmessage");
    SendMessage($from_id, "خیلی خب ، پس قراره که حسابت رو به مبلغ زیر شارژ کنیم :
🔆 $textmessage 🔆
", "html", "true", $button_dice_num);
}
else {
	 save("user/$from_id/kharid.txt", "none");
	SendMessage($from_id, "➰یه مشکلی هست➰
یکی از موارد زیر میتونه پیش اومده باشه:
1️⃣. اعداد رو بصورت انگلیسی وارد نکردی
2️⃣. مقداری که وارد کردی کمتر از 50000 تومانه
3️⃣.از حروف استفاده کردی
♾دوباره تلاش کن♾", "html", "true", $button_official);
}
	
	}


elseif ($kharid == 'kharid' ) {
		
		if ($textmessage == '✔️تایید مبلغ✔️'){
			
			$resid = rand(0000000000,9999999999);
		
				save("user/$from_id/mablaq.txt", "none");
				save("user/$from_id/kharid.txt", "none");
    SendMessage($from_id, "", "html", "true", $button_official);
			
} else {
			SendMessage($from_id, "🅿️ همراه گرامی لطفا فقط از دکمه های ربات استفاده کن", "html", "true",$button_official);
			
}
}




elseif($textmessage == '🛒خرید اکانت🛒'){
 SendMessage($chat_id,"💎به بخش خرید خوش آمدید !💎
💻لطفا اپراتور مورد نظرتون رو انتخاب کنید💻","html","true",$button_operator);
}


elseif($textmessage == '🟢همراه اول،مخابرات🟢'){
 SendMessage($chat_id,"👁‍🗨بزودی👁‍🗨","html","true",$button_official);
}



elseif($textmessage == '🟡ایرانسل🟡'){
 SendMessage($chat_id,"🔘اینجاست که تفاوت ما رو با بقیه متوجه میشی🔘
🔝مشخصات سرور های ایرانسل ما اینطورریه :🔝
🔺حجم قابل استفاده : 50 گیگابایت🔺
🔸حداکثر کاربر فعال : 5 نفر🔸
🔹قیمت :50000 تومان🔹
❇️برای خرید دکمه زیر رو بزن❇️
‼️توجه : با زدن دکمه زیر اگه موجودی باشین موجودی از حسابتون کسر میشه و سرور بلافاصله براتون ارسال میشه‼️","html","true",$button_irancell);
}


elseif($textmessage == '✔️تایید خرید سرور ایرانسل✔️'){
	
					
					
					$pp = file_get_contents("user/" . $chat_id . "/mojudi.txt");
					
					if ( $pp > 49999 ) {
						
						$srv = glob("server/*", GLOB_ONLYDIR);
          $names_length=count($srv);  
          $showsrv = ($names_length);
		  
		  $sa = rand( 1 , $showsrv ) ;
		  
		  $saa = file_get_contents("server/" . $sa . "/config.txt");
		  
								
								$nmojudi = $mojudi - 50000 ;
								
								save("user/$chat_id/mojudi.txt","$nmojudi");
								
								SendMessage($chat_id," $saa ","html","true",);
								
								SendMessage($chat_id,"💎این هم از کانفیگ شما💎
حالا کانفیگ رو کپی کرده و طبق اموزشی که در بخش مربوطه توی ربات گذاشتیم  سرور رو اضافه کنین و از اینترنت بدون مرز لذت ببرید ❤️","html","true",$button_official);
								
								

						
					} else {
            
             SendMessage($chat_id,"🌀متاسفانه موجودی حساب شما جهت خرید سرور کافی نیست🌀
از طریق بخش شارژ حساب ابتدا اقدام به شارژ حساب خود کرده و سپس مجددا برای خرید اقدام کنید
⚠️اگر احساس می کنید مشکلی پیش آمده با پشتیبانی تماس بگیرید⚠️","html","true",$button_official);
            }

				} 



















//بخش مدیریت



elseif($textmessage == 'مدیریت' and $chat_id == $admin  ){
{SendMessage($chat_id,"🛃سلام رئیس خوش اومدی
یکی از دکمه ها رو انتخاب کن","html","true",$button_manager);}
}


elseif($textmessage == 'admin' and $chat_id == $admin  ){
{SendMessage($chat_id,"🛃سلام رئیس خوش اومدی
یکی از دکمه ها رو انتخاب کن","html","true",$button_manager);}
}



elseif($textmessage == 'تعداد اعضای فعال ربات' and $chat_id == $admin  ){
$mem = glob("user/*", GLOB_ONLYDIR);
$names_length=count($mem);  
$showmem = ($names_length);

	SendMessage($chat_id,"Its $showmem","html","true",$button_manager);
}




elseif($textmessage == 'شارژ حساب کاربر' and $chat_id == $admin ){
		
	save("user/charge.txt", "1");

		SendMessage($chat_id,"خب ایدی کاربری که میخوای موجودیشو افزایش بدی برام بفرست","html","true",$button_leadercancel);
}

elseif ($charge == '1' and $chat_id == $admin ) {
		
   
    save("user/usercharge.txt", "$textmessage");
	save("user/charge.txt", "2");
	
    SendMessage($from_id, "خب حساب کاربر $usercharge چند تومان شارژ بشه ؟؟", "html", "true",$button_leadercancel);

}

elseif ($charge == '2' and $chat_id == $admin ) {
		
   
    save("user/userchargemablaq.txt", "$textmessage");
	save("user/charge.txt", "none");
	
    SendMessage($from_id, "خب پس قضیه ازین قراره :
کاربر با ایدی : $usercharge
حسابش اینقدر شارژ میشه : $userchargemablaq ", "html", "true",$button_leaderconfirm);

}


elseif($textmessage == 'خود خودشه' and $chat_id == $admin ){
	
	
				save("user/$usercharge/mojudi.txt", "$userchargemablaq");
				save("user/userchargemablaq.txt", "none");
				save("user/usercharge.txt", "none");
				save("user/charge.txt", "none");		  
SendMessage($chat_id,"انجام شد","html","true",$button_manager);
}

elseif($textmessage == 'ولش' and $chat_id == $admin ){
	
		save("user/charge.txt", "none");
		save("user/userchargemablaq.txt", "none");
		save("user/usercharge.txt", "none");
			
	
SendMessage($chat_id,"خبببببب حالا چی","html","true",$button_manager);
}



elseif($textmessage == 'موجودی حساب کاربر' and $chat_id == $admin ){
	
		save("user/getmojudi.txt", "1");
	
SendMessage($chat_id,"ایدی کاربری که میخوای موجودیشو ببینی وارد کن","html","true",$button_laghv);
}


elseif ($getmojudi == '1' and $chat_id == $admin ) {
		
$qq = file_get_contents("user/$textmessage/mojudi.txt");
		
	save("user/getmojudi.txt", "none");
	
    SendMessage($from_id, "موجودی حساب کاربر مورد نظر اینقدره :
	$qq ", "html", "true",$button_manager);

}




elseif($textmessage == 'بیخیالش' and $chat_id == $admin ){
	
		save("user/getmojudi.txt", "none");
	
SendMessage($chat_id,"خب چه کاری از دست من بر میاد ؟؟؟","html","true",$button_manager);
}



elseif($textmessage == 'افزودن سرور' and $chat_id == $admin ){
	
		save("user/addserver.txt", "1");
	
SendMessage($chat_id,"خیلی خب کانفیگی که میخوای اضافه کنی رو برام بفرست","html","true",$button_cancel);
}

elseif ($addserver == '1' and $chat_id == $admin ) {
		
		$srv = glob("server/*", GLOB_ONLYDIR);
          $names_length=count($srv);  
          $showsrv = ($names_length);
					$shomaresrvr = $showsrv + 1 ;
					
					mkdir("server/$shomaresrvr");
					save("server/$shomaresrvr/config.txt", "$textmessage");
		
					save("user/addserver.txt", "none");
	
    SendMessage($from_id, "کانفیگ وارد شده به عنوان سرور شماره $shomaresrvr ذخیره شد", "html", "true",$button_manager);

}


elseif($textmessage == 'منصرف شدم' and $chat_id == $admin ){
	
		save("user/addserver.txt","none");
	
SendMessage($chat_id,"امر دیگه ای ؟؟؟","html","true",$button_manager);
}




elseif ($textmessage == 'تعداد سرور های موجود' and $chat_id == $admin ) {
		
$mem = glob("server/*", GLOB_ONLYDIR);
$names_length=count($mem);  
$showmem = ($names_length);

	SendMessage($chat_id,"Its $showmem","html","true",$button_manager);

}





















//second admin



elseif($textmessage == 'مدیریت' and $chat_id == $adminn  ){
{SendMessage($chat_id,"🛃سلام رئیس خوش اومدی
یکی از دکمه ها رو انتخاب کن","html","true",$button_manager);}
}


elseif($textmessage == 'admin' and $chat_id == $adminn  ){
{SendMessage($chat_id,"🛃سلام رئیس خوش اومدی
یکی از دکمه ها رو انتخاب کن","html","true",$button_manager);}
}



elseif($textmessage == 'تعداد اعضای فعال ربات' and $chat_id == $adminn ){
$mem = glob("user/*", GLOB_ONLYDIR);
$names_length=count($mem);  
$showmem = ($names_length);
{SendMessage($chat_id,"Its $showmem","html","true",$button_manager);}
}




elseif($textmessage == 'شارژ حساب کاربر' and $chat_id == $adminn ){
		
	save("user/charge.txt", "1");

		SendMessage($chat_id,"خب ایدی کاربری که میخوای موجودیشو افزایش بدی برام بفرست","html","true",$button_leadercancel);
}

elseif ($charge == '1' and $chat_id == $adminn ) {
		
   
    save("user/usercharge.txt", "$textmessage");
	save("user/charge.txt", "2");
	
    SendMessage($from_id, "خب حساب کاربر $usercharge چند تومان شارژ بشه ؟؟", "html", "true",$button_leadercancel);

}

elseif ($charge == '2' and $chat_id == $adminn ) {
		
   
    save("user/userchargemablaq.txt", "$textmessage");
	save("user/charge.txt", "none");
	
    SendMessage($from_id, "خب پس قضیه ازین قراره :
کاربر با ایدی : $usercharge
حسابش اینقدر شارژ میشه : $userchargemablaq", "html", "true",$button_leaderconfirm);

}


elseif($textmessage == 'خود خودشه' and $chat_id == $adminn ){
	
		 save("user/$usercharge/mojudi.txt", "$userchargemablaq");
				save("user/userchargemablaq.txt", "none");
				save("user/usercharge.txt", "none");
				save("user/charge.txt", "none");
				
SendMessage($chat_id,"انجام شد","html","true",$button_manager);
}

elseif($textmessage == 'ولش' and $chat_id == $adminn ){
	
		save("user/charge.txt", "none");
		save("user/userchargemablaq.txt", "none");
		save("user/usercharge.txt", "none");
	
SendMessage($chat_id,"خبببببب حالا چی","html","true",$button_manager);
}







elseif($textmessage == 'موجودی حساب کاربر' and $chat_id == $adminn ){
	
		save("user/getmojudi.txt", "1");
	
SendMessage($chat_id,"ایدی کاربری که میخوای موجودیشو ببینی وارد کن","html","true",$button_laghv);
}


elseif ($getmojudi == '1' and $chat_id == $adminn ) {
		
$qq = file_get_contents("user/$textmessage/mojudi.txt");
		
	save("user/getmojudi.txt", "none");
	
    SendMessage($from_id, "موجودی حساب کاربر مورد نظر اینقدره :
	$qq ", "html", "true",$button_manager);

}




elseif($textmessage == 'بیخیالش' and $chat_id == $adminn ){
	
		save("user/getmojudi.txt", "none");
	
SendMessage($chat_id,"خب چه کاری از دست من بر میاد ؟؟؟","html","true",$button_manager);
}





elseif($textmessage == 'افزودن سرور' and $chat_id == $adminn ){
	
		save("user/addserver.txt", "1");
	
SendMessage($chat_id,"خیلی خب کانفیگی که میخوای اضافه کنی رو برام بفرست","html","true",$button_cancel);
}

elseif ($addserver == '1' and $chat_id == $adminn ) {
		
		$srv = glob("server/*", GLOB_ONLYDIR);
          $names_length=count($srv);  
          $showsrv = ($names_length);
					$shomaresrvr = $showsrv + 1 ;
					
					mkdir("server/$shomaresrvr");
					save("server/$shomaresrvr/config.txt", "$textmessage");
		
					save("user/addserver.txt", "none");
	
    SendMessage($from_id, "کانفیگ وارد شده به عنوان سرور شماره $shomaresrvr ذخیره شد", "html", "true",$button_manager);

}


elseif($addserver == '1' and $textmessage == 'منصرف شدم' and $chat_id == $adminn ){
	
		save("user/addserver.txt", "none");
	
SendMessage($chat_id,"امر دیگه ای ؟؟؟","html","true",$button_manager);
}



elseif ($textmessage == 'تعداد سرور های موجود' and $chat_id == $adminn ) {
		
		

 

		$srvr = glob("server/*",GLOB_ONLYDIR);
          $names_length=count($srvr);  
          $numsrv = ($names_length);
		
		
		
		
			
    SendMessage($from_id, "تعداد سرور های فعال ربات : 
$num_files	", "html", "true",$button_manager);

}








?>
