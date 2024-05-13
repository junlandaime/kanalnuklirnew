{{-- <script>
    const {
        JSDOM
    } = require('jsdom');
    const {
        window
    } = new JSDOM();
    const {
        document
    } = new JSDOM('').window;
    global.document = document;
    const $ = require('jquery')(window);
</script> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Course') }}
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

                <form method="POST" action="{{ route('admin.people.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="columns-3">
                        <div>
                            <x-input-label for="prename" :value="__('Gelar depan')" />
                            <x-text-input id="prename" class="mt-1" type="text" name="prename" :value="old('prename')"
                                required autofocus autocomplete="prename" />
                            <x-input-error :messages="$errors->get('prename')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="mt-1" type="text" name="name" :value="old('name')"
                                required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="postname" :value="__('Gelar Belakang')" />
                            <x-text-input id="postname" class="mt-1" type="text" name="postname" :value="old('postname')"
                                required autofocus autocomplete="postname" />
                            <x-input-error :messages="$errors->get('postname')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" required
                            autofocus autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="columns-3 mt-6">
                        <div>
                            <x-input-label for="s1" :value="__('Pendidikan S1')" />
                            <x-text-input id="s1" class="mt-1" type="text" name="s1" :value="old('s1')"
                                required autofocus autocomplete="s1" />
                            <x-input-error :messages="$errors->get('s1')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="s2" :value="__('Pendidikan S2')" />
                            <x-text-input id="s2" class="mt-1" type="text" name="s2" :value="old('s2')"
                                required autofocus autocomplete="s2" />
                            <x-input-error :messages="$errors->get('s2')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="s3" :value="__('Pendidikan S3')" />
                            <x-text-input id="s3" class="mt-1" type="text" name="s3" :value="old('s3')"
                                required autofocus autocomplete="s3" />
                            <x-input-error :messages="$errors->get('s3')" class="mt-2" />
                        </div>
                    </div>

                    <div class="columns-2 mt-6">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="mt-1" type="text" name="email" :value="old('email')"
                                required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="sinta" :value="__('SINTA ID')" />
                            <x-text-input id="sinta" class="mt-1" type="text" name="sinta" :value="old('sinta')"
                                required autofocus autocomplete="sinta" />
                            <x-input-error :messages="$errors->get('sinta')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="jabatan" :value="__('Jabatan')" />
                            <x-text-input id="jabatan" class="mt-1" type="text" name="jabatan" :value="old('jabatan')"
                                required autofocus autocomplete="jabatan" />
                            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="fungsional" :value="__('Fungsional')" />
                            <x-text-input id="fungsional" class="mt-1" type="text" name="fungsional"
                                :value="old('fungsional')" required autofocus autocomplete="fungsional" />
                            <x-input-error :messages="$errors->get('fungsional')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="project" :value="__('Projects')" />
                        <textarea name="project" id="project" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('project')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="publication" :value="__('Publications')" />
                        <textarea name="publication" id="publication" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('publication')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="hki" :value="__('HKI')" />
                        <textarea name="hki" id="hki" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('hki')" class="mt-2" />
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

                    {{-- <div class="mt-4">
                        <x-input-label for="subjects" :value="__('Subject Areas Expertise')" />
                        <p class="my-1 text-xs text-slate-400">pisahkan dengan coma</p>
                        <x-text-input id="subjects" class="block mt-1 w-full" type="text" subjects="subjects"
                            name="subjects" :value="old('subjects')" autofocus autocomplete="subjects" />
                        <x-input-error :messages="$errors->get('subjects')" class="mt-2" />
                    </div>
 --}}

                    {{-- <div class="mt-4">
                        <x-input-label for="file" :value="__('Subject Areas Person')" />
                        <p class="my-1 text-xs text-slate-400">pisahkan dengan coma</p>
                        <div class="relative w-full">
                            <input type="hidden" class="form-control" name="subjs" id="perSubjs">
                            <input type="text" id="name-subject" name="subjects"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                placeholder="Subject Areas" :value="old('subjects')" autofocus
                                autocomplete="subjects" />
                            <a id="btn-subj"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div id="subjPer"></div>
                    </div> --}}


                    <div class="mt-4" x-data="{ data: [], subject: {} }">
                        <x-input-label for="file" :value="__('Subject Areas Person')" />
                        {{-- <p class="my-1 text-xs text-slate-400">pisahkan dengan coma</p> --}}
                        <div class="relative w-full">
                            <input type="text" id="name-subject" name="subjects" x-model="subject"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                placeholder="Subject Areas" :value="old('subjects')" autofocus
                                autocomplete="subjects" />
                            <a id="d" @click="data.push({subject})"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                        </div>
                        <template x-for="(item, index) in data" :key="index">
                            <div
                                class="inline-flex mt-3 items-center h-8 overflow-hidden text-white bg-blue-500 rounded">
                                <span class="px-5 py-1.5 text-[12px] font-medium" x-text="item.subject"></span>
                                <button @click="data.splice(index, 1);"
                                    class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 transition-color hover:bg-blue-700 focus:outline-none focus:ring"
                                    type="button"> <span class="sr-only"> Close </span> <svg class="w-3 h-3"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg> </button>
                            </div>
                        </template>
                        <input type="hidden" class="form-control" name="subjs" id="perSubjs"
                            :value="JSON.stringify(data)">
                    </div>



                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Person
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>





    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script>
        CKEDITOR.replace('project');
        CKEDITOR.replace('publication');
        CKEDITOR.replace('hki');
    </script>
    {{-- <script>
        const subjs = []
        const perSubj = []

        document.getElementById("btn-subj").onclick = function() {

            const namesubjet = document.getElementById("name-subject").value
            const subjPer = document.getElementById("subjPer")
            const perSubjs = document.getElementById("perSubjs")

            let newSubj =
                ' <div class="inline-flex mt-3 items-center h-8 overflow-hidden text-white bg-blue-500 rounded">  <span class="px-5 py-1.5 text-[12px] font-medium">' +
                namesubjet +
                '</span> </div>'

            perSubj.push(namesubjet)
            subjs.push(newSubj)

            subjPer.innerHTML = subjs.join(' ')
            console.log(perSubj)
            perSubjs.value = perSubj

        }
    </script> --}}
    {{-- <script>
        const subjs = []
        const perSubj = []

        const namesubjet = document.getElementById("name-subject")
        const subjPer = document.getElementById("subjPer")
        const perSubjs = document.getElementById("perSubjs").value

        eve();

        function eve() {
            namesubjet.addEventListener('keyup', function(e) {
                const namesubjet = document.getElementById("name-subject").value
                const subjPer = document.getElementById("subjPer")
                const perSubjs = document.getElementById("perSubjs")

                let newSubj =
                ' <div class="inline-flex mt-3 items-center h-8 overflow-hidden text-white bg-blue-500 rounded">  <span class="px-5 py-1.5 text-[12px] font-medium">' +
                namesubjet + '</span> <button onclick="return this.parentNode.remove();"  id="removeSubj' + i +
                '"  class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 transition-color hover:bg-blue-700 focus:outline-none focus:ring" type="button"  >    <span class="sr-only" > Close </span>    <svg  class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />    </svg>  </button> </div>'    
                
                // perSubj.push(namesubjet)
                // subjs.push(newSubj)

                subjPer.innerHTML = subjs

                if (e.keyCode === 188) {
                    subjs.push(newSubj)
                    console.log(subjs)
                }
            })
        }

        // let newSubj =
        //     ' <div class="inline-flex mt-3 items-center h-8 overflow-hidden text-white bg-blue-500 rounded">  <span class="px-5 py-1.5 text-[12px] font-medium">' +
        //     cm +
        //     '</span> <button onclick="return this.parentNode.remove();"  id="removeSubj"  class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 transition-color hover:bg-blue-700 focus:outline-none focus:ring" type="button"  >    <span class="sr-only" > Close </span>    <svg  class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />    </svg>  </button> </div>'
        // console.log(newSubj)

        // function cm(newSubj) {
        //     subjPer.innerText = newSubj.target.value
        // }
    </script> --}}
</x-app-layout>
