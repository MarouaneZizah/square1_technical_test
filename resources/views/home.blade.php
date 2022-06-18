@extends('layouts.app')

@section('content')

    <div class="divide-y divide-gray-200 dark:divide-gray-700">

        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">Latest</h1>
        </div>

        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($posts as $post)
                <li class="py-12">
                    <article>
                        <div class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                            <dl>
                                <dt class="sr-only">Published on</dt>
                                <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                    <time datetime="2022-01-12T00:00:00.000Z">{{$post->created_at->format('F d, Y')}}</time>
                                </dd>
                            </dl>

                            <div class="space-y-5 xl:col-span-3">
                                <div class="space-y-6">
                                    <div>
                                        <h2 class="text-2xl font-bold leading-8 tracking-tight">
                                            <a class="text-gray-900 dark:text-gray-100" href="{{route('post.view', ['post'=> $post->slug])}}">
                                                {{$post->title}}
                                            </a>
                                        </h2>

                                        <div class="flex flex-wrap">
                                            <a class="mr-3 text-sm font-medium uppercase text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" href="{{route('user.posts', ['user'=> $post->user])}}">
                                                {{$post->user->name}}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="prose text-gray-500 max-w-none dark:text-gray-400">
                                        {{$post->description}}
                                    </div>
                                </div>

                                <div class="text-base font-medium leading-6">
                                    <a class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" href="{{route('post.view', ['post'=> $post->slug])}}">
                                        Read more →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex justify-end text-base font-medium leading-6">
        <a class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" aria-label="all posts" href="/blog">
            All Posts →
        </a>
    </div>

@endsection
