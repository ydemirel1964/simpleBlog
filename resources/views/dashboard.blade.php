<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Basic Blog') }}
        </h2>
    </x-slot>
    @auth
    @foreach ($blogs as $blog)
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <div style="text-align: right;">{{$blog->users->email}}</div>
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

                        @if(isset(auth()->user()->id) && ($blog->users->id === auth()->user()->id) ||
                        auth()->user()->user_type == 'admin') <div align="right">
                            <a class="button btn-block" href="{{ url('/blog/delete', ['id'=>$blog->id]) }}">Yazıyı
                                Sil</a>
                        </div>
                        @endif

                    </section>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Yeni yazı eklemek ve eklenmiş olan yazıları görmek için kullanıcı girişi yapmanız gerekmektedir.
                </div>
            </div>
        </div>
    </div>
    @endauth

</x-app-layout>
