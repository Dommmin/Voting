<nav class="hidden md:flex items-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="border-b-4 pb-3 @if($status === 'All') border-blue text-gray-900 @endif hover:border-blue">All ideas ({{ $statusCount['all_statuses'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#" class="@if($status === 'Considering') border-purple text-gray-900 @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-purple">Considering ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#" class="@if($status === 'In Progress') border-yellow text-gray-900 @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-yellow">In Progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>

    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class="@if($status === 'Implemented') border-green text-gray-900 @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-green">Implemented ({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class="@if($status === 'Closed') border-red text-gray-900 @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-red">Closed ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>
