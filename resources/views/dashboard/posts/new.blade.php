@extends('dashboard.layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{__('Create a new Post')}}
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form method="POST" action="{{ route('post.create') }}">
                    @csrf

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{ __('Title') }}</span>

                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input @error('title') border-red-600 focus:border-red-400 focus:outline-none focus:shadow-outline-red @enderror"
                                required
                               value="{{ old('title') }}"
                               name="title"/>

                        @error('title')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror

                    </label>


                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{ __('Description') }}</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray @error('description') border-red-600 focus:border-red-400 focus:outline-none focus:shadow-outline-red @enderror"
                            rows="3"
                            required
                            name="description">
                            {{ old('description') }}
                        </textarea>

                        @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <div class="block mt-4">
                        <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{__('Publish')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
