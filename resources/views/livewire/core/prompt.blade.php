<div>
    <form class="mt-40 max-w-2xl mx-auto" wire:submit="submit">
        <h2 class="font-extrabold mb-7 text-3xl text-center bg-gradient-to-r from-blue-500 to-pink-500 bg-clip-text text-transparent">What is your book about?</h2>
        <flux:error name="prompt" />
        <flux:textarea
            wire:model="prompt"
            placeholder="Type your book description here..."
        />

        <div class="mt-10">
            <flux:error name="selected_genres" />
            <flux:checkbox.group wire:model="selected_genres" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($book_genres as $genre)
                    <flux:checkbox
                        value="{{ $genre['id'] }}"
                        label="{{ $genre['name'] }}"
                        description="{{ $genre['description'] }}"
                    />
                @endforeach
            </flux:checkbox.group>
        </div>


        <flux:button variant="primary" class="mt-5" type="submit" icon="bolt">Create</flux:button>
    </form>

    <div class="mt-20 max-w-2xl mx-auto">
        @if($response)
           <p class="text-lg text-center">{{ $response }}</p>
        @endif
    </div>
</div>
