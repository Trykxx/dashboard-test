@extends('tablar::auth.layout')
@section('title', 'Connexion')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <img src="{{ asset('/assets/images/LogoMeetpe.png') }}" style="
        height: 100px;
        width: auto;"
                alt="Meetpe logo">
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Connexion</h2>
                <form action="{{ route('login') }}" method="post" autocomplete="off" novalidate>
                    @csrf
                    @include('shared.input', [
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                    ])
                    <div class="mb-2">
                        <label class="form-label">
                            Mot de passe
                            <span class="form-label-description">
                                <a href="{{ route('password.request') }}">Mot de passe oublié</a>
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe..."
                                autocomplete="off" id="password-input">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Afficher le mot de passe"
                                    data-bs-toggle="tooltip"
                                    id="toggle-password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}/>
                            <span class="form-check-label">Se souvenir de moi</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
        @if (Route::has('register'))
            <div class="text-center text-muted mt-3">
                Vous n'avez pas de compte ? <a href="{{ route('register') }}" tabindex="-1">Inscription</a>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let passwordInput = document.getElementById('password-input');
            let togglePassword = document.getElementById('toggle-password');

            if (passwordInput && togglePassword) {
                togglePassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                });
            }
        });
    </script>
@endsection
