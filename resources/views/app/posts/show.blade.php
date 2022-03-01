<x-app-layout>
    <x-slot:content>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update: {{ $post->title }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <section aria-labelledby="create-blog-post">
                    <livewire:posts.update-form
                        :post="$post"
                    />
                </section>

            </div>
        </div>
    </x-slot:content>
</x-app-layout>
