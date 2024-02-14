@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container h-80 mt-5 d-flex justify-content-center align-items-center">
        <form method="post" action="{{ route('customer.loginProcess') }}"
              class="border bg-white p-3 rounded">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary rounded-5 px-4">Login</button>
            </div>

            <div class="form-text d-flex justify-content-between align-items-center">
                <div class="me-5">
                    <a href="{{route('customer.forgotPassword')}}">Forgot password</a>
                </div>
                <div>
                    Already have an account? Login <a href="{{route('customer.login')}}">here</a>
                </div>
            </div>
        </form>
    </div>
    @include('layouts/footer')
</x-layout>
