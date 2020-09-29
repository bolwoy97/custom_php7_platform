<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    const swalCustom = Swal.mixin({
        customClass: {
            confirmButton: 'swal_submit',
            cancelButton: 'swal_cancel'
        },
        buttonsStyling: false
    })

    /*
     swalCustom.fire({
            title: '<strong>Покупка токена</strong>',
            //icon: 'info',
            html: 'Вы потверждаете покупку ткена на сумму $'+sum ,
            //showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'Подтвердить',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: 'Отмена',
            cancelButtonAriaLabel: 'Thumbs down'
        }).then((result) => {
            if (result.value) {
                $('#buyTok3 form').submit();
            }
        })
    */
</script>