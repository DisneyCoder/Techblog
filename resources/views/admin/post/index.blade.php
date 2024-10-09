{{-- for show category post --}}

@section('title' , 'View Posts')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show all posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  {{-- Category start here --}}
                    <div class="mb-5 text-right">
                        <a href="{{route('admin.posts.create')}}">
                            <x-primary-button class="bg-emerald-500 dark:bg-emerald-500">Write New Post</x-primary-button>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Author
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Views
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$post->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$post->category->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->user->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->views}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->created_at->DiffForHumans()}}
                                    </td>

                                    <td class="px-6 py-4 text-right space-x-4">
                                        <a href="{{route('blog.single',$post)}}" class="font-medium text-green-500 dark:text-green-600 hover:underline" target="blank">View</a>

                                        <a href="{{route('admin.posts.edit',$post)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form class="inline-flex" action="{{route('admin.posts.destroy', $post)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete<button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Sorry! No posts found.
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">{{$posts->links()}}</div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
