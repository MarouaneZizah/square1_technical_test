@extends('layouts.app')

@section('content')

    <div class="divide-y divide-gray-200 dark:divide-gray-700">

        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">{{__('Home')}}</h1>

            @unless (count($posts))
                <h5 class="text-center text-xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:leading-10 md:leading-14">{{__('No posts')}}</h5>
            @endunless

            @if(count($posts))
                <div class="flex items-center">
                    {{__('Sort By')}} :

                    <a href="{{route('home', ['sort' => 'desc'])}}"
                       class="text-gray-900 block px-4 py-2 text-sm {{URL::full() === route('home', ['sort' => 'desc']) ? "font-medium" : ""}}">
                        {{__('Newest')}}
                    </a>

                    <a href="{{route('home', ['sort' => 'asc'])}}"
                       class="text-gray-900 block px-4 py-2 text-sm {{URL::full() === route('home', ['sort' => 'asc']) ? "font-medium" : ""}}">
                        {{__('Oldest')}}
                    </a>
                </div>
            @endif
        </div>

        @if(count($posts))
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($posts as $post)
                <li class="py-12">
                    <article>
                        <div class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                            <div class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                <span>{{$post->publication_date->format('F d, Y')}}</span>
                            </div>

                            <div class="space-y-5 xl:col-span-3">
                                <div class="space-y-6">
                                    <div>
                                        <h2 class="text-2xl font-bold leading-8 tracking-tight">
                                            <a class="text-gray-900 dark:text-gray-100" href="{{route('post.view', ['post'=> $post->slug])}}">
                                                {{$post->title}}
                                            </a>
                                        </h2>

                                        <div class="flex flex-wrap">
                                            <span class="mr-3 text-sm font-medium uppercase text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">
                                                {{__('Author')}} : {{$post->user->name}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="prose text-gray-500 max-w-none dark:text-gray-400">
                                        {{$post->short_description}}
                                    </div>
                                </div>

                                <div class="text-base font-medium leading-6">
                                    <a class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" href="{{route('post.view', ['post'=> $post->slug])}}">
                                        {{__('Read more')}} →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="flex justify-end text-base font-medium leading-6">
        {!! $posts->links() !!}
    </div>

@endsection
