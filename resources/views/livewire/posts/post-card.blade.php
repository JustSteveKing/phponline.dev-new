<li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
    <article aria-labelledby="post-title-{{ $post->slug }}">
        <div>
            <div class="flex space-x-3">
                <div class="flex-shrink-0">
                    <img
                        class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                        alt=""
                    >
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="#" class="hover:underline">
                            {{ '@' . $post->author->handle }}
                        </a>
                    </p>
                    <p class="text-sm text-gray-500">
                        <a href="#" class="hover:underline">
                            <x-time :date="$post->published_at" />
                        </a>
                    </p>
                </div>
                <div class="flex-shrink-0 self-center flex">
                    <div
                        x-data="{ open: false }"
                        @keydown.escape.stop="open = false"
                        @click.away="open = false"
                        class="relative inline-block text-left"
                    >
                        <div>
                            <button
                                type="button"
                                class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                                id="options-menu-{{ $post->uuid }}-button"
                                x-ref="button"
                                @click="open = true"
                                @keyup.space.prevent="open = ! open"
                                @keydown.enter.prevent="open = ! open"
                                aria-expanded="false"
                                aria-haspopup="true"
                                x-bind:aria-expanded="open.toString()"
                            >
                                <span class="sr-only">Open options</span>
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"
                                    ></path>
                                </svg>
                            </button>
                        </div>


                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            x-ref="menu-items"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="options-menu-{{ $post->uuid }}-button"
                            tabindex="-1"
                            @keydown.tab="open = false"
                            @keydown.enter.prevent="open = false"
                            @keyup.space.prevent="open = false"
                            style="display: none;"
                        >
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                   role="menuitem" tabindex="-1" id="options-menu-{{ $post->uuid }}-item-0"
                                   @click="open = false">
                                    <svg class="mr-3 h-5 w-5 text-gray-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span>Add to favorites</span>
                                </a>
                                <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                   role="menuitem" tabindex="-1" id="options-menu-{{ $post->uuid }}-item-1"
                                   @click="open = false">
                                    <svg class="mr-3 h-5 w-5 text-gray-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Embed</span>
                                </a>
                                <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                   role="menuitem" tabindex="-1" id="options-menu-{{ $post->uuid }}-item-2"
                                   @click="open = false">
                                    <svg class="mr-3 h-5 w-5 text-gray-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Report content</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <h2 id="question-title-{{ $post->slug }}" class="mt-4 text-base font-medium text-gray-900">
                {{ $post->title }}
            </h2>
        </div>
        <div class="mt-2 text-sm text-gray-700 space-y-4">
            {{ $post->description }}
        </div>
        <div class="mt-6 flex justify-between space-x-8">
            <div class="flex space-x-6">
                <span class="inline-flex items-center text-sm">
                    <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                        <span class="font-medium text-gray-900">29</span>
                        <span class="sr-only">bookmarks</span>
                    </button>
                </span>
            </div>
        </div>
    </article>
</li>
