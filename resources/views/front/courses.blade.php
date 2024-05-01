@extends('front.layouts.front')

@section('title')
    <title>Mata Kuliah - KanalNuklir</title>
@endsection

@section('content')
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li class="active">Mata Kuliah</li>
            </ul>
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="content-page">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <div class="tab-content" style="padding:0; background: #fff;">

                                    <div class="relative overflow-x-auto">
                                        <table
                                            class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-3xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Kode Mata Kuliah
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Mata Kuliah
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Silabus Singkat
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Jumlah SKS
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($courses as $course)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $course->code }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $course->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $course->syllabus }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $course->sks }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
@endsection
