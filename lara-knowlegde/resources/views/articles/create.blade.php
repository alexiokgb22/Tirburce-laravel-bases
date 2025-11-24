<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer un article
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-8 border border-gray-200">

                <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!--Titre-->
                    <div>
                        <x-input-label for="title" :value="__('Titre')" />
                        <x-text-input 
                            id="title" 
                            name="title" 
                            type="text"
                            class="mt-1 block w-full" 
                            :value="old('title')" 
                            required 
                            autofocus 
                            autocomplete="title" 
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <!--Image-->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <input 
                            id="image" 
                            name="image" 
                            type="file" 
                            class="mt-1 block w-full text-sm text-gray-700
                                   file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0
                                   file:text-sm file:font-semibold
                                   file:bg-indigo-50 file:text-indigo-700
                                   hover:file:bg-indigo-100
                                   cursor-pointer"
                            required
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>

                    <!--Contenu-->
                    <div>
                        <x-input-label for="content" :value="__('Contenu')" />
                        <textarea 
                            id="content" 
                            name="content"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3"
                            rows="10" 
                            required
                        >{{ old('content') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />
                    </div>

                    <!--Bouton-->
                    <div class="flex justify-end">
                        <x-primary-button class="!py-3 !px-6 text-base">
                            Publier l'article
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
