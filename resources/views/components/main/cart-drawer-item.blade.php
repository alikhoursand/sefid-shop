<div class="shadow-sm shadow-base-300 group p-1 xs:p-2 bg-base-200 rounded-box flex gap-4 relative">
    <div class="absolute badge badge-sm badge-primary z-5 top-0 right-0 font-medium text-base py-1">
        <span class="text-sm"><span class="text-xs font-medium">x</span>{{$item['qty']}}</span>
    </div>
    <a href="{{route('shop.product.view',$item['slug'])}}">
        <img src="{{Storage::url($item['image'])}}" class="group-hover:scale-110 duration-300 aspect-square w-20 h-full rounded-box object-cover" alt="">
    </a>
    <div class="flex flex-col grow justify-between">
        <a href="{{route('shop.product.view',$item['slug'])}}" class="block text-sm line-clamp-2 h-10">{{$item['title']}}</a>
        <div class="flex items-end justify-between">
            <div class="text-sm font-medium">
                {{number_format($item['price'])}}
                <x-shop.toman class="size-5 opacity-75 inline"/>
            </div>
            <div>
                <form action="{{route('cart.remove',$item['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-error btn-soft btn-circle">
                        <x-heroicon-o-trash class="size-5"/>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
