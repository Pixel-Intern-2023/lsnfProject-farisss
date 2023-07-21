$(function () {

    $('.tombolTambahData').on('click', function () {

        $('#judulModal').html('Add Data Employee');
        $('.tombolSubmit').html('Add Data');

        $('#name').val('')
        $('#occupation_nama').val('')
        $('#detail').val('')
        $('#salary').val('')
        $('#created_at').val('')
        $('#updated_at').val('')
        $('#image_profile').attr('')
        $('#id').val('')
    });

    $('.tampilModalEdit').on('click', function () {

        $('#judulModal').html('Edit Data Employee');
        $('.tombolSubmit').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/mvclsnfproject/public/employe/update');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvclsnfproject/public/employe/getupdate',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#namee').val(data.namee)
                $('#occupation').val(data.occupation_nama)
                $('#detail').val(data.detail)
                $('#salary').val(data.salary)
                $('#created_at').val(data.created_at)
                $('#updated_at').val(data.updated_at)
                $('#image_profile').attr(data.image_profile)
                // $('#image_profile').attr('required',false)
                $('#id').val(data.id)
            }

        });

    });

    $('#delete').on('click', function (e) {
        e.preventDefault();
        let link = $(this).attr('href');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });

    });

    $('#passwordCheck').on('click', function(){
        let passInput = $("#password");

        if(passInput.attr('type') == 'password'){

           passInput.attr('type','text');

        }else{

           passInput.attr('type','password');
           
        }
    });



});

