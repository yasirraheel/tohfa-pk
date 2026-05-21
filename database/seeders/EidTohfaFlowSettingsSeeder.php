<?php

namespace Database\Seeders;

use App\Models\EidTohfaSetting;
use Illuminate\Database\Seeder;

class EidTohfaFlowSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['eligibility_button_text', 'اپنی اہلیت چیک کریں', 'text', 'content', 'Eligibility Button Text'],
            ['eligibility_intro_text', 'درخواست مکمل کرنے سے پہلے اپنی اہلیت کی تصدیق کریں۔', 'text', 'content', 'Eligibility Intro Text'],
            ['cnic_title', 'اپنا شناختی کارڈ نمبر درج کریں', 'text', 'content', 'CNIC Form Title'],
            ['cnic_placeholder', '13 ہندسوں کا CNIC نمبر', 'text', 'content', 'CNIC Input Placeholder'],
            ['cnic_submit_button', 'جمع کریں', 'text', 'content', 'CNIC Submit Button Text'],
            ['cnic_error_message', 'براہ کرم 13 ہندسوں کا درست شناختی کارڈ نمبر درج کریں۔', 'text', 'content', 'CNIC Error Message'],
            ['location_title', 'اپنی لوکیشن کی اجازت دیں', 'text', 'content', 'Location Consent Title'],
            ['location_consent_text', 'اہلیت کی تصدیق کے لیے آپ کی موجودہ لوکیشن درکار ہے۔ اجازت کے بغیر آپ آگے نہیں بڑھ سکتے۔', 'textarea', 'content', 'Location Consent Text'],
            ['location_allow_button', 'لوکیشن کی اجازت دیں', 'text', 'content', 'Location Allow Button Text'],
            ['location_deny_button', 'اجازت نہیں دینی', 'text', 'content', 'Location Deny Button Text'],
            ['location_denied_message', 'لوکیشن کی اجازت کے بغیر درخواست آگے نہیں بڑھ سکتی۔', 'text', 'content', 'Location Denied Message'],
            ['eligible_title', 'مبارک ہو! آپ اہل ہیں', 'text', 'content', 'Eligible Account Form Title'],
            ['bank_select_label', 'ادائیگی کا طریقہ منتخب کریں', 'text', 'content', 'Bank Select Label'],
            ['bank_options', "JazzCash\nEasyPaisa\nBank Transfer", 'textarea', 'content', 'Bank Options (one per line)'],
        ];

        foreach ($settings as [$key, $value, $type, $group, $description]) {
            EidTohfaSetting::updateOrCreate(
                ['key' => $key],
                compact('value', 'type', 'group', 'description')
            );
        }
    }
}
