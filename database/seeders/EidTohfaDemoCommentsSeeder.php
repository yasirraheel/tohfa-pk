<?php

namespace Database\Seeders;

use App\Models\EidTohfaComment;
use Illuminate\Database\Seeder;

class EidTohfaDemoCommentsSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            ['Ahmed Raza', 'Mera form submit ho gaya, ab SMS ka wait hai. Process simple tha.', '2m', true, false],
            ['Ayesha Khan', 'الحمدللہ فارم آسانی سے بھر گیا، بس تصدیقی میسج کا انتظار ہے۔', '3m', true, false],
            ['Bilal Ahmed', 'Good platform, mobile number dalte hi next step clear nazar aa raha tha.', '4m', true, false],
            ['Sana Iqbal', 'میں نے امی کے لیے بھی درخواست دی، طریقہ سمجھنے میں آسان تھا۔', '5m', true, false],
            ['Hassan Ali', 'Verification thori slow thi but page ne clear instructions diye.', '6m', true, false],
            ['Fatima Noor', 'First time apply kiya hai, umeed hai SMS jaldi aa jaye ga.', '7m', true, false],
            ['Usman Tariq', 'Interface clean hai. Share wala step complete karna easy tha.', '8m', true, false],
            ['Mariam Shah', 'مجھے شروع میں سمجھ نہیں آئی، لیکن نوٹ پڑھ کر فارم مکمل کر لیا۔', '9m', true, false],
            ['Danish Malik', 'Mere cousin ne recommend kiya tha. Abhi application submit kar di hai.', '10m', true, false],
            ['Hira Batool', 'Page mobile par bhi theek open hua, font bhi readable hai.', '11m', true, false],
            ['Kashif Mehmood', 'کیا ایک گھر سے دو افراد درخواست دے سکتے ہیں؟ رہنمائی اچھی ہے مگر یہ بات واضح ہونی چاہیے۔', '12m', true, false],
            ['Nimra Saleem', 'Mujhe payment page par jane mein thora time laga, baqi sab smooth tha.', '13m', true, false],
            ['Zeeshan Akhtar', 'Form submit karne ke baad confirmation screen aa gayi. Good experience.', '14m', true, false],
            ['Rabia Aslam', 'میں نے اپنا اکاؤنٹ نمبر درج کیا، غلطی کی تو فوراً ایرر دکھا دیا۔', '15m', true, false],
            ['Omer Farooq', 'Yeh page light hai, purane phone par bhi hang nahi hua.', '16m', true, false],
            ['Mahnoor Javed', 'Share step samajh aa gaya, lekin button ka text Urdu mein acha lag raha hai.', '17m', true, false],
            ['Asad Ullah', 'Application ka flow simple hai. Bas final SMS ka wait hai.', '18m', true, false],
            ['Zainab Rafiq', 'میری والدہ کو اردو ہدایات کی وجہ سے آسانی ہوئی۔', '19m', true, false],
            ['Imran Siddiqui', 'Mujhe laga shayad mushkil hoga, lekin 2 minute mein complete ho gaya.', '20m', true, false],
            ['Laiba Ahmed', 'Good work. Agar eligibility ka section bhi add ho jaye to aur clear ho ga.', '21m', true, false],
            ['Saad Qureshi', 'Verification bar ruk rahi thi, refresh ke baad theek ho gaya.', '22m', false, false],
            ['Iqra Malik', 'میں نے فارم مکمل کر دیا ہے، امید ہے مستحق لوگوں کو فائدہ ہو گا۔', '23m', true, false],
            ['Fahad Naseer', 'Roman Urdu instructions bhi hon to elderly logon ko family help kar sakti hai.', '24m', true, false],
            ['Noor Fatima', 'Account number enter karne ke baad next step clear tha. Nice.', '25m', true, false],
            ['Ali Hamza', 'Mera internet slow tha phir bhi page load ho gaya. Yeh acha hai.', '26m', true, false],
            ['Sadia Perveen', 'کمنٹ سیکشن دیکھ کر اعتماد ہوا کہ دوسرے لوگ بھی اپلائی کر رہے ہیں۔', '27m', true, false],
            ['Waqas Ali', 'Maine pehle galat number likha, error message ne help kar di.', '28m', true, false],
            ['Mehwish Tariq', 'Form ka design simple hai, unnecessary cheezen nahi hain.', '29m', true, false],
            ['Hamza Ilyas', 'Kya CNIC field bhi add hogi? Abhi sirf account number manga ja raha hai.', '30m', false, false],
            ['Bushra Khan', 'مجھے نوٹ والی لائن واضح لگی، اسی سے سمجھ آیا آگے کیا کرنا ہے۔', '31m', true, false],
            ['Salman Butt', 'Button aur instructions dono clear hain. Mobile layout ab better lag raha hai.', '32m', true, false],
            ['Areeba Saleem', 'Maine apni sister ke phone se bhi check kiya, page responsive hai.', '33m', true, false],
            ['Tahir Abbas', 'Application submit ho gayi but SMS abhi nahi aya. Shayad load zyada hai.', '34m', false, false],
            ['Kiran Shahid', 'اردو فونٹ بہت بہتر ہے، پڑھنے میں آسانی ہو رہی ہے۔', '35m', true, false],
            ['Nabeel Ahmed', 'Share karne ke baad progress update hua. Process believable lagta hai.', '36m', true, false],
            ['Sumaira Noor', 'Agar helpline number bhi ho to logon ko aur tasalli ho gi.', '37m', true, false],
            ['Adnan Jamil', 'Mera form pehle submit nahi hua tha, dobara try kiya to ho gaya.', '38m', false, false],
            ['Sehrish Anwar', 'اچھی بات ہے کہ ہدایات مختصر اور سیدھی ہیں۔', '39m', true, false],
            ['Rizwan Haider', 'Page ka color aur layout official type lag raha hai.', '40m', true, false],
            ['Madiha Yousaf', 'Main confuse thi ke pehle kya karna hai, intro text ne guide kar diya.', '41m', true, false],
            ['Kamran Sheikh', 'Mujhe confirmation ke baad back button nahi dabana chahiye tha, phir bhi data raha.', '42m', true, false],
            ['Sobia Iqbal', 'فارم بھرنے میں ایک منٹ لگا، امید ہے جواب جلد آئے گا۔', '43m', true, false],
            ['Arslan Nadeem', 'Comments real users jaise feel dete hain, demo ke liye kaafi useful section hai.', '44m', true, false],
            ['Anam Fatima', 'Mujhe Urdu aur Roman dono comments dekh kar instructions samajh aayi.', '45m', true, false],
            ['Junaid Akram', 'Payment link open hone mein delay tha, baqi form smooth tha.', '46m', false, false],
            ['Farah Gul', 'یہ سہولت اگر واقعی مستحق خاندانوں تک پہنچے تو بہت فائدہ ہو گا۔', '47m', true, false],
            ['Shahzaib Khan', 'Apply kar diya hai. Ab status check karne ka option bhi prominent hona chahiye.', '48m', true, false],
            ['Rimsha Ali', 'Mobile screen par comments ab neat lag rahe hain, pehle thore crowded thay.', '49m', true, false],
            ['Yasir Mahmood', 'Mere father ko Urdu text readable laga, ye sab se important tha.', '50m', true, false],
            ['Tania Rauf', 'Simple, clear aur fast. Client demo ke liye comments section natural lag raha hai.', '51m', true, false],
        ];

        EidTohfaComment::query()->delete();

        foreach ($comments as $index => [$name, $text, $time, $liked, $reply]) {
            EidTohfaComment::create([
                'user_name' => $name,
                'avatar_url' => null,
                'comment_text' => $text,
                'time_ago' => $time,
                'is_liked' => $liked,
                'is_reply' => $reply,
                'order' => $index + 1,
                'status' => true,
            ]);
        }
    }
}
