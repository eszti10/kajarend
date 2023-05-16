<form action="/bejelentkezesellenorzes" method="POST">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('css/stilus.css')}}">
    </head>
    @csrf
  <div class="form-group">
    <label for="felhasznalonev">Felhasználó név:</label>
    <input type="text" class="form-control" name="username" id="username"  placeholder="Felhasználó név:" required>
  </div>

  <div class="form-group">
    <label for="jelszo">Jelszó:</label>
    <input type="password" class="form-control" name="password" id="password"  placeholder="Jelszó" required>
  </div>

  @switch($hibakod)
      @case(1)
        <h2>Hibás adatok</h2>
          @break

          @case(2)
          <h2>Szerver hiba</h2>
          @break
  @endswitch

  <button type="submit" class="btn btn-primary">Belépés</button>
</form>
