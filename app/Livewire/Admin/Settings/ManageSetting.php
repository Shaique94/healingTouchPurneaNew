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
    public $address;
    public $instagram_link;
    public $facebook_link;
    public $twitter_link;
    public function mount()
    {
        $this->hospital_name = Setting::get('hospital_name', '');
        $this->contact_email = Setting::get('contact_email', '');
        $this->contact_phone = Setting::get('contact_phone', '');
        $this->address = Setting::get('address', '');
        $this->instagram_link = Setting::get('instagram_link', '');
        $this->facebook_link = Setting::get('facebook_link', '');
        $this->twitter_link = Setting::get('twitter_link', '');
    }

    public function save()
    {
        $this->validate([
            'hospital_name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'contact_email' => 'nullable|email|max:255|dns', 
            'contact_phone' => ['nullable', 'max:20', 'regex:/^[\+]?[0-9\s\-()]{7,20}$/'],
            'address' => 'nullable|string|max:255|min:5',
            'instagram_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
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
        $this->dispatch('success', __('Settings updated successfully!'));
    }

    public function render()
    {
        return view('livewire.admin.settings.manage-setting', [
            'current_logo' => Setting::get('logo'),
        ]);
    }
}