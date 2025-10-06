<div>
    <form class="mt-40 max-w-2xl mx-auto" wire:submit="submit">
        <h2 class="font-bold text-2xl text-center">What is your book about?</h2>
        <flux:error name="prompt" />
        <flux:textarea
            wire:model="prompt"
            class="mt-5"
            placeholder="Type your book description here..."
        />
        <flux:select wire:model="industry" placeholder="Choose industry..." class="mt-5">
            <flux:select.option>Photography</flux:select.option>
            <flux:select.option>Design services</flux:select.option>
            <flux:select.option>Web development</flux:select.option>
            <flux:select.option>Accounting</flux:select.option>
            <flux:select.option>Legal services</flux:select.option>
            <flux:select.option>Consulting</flux:select.option>
            <flux:select.option>Other</flux:select.option>
        </flux:select>
        <flux:button variant="primary" class="mt-5" type="submit" icon="bolt">Create</flux:button>
    </form>

    <div class="mt-20 max-w-2xl mx-auto">
        @if($response)
           <p class="text-lg text-center">{{ $response }}</p>
        @endif
    </div>
</div>
