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

if (accountForm) {
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
                })
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
}


const table = document.getElementById('users-table');
if(table) {
    fetch('/api/user_levels').then(function (response) {
        return response.json();
    }).then(function (o) {

        const userLevels = Object.fromEntries(Object.entries(o).map(([_, value]) => [value.user_level_id, value.name]));
        fetch('/api/users').then(function (response) {
            return response.json();
        }).then(function (users) {
            const tableBody = table.querySelector('tbody');
            if (tableBody) {
                users.forEach(function (user) {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${user.user_id}</td>
                    <td>${user.first_name}</td>
                    <td>${user.last_name}</td>
                    <td>${user.email}</td>
                    <td>${user.username}</td>
                    <td>${user.password ?? ''}</td>
                    <td>${userLevels[user.user_level_id]}</td>
                    <td>
                        <a href="/users/edit?user_id=${user.user_id}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" data-user-id="${user.user_id}">Delete</button>
                    </td>
                `;
                    tableBody.appendChild(tr);
                });
            }
        });
    });
}

setTimeout(function () {
    const deleteButtons = document.querySelectorAll('button.btn-danger');
    if (deleteButtons) {
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                const user_id = event.target.dataset.userId;
                fetch('/api/users/delete?' + new URLSearchParams({user_id: user_id}), {
                    method: 'DELETE'
                }).then(function (response) {
                    if (response.status === 200) {
                        event.target.parentNode.parentNode.remove();
                    }
                })
            });
        });
    }
}, 1000);

const edit_user_form = document.getElementById('edit-user-form');
if (edit_user_form) {
    edit_user_form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (event.submitter.value === 'Save') {
            const formData = new FormData(edit_user_form);
            console.log(formData)
            const data = {};
            for (const [key, value] of formData) {
                let val = Number.parseInt(value);
                data[key] = (val) ? val : value;
            }
            const user_id = data['user_id'];
            fetch('/api/users/update?' + new URLSearchParams({user_id: user_id}), {
                method: 'PUT',
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (data) {
                console.log(data)
            })
            event.submitter.value = 'Edit';
            event.submitter.classList.remove('btn-success');
            event.submitter.classList.add('btn-primary');
            edit_user_form.querySelectorAll('.form-item').forEach(function (input) {
                if (input.value !== 'Save' && input.value !== 'Edit') {
                    input.setAttribute('disabled', '');
                }
            });
        } else if (event.submitter.value === 'Edit') {
            event.submitter.value = 'Save';
            event.submitter.classList.remove('btn-primary');
            event.submitter.classList.add('btn-success');
            edit_user_form.querySelectorAll('.form-item').forEach(function (input) {
                if (input.value !== 'Save' && input.value !== 'Edit') {
                    input.removeAttribute('disabled');
                }
            });
        } else if (event.submitter.value === 'Back') {
            window.location.href = '/users';
        }
    });
}