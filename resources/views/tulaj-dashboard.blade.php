<form action="/tulaj-dashboard" method="POST">
    @csrf

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tulaj kaja felvitel</title>
        <link rel="stylesheet" href="{{asset('css/stilus.css')}}">
    </head>
    @csrf

     <div class="form-group">
    <label for="name">Neve:</label>
    <input type="string" class="form-control" name="nev" id="nev"  placeholder="Étel neve:">
  </div>

  <div class="form-group">
    <label for="name">Ár:</label>
    <input type="int" class="form-control" name="ar" id="ar"  placeholder="Ar:">
  </div>

  <div class="form-group">
    <label for="headquarters">Kategoria:</label>
    <input type="int" class="form-control" name="kategoriaid" id="kategoriaid"  placeholder="Tárgy azonosítója:">
  </div>



  <button type="submit" class="btn btn-primary">Étel hozzáadása</button>
</form>
