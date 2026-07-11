<?php

use Livewire\Component;
use App\Livewire\Forms\ExperienceForm;
use App\Models\Experience;

new class extends Component
{
    public ExperienceForm $experienceForm;

    public function mount(Experience $experience)
    {
        $this->experienceForm->setExperience($experience);
    }

    public function updated($property, $value)
    {
        $this->experienceForm->update($property, $value);
    }
};
?>

<div class="space-y-4">
    {{-- header --}}
    <div class="flex gap-4 items-center">
        {{-- back button --}}
        <a wire:navigate href="{{ route('edit') }}" class="flex w-fit rounded-md border border-accent/5 px-3 py-1 hover:bg-accent hover:text-accent-foreground shadow-xs">
            <flux:icon.arrow-long-left class="size-7"/>
        </a>
        {{-- header text --}}
        <flux:heading class="font-black! text-xl!" level="2">Edit Experience</flux:heading>
    </div>

    <div class="pl-1 space-y-4">
        <div class="flex flex-col md:flex-row gap-4 w-full md:items-center">
            {{-- job title field --}}
            <div class="flex-1">
                <flux:input wire:model.live="experienceForm.job_title" placeholder="Chief Executive Officer" type="text" label="Job Title" />
            </div>
            {{-- time rendered field --}}
            <div class="flex-1">
                <flux:input wire:model.live="experienceForm.time_rendered" placeholder="Jan 2027 - Present" type="text" label="Time Rendered" />
            </div>
            {{-- employment type --}}
            <div class="flex-1 truncate">
                <flux:input wire:model.live="experienceForm.employment_type" placeholder="Full-time" type="text" label="Employment Type" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 w-full md:items-center">
            {{-- company name --}}
            <div class="flex-1 truncate">
                <flux:input wire:model.live="experienceForm.company_name" placeholder="Aicos" type="text" label="Company Name" />
            </div>
            {{-- company website --}}
            <div class="flex-1 truncate">
                <flux:input wire:model.live="experienceForm.company_website" placeholder="https://sample.com" type="text" label="Company Website" />
            </div>
        </div>
        {{-- description --}}
        <flux:textarea wire:model.live="experienceForm.description" label="Description" placeholder="Description..." />
    </div>
</div>