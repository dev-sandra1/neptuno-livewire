<div>
    <form class="mt-40 max-w-2xl mx-auto" wire:submit="submit">
        <h2 class="font-extrabold mb-7 text-3xl text-center bg-gradient-to-r from-blue-500 to-pink-500 bg-clip-text text-transparent">What is your book about?</h2>
        <flux:error name="prompt" />
        <flux:textarea
            wire:model="prompt"
            placeholder="Type your book description here..."
        />
        <flux:select placeholder="Choose industry..." class="mt-5">
            <flux:select.option>Photography</flux:select.option>
            <flux:select.option>Design services</flux:select.option>
            <flux:select.option>Web development</flux:select.option>
        </flux:select>
        <flux:button variant="primary" class="mt-5" type="submit" icon="bolt">Create</flux:button>
    </form>

    <div class="mt-20 max-w-2xl mx-auto">
        @if($response)
           <p class="text-lg text-center">{{ $response }}</p>
        @endif
    </div>
</div>
