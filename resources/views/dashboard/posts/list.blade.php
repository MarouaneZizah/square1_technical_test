@extends('dashboard.layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Your Posts</h2>

            @unless(count($posts))
                <span>{{__('You have 0 posts')}}, <a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="{{route('post.new')}}">{{__('create new one ?')}}</a></span>
            @endunless

            <div class="grid gap-6 mb-8 md:grid-cols-2">
                @foreach($posts as $post)
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">{{$post->title}}</h4>

                        <h5 class="dark:text-gray-300 mb-4 text-gray-600">{{$post->publication_date->format('l, F d, Y')}}</h5>

                        <p class="text-gray-600 dark:text-gray-400">{{$post->short_description}}</p>

                        <div class="mt-4 text-base font-medium leading-6">
                            <a class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" href="{{route('post.view', ['post'=> $post->slug])}}">
                                {{__('Read more')}} →
                            </a>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </main>
@endsection
