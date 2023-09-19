<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $blogs[0]['title'] }}
        </h2>
    </x-slot>
    @foreach ($blogs as $blog)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <div class="flex flex-row">
                            <div>
                                @if(!empty($blog->image))
                                <img src="/Images/{{$blog->image}}" width="200px">
                                @endif
                            </div>
                            <div class="blog-content">
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        <a href="/blog/{{ $blog->id }}">{{ $blog->title}}</a>
                                    </h2>
                                </header>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{$blog->content}}
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" align="center">
            Yorumlar
        </div>
    </div>
    @foreach($comments as $comment)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <div class="blog-content">
                            <div align="right">{{$comment->users->email}}</div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="word-wrap:break-word;">
                                {{$comment->comment}}
                            </p>
                        </div>
                    </section>
                    @if(isset(auth()->user()->id) && ($blog->users->id === auth()->user()->id) ||
                    auth()->user()->user_type == 'admin') <div align="right">
                        <a class="button btn-block" href="{{ url('/comment/delete', ['id'=>$comment->id]) }}">Yorumu Sil</a>

                    </div>
                    @endif
                </div>

            </div>

        </div>

    </div>


    @endforeach

    @auth
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Yorum Ekle') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Yukarıdaki yazıya ait bir yorumunuz varsa aşağıdaki kısımdan yorumda bulunabilirsiniz.") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('comment.create') }}" enctype="multipart/form-data"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('post')
                            <div>
                                <label for="comment">Yorum</label>
                                <input id="comment" name="comment" type="text" class="mt-1 block w-full" required
                                    autofocus autocomplete="comment" />
                            </div>
                            <input id="blogId" name="blogId" style="visibility: hidden;" value="{{$blogs[0]['id']}}"
                                type="text" />
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Gönder') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endauth

</x-app-layout>
