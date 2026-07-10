<?php

namespace App\Livewire\Forms;

use App\Models\PersonalInfo;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Flux\Flux;

class PersonalInfoForm extends Form
{
    public ?PersonalInfo $personalInfo = null;

    #[Validate('image|max:10240')]
    public $display_pic_url;
    public ?string $display_pic_public_id = null;

    #[Validate('required|string|max:255')]
    public ?string $name;

    #[Validate('required|string|max:255')]
    public ?string $location;

    #[Validate('required|string|max:255')]
    public ?string $job_title;

    #[Validate('required|string')]
    public ?string $about;

    public function setPersonalInfo(?PersonalInfo $personalInfo)
    {
        $this->personalInfo = $personalInfo;
        $this->display_pic_url = $personalInfo?->display_pic_url;
        $this->display_pic_public_id = $personalInfo?->display_pic_public_id;
        $this->name = $personalInfo?->name;
        $this->location = $personalInfo?->location;
        $this->job_title = $personalInfo?->job_title;
        $this->about = $personalInfo?->about;
    }

    public function update(string $property, mixed $value)
    {
        try {
            // remove the "personalInfoForm." from the property name
            $property = str_replace('personalInfoForm.', '', $property);
            // if personalInfo exists, update. Else, create
            if ($this->personalInfo) {
                $this->personalInfo->update([$property => ($value === '') ? null : $value]);
            }
            else {
                $this->personalInfo = $this->personalInfo = PersonalInfo::create([$property => $value]);
            }
            // refresh data and show toast message
            $this->personalInfo->refresh();
            Flux::toast('Your changes have been saved.', variant: 'success', duration: 1000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to save changes.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }
    }
}
