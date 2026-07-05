@props([
    'title' => null,
    'company' => null,
    'companyLink' => '#',
    'date' => null,
    'employmentType' => null
])

<div class="flex justify-between pb-3 border-b border-zinc-100 dark:border-zinc-800">
    {{-- title and company --}}
    <div>
        {{-- title --}}
        <flux:heading level="3" class="text-sm! font-semibold! text-nowrap">{{ $title }}</flux:heading>
        
        <div class="flex gap-1 items-center">
            {{-- company --}}
            <flux:text class="text-xs">
                <flux:link href="{{ $companyLink }}" target="_blank" variant="subtle">{{ $company }}</flux:link>
            </flux:text>
            {{-- employment type --}}
            @if ($employmentType)
                <flux:text class="text-[10.5px]">· {{ $employmentType }}</flux:text>
            @endif
        </div>
    </div>
    {{-- date --}}
    <flux:text class="text-[11px] text-nowrap">{{ $date }}</flux:text>
</div>