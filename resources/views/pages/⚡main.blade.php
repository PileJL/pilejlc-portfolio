<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="w-full">
    {{-- header --}}
    <x-header/>

    {{-- Separator --}}
    <flux:separator variant="subtle" class="mt-7" />

    {{-- body --}}
    <div class="flex flex-col md:flex-row gap-2 mt-6">
        {{-- left side --}}
        <div class="flex flex-col gap-2 w-full md:w-3/5">
            {{-- about --}}
            <x-about/>
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
            <x-experience/>
            {{-- certificates --}}
            <x-certificates/>
        </div>
    </div>
</div>