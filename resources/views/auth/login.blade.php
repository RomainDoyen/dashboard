<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
  <title>Login</title>
</head>
<body>
  <div class="box">
    <div class="card">
      <h4 class="title">Log In!</h4>
      <form method="post" action="">
        @csrf
        @method('POST')
        <label class="field" for="logemail">
          <span class="input-icon">@</span>
          <input
            autocomplete="off"
            id="email"
            placeholder="Email"
            class="input-field"
            name="email"
            type="email"
          />
        </label>
        <label class="field" for="logpass">
          <svg
            class="input-icon"
            viewBox="0 0 500 500"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"
            ></path>
          </svg>

          <input
            id="password"
            placeholder="Password"
            class="input-field"
            name="password"
            type="password"
          />
        </label>
        <button class="btn" type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>