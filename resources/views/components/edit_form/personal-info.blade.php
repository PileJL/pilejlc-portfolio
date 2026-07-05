<flux:card class="space-y-4">
    {{-- heading --}}
    <flux:heading class="text-xl font-extrabold!">Personal Info</flux:heading>
    {{-- fields --}}
    <div class="flex flex-col gap-4 pl-1">
        {{-- display picture field --}}
        <livewire:inputs.display-picture/>
        {{-- name, location, job title --}}
        <div class="flex flex-col sm:flex-row gap-4 w-full">
            {{-- name field --}}
            <div class="flex-1">
                <flux:input wire:model.live="personalInfoForm.name" placeholder="Name" type="text" label="Name" />
            </div>
            {{-- location field --}}
            <div class="flex-1">
                <flux:input wire:model.live="personalInfoForm.location" placeholder="Location" type="text" label="Location" />
            </div>
            {{-- job title field --}}
            <div class="flex-1">
                <flux:input wire:model.live="personalInfoForm.job_title" placeholder="Job Title" type="text" label="Job Title" />
            </div>
        </div>
        {{-- about --}}
        <flux:textarea wire:model.live="personalInfoForm.about" label="About" placeholder="About you..." />
    </div>
</flux:card>