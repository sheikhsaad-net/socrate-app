<x-guest-layout>
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8" style="background-image:url('../assets/img/image-sign-up.jpg')">
                  <div class="my-auto text-start max-width-350 ms-7">
                    <h1 class="mt-3 text-white font-weight-bolder">Il tuo percorso <br> personale nella psicologia.</h1>
                    <p class="text-white text-lg mt-4 mb-4">Inserisci i tuoi dati per accedere a valutazioni psicologiche personalizzate, monitorare i tuoi progressi ed esplorare approfondimenti selezionati per la tua chiarezza mentale.</p>
                    <div class="d-flex align-items-center">
                      <div class="avatar-group d-flex">
                        <a class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Jessica Rowland">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg" class="">
                        </a>
                        <a class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg" class="rounded-circle">
                        </a>
                        <a class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Michael Lewis">
                          <img alt="Image placeholder" src="../assets/img/marie.jpg" class="rounded-circle">
                        </a>
                        <a class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg" class="rounded-circle">
                        </a>
                      </div>
                      <p class="font-weight-bold text-white text-sm mb-0 ms-2">Unisciti a oltre 2.5K+ utenti</p>
                    </div>
                  </div>
                  <div class="text-start position-absolute fixed-bottom ms-7">
                    <h6 class="text-white text-sm mb-5">Copyright © 2025 Socrate Design by Immensive.</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6 mb-2">Accedi</h3>
                  <p class="mb-3">Piacere di conoscerti! Inserisci i tuoi dati.</p>
                </div>
                <x-authentication-card>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <div class="mb-3">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>
                        <x-validation-errors class="mb-4" />
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Ricordami') }}</span>
                            </label>
                        </div>
                        @session('status')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ $value }}
                            </div>
                        @endsession
                        <div class="flex justify-center mt-4">
                            <x-button class="w-full text-center pt-3 pb-3">
                                {{ __('Sign Up') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-xs mx-auto">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                  </p>
                </div>
                </x-authentication-card>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</x-guest-layout>
