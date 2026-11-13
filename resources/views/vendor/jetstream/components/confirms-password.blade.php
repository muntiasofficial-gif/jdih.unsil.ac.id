@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-jet-dialog-modal wire:model="confirmingPassword">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                        x-ref="confirmable_password"
                        wire:model.defer="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />

            <x-jet-input-error for="confirmable_password" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
    <div class="flex items-center justify-end gap-2 w-full flex-nowarp">
        <x-jet-secondary-button style="width: auto !important; min-width:0 !important; flex:0 0 auto !important;" wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-jet-button>
    </div>
    </x-slot>
</x-jet-dialog-modal>
@endonce
