<div class="space-y-2 rounded-md border border-accent/5 px-5 py-4">
    {{-- header text --}}
    <flux:heading class="font-black! text-lg!" level="2">Experience</flux:heading>
    {{-- list --}}
    <div class="flex flex-col gap-4">
        {{-- experience items --}}
        @foreach (config('app.experiences') as $experience )
            <x-experience-item title="{{ $experience[0] }}" employmentType="{{ $experience[1] }}" company="{{ $experience[2] }}" companyLink="{{ $experience[3] }}" date="{{ $experience[4] }}"/>
        @endforeach
    </div>
</div>