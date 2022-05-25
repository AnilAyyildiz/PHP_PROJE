@extends('layouts.home')

@section('title',"User Profil")

@section('menu')
    @include('home._menu')
@endsection

@section('content')
    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;margin-left: 50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li class="active">
                    &nbsp; User Profile
                </li>
            </ul>
        </div>
        <main class="hoc container clear">
                @include("home.usermenu")
            <div class="content three_quarter">

                <x-app-layout>
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Profile') }}
                        </h2>
                    </x-slot>

                    <div>
                        <div class="max-w-7xl mx-auto py-7 sm:px-6 lg:px-8">
                            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('profile.update-profile-information-form')

                                <x-jet-section-border />
                            @endif

                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.update-password-form')
                                </div>

                                <x-jet-section-border />
                            @endif

                            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.two-factor-authentication-form')
                                </div>

                                <x-jet-section-border />
                            @endif

                           {{-- <div class="mt-10 sm:mt-0">
                                @livewire('profile.logout-other-browser-sessions-form')
                            </div>--}}

                            <x-jet-section-border />

                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.delete-user-form')
                            </div>
                        </div>
                    </div>
                </x-app-layout>

            </div>

        </main>
    </div>
<style>
    .sidebar a {
        font: bold 20px calibri;

    }

</style>


@endsection
