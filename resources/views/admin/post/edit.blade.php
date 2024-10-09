{{-- to edit post --}}
@section('title', 'Edit Post')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Post : {{$post->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--New form --}}
                    <form method="post" action="{{ route('admin.posts.update', $post) }}" class="space-y-6">
                        {{-- title --}}
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        {{-- category --}}
                        <div>
                            <x-input-label for="body" value="Body" />
                            <textarea id="body" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Write your post here..."  name="body" type="text" required autofocus autocomplete="body">{{old('body', $post->body)}}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('body')" />
                        </div>
                        {{-- body --}}

                        <div>
                            <x-input-label for="categories" value="Category" />
                            <select id="categories" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="category_id" required>
                                <option selected>Choose a category</option>
                                @foreach ($categories as $category ){
                                    <option value="{{$category->id}}" @selected(old('category_id', $post->category->id)== $category->id)>{{$category->name}}</option>
                                }

                                @endforeach

                              </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <x-primary-button>Upadate Post</x-primary-button>
                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
