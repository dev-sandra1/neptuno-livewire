<div>
    <form class="mt-40 max-w-2xl mx-auto" wire:submit="submit">
        <h2 class="font-bold text-2xl text-center">What is your book about?</h2>
        <flux:error name="prompt" />
        <flux:textarea
            wire:model="prompt"
            class="mt-5"
            placeholder="Type your book description here..."
        />
        <flux:button variant="primary" class="mt-5" type="submit" icon="bolt">Create</flux:button>
    </form>

    <div class="mt-20 max-w-2xl mx-auto">
        @if($response)
           <p class="text-lg text-center">{{ $response }}</p>
        @endif
    </div>
</div>
