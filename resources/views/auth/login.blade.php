<!-- login form -->

<div class="flash-message">
    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-'.$msg))
        <p class="alert alert-{{$msg}}">
            {{ Session::get('alert-'.$msg) }} <a href="#" class="close" data-dismiss="alert" 
            aria-label="close">&times;</a>
        </p>
        @endif
    @endforeach
</div>

    @if(count($errors) > 0)
    <div>
        <ul>
            @foreach(@errrs->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form method="post" action="{{ url('/login') }}">
    @csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="email" class="form-control" required />
    <label class="form-label" for="email">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" required />
    <label class="form-label" for="password">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" name="rememberme" id="rememberme" checked />
        <label class="form-check-label" for="rememberme"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
  </div>
</form>