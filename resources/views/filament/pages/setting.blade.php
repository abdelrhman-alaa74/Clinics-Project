<x-filament-panels::page>

    <div class="flex gap-2 mb-6 flex-wrap">
        @foreach ($groups as $groupName)
            <x-filament::button wire:click="$set('activeGroup', '{{ $groupName }}')"
                color="{{ $activeGroup === $groupName ? 'primary' : 'gray' }}" size="sm">
                {{ ucfirst($groupName) }}
            </x-filament::button>
        @endforeach
    </div>

    <form wire:submit.prevent="save">
        @if($activeGroup && isset($data[$activeGroup]))
            <div class="space-y-4 max-w-xl">
                @foreach ($data[$activeGroup] as $key => $value)
                    <div class="flex items-center gap-4" style="display: flex; justify-content: space-between; align-items: center; width: 50%; margin-bottom: 20px;">
                        <label class="w-1/3 text-sm font-medium text-gray-700">
                            {{ ucfirst(str_replace('_', ' ', $key)) }} : 
                        </label>

                        <x-filament::input.wrapper class="w-2/3">
                            <x-filament::input
                            
                            type="text"
                            wire:model="data.{{ $activeGroup }}.{{ $key }}"
                            />
                        </x-filament::input.wrapper>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                <x-filament::button type="submit" color="primary">
                    Submit
                </x-filament::button>
            </div>
        @else
            <p class="text-sm text-gray-500">Another Group</p>
        @endif
    </form>

</x-filament-panels::page>