<?php

namespace App\Livewire\Forms;

use App\Models\Experience;
use Exception;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExperienceForm extends Form
{
    public ?Experience $experience = null;

    #[Validate('required|string|max:255')]
    public ?string $job_title;
    #[Validate('required|string|max:255')]
    public ?string $time_rendered;
    #[Validate('required|string|max:255')]
    public ?string $company_name;
    #[Validate('required|string|max:255')]
    public ?string $employment_type;
    #[Validate('nullable|string|max:255')]
    public ?string $company_website;
    #[Validate('nullable|string')]
    public ?string $description;

    public function setExperience(?Experience $experience)
    {
        $this->experience = $experience;
        $this->job_title = $experience?->job_title;
        $this->time_rendered = $experience?->time_rendered;
        $this->company_name = $experience?->company_name;
        $this->employment_type = $experience?->employment_type;
        $this->company_website = $experience?->company_website;
        $this->description = $experience?->description;
    }

    public function update(string $property, mixed $value)
    {
        try {
            // remove the "experienceForm." from the property name
            $property = str_replace('experienceForm.', '', $property);
            // update specific attribute
            $this->experience->update([$property => ($value === '') ? null : $value]);
            // refresh data and show toast message
            $this->experience->refresh();
            Flux::toast('Your changes have been saved.', variant: 'success', duration: 1000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to save changes.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }
    }
}
