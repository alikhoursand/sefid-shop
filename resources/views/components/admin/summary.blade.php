<x-admin.stats :users-count="$users_count" :products-count="$products_count" :orders-count="$orders_count" :transactions-count="$transactions_count"></x-admin.stats>


<div class="mt-8 grid grid-cols-2 gap-4">
    <div class="lg:col-span-1 col-span-2">
        <x-admin.summary-orders :orders="$orders"></x-admin.summary-orders>
    </div>
    <div class="lg:col-span-1 col-span-2">
        <x-admin.summary-transactions :transactions="$transactions"></x-admin.summary-transactions>
    </div>
</div>
