<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Event') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">
                    <form method="POST" action="/admin/events/store" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="my-editor" :value="__('Description')" />
                            <textarea class="block mt-1 w-full" name="description" id="my-editor" cols="30" rows="10"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="event_date" :value="__('Event Date')" />
                            <x-text-input id="event_date" class="block mt-1 w-full" type="datetime-local" name="event_date" :value="old('event_date')" required />
                            <x-input-error :messages="$errors->get('event_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image_1" :value="__('Banner Image')" />
                            <x-text-input id="image_1" class="block mt-1 w-full" type="file" name="image_1" :value="old('image_1')" required />
                            <x-input-error :messages="$errors->get('image_1')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
