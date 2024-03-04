<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>

@if (session('success'))
    <script>
        setTimeout(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                customClass: {
                    title: 'green-sweet',
                },
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });
        }, 1000);
    </script>
@endif

@if (session('error'))
    <script>
        setTimeout(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                customClass: {
                    title: 'red-sweet',
                },
            })

            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });
        }, 1000);
    </script>
@endif

<style>
    .red-sweet {
        font-weight: 600;
        color: red;
    }

    .green-sweet {
        font-weight: 600;
        color: rgb(78, 151, 78);
    }
</style>

<script>
    function add(message) {
        setTimeout(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                customClass: {
                    title: 'green-sweet',
                },
            })

            Toast.fire({
                icon: 'success',
                title: message
            });
        }, 1000);
    }

    function remove(message) {
        setTimeout(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                customClass: {
                    title: 'green-sweet',
                },
            })

            Toast.fire({
                icon: 'green',
                title: message
            });
        }, 1000);
    }
</script>
