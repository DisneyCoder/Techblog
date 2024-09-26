@extends('layouts.blog')

@section('title', 'Welcome to the single blog')
@section('main_content')
<main class="w-full px-4 py-20 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <!-- Container -->
    <div class="w-full mx-auto max-w-7xl">
        <a class="inline-flex items-center justify-center gap-2 px-3 py-1 mb-6 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
            href="/index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M7.793 2.232a.75.75 0 0 1-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 0 1 0 10.75H10.75a.75.75 0 0 1 0-1.5h2.875a3.875 3.875 0 0 0 0-7.75H3.622l4.146 3.957a.75.75 0 0 1-1.036 1.085l-5.5-5.25a.75.75 0 0 1 0-1.085l5.5-5.25a.75.75 0 0 1 1.06.025Z"
                    clip-rule="evenodd" />
            </svg>

            Back
        </a>
        <article
            class="w-full rounded-xl p-6 md:p-10 text-white shadow-lg bg-zinc-900/20 ring-1 backdrop-blur-[2px] ring-white/15 space-y-6">
            <!-- Main Content -->
            <div>
                <!-- Article Title -->
                <h3 class="mb-4 text-xl font-bold sm:text-4xl lg:text-6xl text-center !leading-tight">
                    I Solved a Mystery (and Almost Burned Down My Kitchen)
                </h3>

                <!-- Meta Info -->
                <div
                    class="flex flex-row flex-wrap items-center justify-center gap-4 my-6 text-center divide-x divide-zinc-700">
                    <!-- Author Info -->
                    <div class="flex items-center gap-2">
                        <img class="w-8 h-8 p-0.5 rounded-full ring-1 ring-emerald-500"
                            src="https://avatars.githubusercontent.com/u/61485238?v=4" alt="Al Nahian" />
                        <h4>Al Nahian</h4>
                    </div>


                    <!-- Date -->
                    <p class="pl-4 text-lg font-semibold sm:text-base text-zinc-400">
                        4 months ago
                    </p>

                    <!-- Category Pill -->
                    <div class="pl-4">
                        <a class="inline-flex gap-0.5 justify-center overflow-hidden text-sm sm:text-base font-medium transition rounded-full py-1 px-3 bg-emerald-400/10 text-emerald-400 ring-1 ring-inset ring-emerald-400/20 hover:bg-emerald-400/10 hover:text-emerald-300 hover:ring-emerald-300"
                            href="/#">Technology</a>
                    </div>

                    <!-- View Count Pill -->
                    <div class="px-4">
                        <div class="inline-flex items-center justify-center gap-1 px-3 py-1 overflow-hidden text-sm font-medium text-orange-400 transition rounded-full sm:text-base bg-orange-400/10 ring-1 ring-inset ring-orange-400/20"
                            href="/#">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path fill-rule="evenodd"
                                        d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span> 1,253 Views
                        </div>
                    </div>

                </div>

                <hr class="h-px my-8 border-0 bg-zinc-700">

                <!-- Post Body -->
                <p class="text-base font-normal text-zinc-400 md:text-xl">

                    Let me preface this with the fact I'm not exactly known for my culinary skills. My smoke
                    detector chirps more at burnt toast than culinary masterpieces. So, when a strange scratching
                    sound started emanating from my rarely-used toaster oven, my first thought wasn't a gourmet
                    rodent on the loose, but a rogue appliance possessed by mischievous kitchen gremlins.

                    <br>
                    <br>

                    The scratching grew louder, accompanied by the telltale thump of something small bouncing off
                    the metal interior. Panic clawed its way up my throat. Was it a monstrous spider building an egg
                    sac? A colony of rogue ants taking up residence in the heating element? Armed with a spatula (my
                    weapon of choice) and a healthy dose of trepidation, I cautiously unplugged the oven and flipped
                    it upside down.

                    <br>
                    <br>

                    Nothing. Just a shower of rogue crumbs and a faint metallic clatter from beneath the appliance.
                    Mentally preparing myself for the worst (and picturing myself explaining the fire to my
                    landlord), I wrestled the heavy oven onto the counter. With a deep breath, I unscrewed the back
                    panel, revealing... a tiny ball of brown fur nestled amongst the wires.

                    <br>
                    <br>

                    My heart did a double take. This wasn't a monstrous spider or a legion of ants. It was a
                    hamster. A decidedly fluffy, but slightly singed, hamster. Relief washed over me so strong I
                    almost laughed. Apparently, the neighbor's new pet had escaped its cage and, in a quest for
                    adventure (or maybe a tasty crumb), ended up in my rarely-used appliance.

                    <br>
                    <br>

                    After a tense five minutes of coaxing with a rogue carrot and a shoebox trap, the little escape
                    artist was safely (and somewhat grumpily) reunited with its owner. My kitchen may have smelled
                    faintly of burnt fur for a while, and I may have sworn off using the toaster oven for the
                    foreseeable future, but hey, at least I can now add "hamsterslayer" (emphasis on the
                    not-slaying) to my dubious skillset.
                </p>
            </div>
        </article>
    </div>
</main>
@endsection
