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
        <div class="flex gap-1 items-center">
            {{-- title --}}
            <flux:heading level="3" class="text-sm! font-semibold!">{{ $title }}</flux:heading>
            {{-- employment type --}}
            @if ($employmentType)
                <flux:text class="text-[10.5px]">· {{ $employmentType }}</flux:text>
            @endif
        </div>
        {{-- company --}}
        <flux:text class="text-xs">
            <flux:link href="{{ $companyLink }}" target="_blank" variant="subtle">{{ $company }}</flux:link>
        </flux:text>
    </div>
    {{-- date --}}
    <flux:text class="text-[11px] whitespace-nowrap">{{ $date }}</flux:text>
</div>