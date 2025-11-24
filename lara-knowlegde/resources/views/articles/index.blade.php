<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800">
                Articles
            </h2>
            <a href="{{ route('articles.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Nouvel Article
            </a>
        </div>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                @if ($articles->isEmpty())
                    <h2 class="text-center text-gray-500 text-xl">
                        Vous n'avez aucun article 😢
                    </h2>
                @else
                    <p class="text-lg text-gray-700">
                        Vous avez
                        <span class="font-semibold text-blue-600">
                            {{ $articles->count() }}
                        </span>
                        articles 📚
                    </p>

                    {{-- Exemple d'affichage stylé de la liste (optionnel) --}}
                    <ul class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($articles as $article)
                            <li class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                                <a href="{{ route('article.show', $article->slug) }}" class="block">

                                    {{-- Image d’article --}}
                                    <div class="h-48 w-full overflow-hidden">
                                        <img src="{{ $article->image_url ?? asset('images/default.jpg') }}"
                                            alt="{{ $article->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                    </div>

                                    {{-- Contenu --}}
                                    <div class="p-5">
                                        <h3 class="text-xl font-semibold mb-2 line-clamp-2">
                                            {{ $article->title }}
                                        </h3>

                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                            {{ Str::limit($article->content, 150) }}
                                        </p>

                                        <span class="text-indigo-600 font-medium text-sm">
                                            Lire l'article →
                                        </span>
                                    </div>

                                </a>
                            </li>
                        @endforeach
                    </ul>

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
