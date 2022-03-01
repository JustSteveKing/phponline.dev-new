<x-app-layout>
    <x-slot:content>
        <section aria-labelledby="section-1-title">
            <h2 class="sr-only" id="section-1-title">
                Latest Posts
            </h2>
            <div class="overflow-hidden">
                <ul>
                    @forelse ($posts as $post)
                        <livewire:posts.post-card
                            :post="$post"
                        />
                    @empty
                        <li>
                            <x-empty-state />
                        </li>
                    @endforelse
                </ul>
            </div>
        </section>
    </x-slot:content>

    <x-slot:sidebar>
        <x-input.group
            label="testing"
{{--            :error="$errors->first('testing')"--}}
        >
            <x-input.label icon="bookmark">Bookmark</x-input.label>
            <x-input.text name="testing" placeholder="Testing" />
        </x-input.group>

        <x-input.toggle name="terms" />
    </x-slot:sidebar>
</x-app-layout>
