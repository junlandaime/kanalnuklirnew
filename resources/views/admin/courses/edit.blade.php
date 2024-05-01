<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mata Kuliah') }}
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

                <form method="POST" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nama Mata Kuliah')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $course->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div> --}}

                    <div class="flex flex-wrap justify-self-auto columns-2">
                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Kode Matkul')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code"
                                value="{{ $course->code }}" required autofocus autocomplete="code" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="sks" :value="__('Jumlah SKS')" />
                            <x-text-input id="sks" class="block mt-1 w-full" type="number" name="sks"
                                value="{{ $course->sks }}" required autofocus autocomplete="sks" />
                            <x-input-error :messages="$errors->get('sks')" class="mt-2" />
                        </div>
                    </div>


                    {{-- <div class="mt-4">
                        <x-input-label for="teacher" :value="__('teacher')" />
                        
                        <select name="teacher_id" id="teacher_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose item</option>
                            @forelse($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div> --}}

                    {{-- <div class="mt-4">
                        <x-input-label for="category" :value="__('category')" />

                        <select name="category_id" id="category_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose category</option>
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div> --}}

                    <div class="mt-4">
                        <x-input-label for="syllabus" :value="__('Silabus Ringkas')" />
                        <textarea name="syllabus" id="syllabus" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full">{{ $course->syllabus }}</textarea>
                        <x-input-error :messages="$errors->get('syllabus')" class="mt-2" />
                    </div>


                    <hr class="my-5">

                    {{-- <div class="mt-4">

                        <div class="flex flex-col gap-y-5">
                            <x-input-label for="keypoints" :value="__('keypoints')" />
                            @for ($i = 0; $i < 4; $i++)
                                <input type="text" class="py-3 rounded-lg border-slate-300 border"
                                    placeholder="Write your copywriting" name="course_keypoints[]">
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
                    </div> --}}

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Data Mata Kuliah
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
