<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="profile-grid">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="profile-item">
                @livewire('profile.update-profile-information-form')
                
            </div>
            @endif
            <div class="profile-item">
                @livewire('default-component.profile')
            </div>
                

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="profile-item">
                    @livewire('profile.update-password-form')
                </div>

                
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="profile-item">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                
            @endif

            <div class="profile-item">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                

                <div class="profile-item">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
            </div>
        </div>
    </div>
    <style>
        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 24px;
            row-gap: 32px;
            align-items: stretch;
        }

        .profile-item > div {
           min-width: 0;
           height: 100%;
        }

        .profile-item > div {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
        }

        .profile-item > div > div:last-child {
            width: 100% !important;
            flex-shrink: 0;
            margin-bottom: 14px !important;
        }

        .profile-item > div > div:last-child {
            width: 100% !important;
            margin-top: 0 !important;
            flex: 1 !important;
            min-height: 0;
        }

        .profile-item form {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .profile-item form > div:first-child {
            flex: 1;
        }

        .profile-item .bg-white {
            width: 100%;
            box-sizing: border-box;
        }

        .profile-item .grid.grid-co ls-6 {
            width: 100%;
        }

        .profile-item form > div:last-child {
            flex-shrink: 0;
        }

        @media (max-width: 767px) {
            .profile-grid {
                grid-auto-columns: 1fr;
                row-gap: 28px;
            }
        }
    </style>
</x-app-layout>
