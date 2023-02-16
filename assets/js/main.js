const dropdown = document.querySelectorAll('.dropdown');
dropdown.forEach(function (element) {
    const dropdownMenu = element.querySelector('.dropdown-menu');
    element.addEventListener('mouseover', function () {
        dropdownMenu.classList.add('show');
    });
    element.addEventListener('mouseout', function () {
        dropdownMenu.classList.remove('show');
    });
})

const accountForm = document.getElementById('account-form');
accountForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const sub_val = event.submitter.value;
    if (sub_val === 'Edit') {
        accountForm.querySelectorAll('.form-item').forEach(function (input) {
            if (input.name !== 'created_at') {
                input.removeAttribute('disabled');
            }
        });
        event.submitter.setAttribute('hidden', '');
        event.submitter.parentNode.lastElementChild.removeAttribute('hidden')
    } else if (sub_val === 'Save' || sub_val === 'Cancel') {

        if (sub_val === 'Save') {
            const formData = new FormData(accountForm);

            const data = {};


            for (const [key, value] of formData) {
                let val = Number.parseInt(value);
                data[key] = (val) ? val : value;
            }

            if (data['password'] === '') {
                delete data['password'];
            }

            fetch('/api/users/update?' + new URLSearchParams({user_id: data['user_id']}), {
                method: 'PUT',
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (res) {
                console.log(res);
            });
        }

        accountForm.querySelectorAll('.form-item').forEach(function (input) {
            if (input.name !== 'created_at') {
                input.setAttribute('disabled', '')
            }
        });
        event.submitter.parentElement.setAttribute('hidden', '');
        event.submitter.parentNode.parentNode.firstElementChild.removeAttribute('hidden')
    }
});
