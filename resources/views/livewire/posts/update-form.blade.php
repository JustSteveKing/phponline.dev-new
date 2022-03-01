<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div class="px-4 py-3 text-right sm:px-6">
            <button type="submit"
                    class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Save
            </button>
        </div>

    </form>

</div>
