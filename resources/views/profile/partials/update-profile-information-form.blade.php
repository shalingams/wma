<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <select name="title" class="mt-1 block w-full">
                <option value="Mr" {{ (old('title', $user->title) == "Mr" ? "selected":"")}}>Mr</option>
                <option value="Mrs" {{ (old('title', $user->title) == "Mrs" ? "selected":"")}}>Mrs</option>
                <option value="Miss" {{ (old('title', $user->title) == "Miss" ? "selected":"")}}>Miss</option>
                <option value="Miss" {{ (old('title', $user->title) == "Miss" ? "selected":"")}}>Dr</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div>
            <x-input-label for="nickname" :value="__('Professional Name / Nickname')" />
            <x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" :value="old('nickname', $user->nickname)" />
            <x-input-error class="mt-2" :messages="$errors->get('nickname')" />
        </div>

        <div>
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob', $user->dob)" />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            <x-input-label for="nic" :value="__('NIC No')" />
            <x-text-input id="nic" name="nic" type="text" class="mt-1 block w-full" :value="old('nic', $user->nic)" required />
            <x-input-error class="mt-2" :messages="$errors->get('nic')" />
        </div>

        <div>
            <x-input-label for="work_address" :value="__('Residential Address')" />
            <x-text-input id="residential_address" name="residential_address" type="text" class="mt-1 block w-full" :value="old('residential_address', $user->residential_address)" required />
            <x-input-error class="mt-2" :messages="$errors->get('residential_address')" />
        </div>

        <div>
            <x-input-label for="work_address" :value="__('Work Address')" />
            <x-text-input id="work_address" name="work_address" type="text" class="mt-1 block w-full" :value="old('work_address', $user->work_address)" />
            <x-input-error class="mt-2" :messages="$errors->get('work_address')" />
        </div>

        <div>
            <x-input-label for="mobile" :value="__('Mobile Number')" />
            <x-text-input id="mobile" name="mobile" type="text" class="mt-1 block w-full" :value="old('mobile', $user->mobile)" required />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
        </div>

        <div>
            <x-input-label for="work_contact" :value="__('Work Contact')" />
            <x-text-input id="work_contact" name="work_contact" type="text" class="mt-1 block w-full" :value="old('work_contact', $user->work_contact)" />
            <x-input-error class="mt-2" :messages="$errors->get('work_contact')" />
        </div>

        <div>
            <x-input-label for="residence_contact" :value="__('Residence Contact')" />
            <x-text-input id="residence_contact" name="residence_contact" type="text" class="mt-1 block w-full" :value="old('residence_contact', $user->residence_contact)" />
            <x-input-error class="mt-2" :messages="$errors->get('residence_contact')" />
        </div>

        <div>
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', $user->website)" />
            <x-input-error class="mt-2" :messages="$errors->get('website')" />
        </div>

        <div>
            <x-input-label for="marital_status" :value="__('Marital Status')" />
            <select name="marital_status" class="mt-1 block w-full">
                <option value="Married" {{ (old('marital_status', $user->marital_status) == "Married" ? "selected":"")}}>Married</option>
                <option value="Single" {{ (old('marital_status', $user->marital_status) == "Single" ? "selected":"")}}>Single</option>
                <option value="Divorced" {{ (old('marital_status', $user->marital_status) == "Divorced" ? "selected":"")}}>Divorced</option>
                <option value="Other" {{ (old('marital_status', $user->marital_status) == "Other" ? "selected":"")}}>Other</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('marital_status')" />
        </div>

        <div>
            <x-input-label for="beneficiary" :value="__('Beneficiary')" />
            <x-text-input id="beneficiary" name="beneficiary" type="text" class="mt-1 block w-full" :value="old('beneficiary', $user->beneficiary)" />
            <x-input-error class="mt-2" :messages="$errors->get('beneficiary')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>
</section>
