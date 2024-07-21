@extends('user.master')


@section('title', __('admin.orders'))

@section('page-title', __('admin.orders'))
@section('css')
    <style>
      .rating:hover{
        color: #fce708;
        transition: 0.5s;
      }
    </style>
@endsection
@section('content')

    @livewire('user.search-order')
    
@endsection
@section('ajax')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3mfb45n';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            // setInterval(function() {
            //       $('.addStar').on('click', function(e) {
            //           $(this).submit();
            //       });
            // },500);
            setInterval(function() {
                $('.add_attach').on('click', function() {
                    const order_id_new = $(this).attr("data-id");
                    $("#order_id1").val(order_id_new);
                });
            }, 1000);

            $('#form_attach').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var opError = " ";
                $.ajax({
                    url: `{{ url('profile/orders') }}`,
                    type: 'POST',
                    data: formData,
                    success: function(result) {
                        //console.log(result);
                        $("#form_attach")[0].reset();
                        $('.alterErrorletter').html(" ");
                        swal(result.success, {
                            icon: "success",
                        });
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(errorsub) {
                        if (errorsub) {
                            if (errorsub.responseJSON.errors.name_attach) {
                                opError += '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .name_attach + '</div>';
                            } else if (errorsub.responseJSON.errors
                                .attachment_file) {
                                opError += '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .attachment_file + '</div>';
                            }
                            $('.alterErrorletter').html(" ");
                            $('.alterErrorletter').append(opError);
                        }
                    }
                });
            });
        });
    </script>
@endsection
