<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div x-data="{ pesan: '' }">
                        <x-input-label for="title" :value="__('Judul Postingan')" />
                        <x-text-input x-model="pesan" id="title" class="block mt-1 w-full" type="text"
                            name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <p class="text-sm text-green-600 space-y-1" :class="pesan.length > 75 ? 'text-red-500' : ''"
                            x-text="pesan.length"></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Gambar Postingan')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required
                            autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Kategori Postingan')" />

                        <select name="category_id" id="category_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose category</option>
                            @role('admin')
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->child as $child)
                                        <option value="{{ $child->id }}">- {{ $child->name }}</option>
                                    @endforeach
                                @empty
                                @endforelse
                            @endrole

                            @role('teacher')
                                @php
                                    $categories = $categories->where('id', 3);
                                @endphp
                                @forelse($categories as $category)
                                    {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                                    @foreach ($category->child as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @empty
                                @endforelse
                            @endrole
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="excerpt" :value="__('Ringkasan')" />
                        <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt"
                            :value="old('excerpt')" required autofocus autocomplete="excerpt" />
                        <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="body" :value="__('Tulisan Lengkap')" />
                        <textarea name="body" id="body" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="status" :value="__('status')" />

                        <select name="status" id="status"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value=0>Draft</option>
                            <option value=1>Publish</option>
                        </select>

                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="published_at" :value="__('Tanggal Publikasi')" />
                        <x-text-input id="published_at" class="block mt-1 w-full" type="date" name="published_at"
                            :value="old('published_at')" required autofocus autocomplete="published_at" />
                        <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Posts
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</x-app-layout>
