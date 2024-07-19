<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Welcome back!') }}</h1>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
    <!-- Form -->
    <form id="loginForm">
        <div class="space-y-4">
            <div>
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" type="text" name="username" :value="old('username')" required autofocus />                
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />                
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <div class="mr-1">
                    <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            @endif            
            <x-button class="ml-3">
                {{ __('Sign in') }}
            </x-button>            
        </div>
    </form>
    <x-validation-errors class="mt-4" />   
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <!-- Add any footer content here -->
    </div>
</x-authentication-layout>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var employeeNumber = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Show SweetAlert loader
        Swal.fire({
            title: 'Please wait...',
            html: 'Logging in...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/loginUser', 
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                username: employeeNumber,
                password: password
            },
            dataType: 'JSON',
            success: function(result) {
                Swal.close();

                if (result.response === "success") {
                    Swal.fire('Success', result.message, 'success').then(() => {
                        window.location.href = "/dashboard";
                    });
                } else {
                    Swal.fire('Warning', result.message, 'warning');
                }
            },
            error: function(err) {
                Swal.close();
                Swal.fire('Error', 'An error occurred while processing your request.', 'error');
                console.log(err);
            }
        });
    });
</script>
