<x-guest-layout>

    <section id="about" class="h-screen">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8 mb-10">
                <div class="flex bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:gap-x-20 lg:px-24 lg:pt-0">
                    <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-20 lg:text-left text-white">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{$event->title}}</h2>
                        <p>{{$event->event_date}}</p>
                        <div class="mt-6 text-lg leading-8 text-white">{!! $event->description !!}</div>

                    </div>
                    <div class="mt-16 content-center">
                        <img class="left-0 w-[30rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="/storage/{{$event->image_1}}" alt="{{$event->title}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
