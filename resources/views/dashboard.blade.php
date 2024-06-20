<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div>
                        @if($user->qrcode)
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->style('dot')->gradient(255, 0, 0, 0, 0, 255, 'diagonal')->margin(1)->eye('circle')->generate($qr)) !!} ">
                        @else
                        <a href="/profile">Please Complete your profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
