<?php

use Livewire\Component;
use App\Models\PersonalInfo;
use App\Models\Certificate;
use App\Models\Experience;

new class extends Component
{
    public ?PersonalInfo $personalInfo;
    public $certificates;
    public $experiences;

    public function mount()
    {
        $this->personalInfo = PersonalInfo::first();
        $this->certificates = Certificate::all();
        $this->experiences = Experience::all();
    }
};
?>

<div class="w-full">
    {{-- header --}}
    <x-header :personalInfo="$personalInfo"/>

    {{-- Separator --}}
    <flux:separator variant="subtle" class="mt-7" />

    {{-- body --}}
    <div class="flex flex-col md:flex-row gap-2 mt-6">
        {{-- left side --}}
        <div class="flex flex-col gap-2 w-full md:w-3/5">
            {{-- about --}}
            <x-about :about="$personalInfo?->about"/>
            {{-- teck stack --}}
            <x-tech-stack/>
            {{-- recent projects --}}
            <x-recent-projects/>
            {{-- social links --}}
            <x-social-links/>
        </div>
        {{-- right side --}}
        <div class="flex flex-col gap-2 w-full md:w-2/5">
            {{-- experience --}}
            <x-experience :experiences="$experiences"/>
            {{-- certificates --}}
            <x-certificates :certificates="$certificates"/>
        </div>
    </div>
</div>