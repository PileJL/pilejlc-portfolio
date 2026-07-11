@props(['experiences'])

<div class="space-y-2 rounded-md border border-accent/5 px-5 py-4">
    {{-- header text --}}
    <div class="flex justify-between items-center">
        <flux:heading class="font-black! text-lg!" level="2">Experience</flux:heading>
        <div class="flex gap-1 items-center">
            <flux:link wire:navigate href="{{ route('experiences') }}" variant="subtle" class="text-[11px]">Learn more </flux:link>
            <flux:icon.chevron-right class="size-3 text-accent-content"/>
        </div>
    </div>
    {{-- list --}}
    <div class="flex flex-col gap-4">
        {{-- experience items --}}
        @foreach ($experiences as $experience )
            <x-experience-item title="{{ $experience->job_title }}" employmentType="{{ $experience->employment_type }}" 
                company="{{ $experience->company_name }}" companyLink="{{ $experience->company_website }}" date="{{ $experience->time_rendered }}"/>
        @endforeach
    </div>
</div>