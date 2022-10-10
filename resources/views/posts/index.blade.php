@extends('layouts.app')
@section('content')
    {{-- {{ dd($posts->toArray())}} --}}
    <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px8">
        <div class="text-center">
            <h2 class="text-4xl leading-10 tracking-tight font-bold text-gray-900">Welcome to the blog</h2>
            <p class="max-w-2xl mx-auto mt-5 text-xl leading-7 text-gray-500">Lorem Ipsum is simply dummy text of the
                printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                make
                a type specimen book.</p>


                {{-- button --}}
                <a href="/posts/new">
                <button type="submit"
                        class="mt-6 py-2 px-4 border border-transparent 
                shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 
                focus:outline-none"
                        style="background-color: rgb(107, 37, 211); ">Create new Post</button>
                </a>
        </div>


        {{-- Post Wrapper --}}
        <div class="mt-12 grid gap-5 max-2-lg mx-auto lg:grid-cols-3 lg:max-w-none">

            @foreach ($posts as $post)
                {{-- Post --}}
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    {{-- header --}}
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1631557777232-a2632ae3c67d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"
                            alt="desktop">
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 p-6 flex flex-col justify-between">

                        <div class="flex-1">

                            <a href="/posts/{{ $post->id}}">
                                <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">{{ $post->title }}</h3>
                            </a>
                            <p class="mt-3 text-base leading-6 text-gray-500">
                                @if (strlen($post->text) > 200)
                                    {{ substr($post->text, 0, 200) }}...
                                @else
                                    {{ $post->text }}
                                @endif

                            </p>
                        </div>



                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1597573783009-4b9c914107da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                    alt="author avator">

                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-gray-900">John Doe</p>
                                <div class="flex text-sm leading-5 text-gray-500">

                                    <time datetime="{{ $post->created_at }}}">
                                        {{ $post->created_at->diffForHumans() }}
                                        <span>&middot;</span>
                                        <span class="mx-1"> {{ ceil(strlen($post->text) / 863) }} min read</span>
                                    </time>

                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            @endforeach




        </div>
    </div>
@endsection
