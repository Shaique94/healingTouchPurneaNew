<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Manage Settings')]
#[Layout('components.layouts.admin')]
class ManageSetting extends Component
{
    use WithFileUploads;

    public $hospital_name;
    public $logo;
    public $contact_email;
    public $contact_phone;
    public $whatsapp_number;
    public $address;
    public $instagram_link;
    public $facebook_link;
    public $twitter_link;
    public $sms_status;

    public function mount()
    {
        $this->hospital_name = Setting::get('hospital_name', 'Healing Touch Hospital');
        $this->contact_email = Setting::get('contact_email', 'info@healingtouchpurnea.com');
        $this->contact_phone = Setting::get('contact_phone', '7079025467 ');
        $this->whatsapp_number = Setting::get('whatsapp_number', '7079025467');
        $this->address = Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301');
        $this->instagram_link = Setting::get('instagram_link', '');
        $this->facebook_link = Setting::get('facebook_link', '');
        $this->twitter_link = Setting::get('twitter_link', '');
        $this->sms_status = Setting::get('sms_status', false);
    }

    public function save()
    {
        $this->validate([
            'hospital_name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'contact_email' => 'nullable|email|max:255', 
            'contact_phone' => ['nullable', 'max:20', 'regex:/^[\+]?[0-9\s\-()]{7,20}$/'],
            'whatsapp_number' => ['nullable', 'max:20', 'regex:/^[\+]?[0-9\s\-()]{7,20}$/'],
            'address' => 'nullable|string|max:255|min:5',
            'instagram_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'sms_status' => 'boolean',
        ]);

        if (!empty($this->hospital_name)) {
            Setting::set('hospital_name', $this->hospital_name, 'string', 'general', 'Name of the hospital');
        }
        if ($this->logo) {
            Setting::set('logo', $this->logo, 'file', 'branding', 'Hospital logo');
        }
        if (!empty($this->contact_email)) {
            Setting::set('contact_email', $this->contact_email, 'string', 'contact', 'Contact email address');
        }
        if (!empty($this->contact_phone)) {
            Setting::set('contact_phone', $this->contact_phone, 'string', 'contact', 'Contact phone number');
        }
        if (!empty($this->whatsapp_number)) {
            Setting::set('whatsapp_number', $this->whatsapp_number, 'string', 'contact', 'WhatsApp contact number');
        }
        if (!empty($this->address)) {
            Setting::set('address', $this->address, 'string', 'contact', 'Hospital address');
        }
        if (!empty($this->instagram_link)) {
            Setting::set('instagram_link', $this->instagram_link, 'string', 'social', 'Instagram profile link');
        }
        if (!empty($this->facebook_link)) {
            Setting::set('facebook_link', $this->facebook_link, 'string', 'social', 'Facebook profile link');
        }
        if (!empty($this->twitter_link)) {
            Setting::set('twitter_link', $this->twitter_link, 'string', 'social', 'Twitter profile link');
        }
        
        Setting::set('sms_status', $this->sms_status, 'boolean', 'notifications', 'SMS notification status');
        
        $this->dispatch('success', __('Settings updated successfully!'));
    }

    public function render()
    {
        return view('livewire.admin.settings.manage-setting', [
            'current_logo' => Setting::get('logo'),
        ]);
    }
}