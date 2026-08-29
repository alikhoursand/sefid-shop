let orderCity = null;
document.addEventListener('DOMContentLoaded', () => {

    let loadingCities = false;

    function appendCities(cities) {
        let cityInput = document.getElementById('order_city');

        cities.forEach(optionData => {

            const option = document.createElement('option');
            option.value = optionData.id; // Set the value
            option.textContent = optionData.name; // Set the text

            // console.log(orderCity)
            //
            // if (option.value == orderCity) {
            //     option.setAttribute('selected', true);
            // }

            cityInput.appendChild(option);
            cityInput.removeAttribute('disabled')
        });
    }

    function getCities(stateId) {
        fetch(`/api/get-cities?state_id=${stateId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('خطا در ارتباط با سرور');
                }
                return response.json();
            })
            .then(result => {
                appendCities(result)
            })
            .catch(error => {
                alert('خطا در ارتباط با سرور')
            })
            .finally(() => {
                loadingCities = false;
            });
    }

    document.querySelectorAll('#order_state').forEach(stateSelect => {

        stateSelect.addEventListener('change', function () {
            if (loadingCities) {
                return false;
            } else {
                loadingCities = true;
            }

            let citySelect = document.getElementById('order_city')

            citySelect.value = null
            citySelect.setAttribute('disabled', true)
            citySelect.querySelectorAll('option').forEach(option => {
                option.remove()
            })


            getCities(stateSelect.value)

        })

    });

});

let orderSubmitBtn = document.getElementById('order-submit-btn');
if (orderSubmitBtn) {
    orderSubmitBtn.addEventListener('click', function (event) {
        document.getElementById('shipping-form').submit();
    });
}

window.selectOrderLocation = (stateID, cityID) => {
    document.getElementById('order_state').value = stateID

    fetch(`/api/get-cities?state_id=${stateID}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('خطا در ارتباط با سرور');
            }
            return response.json();
        })
        .then(result => {
            let cityInput = document.getElementById('order_city');

            result.forEach(optionData => {

                const option = document.createElement('option');
                option.value = optionData.id; // Set the value
                option.textContent = optionData.name; // Set the text

                if (option.value == cityID) {
                    option.setAttribute('selected', true);
                }

                cityInput.appendChild(option);
                cityInput.removeAttribute('disabled')
            });
        })
        .catch(error => {
            alert('خطا در ارتباط با سرور')
        })
        .finally(() => {

        });
}
