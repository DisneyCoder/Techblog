{{-- for show category list --}}
@section('title' , 'Registerd Category')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show all category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  {{-- Category start here --}}
                    <div class="mb-5 text-right">
                        <a href="{{route('admin.categories.create')}}">
                            <x-primary-button>Add New Category</x-primary-button>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Slug
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Post
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$category->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$category->slug}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$category->posts->count()}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$category->created_at->diffForHumans()}}
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-4">
                                        <a href="{{route('admin.categories.edit',$category)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form class="inline-flex" action="{{route('admin.categories.destroy', $category)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete<button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                    Sorry! No categories found.
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">{{$categories->links()}}</div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
