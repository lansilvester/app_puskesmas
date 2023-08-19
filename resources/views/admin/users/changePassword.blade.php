@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('change-password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">Password Sekarang</label>
                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                                    <span toggle="#current_password" class="eye-toggle"><i class="fas fa-eye"></i></span> <!-- Tombol toggle dengan ikon mata -->
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                                    <span toggle="#new_password" class="eye-toggle"><i class="fas fa-eye"></i></span>
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password">
                                    <span toggle="#confirm_password" class="eye-toggle"><i class="fas fa-eye"></i></span>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Gaya CSS untuk tombol toggle dengan ikon mata */
        .eye-toggle {
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        .eye-toggle::before {
            font-family: FontAwesome;
            font-size: 18px;
        }

        .show-password .eye-toggle::before {
            content: '\f070'; /* Unicode untuk ikon mata tertutup */
        }
    </style>

    <script>
        // Script untuk menambahkan fungsi toggle pada tombol mata
        document.addEventListener('DOMContentLoaded', function () {
            const eyeToggles = document.querySelectorAll('.eye-toggle');

            eyeToggles.forEach(toggle => {
                toggle.addEventListener('click', function () {
                    const targetField = document.querySelector(this.getAttribute('toggle'));
                    const type = targetField.getAttribute('type');

                    if (type === 'password') {
                        targetField.setAttribute('type', 'text');
                    } else {
                        targetField.setAttribute('type', 'password');
                    }

                    this.classList.toggle('show-password');
                });
            });
        });
    </script>
@endsection
