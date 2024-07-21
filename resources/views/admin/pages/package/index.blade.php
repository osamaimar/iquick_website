@extends('admin.master')


@section('title', __('admin.packages'))

@section('page-title', __('admin.packages'))

@section('content')
    @livewire('admin.search-package')
@endsection
@section('ajax')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('.deleteRecord').on('click', function() {
                    const dataid = $(this).attr('data-id');
                    swal({
                        title: 'هل أنت متأكد?',
                        text: 'لن تتمكن من استرداد العنصر!',
                        icon: 'warning',
                        closeModal: false,
                        allowOutsideClick: false,
                        closeOnConfirm: false,
                        closeOnCancel: false,
                        buttons: ['لا', 'نعم']
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: `{{ url('dashborad/packages/${dataid}') }}`,
                                method: 'DELETE',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    dataid: dataid
                                },
                                success: function(result) {
                                    //console.log(result);
                                    swal(result.success, {
                                        icon: result.icon,
                                    });
                                    $('#' + result.id).remove();
                                }
                            });
                        } else {
                            swal("لم يتم حذف العنصر.");
                        }
                    });
                });
            }, 1000);
        });
    </script>
@endsection
