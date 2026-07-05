<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\PersonalInfo;
use App\Livewire\Forms\PersonalInfoForm;

new class extends Component
{
    use WithFileUploads;
    
    public PersonalInfoForm $personalInfoForm;

    public function mount()
    {
        $this->personalInfoForm->setPersonalInfo(PersonalInfo::first());
    }

    public function updatedPersonalInfoFormDisplayPicUrl()
    {
        $url = Cloudinary::upload($this->personalInfoForm->display_pic_url->getRealPath())->getSecurePath();
        $this->personalInfoForm->update('display_pic_url', $url);
        $this->personalInfoForm->display_pic_url = $url;
    }
};
?>

<flux:field>
    {{-- label --}}
    <flux:label>Display Picture</flux:label>
    {{-- picture preview --}}
    @if($personalInfoForm->display_pic_url)
        <img src="{{ $personalInfoForm->display_pic_url }}" alt="Preview" class="size-36 shrink-0 object-cover rounded shadow-sm border border-accent-content/30">
    @else
        <flux:card class="size-36 text-center shadow-sm items-center flex justify-center">
            <flux:text class="text-xs text-accent-content/40">Display Picture</flux:text>
        </flux:card>
    @endif
    {{-- input --}}
    <flux:input class="mt-3" type="file" wire:model.live="personalInfoForm.display_pic_url" icon:trailing="loading" accept="image/*" />
    {{-- loading indicator --}}
    <div wire:loading wire:target="personalInfoForm.display_pic_url" class="flex items-end justify-center space-x-1 mt-2">
        <x-loading class="inline" />
        <flux:text class="text-sm inline">Uploading...</flux:text>
    </div>
</flux:field>