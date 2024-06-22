<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">
                    <a href="/admin/events/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Event</a>

                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-6 py-3">Event</th>
                                <th class="px-6 py-3">Event Date</th>
                                <th class="px-6 py-3">Created By</th>
                                <th class="px-6 py-3">Banner</th>
                                <th colspan="2" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td class="px-6 py-3">{{$event->title}}</td>
                                <td class="px-6 py-3">{{$event->event_date}}</td>
                                <td class="px-6 py-3">{{$event->user->name}}</td>
                                <td class="px-6 py-3"><img src="/storage/{{$event->image_1}}" alt="" width="50" height="auto"></td>
                                <td class="px-6 py-3"><a href="/events/{{$event->id}}" target="_blank">Show</a></td>
                                <td class="px-6 py-3"><a href="/admin/events/{{$event->id}}/edit">Edit</a></td>
                                <td class="px-6 py-3"><a style="color:black" href="{{ route('events.destroy', ['id' => $event->id]) }}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
