@props(['user', 'careers'])
<div
    class="my-10 mx-10 relative max-w-md mx-auto md:max-w-2xl min-w-0 break-words bg-white w-full  shadow-lg rounded-xl">
    <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full flex justify-center">
                <div class="relative">

                    @if ($user->avatar == null)
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png"
                            class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                    @else
                        <img src="{{ $user->avatar }}"
                            class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                    @endif
                </div>
            </div>
            <div class="w-full text-center mt-20">
                <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                    <div class="p-3 text-center">
                        <span
                            class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{ $user->forums->count() }}</span>
                        <span class="text-sm text-slate-400">Forums</span>
                    </div>
                    <div class="p-3 text-center">
                        <span
                            class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{ $user->careers->count() }}
                        </span>
                        <span class="text-sm text-slate-400">
                            Hiring
                        </span>
                    </div>

                    <div class="p-3 text-center">
                        <span
                            class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{ $user->receivedLikes->count() }}</span>
                        <span class="text-sm text-slate-400">Likes</span>
                    </div>

                    <div class="p-3 text-center">
                        <span
                            class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{ $user->receivedComments->count() }}</span>
                        <span class="text-sm text-slate-400">Comments</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{ $user->name }}
            </h3>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{ $user->email }}
            </div>
        </div>
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4">
                    <p class="font-light leading-relaxed text-slate-600 mb-4">
                        @if (!empty($user->bio))
                            {{ $user->bio }}
                        @else
                            No bio yet
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
