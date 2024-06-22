<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">
                    <a href="/admin/news/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New News</a>

                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Created By</th>
                                <th class="px-6 py-3">Banner</th>
                                <th colspan="2" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $nw)
                            <tr>
                                <td class="px-6 py-3">{{$nw->title}}</td>
                                <td class="px-6 py-3">{{$nw->user->name}}</td>
                                <td class="px-6 py-3"><img src="/storage/{{$nw->image_1}}" alt="" width="50" height="auto"></td>
                                <td class="px-6 py-3"><a href="/news/{{$nw->id}}" target="_blank">Show</a></td>
                                <td class="px-6 py-3"><a href="/admin/news/{{$nw->id}}/edit">Edit</a></td>
                                <td class="px-6 py-3"><a style="color:black" href="{{ route('news.destroy', ['id' => $nw->id]) }}">
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
