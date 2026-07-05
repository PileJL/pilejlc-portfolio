<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $password = '';

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return $this->redirectIntended(route('edit'));
        }

        $this->addError('password', 'Invalid credentials.');
    }
};
?>

<div class="mt-25 max-w-md mx-auto space-y-4">
    {{-- header --}}
    <div class="flex gap-4 items-center">
        {{-- back button --}}
        <a wire:navigate href="{{ route('main') }}" class="flex w-fit rounded-md border border-accent/5 px-3 py-1 hover:bg-accent hover:text-accent-foreground shadow-xs">
            <flux:icon.arrow-long-left class="size-7"/>
        </a>
        {{-- header text --}}
        <flux:heading class="font-black! text-sm!" level="2">Back to home</flux:heading>
    </div>

    <flux:card class="space-y-6">
        {{-- header --}}
        <flux:heading size="lg" class="font-semibold text-center">Login</flux:heading>
        {{-- form --}}
        <form wire:submit="login" class="space-y-6">
            {{-- email field --}}
            <flux:input label="Email" wire:model="email" type="email" placeholder="Your email address" />
            {{-- passowrd field --}}
            <flux:field>
                <flux:label>Password</flux:label>
                <flux:input type="password" wire:model="password" placeholder="Your password" viewable />
                <flux:error name="password" />
            </flux:field>
            {{-- login button --}}
            <flux:button type="submit" variant="primary" class="w-full">Log in</flux:button>
        </form>
    </flux:card>
</div>