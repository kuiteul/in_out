@extends('/layout/template')

@section('title')
    IN OUT | Login page
@endsection

@section('content')
    <!-- Début de la page html-->
    <div class="container-fluid login-block col">
        <!-- Block renfermant tous les autres blocks réduit à une largeur col-sm-6 -->
        <div class="main col-11 offset-1 col-sm-6 offset-sm-3">
            <!-- Premier étage de la page login -->
            <div>
                <h1 class="title text-center fw-bold">GESTION DES TICKETS</h1>
            </div>
            <!-- Deuxième étage de la page login -->
            <div class="form-block row">
                <div class="col-12 text-white">
                    <span id="enterprise-name">AMT CAMEROUN SA</span>
                </div>
                
                <form action="{{url('login')}}" class="col-12 login-form " method="POST">
                    <div class="col-12">
                        <div class="form text-center col-12 title title-login ">
                            Page de connexion
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-input-login col-8 offset-2 ">
                            <div class="input-group mb-3">
                                <span class="input-group-text span-login col-3 text-white text-center" id="inputGroup-sizing-default">Login </span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                    placeholder="Entrer votre adresse email" name="email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text span-login text-white col-3" id="inputGroup-sizing-default">Mot de passe </span>
                                <input type="password" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                    placeholder="Entrer votre mot de passe" name="password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-end forgot-pass col-sm-4 offset-sm-8">
                                <a href="forgot_password">Mot de passe oublié ?</a>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" class="btn-login col-8 offset-2" value="Se connecter">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection