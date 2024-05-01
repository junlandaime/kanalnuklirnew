<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Courses') }}
            </h2>
            <a href="{{ route('admin.courses.create') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @if (session('success'))
                    <div class="p-5 w-full ext-xl font-bold rounded-3xl bg-green-500 text-white">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-5 w-full ext-xl font-bold rounded-3xl bg-red-500 text-white">
                        {{ session('error') }}
                    </div>
                @endif

                @forelse ($courses as $course)
                    <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $course->name }}</h3>
                                <p class="text-slate-500 text-sm">Cardio</p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Kode Mata Kuliah</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->code }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Jumlah SKS</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->sks }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Teacher</p>
                            <h3 class="text-indigo-950 text-xl font-bold">Annima Poppo</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.courses.edit', $course) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <p>Belum ada Data Mata Kuliah</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
