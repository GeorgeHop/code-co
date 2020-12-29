// DELETE MODAL
$('.main-panel').on('click', 'a[data-delete]', function (e) {
    e.preventDefault();

    let action = $(this).data('delete'); // has 'undefined' if data attr is empty
    let row = $(this).parents('tr').eq(0);
    let href = $(this).attr('href');
    let error = null;

    Swal.fire({
        title: 'Czy na pewno chcesz to usunąć?',
        type: 'warning',
        confirmButtonText: '<i class="fas fa-trash"></i> Tak, usuń',
        confirmButtonClass: 'btn btn-danger mr-2',
        cancelButtonText: '<i class="fas fa-undo-alt"></i> Nie, nie usuwaj',
        cancelButtonClass: 'btn btn-info ml-2',
        showLoaderOnConfirm: true,
        showCancelButton: true,
        buttonsStyling: false,
        preConfirm: () => {
            return fetch(href, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            }).then(response => {
                if (!response.ok) {
                    error = response.status;
                    throw new Error(response.statusText);
                }

                return response.json();
            }).catch(error => {
                console.log(error);
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then(response => {
        // return if user dismissed modal
        if (response.dismiss)
            return;

        response = response.value;

        // if response has {value: true} (e.g. when server has had an internal error)
        if (error) {
            if (error === 403) {
                Swal.fire({
                    type: 'error',
                    title: 'Nie masz uprawnień do wykonania tej czynności',
                });
            }
            else {
                Swal.fire({
                    type: 'error',
                    title: 'Wybacz, ale wygląda na to, że wystąpił problem podczas usuwania tego',
                });
            }
        }
        else {
            // if server responded, but success = false
            if (!response.success) {
                Swal.fire({
                    type: 'error',
                    title: response.message,
                });
            }
            // if all good
            else {
                if (action === 'row') {
                    let table = row.parents('table.dataTable');
                    row.remove();
                    if (table)
                        table.DataTable().ajax.reload();
                }

                if (action === 'this')
                    $(this).remove();

                Swal.fire({
                    type: 'success',
                    title: response.message || 'Pomyślnie usunięto',
                });
            }
        }
    });
});
// CONFIRM MODAL
$('a[data-confirm]').on('click', function (e) {
    e.preventDefault();

    let href = $(this).attr('href');
    let reload = $(this).data('reload') || true;
    let method = $(this).data('method') || 'GET';
    let error = null;

    Swal.fire({
        title: 'Na pewno?',
        type: 'warning',
        confirmButtonText: '<i class="fas fa-check-circle"></i> Tak',
        confirmButtonClass: 'btn btn-success mr-2',
        cancelButtonText: '<i class="fas fa-undo-alt"></i> Nie',
        cancelButtonClass: 'btn btn-info ml-2',
        showLoaderOnConfirm: true,
        showCancelButton: true,
        buttonsStyling: false,
        preConfirm: () => {
            return fetch(href, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            }).then(response => {
                if (!response.ok) {
                    error = response.status;
                    throw new Error(response.statusText);
                }

                return response.json();
            }).catch(error => {
                console.log(error);
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then(response => {
        // return if user dismissed modal
        if (response.dismiss)
            return;

        response = response.value;

        // if response has {value: true} (e.g. when server has had an internal error)
        if (error) {
            if (error === 403) {
                Swal.fire({
                    type: 'error',
                    title: 'Nie masz uprawnień do wykonania tej czynności',
                });
            }
            else {
                Swal.fire({
                    type: 'error',
                    title: 'Podczas przetwarzania żądania wystąpił błąd',
                });
            }
        }
        else {
            // if server responded, but success = false
            if (!response.success) {
                Swal.fire({
                    type: 'error',
                    title: response.message,
                });
            }
            // if all good
            else {
                Swal.fire({
                    type: 'success',
                    title: response.message || 'Pomyślnie usunięto',
                });

                if (response.redirect) {
                    setTimeout(function () {
                        location = response.redirect;
                    }, 500);
                }
                else if (reload) {
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                }

            }
        }
    });
});
