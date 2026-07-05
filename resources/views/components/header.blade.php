@props(['personalInfo'])

<div class="flex gap-4">
    {{-- left side -> image --}}
    @if($personalInfo?->display_pic_url)
        <flux:avatar class="size-36 shrink-0" src="{{ $personalInfo->display_pic_url }}" />
    @else
        <flux:card class="size-36 text-center shadow-sm items-center flex justify-center">
            <flux:text class="text-xs text-accent-content/40">Display Picture</flux:text>
        </flux:card>
    @endif

    {{-- right side --}}
    <div class="flex flex-col w-full pt-2 justify-between">
        {{-- header texts --}}
        <div class="flex flex-col">
            {{-- name and theme selection--}}
            <div class="flex gap-1 items-center sm:justify-between">
                {{-- name --}}
                <flux:heading class="font-black! text-2xl!" level="1">{{ $personalInfo->name ?? '-' }}</flux:heading>
                {{-- theme selection --}}
                <x-theme-selection-dropdown/>
                <x-theme-selection-radio-group/>
            </div>
            {{-- location --}}
            <div class="flex items-center gap-1">
                <flux:text class="text-xs whitespace-nowrap">{{ $personalInfo->location ?? '-' }}</flux:text>
                <flux:icon.map-pin class="size-4 [:where(&)]:text-zinc-500 [:where(&)]:dark:text-white/70"/>
            </div>
            {{-- title --}}
            <flux:heading level="2" class="text-sm! font-bold">{{ $personalInfo->job_title ?? '-' }}</flux:heading>
        </div>
        {{-- send email button --}}
        <flux:button href="mailto:pilejlc@gmail.com" variant="primary" class="w-full sm:w-46">Send Email</flux:button>
    </div>
</div>