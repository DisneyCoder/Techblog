@extends('layouts.blog')


@section('title', 'Welcome to  Blog')

@section('main_content')

<section class="flex flex-col gap-8 px-4 py-20 mx-auto xl:gap-24 xl:grid xl:grid-cols-12 max-w-7xl sm:px-6 lg:px-8">
    <!-- Posts -->
    <section class="flex flex-col gap-8 xl:col-span-8">

@forelse ($posts as $post )
    <article
    class="w-full rounded-xl p-6 text-white shadow-lg bg-zinc-900/20 ring-1 backdrop-blur-[2px] ring-white/15 space-y-6">
    <div class="flex flex-row items-center justify-between">
    <!-- Category Pill -->
    <div>
        <a class="inline-flex gap-0.5 justify-center overflow-hidden text-sm sm:text-base font-medium transition rounded-full py-1 px-3 bg-emerald-400/10 text-emerald-400 ring-1 ring-inset ring-emerald-400/20 hover:bg-emerald-400/10 hover:text-emerald-300 hover:ring-emerald-300"
        href="{{route('blog.index',['category'=>$post->category->slug])}}">{{ $post->category->name}}</a>
    </div>

    <!-- Date -->
    <p class="text-sm font-semibold sm:text-base text-zinc-400">
        {{ $post->created_at->diffForHumans()}}
    </p>
    </div>

    <!-- Main Content -->
    <div>
    <!-- Article Title -->
    <a href="{{route('blog.single', $post->slug)}}">
        <h3 class="mb-4 text-xl font-bold md:text-4xl hover:underline decoration-emerald-700">
        {{$post->title}}
        </h3>
    </a>

    <!-- excerpt -->
    <p class="text-base font-medium text-zinc-400 md:text-lg ">
        {{str($post->body)->limit(250)}}
    </p>
    </div>

    <!-- Card Bottom -->
    <div class="flex flex-row items-center justify-between">
    <!-- Author Info -->
    <div class="flex items-center gap-2">
        <img class="w-8 h-8 p-0.5 rounded-full ring-1 ring-emerald-500"
        src="https://avatars.githubusercontent.com/u/110191339?v=4" alt="{{ $post->user->name}}" />
        <h4>{{ $post->user->name}} </h4>
    </div>

    <!-- Read More Link -->
    <a class="inline-flex gap-0.5 justify-center overflow-hidden text-base font-medium transition text-emerald-400 hover:text-emerald-500"
        href="{{route('blog.single', $post->slug)}}">
        Read more
        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="mt-0.5 h-5 w-5 relative top-px -mr-1">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            d="m11.5 6.5 3 3.5m0 0-3 3.5m3-3.5h-9"></path>
        </svg>
    </a>
    </div>
    </article>
@empty
<h3 class="mb-4 text-xl font-bold md:text-4xl text-white">
    Sorry, No post found.
    </h3>
@endforelse

{{$posts->links()}}
    </section>

    <!-- Sidebar Widgets -->
    <section class="flex flex-col gap-8 xl:col-span-4">
      <!-- Widget 1 -->
      <div
        class="w-full rounded-xl p-4 text-white shadow-lg bg-zinc-900/20 ring-1 backdrop-blur-[2px] ring-white/15 space-y-4">
        <h5 class="text-lg font-semibold md:text-xl">Browse Categories</h5>

        <!-- Categories with Post Count -->
        <div class="flex flex-row flex-wrap gap-2 text-gray-400">
          @forelse ($categories as $category)
          <a class="inline-flex items-center justify-center gap-2 px-3 py-1 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
          href="{{route('blog.Categories', $category->slug)}}">{{$category->name}}

          <span
            class="text-sm font-medium transition rounded-full py-0.5 w-6 h-6 text-center bg-emerald-800/40 text-emerald-400 ring-1 ring-emerald-400/20">
            {{$category->posts->count()}}
          </span>
        </a>
          @empty

          @endforelse
        </div>
      </div>

      <!-- Widget 2 -->
      <div
        class="w-full rounded-xl p-4 text-white shadow-lg bg-zinc-900/20 ring-1 backdrop-blur-[2px] ring-white/15 space-y-4">
        <h5 class="text-lg font-semibold md:text-xl">
          Follow Me On Social Media
        </h5>
        <div class="flex flex-row flex-wrap gap-2 text-gray-400">
          <!-- Github Icon -->
          <a class="inline-flex items-center justify-center gap-2 px-3 py-3 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="https://github.com/alnahian2003" target="_blank">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 496 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
              </svg>
            </span>
          </a>

          <!-- Facebook Icon -->
          <a class="inline-flex items-center justify-center gap-2 px-3 py-1 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="https://facebook.com/alnahian2003" target="_blank">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                  d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
              </svg>
            </span>
          </a>

          <!-- Twitter/X Icon -->
          <a class="inline-flex items-center justify-center gap-2 px-3 py-1 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="https://x.com/alnahian2003" target="_blank">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                  d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
              </svg>
            </span>
          </a>

          <!-- LinkedIn Icon -->
          <a class="inline-flex items-center justify-center gap-2 px-3 py-1 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="https://linkedin.com/in/alnahian2003" target="_blank">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                  d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
              </svg>
            </span>
          </a>

          <!-- Behance Icon -->
          <a class="inline-flex items-center justify-center gap-2 px-3 py-1 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="https://behance.net/alnahian2003" target="_blank">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                <path
                  d="M232 237.2c31.8-15.2 48.4-38.2 48.4-74 0-70.6-52.6-87.8-113.3-87.8H0v354.4h171.8c64.4 0 124.9-30.9 124.9-102.9 0-44.5-21.1-77.4-64.7-89.7zM77.9 135.9H151c28.1 0 53.4 7.9 53.4 40.5 0 30.1-19.7 42.2-47.5 42.2h-79v-82.7zm83.3 233.7H77.9V272h84.9c34.3 0 56 14.3 56 50.6 0 35.8-25.9 47-57.6 47zm358.5-240.7H376V94h143.7v34.9zM576 305.2c0-75.9-44.4-139.2-124.9-139.2-78.2 0-131.3 58.8-131.3 135.8 0 79.9 50.3 134.7 131.3 134.7 61.3 0 101-27.6 120.1-86.3H509c-6.7 21.9-34.3 33.5-55.7 33.5-41.3 0-63-24.2-63-65.3h185.1c.3-4.2 .6-8.7 .6-13.2zM390.4 274c2.3-33.7 24.7-54.8 58.5-54.8 35.4 0 53.2 20.8 56.2 54.8H390.4z" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </section>
  </section>
@endsection
