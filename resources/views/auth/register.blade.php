@extends('tablar::auth.layout')
@section('title', 'Inscription')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <img src="{{ asset('/assets/images/LogoMeetpe.png') }}" style="
        height: 100px;
        width: auto;"
                alt="Meetpe logo">
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Inscription</h2>
                @include('shared.input', [
                        'label' => 'Nom',
                        'name' => 'name',
                        'type' => 'name',
                    ])
                @include('shared.input', [
                        'label' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                    ])
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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

                <div class="mb-3">
                    <label class="form-label">Confirmez le mot de passe</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password"
                            autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password"
                                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}/>
                        Je veux être administrateur
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Vous avez déjà un  compte ? <a href="{{ route('login') }}" tabindex="-1">Se connecter</a>
        </div>
    </div>
@endsection
