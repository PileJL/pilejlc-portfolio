@props([
    'certificates' => []
])

<flux:card class="space-y-4">
    {{-- heading --}}
    <flux:heading class="text-xl font-extrabold!">Certificates</flux:heading>
    {{-- name, platform, imagez --}}
    <form class="flex flex-col sm:flex-row gap-4 w-full pl-1 sm:items-center" wire:submit="saveCert">
        {{-- name field --}}
        <div class="flex-1">
            <flux:input wire:model="certName" placeholder="Name" type="text" label="Name" />
        </div>
        {{-- platgorm field --}}
        <div class="flex-1">
            <flux:input wire:model="certPlatform" placeholder="Platform or Company" type="text" label="Platform" />
        </div>
        {{-- image field --}}
        <div class="flex-1 truncate">
            <flux:input wire:model="certImage" type="file" label="Image" accept="image/*" />
        </div>
        {{-- add button --}}
        <div class="flex-1 sm:flex-0 sm:self-end">
            <flux:button class="w-full sm:w-30" variant="primary" type="submit">Add</flux:button>
        </div>
    </form>
    {{-- existing certs container --}}
    <div class="space-y-2">
        {{-- header --}}
        <flux:heading class="text-lg font-semibold!">Existing Certificates</flux:heading>
        {{-- cert list --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($certificates as $cert)
                {{-- Structural Container Loop --}}
                <div>
                    {{-- card --}}
                    <flux:card size="sm" class="flex justify-between text-sm py-2 px-3 hover:bg-accent/5 w-full">
                        <flux:modal.trigger name="{{ 'view-cert' . $cert->id }}">
                            <div class="cursor-pointer flex-1">
                                {{-- cert name --}}
                                <flux:heading level="3" class="text-sm! font-semibold!">{{ $cert->name }}</flux:heading>
                                {{-- company --}}
                                <flux:text class="text-xs">{{ $cert->platform }}</flux:text>
                            </div>
                        </flux:modal.trigger>

                        {{-- delete cert button --}}
                        <div class="flex items-center">
                            <flux:modal.trigger name="{{ 'delete-cert' . $cert->id }}">
                                <flux:button size="xs" icon="x-mark" variant="subtle" />
                            </flux:modal.trigger>
                        </div>
                    </flux:card>

                    {{-- modal --}}
                    <flux:modal variant="bare" name="{{ 'view-cert' . $cert->id }}" class="w-full sm:p-4 sm:max-w-4xl" :closable="false">
                        <img src="{{ $cert->image_url }}" alt="Certificate" class="w-full h-auto rounded-sm">
                    </flux:modal>

                    {{-- Delete Modal --}}
                    <flux:modal name="{{ 'delete-cert' . $cert->id }}">
                        <div class="space-y-3">
                            {{-- confirmation message --}}
                            <div class="space-y-1">
                                <flux:heading size="lg">Delete Certificate?</flux:heading>
                                <flux:text class="text-xs">Are you sure you want to delete "{{ $cert->name }}"?</flux:text>
                            </div>
                            {{-- cancel and delete button --}}
                            <div class="flex gap-2 justify-end">
                                {{-- cancel --}}
                                <flux:modal.close>
                                    <flux:button size="sm" variant="ghost">Cancel</flux:button>
                                </flux:modal.close>
                                {{-- delete --}}
                                <flux:button size="sm" wire:click="deleteCert({{ $cert->id }}, '{{ $cert->image_public_id }}')" variant="danger">Delete</flux:button>
                            </div>
                        </div>
                    </flux:modal>
                </div>
            @empty
                <flux:text class="text-xs italic">No existing certificates</flux:text>
            @endforelse
        </div>
    </div>
</flux:card>