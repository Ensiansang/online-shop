<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>User Dashboard - Valerie Online Shop </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/valerie1.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body>

    <!-- Quick view -->
    @include('frontend.body.header')
    <!--End header-->

    <main class="main pages">
      @yield('user')
    </main>



 @include('frontend.body.footer')

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS-->
   <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>


<script type="text/javascript">
            $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
//     $(document).ready(function () {
//     $('.cancel-order').on('click', function () {
//         var orderId = $(this).data('order-id');
//         var buttonElement = $(this); // Store the button element reference

//         cancelOrder(orderId, buttonElement);
//     });

//     function cancelOrder(orderId, buttonElement) {
//         $.ajax({
//             type: 'POST',
//             url: '/orders/' + orderId + '/cancel',
//             success: function (data) {
//                 // Process the success response
//                 const Toast = Swal.mixin({
//                   toast: true,
//                   position: 'top-end',
//                   icon: 'success',
//                   showConfirmButton: false,
//                   timer: 3000 
//                 });
                
//                 if ($.isEmptyObject(data.error)) {
//                     Toast.fire({
//                         type: 'success',
//                         title: data.success,
//                     });

//                     // Remove the button element from the table row
//                     buttonElement.closest('tr').find('.cancel-order').remove();
//                 } else {
//                     Toast.fire({
//                         type: 'error',
//                         title: data.error,
//                     });
//                 }
                
//                 // Optionally, update the table or perform other actions to reflect the canceled order
//             },
//             error: function (xhr, textStatus, errorThrown) {
//                 // Process the error response
//                 alert('Failed to cancel the order.');
//             }
//         });
//     }
// });


                    // Update the status to "Cancel-Request"
                    // buttonElement.closest('tr').find('.status-badge').removeClass('bg-warning').addClass('bg-secondary').text('Cancel-Request');

                    // Remove the button element from the table row
                //     buttonElement.remove();
                // } else {
                //     Toast.fire({
                //         type: 'error',
                //         title: data.error,
                //     });
                // }

               
//             },
//             error: function (xhr, textStatus, errorThrown) {
//                 // Process the error response
//                 alert('Failed to cancel the order.');
//             }
//         });
//     }
// });



// $(document).ready(function () {
//     $('.cancel-order').on('click', function () {
//         var orderId = $(this).data('order-id');
//         var statusElement = $(this).closest('tr').find('.status-badge');
//         cancelOrder(orderId, statusElement);
//     });

//     function cancelOrder(orderId, statusElement) {
//         $.ajax({
//             type: 'POST',
//             url: '/orders/' + orderId + '/cancel',
//             success: function (data) {
//                 // Process the success response
//                 const Toast = Swal.mixin({
//                     toast: true,
//                     position: 'top-end',
//                     icon: 'success',
//                     showConfirmButton: false,
//                     timer: 3000
//                 });

//                 if ($.isEmptyObject(data.error)) {
//                     Toast.fire({
//                         type: 'success',
//                         title: data.success,
//                     });

//                     // Update the status to "Cancel-Request"
//                     statusElement.removeClass('bg-warning').addClass('bg-secondary').text('Cancel-Request');

//                     // Remove the cancel button
//                     statusElement.siblings('.cancel-order').remove();
//                 } else {
//                     Toast.fire({
//                         type: 'error',
//                         title: data.error,
//                     });
//                 }
//             },
//             error: function (xhr, textStatus, errorThrown) {
//                 // Process the error response
//                 alert('Failed to cancel the order.');
//             }
//         });
//     }
// });


// $(document).ready(function () {
//     $('.cancel-order').on('click', function () {
//         var orderId = $(this).data('order-id');
//         var statusElement = $(this).closest('tr').find('.status-badge');
//         var cancelButton = $(this);
//         cancelOrder(orderId, statusElement, cancelButton);
//     });

//     function cancelOrder(orderId, statusElement, cancelButton) {
//         $.ajax({
//             type: 'POST',
//             url: '/orders/' + orderId + '/cancel',
//             success: function (data) {
//                 // Process the success response
//                 const Toast = Swal.mixin({
//                     toast: true,
//                     position: 'top-end',
//                     icon: 'success',
//                     showConfirmButton: false,
//                     timer: 3000
//                 });

//                 if ($.isEmptyObject(data.error)) {
//                     Toast.fire({
//                         type: 'success',
//                         title: data.success,
//                     });

//                     // Update the status to "Cancel-Request"
//                     statusElement.removeClass('bg-warning').addClass('bg-secondary').text('Cancel-Request');

//                     // Remove the cancel button
//                     cancelButton.remove();
//                 } else {
//                     Toast.fire({
//                         type: 'error',
//                         title: data.error,
//                     });
//                 }
//             },
//             error: function (xhr, textStatus, errorThrown) {
//                 // Process the error response
//                 alert('Failed to cancel the order.');
//             }
//         });
//     }
// });


$(document).ready(function () {
    $('.cancel-order').on('click', function () {
        var orderId = $(this).data('order-id');
        cancelOrder(orderId);
    });

    function cancelOrder(orderId) {
        $.ajax({
            type: 'POST',
            url: '/orders/' + orderId + '/cancel',
            success: function (data) {
                // Process the success response
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    });

                    // Update the status to "cancel-request" in the table
                    var row = $('.cancel-order[data-order-id="' + orderId + '"]').closest('tr');
                    row.find('.status-badge').removeClass('bg-warning').addClass('bg-secondary').text('Cancel-Request');
                    row.find('.cancel-order').remove();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    });
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                // Process the error response
                alert('Failed to cancel the order.');
            }
        });
    }
});

</script>
</body>

</html>