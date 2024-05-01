{{-- @dd($people) --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage People') }}
            </h2>
            <a href="{{ route('admin.people.create') }}"
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

                @forelse ($people as $person)
                    <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($person->foto) }}" alt="{{ $person->name }}"
                                class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $person->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $person->email }}</p>
                                <p class="text-slate-900 text-xs">created_at {{ $person->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Subject Areas</p>
                            <h3 class="text-indigo-950 text-xs font-base mt-2">
                                @foreach ($person->subjects as $subject)
                                    {{ $subject->name }} |
                                @endforeach
                            </h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Jumlah Postingan</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $person->user->post->count() }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Status Postingan</p>
                            @if ($person->status)
                                <span class="text-sm w-fit py-2 px-3 rounded-full bg-green-500 text-white font-bold">
                                    PUBLISH
                                </span>
                            @else
                                <span class="text-sm w-fit py-2 px-3 rounded-full bg-slate-500 text-white font-bold">
                                    NOT PUBLISH
                                </span>
                            @endif
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.people.toggle', $person) }}"
                                class="font-bold py-4 px-6 {{ !$person->status ? 'bg-green-500' : 'bg-red-500' }} text-white rounded-full">
                                {{ !$person->status ? 'Publish' : 'Draft' }}

                            </a>
                            <a href="{{ route('admin.people.edit', $person) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.people.destroy', $person) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                @empty
                    <p>Belum Ada People</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
