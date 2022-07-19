<div
    class="relative"
    x-data="{ isOpen: false }"
    x-init="
    Livewire.on('statusWasUpdated', () => { isOpen = false })
    Livewire.on('statusWasUpdatedError', () => { isOpen = false })
    "
>
    <button
        @click="isOpen = !isOpen"
        type="button"
        class="flex items-center justify-center h-9 w-36 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
    >
        Set status
        <svg class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div
        x-cloak
        x-show.transition.origin.top.left="isOpen"
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
    >
        <form wire:submit.prevent="setStatus" action="#" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" checked class="bg-gray-200 text-gray-600 border-none" value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" class="bg-gray-200 text-purple border-none" value="2">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" class="bg-gray-200 text-yellow border-none" value="3">
                        <span class="ml-2">In Progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" class="bg-gray-200 text-green border-none" value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" class="bg-gray-200 text-red border-none" value="5">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>

            <div>
                <textarea wire:model="comment" name="update_comment" id="update_comments" cols="30" rows="4"
                          class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                          placeholder="Add an update comment (optional)"
                ></textarea>
            </div>
            <div class="flex items-center justify-between space-x-3">
                <button
                    type="submit"
                    class="flex items-center justify-center w-full h-9 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white disabled:opacity-50"
                >
                    Update
                </button>
            </div>
            <div>
                <label class="font-normal inline-flex items-center">
                    <input wire:model="notifyAllVoters" type="checkbox" name="notify_voters" class="rounded bg-gray-200">
                    <span class="ml-2">Notify all voters</span>
                </label>
            </div>
        </form>
    </div>
</div>
