<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Appearance</flux:heading>
        <flux:subheading>Update your theme</flux:subheading>
    </div>
    <div class="w-2/3 flex">
        <flux:radio.group x-data variant="cards" x-model="$flux.appearance" class="max-sm:flex-col">
            <flux:radio value="light" icon="sun" label="Light"></flux:radio>
            <flux:radio value="dark" icon="moon" label="Dark"></flux:radio>
            <flux:radio value="system" icon="computer-desktop" label="System"></flux:radio>
        </flux:radio.group>
    </div>
</div>