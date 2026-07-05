<?php

use Livewire\Component;
use App\Models\PersonalInfo;
use App\Models\Certificate;
use App\Livewire\Forms\PersonalInfoForm;
use Livewire\Attributes\Validate;
use App\Traits\ComponentTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

new class extends Component
{
    use ComponentTrait, WithFileUploads;

    // PersonalInfo-related properties
    public PersonalInfoForm $personalInfoForm;
    public const PERSONAL_INFOS = ['personalInfoForm.name', 'personalInfoForm.location', 
        'personalInfoForm.job_title', 'personalInfoForm.about'];
    
    // Certificate-related properties
    #[Validate('required|string|max:255')]
    public $certName = '';
    #[Validate('required|string|max:255')]
    public $certPlatform = '';
    #[Validate('image|max:10240')]
    public $certImage;

    public function mount()
    {
        $this->personalInfoForm->setPersonalInfo(PersonalInfo::firstOrCreate(['name' => 'JL Pile']));
    }

    #[Computed]
    public function certificates()
    {
        return Certificate::all();
    }

    public function updated($property, $value)
    {
        if (in_array($property, self::PERSONAL_INFOS)) $this->personalInfoForm->update($property, $value);
    }

    public function saveCert()
    {
        $this->saveCertificate($this->certImage, $this->certName, $this->certPlatform);
    }

    public function deleteCert($certID)
    {
        $this->deleteCertificate($certID);
    }
};
?>

<div class="space-y-4">
    {{-- Personal Info --}}
    <x-edit_form.personal-info/>
    {{-- Certificates --}}
    <x-edit_form.certificates :certificates="$this->certificates"/>
</div>