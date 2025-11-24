<x-app-layout>
    <x-slot name="header">
        <h2>Articles</h2>
        <a href="{{ route('articles.create') }}"> + Nouvel Article</a>
    </x-slot>
    <div>
        @if ($articles->isEmpty())

            <h2>Vous n'avez aucun article</h2>
        @else
            <p>Vous avez {{ $articles->count() }} articles</p>    
        
        @endif
    </div>
</x-app-layout>
