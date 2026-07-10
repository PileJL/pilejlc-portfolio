@props([
    'experiences' => []
])

<flux:card class="space-y-4">
    {{-- heading --}}
    <flux:heading class="text-xl font-extrabold!">Experiences</flux:heading>
    <form class="space-y-4" wire:submit="saveExp">
        <div class="flex flex-col sm:flex-row gap-4 w-full pl-1 sm:items-center">
            {{-- job title field --}}
            <div class="flex-1">
                <flux:input wire:model="job_title" placeholder="Chief Executive Officer" type="text" label="Job Title" />
            </div>
            {{-- time rendered field --}}
            <div class="flex-1">
                <flux:input wire:model="time_rendered" placeholder="Jan 2027 - Present" type="text" label="Time Rendered" />
            </div>
            {{-- employment type --}}
            <div class="flex-1 truncate">
                <flux:input wire:model="employment_type" placeholder="Full-time" type="text" label="Employment Type" />
            </div>
            {{-- company name --}}
            <div class="flex-1 truncate">
                <flux:input wire:model="company_name" placeholder="Aicos" type="text" label="Company Name" />
            </div>
            {{-- company website --}}
            <div class="flex-1 truncate">
                <flux:input wire:model="company_website" placeholder="https://sample.com" type="text" label="Company Website" />
            </div>
        </div>
        <div class="space-y-4">
            {{-- description --}}
            <flux:textarea wire:model.live="description" label="Description" placeholder="Description..." />
            {{-- add button --}}
            <div class="flex-1 sm:flex-0 sm:self-end">
                <flux:button class="w-full" variant="primary" type="submit">Add</flux:button>
            </div>
        </div>
    </form>

    {{-- existing experiences --}}
    <div class="space-y-2">
        {{-- header --}}
        <flux:heading class="text-lg font-semibold!">Existing Experiences</flux:heading>
        {{-- experience list --}}
        <div class="grid grid-cols-1 gap-4">
            @forelse ($experiences as $exp)
                <x-experience-item class="hover:bg-accent/5 cursor-pointer" title="{{ $exp->job_title }}" 
                    employmentType="{{ $exp->employment_type }}" company="{{ $exp->company_name }}" 
                    companyLink="{{ $exp->company_website }}" date="{{ $exp->time_rendered }}"
                    wire:click="navigateToEditExp({{ $exp->id }})"
                    />
            @empty
                <flux:text class="text-xs italic">No existing experience</flux:text>
            @endforelse
        </div>
    </div>
</flux:card>