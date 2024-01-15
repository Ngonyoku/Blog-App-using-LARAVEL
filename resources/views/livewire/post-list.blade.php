
<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div>
            @if ($search)
                Searching <strong>"{{$search}}"</strong>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class=" {{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-500': 'text-gray-500'}} py-4" wire:click="setSort('desc')">Latest</button>
            <button class=" {{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-500': 'text-gray-500'}} py-4 border-gray-700" wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>

 