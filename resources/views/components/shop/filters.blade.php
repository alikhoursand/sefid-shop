<x-shop.mobile-filters></x-shop.mobile-filters>
<x-shop.desktop-filters></x-shop.desktop-filters>

@push('header_scripts')
    <script>
        let currentPage = {{ request('page') ?? 1 }};
        let sort = 'newest';
        let avail = 0;
        let offer = 0;
        let minPrice = 1000;
        let maxPrice = 100000000;

        function filtersChanged() {
            document.querySelector('#shop-loader').classList.remove('hidden');

            sort = document.querySelector('#sort').value;
            avail = document.querySelector('#avail').value;
            offer = document.querySelector('#offer').value;
            minPrice = document.querySelector('#min-price').value;
            maxPrice = document.querySelector('#price-range').value;

            // submit filters
            window.location.href =
                `{{ route('shop.product.list') }}?sort=${sort}&avail=${avail}&offer=${offer}&min_price=${minPrice}&max_price=${maxPrice}&page=${currentPage}`;

        }

        function changeOffer(value) {
            if (value == 1) {
                document.querySelector('#offer').value = 1;
                document.querySelector('#offer-on').classList.remove('btn-ghost');
                document.querySelector('#offer-on').classList.add('btn-primary');
                document.querySelector('#offer-off').classList.add('btn-ghost');
                document.querySelector('#offer-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#offer').value = 0;
                document.querySelector('#offer-on').classList.add('btn-ghost');
                document.querySelector('#offer-on').classList.remove('btn-primary');
                document.querySelector('#offer-off').classList.remove('btn-ghost');
                document.querySelector('#offer-off').classList.add('btn-primary');
            }

            filtersChanged()
        }

        function mobileChangeOffer(value) {
            if (value == 1) {
                document.querySelector('#offer').value = 1;
                document.querySelector('#mobile-offer-on').classList.remove('btn-ghost');
                document.querySelector('#mobile-offer-on').classList.add('btn-primary');
                document.querySelector('#mobile-offer-off').classList.add('btn-ghost');
                document.querySelector('#mobile-offer-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#offer').value = 0;
                document.querySelector('#mobile-offer-on').classList.add('btn-ghost');
                document.querySelector('#mobile-offer-on').classList.remove('btn-primary');
                document.querySelector('#mobile-offer-off').classList.remove('btn-ghost');
                document.querySelector('#mobile-offer-off').classList.add('btn-primary');
            }
        }

        function changeAvail(value) {
            if (value == 1) {
                document.querySelector('#avail').value = 1;
                document.querySelector('#avail-on').classList.remove('btn-ghost');
                document.querySelector('#avail-on').classList.add('btn-primary');
                document.querySelector('#avail-off').classList.add('btn-ghost');
                document.querySelector('#avail-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#avail').value = 0;
                document.querySelector('#avail-on').classList.add('btn-ghost');
                document.querySelector('#avail-on').classList.remove('btn-primary');
                document.querySelector('#avail-off').classList.remove('btn-ghost');
                document.querySelector('#avail-off').classList.add('btn-primary');
            }

            filtersChanged()
        }

        function mobileChangeAvail(value) {
            if (value == 1) {
                document.querySelector('#avail').value = 1;
                document.querySelector('#mobile-avail-on').classList.remove('btn-ghost');
                document.querySelector('#mobile-avail-on').classList.add('btn-primary');
                document.querySelector('#mobile-avail-off').classList.add('btn-ghost');
                document.querySelector('#mobile-avail-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#avail').value = 0;
                document.querySelector('#mobile-avail-on').classList.add('btn-ghost');
                document.querySelector('#mobile-avail-on').classList.remove('btn-primary');
                document.querySelector('#mobile-avail-off').classList.remove('btn-ghost');
                document.querySelector('#mobile-avail-off').classList.add('btn-primary');
            }
        }
    </script>
@endpush

@push('footer_scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            let priceRange = document.querySelector('#price-range');
            priceRange.addEventListener('change', function() {
                document.querySelector('#max-price').innerText = new Intl.NumberFormat('fa-IR', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(priceRange.value);

                filtersChanged();
            })

            let mobilePriceRange = document.querySelector('#mobile-price-range');
            mobilePriceRange.addEventListener('change', function() {
                document.querySelector('#mobile-max-price').innerText = new Intl.NumberFormat('fa-IR', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(mobilePriceRange.value);

                document.querySelector('#price-range').value = mobilePriceRange.value;

            })

            let mobileSort = document.querySelector('#mobile-sort');
            mobileSort.addEventListener('change', function() {
                document.querySelector('#sort').value = mobileSort.value
            })

        });
    </script>
@endpush
