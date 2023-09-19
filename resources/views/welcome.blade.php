<!--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ana Sayfa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Yazı Ekle') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Yeni yazı eklemek için aşağıdaki alanları eksiksik şekilde doldurunuz.") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('blog.create') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <label for="title">Başlık</label>
                                <input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
                                    autocomplete="title" />
                            </div>
                            <div>
                                <x-input-label for="content" :value="__('İçerik')" />
                                <input id="content" name="content" type="text" class="mt-1 block w-full" required
                                    autofocus autocomplete="content" />
                            </div>
                            <div>
                                <label for="image" value="__('Resim')">Resim </label>
                                <input id="image" name="image" type="file" class="mt-1 block w-full" alt="Submit"
                                    width="48" height="48" required autofocus autocomplete="image">
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Kaydet') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
