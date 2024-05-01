{{-- @dd($person->subjects) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data People') }}
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

                <form method="POST" action="{{ route('admin.people.update', $person) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="columns-3">
                        <div>
                            <x-input-label for="prename" :value="__('Gelar depan')" />
                            <x-text-input value="{{ $person->prename }}" id="prename" class="mt-1" type="text"
                                name="prename" required autofocus autocomplete="prename" />
                            <x-input-error :messages="$errors->get('prename')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input value='{{ $person->name }}' id="name" class="mt-1" type="text"
                                name="name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="postname" :value="__('Gelar Belakang')" />
                            <x-text-input value="{{ $person->postname }}" id="postname" class="mt-1" type="text"
                                name="postname" required autofocus autocomplete="postname" />
                            <x-input-error :messages="$errors->get('postname')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <img src="{{ Storage::url($person->foto) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" autofocus
                            autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="columns-3 mt-6">
                        <div>
                            <x-input-label for="s1" :value="__('Pendidikan S1')" />
                            <x-text-input value="{{ $person->s1 }}" id="s1" class="mt-1" type="text"
                                name="s1" required autofocus autocomplete="s1" />
                            <x-input-error :messages="$errors->get('s1')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="s2" :value="__('Pendidikan S2')" />
                            <x-text-input value="{{ $person->s2 }}" id="s2" class="mt-1" type="text"
                                name="s2" required autofocus autocomplete="s2" />
                            <x-input-error :messages="$errors->get('s2')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="s3" :value="__('Pendidikan S3')" />
                            <x-text-input value="{{ $person->s3 }}" id="s3" class="mt-1" type="text"
                                name="s3" required autofocus autocomplete="s3" />
                            <x-input-error :messages="$errors->get('s3')" class="mt-2" />
                        </div>
                    </div>

                    <div class="columns-2 mt-6">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input value='{{ $person->email }}' id="email" class="mt-1" type="text"
                                name="email" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="sinta" :value="__('SINTA ID')" />
                            <x-text-input value='{{ $person->sinta }}' id="sinta" class="mt-1" type="text"
                                name="sinta" required autofocus autocomplete="sinta" />
                            <x-input-error :messages="$errors->get('sinta')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="jabatan" :value="__('Jabatan')" />
                            <x-text-input value='{{ $person->jabatan }}' id="jabatan" class="mt-1" type="text"
                                name="jabatan" required autofocus autocomplete="jabatan" />
                            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="fungsional" :value="__('Fungsional')" />
                            <x-text-input value='{{ $person->fungsional }}' id="fungsional" class="mt-1"
                                type="text" name="fungsional" required autofocus autocomplete="fungsional" />
                            <x-input-error :messages="$errors->get('fungsional')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="project" :value="__('Projects')" />
                        <textarea name="project" id="project" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full">{{ $person->project }}</textarea>
                        <x-input-error :messages="$errors->get('project')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="publication" :value="__('Publications')" />
                        <textarea name="publication" id="publication" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full">{{ $person->publication }}</textarea>
                        <x-input-error :messages="$errors->get('publication')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="hki" :value="__('HKI')" />
                        <textarea name="hki" id="hki" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full">{{ $person->hki }}</textarea>
                        <x-input-error :messages="$errors->get('hki')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="status" :value="__('status')" />

                        <select name="status" id="status"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value=0 {{ $person->status == 0 ? 'selected' : '' }}>Draft</option>
                            <option value=1 {{ $person->status == 1 ? 'selected' : '' }}>Publish</option>
                        </select>

                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Data People
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        CKEDITOR.replace('project');
        CKEDITOR.replace('publication');
        CKEDITOR.replace('hki');
    </script>
</x-app-layout>
