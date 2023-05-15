@extends('layout.default')
@section('content')
    <div class=" w-50 flex-fill d-flex flex flex-column align-items-center  gap-3">
        @if (session()->has('login_error'))
            <div class="bg-danger w-50  rounded d-flex flex flex-column align-items-center justify-content-center"
                style="height: 50px">
                <p class="text-white mb-2 ">{{ session('login_error') }}</p>

            </div>
        @endif
        <div class="bg-dark w-50 rounded d-flex flex flex-column align-items-center " style="padding: 2rem">
            <div class="container d-flex flex flex-column justify-content-center align-items-center">
                <h2 class="fw-bold text-white mb-2 text-uppercase">Login</h2>
            </div>
            <div class="d-flex gap-3">
                <div class="bg-secondary text-white px-4 rounded  d-flex flex flex-column align-items-center justify-content-center"
                    style="height: 150px;width: 300px;">
                    <h4>login as user</h4>
                    <p>email : user@user.co</p>
                    <p>password: user1234</p>

                </div>
                <div class="bg-secondary text-white px-4 rounded  d-flex flex flex-column align-items-center justify-content-center"
                    style="height: 150px;width: 300px;">
                    <h4>login as admin</h4>
                    <p>email : admin@admin.co</p>
                    <p>password: admin1234</p>

                </div>
            </div>
            <form action="{{ route('login') }}" method="POST" class="w-100 d-flex flex flex-column gap-4">
                @csrf

                <div class="form-outline form-white mb-4">
                    <label class="form-label text-white " for="email">Email</label>
                    <input type="email" id="email" name='email' value="{{ old('email') }}"
                        class="form-control form-control-lg" />

                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label text-white " for="password">Password</label>
                    <input type="password" name='password' id="password" class="form-control form-control-lg" />

                </div>
                <button class="btn btn-outline-light btn-lg px-5 my-2 " type="submit">Login</button>

            </form>
        </div>
    </div>
@endsection
