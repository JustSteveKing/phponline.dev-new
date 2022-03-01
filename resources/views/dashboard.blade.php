<x-app-layout>
    <x-slot:content>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Your Posts
                </h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                    <a
                        href="{{ route('app:posts:create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Create new post
                    </a>
                </div>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-md">

                <ul role="list" class="divide-y divide-gray-200">

                    @forelse($posts as $post)
                        <li>
                            <a href="{{ route('app:posts:show', $post->uuid) }}" class="block hover:bg-gray-50">
                                <div class="px-4 py-4 flex items-center sm:px-6">
                                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div class="truncate">
                                            <div class="flex text-sm">
                                                <p class="font-medium text-indigo-600 truncate">
                                                    {{ $post->title }}
                                                </p>
                                                <p class="ml-1 flex-shrink-0 font-normal text-gray-500">
                                                    {{ $post->category->title }}
                                                </p>
                                            </div>
                                            <div class="mt-2 flex">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/calendar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    @if ($post->published_at)
                                                        <p>
                                                            <span>Published on</span>
                                                            <time datetime="{{ $post->published_at->toDateString() }}">
                                                                {{ $post->published_at->toDateString() }}
                                                            </time>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <span>Not yet published</span>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-5 flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li>
                            <div class="text-center py-6">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No posts</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Get started by creating a new post.
                                </p>
                                <div class="mt-6">
                                    <a href="{{ route('app:posts:create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        Create new post
                                    </a>
                                </div>
                            </div>
                        </li>

                    @endforelse
                </ul>
            </div>

        </div>
    </div>
    </x-slot:content>
</x-app-layout>
