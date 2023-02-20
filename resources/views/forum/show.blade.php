<x-layout>
    <main class="mt-10">
        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
                class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <div class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">
                    <x-forums-tag :tag="$forum->tag" />
                </div>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $forum->title }}
                </h2>
                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg"
                        class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> {{ $forum->user->first_name }} </p>
                        <p class="font-semibold text-gray-400 text-xs"> {{ $forum->created_at->diffForHumans() }} </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="px-4 lg:px-0 mt-12 text-gray-900 max-w-screen-md mx-auto text-lg leading-relaxed">

            @if (!$forum->likedBy(auth()->user()))
                <form action="{{ route('forums.like', $forum->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="mb-10 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Like
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            {{ $forum->likes->count() }}
                        </span>
                    </button>
                </form>
            @else
                <form action="{{ route('forums.like', $forum->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="mb-10 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Unlike
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            {{ $forum->likes->count() }}
                        </span>
                    </button>
                </form>
            @endif

            <p class="pb-6">{{ $forum->body }}</p>
        </div>

    </main>


    <x-forums-comment-form :forum="$forum" />

    <section class="bg-grey-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

            @foreach ($forum->comments as $comment)
                <x-forums-comments :comment="$comment" />
            @endforeach

        </div>
    </section>

    @if ($forums->count())
        <section class="bg-grey-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900">Latest forums talk
                    </h2>
                    <p class="font-light text-gray-500 sm:text-xl text-gray-400">We use an agile approach to test
                        assumptions and connect with the needs of your audience early and often.</p>
                </div>
                <x-forums-latest-post :forums="$forums" />
            </div>
        </section>
    @endif

</x-layout>
