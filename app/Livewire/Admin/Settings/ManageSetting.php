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
    public $instagram;
    public $facebook;
    public $twitter;
    public function mount()
    {
        $this->hospital_name = Setting::get('hospital_name', '');
        $this->contact_email = Setting::get('contact_email', '');
        $this->contact_phone = Setting::get('contact_phone', '');
        $this->address = Setting::get('address', '');
    }

    public function save()
    {
        $this->validate([
            'hospital_name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        Setting::set('hospital_name', $this->hospital_name, 'string', 'general', 'Name of the hospital');
        if ($this->logo) {
            Setting::set('logo', $this->logo, 'file', 'branding', 'Hospital logo');
        }
        Setting::set('contact_email', $this->contact_email, 'string', 'contact', 'Contact email address');
        Setting::set('contact_phone', $this->contact_phone, 'string', 'contact', 'Contact phone number');
        Setting::set('address', $this->address, 'string', 'contact', 'Hospital address');
        Setting::set('instagram', $this->instagram, 'string', 'social', 'Instagram link');
        Setting::set('facebook', $this->facebook, 'string', 'social', 'Facebook link');
        Setting::set('twitter', $this->twitter, 'string', 'social', 'Twitter link');
        $this->dispatch('success', __('Settings updated successfully!'));
    }
    public function render()
    {
        return view('livewire.admin.settings.manage-setting', [
            'current_logo' => Setting::get('logo'),
        ]);
    }
}
