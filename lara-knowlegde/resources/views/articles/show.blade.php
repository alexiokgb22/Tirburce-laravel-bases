<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800">
                Article : {{ $article->title }}
            </h2>

            <a href="{{ route('articles.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            {{-- Carte blanche comme dans la liste --}}
            <div class="bg-white shadow-md rounded-lg p-6 overflow-hidden">

                {{-- Image --}}
                <div class="w-full h-72 md:h-96 overflow-hidden rounded-lg mb-6">
                    <img src="{{ asset('storage/' . $article->image_path) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-full object-cover">
                </div>

                {{-- Titre --}}
                <h1 class="text-3xl font-bold text-gray-900 mb-3">
                    {{ $article->title }}
                </h1>

                {{-- Infos --}}
                <div class="text-sm text-gray-500 mb-6">
                    <p>
                        Par
                        <span class="font-semibold text-gray-800">
                            {{ $article->user->name }}
                        </span>
                        · {{ $article->created_at->diffForHumans() }}
                    </p>
                </div>

                {{-- Contenu de l’article --}}
                <div class="prose prose-lg max-w-none text-gray-800 mb-8">
                    {!! nl2br(e($article->content)) !!}
                </div>

                {{-- Actions --}}
                
                
            </div>
        </div>
    </div>
</x-app-layout>
