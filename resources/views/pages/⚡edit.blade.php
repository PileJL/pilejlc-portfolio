<?php

use Livewire\Component;
use App\Models\PersonalInfo;
use App\Models\Certificate;
use App\Models\Experience;
use App\Livewire\Forms\PersonalInfoForm;
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
    public $certName = '';
    public $certPlatform = '';
    public $certImage;

    // Experience-related properties
    public $job_title = '';
    public $time_rendered = '';
    public $employment_type = '';
    public $company_name = '';
    public $company_website = '';
    public $description = '';

    public function mount()
    {
        $this->personalInfoForm->setPersonalInfo(PersonalInfo::firstOrCreate(['name' => 'JL Pile']));
    }

    #[Computed]
    public function certificates()
    {
        return Certificate::all();
    }

    #[Computed]
    public function experiences()
    {
        return Experience::all();
    }

    public function updated($property, $value)
    {
        if (in_array($property, self::PERSONAL_INFOS)) $this->personalInfoForm->update($property, $value);
    }

    public function saveCert()
    {
        $this->saveCertificate($this->certImage, $this->certName, $this->certPlatform);
    }

    public function deleteCert($certID, $publicID)
    {
        $this->deleteCertificate($certID, $publicID);
    }

    public function saveExp()
    {
        $this->saveExperience($this->job_title, $this->time_rendered, $this->employment_type, $this->company_name, $this->company_website, $this->description);
    }

    public function navigateToEditExp($id)
    {
        return $this->redirect(route('experience-edit', $id), navigate: true);
    }
};
?>

<div class="space-y-4">
    {{-- Personal Info --}}
    <x-edit_form.personal-info/>
    {{-- Certificates --}}
    <x-edit_form.certificates :certificates="$this->certificates"/>
    {{-- Experiences --}}
    <x-edit_form.experiences :experiences="$this->experiences"/>
</div>