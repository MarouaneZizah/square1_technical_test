@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
        <div class="fixed right-8 bottom-8 hidden flex-col gap-3 md:hidden">
            <button aria-label="Scroll To Top" type="button" class="rounded-full bg-gray-200 p-2 text-gray-500 transition-all hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <article>
            <div class="xl:divide-y xl:divide-gray-200 xl:dark:divide-gray-700">
                <header class="pt-6 xl:pb-6">
                    <div class="space-y-1 text-center">
                        <div class="space-y-10">
                            <div class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                <span>{{$post->publication_date->format('l, F d, Y')}}</span>
                            </div>
                        </div>

                        <div>
                            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                                {{$post->title}}
                            </h1>
                        </div>
                    </div>
                </header>

                <div class="divide-y divide-gray-200 pb-8 dark:divide-gray-700 xl:grid xl:grid-cols-4 xl:gap-x-6 xl:divide-y-0" style="grid-template-rows: auto 1fr;">
                    <div class="pt-6 pb-10 xl:pt-11">
                        <div>
                            <ul class="flex justify-center space-x-8 sm:space-x-12 xl:block xl:space-x-0 xl:space-y-8">
                                <li class="flex items-center space-x-2">
                                    <div class="whitespace-nowrap text-sm font-medium leading-5">
                                        <span class="text-gray-900 dark:text-gray-100">{{__('Author')}} : {{$post->user->name}}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-200 dark:divide-gray-700 xl:col-span-3 xl:row-span-2 xl:pb-0">
                        <div class="prose max-w-none pt-10 pb-8 dark:prose-dark">
                            <p>{{$post->description}}</p>
                        </div>
                    </div>

                    <footer>
                        <div class="pt-4 xl:pt-8">
                            <a class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400"
                               href="{{route('home')}}">
                                ← {{__('Back to the blog')}}
                            </a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
    </div>
@endsection
