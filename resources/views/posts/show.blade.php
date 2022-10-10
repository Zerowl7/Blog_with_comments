@extends('layouts.app')
@section('content')
    <div class="bg-gray-50 py-16 px-4 sm:grid sm:grid-cols-12">

        <div class="sm:col-start-4 sm:col-span-6">
            {{-- Back --}}
            <a href="/">
                <div class="bg-white text-center px-4 py-3 rounded-sm shadow-sm hover:shadow-md">Back</div>
            </a>


            {{-- Author --}}
            <div class="bg-white mt-4 px-4 py-6 rounded-sm shadow-sm">

                <div class="flex items-center">

                    {{-- IMG_Author --}}
                    <div class="flex-shrink-0 mt-3 mb-3">
                        <img class="h-10 w-10 rounded-full"
                            src="https://images.unsplash.com/photo-1597573783009-4b9c914107da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                            alt="author avator">
                    </div>
                    {{-- Author_INF --}}
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



                {{-- Desktop_Img --}}
                <div class="mt-4 rounded-sm over-flow-hidden">
                    <img class="w-full object-cover"
                        src="https://images.unsplash.com/photo-1631557777232-a2632ae3c67d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"
                        alt="desktop">
                </div>

                <div class="py-6 mb-4">
                    {{-- Title --}}
                    <h2 class="mt-6 text-4xl leadin-10 tracking-tight font-bold text-gray-900 text-center">
                        {{ $post->title }}</h2>

                    {{-- Text --}}
                    <p class="pb-4 mt-6  leading-6 text-gray-500" style="margin-bottom: 12px;">{{ $post->text }}</p>

                </div>

            </div>

            {{-- Comments --}}
            <h2 class="mt-6 text-4xl leadin-10 tracking-tight font-bold text-gray-900 text-center">
                Comments</h2>


            {{-- Form --}}
            <div>
                <form action="/posts/{{ $post->id }}/comments" method="POST" class="mb-0">
                    @csrf
                    {{-- Author --}}
                    <label for="author" class="text-sm block font-medium text-gray-700">Author</label>
                    <input type="text" name="author"
                        class="mt-1 py-2 px-3 block w-full border-gray-400 rounded-md shadow-sm"
                        value="{{ old('author') }}">
                    {{-- Text --}}
                    <label for="comment" class="mt-6 text-sm font-medium text-gray-700">Text</label>
                    <textarea name="comment" class="mt-1 py-2 px-3 block w-full border-gray-400 rounded-md shadow-sm">{{ old('comment') }}</textarea>
                    {{-- Button --}}


                    @if ($errors->any())
                        <div class="mt-6">
                            <ul class="px-4 py-5 rounded-md" style="background-color: rgb(255, 149, 149)">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <button type="submit"
                        class="mt-6 py-2 px-4 border border-transparent 
                shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 
                focus:outline-none"
                        style="background-color: rgb(107, 37, 211); ">Post</button>
                </form>
            </div>

            {{-- Comments --}}
            <div class="mt-6">
                @foreach ($comments as $comment)
                    <div class="mb-5 bg-white px-4 py-6 rounded-sm shadow-md">
                        <div class="flex">


                            {{-- Avatar --}}
                            <div class="mr-3 flex flex-col justify-center">
                                <?php
                                $parts = explode(' ', $comment->author);
                                $initials = strtoupper($parts[0][0] . $parts[count($parts) - 1][0]);
                                ?>
                                <span class="bg-gray-500 mt-4 mb-4 p-2 rounded-full"
                                    style="background-color: rgb(178, 178, 178)">{{ $initials }}</span>

                            </div>
                            {{-- Avatar --}}

                            <div class="flex flex-col justify-center">
                                <p class="ml-3 font-bold">{{ $comment->author }}</p>
                                <p class=" ml-3 text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>


                        </div>

                        <div class="mb-3">
                            {{-- Text --}}

                            <p class="pb-1">{{ $comment->comment }}</p>

                            {{-- Delete --}}
                        <form action="/comments/{{ $comment->id }}" method="POST" class='mb-3 mt-3 pb-4'>
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="text-sm py-1 px-2 border border-gray-400 shadow-sm rounded-md hover:shadow-md">Delete</button>
                        </form>

                        </div>

                        


                    </div>
                @endforeach

                {{ $comments->links() }}
            </div>



        </div>



    </div>
@endsection
