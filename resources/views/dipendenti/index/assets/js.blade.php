<script>
    function salva_dipendente() {
        Swal.fire({
            title: 'Caricamento in corso',
            text: 'Stiamo generando la pagina...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
        });

        setTimeout(() => {
            let response;
            var formData = new FormData($("form#create_dipendente")[0]); //input serializzati (chiave valore)
            var actionUrl = $('#create_dipendente').attr('action');
            $.ajaxSetup({ //token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content')
                }
            });
            $.ajax({
                    url: actionUrl,
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false
                }

            ).done(function(data) {
                var obj = data;
                var response = '' + data.response;
                response = response.toUpperCase();

                switch (response) {
                    case 'TRUE':
                        Swal.close();
                        Swal.fire({
                            title: 'Dipendente aggiunto con successo!',
                            allowOutsideClick: false,
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-success"
                            },
                            icon: "success",
                            timer: 5000
                        }).then(function() {
                            setTimeout(function() {
                                window.location.assign(
                                    '{{ route('dipendente.list') }}');
                            }, 2000);
                        });
                        return true;
                        break;
                    case 'FALSE':
                        Swal.close();
                        $('#create_button').removeClass('d-none');
                        if (data.type == 'system') {
                            Swal.fire({
                                title: 'Errore',
                                text: data.text,
                                allowOutsideClick: false,
                                buttonsStyling: false,
                                customClass: {
                                    confirmButton: "btn btn-success"
                                },
                                icon: "error",
                            });

                        } else {
                            printErrorMsg(data);
                            setTimeout(function() {
                                $('.description_err').html('');
                            }, 3000);
                        }
                        return false;
                        break;
                    default:
                        Swal.close();
                        Swal.fire({
                            title: "Errore rilevato",
                            buttonsStyling: false,
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-success"
                            },
                            icon: "error",
                        });
                        return false;
                        break;
                }
            });
        }, 2500)

    }


    function printErrorMsg(data) {
        $.each(data.error, function(key, value) {
            $('.' + key + '_err').text(value);
            $('#' + key).addClass('border-red');
        });
    }

    function hideErrorMsg(that) {
        $('.' + that.id + '_err').text('');
        $(that).removeClass('border-red');
    }

    // function eliminaDipendente(id) {
    //     Swal.fire({
    //         title: 'Caricamento in corso',
    //         text: 'Stiamo generando la pagina...',
    //         allowOutsideClick: false,
    //         didOpen: () => {
    //             Swal.showLoading();
    //         },
    //     });
    //     setTimeout(() => {
    //         let response;
    //         $.ajaxSetup({ //token
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
    //                     'content')
    //             }
    //         });

    //           $.ajax({
    //                 url: ,
    //                 method: 'POST',
    //                 data: formData,
    //                 dataType: 'JSON',
    //                 contentType: false,
    //                 cache: false,
    //                 processData: false
    //             }

    //         )
    //     }, 2500)
    // }


    function eliminaDipendente(id) {
        Swal.fire({
            title: 'Sei sicuro?',
            text: 'Questa azione non potrà essere annullata!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, elimina!',
            cancelButtonText: 'No, annulla'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({ //token
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    }
                });
                $.ajax({
                    url: '/delete/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Eliminato!', response.message, 'success').then(() => {
                                // Puoi aggiornare la tabella dei dipendenti o eseguire altre azioni necessarie
                                location.reload(); // Esempio: ricarica la pagina
                            });
                        } else {
                            Swal.fire('Errore!', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        Swal.fire('Errore!',
                            'Si è verificato un errore durante l\'eliminazione.', 'error');
                    }
                });
            }
        });
    }
</script>
