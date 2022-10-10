@extends('layouts.app')
@section('content')

<div class="bg-gray-50 h-full md:grid md:grid-cols-12">

    <div class="px-4 md:px-0 md:col-start-4 md:col-span-6">

        <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">New Post</h2>
        <div class="bg-white shadow-sm mt-5 px-3 p-6 rounded-md">
            
            {{-- Form --}}
            <form action="/posts" method="POST" class="mb-0">
                @csrf
                <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                
                {{-- Title --}}
                <input type="text" name="title"
                    class="mt-1 py-2 px-3 block w-full border border-gray-400 rounded-md shadow-sm" autofocus
                    value={{ old('title') }}>
                </label>
                <label for="content_blog" class="mt-6 block text-sm font-medium text-gray-700">text</label>
                
                {{-- Content --}}
                <textarea id="text" name="text"
                    class="mt-1 py-2 px-3 block w-full border border-gray-400 rounded-md shadow-sm">{{ old('content_blog') }}</textarea>

                    {{-- Errors --}}
                @if ($errors->any())
                    <div class="mt-6">

                        <ul class="bg-red-100 px-4 py-5 rounded-md" style="background-color: rgb(254 226 226">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>


                    </div>
                @endif



                    {{-- Button --}}
                <button type="submit"
                    class="mt-6 py-2 px-4 w-full border border-transparent 
                    shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-indigo-700 
                    focus:outline-none" style="background-color: rgb(107, 37, 211); ">Post</button>
            </form>

        </div>
    </div>
</div>


@endsection