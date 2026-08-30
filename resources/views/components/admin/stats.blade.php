<div>
    <div class="stats bg-base-100 shadow-md w-full stats-vertical lg:stats-horizontal shadow-base-300">
        <div class="stat">
            <div class="stat-figure text-accent">
                <x-heroicon-s-cube class="size-8"/>
            </div>
            <div class="stat-title">محصول فعال</div>
            <div class="stat-value">{{ $productsCount }}</div>
            <div class="stat-actions">
                <a href="{{ route('admin.shop.product.index') }}" class="btn btn-xs btn-accent">لیست محصولات</a>
            </div>
        </div>
        <div class="stat">
            <div class="stat-figure text-secondary">
                <x-heroicon-s-user-group class="size-8"/>
            </div>
            <div class="stat-title">کاربر فعال</div>
            <div class="stat-value">{{ $usersCount }}</div>
            <div class="stat-actions">
                <a href="{{ route('admin.user.list') }}" class="btn btn-xs btn-primary">لیست کاربران</a>
            </div>
        </div>

    </div>
</div>
