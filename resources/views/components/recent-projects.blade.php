<div class="space-y-1.5 rounded-md border border-accent/5 px-5 py-3">
    {{-- header --}}
    <flux:heading class="font-black! text-lg!" level="2">Recent Projects</flux:heading>
    {{-- content --}}
    <div class="flex flex-col gap-3">
        @foreach (config('app.recent_projects') as $project)
            {{-- card --}}
            <flux:card size="sm" class="text-sm py-3 hover:bg-accent/5">
                <a href="{{ $project[2] }}" target="_blank">
                    {{-- project name --}}
                    <flux:heading class="font-semibold! text-sm!" level="3">{{ $project[0] }}</flux:heading>
                    {{-- short desc --}}
                    <flux:text class="text-xs mt-0.5">{{ $project[1] }}</flux:text>
                </a>
            </flux:card>
        @endforeach
    </div>
</div>