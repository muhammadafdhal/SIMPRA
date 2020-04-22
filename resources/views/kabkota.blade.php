<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indonesia</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="col-lg-4">
        <h2>Laravel 5.5 JQuery Ajax Example</h2>
        @csrf
          <div class="form-group">
            <label for="">Your Provinces</label>
            <select class="form-control" name="kabkota" id="kabkota">
              <option value="0" disable="true" selected="true">=== Select Provinces ===</option>
                @foreach ($kabkota as $key => $value)
                  <option value="{{$value->kabkota_id}}">{{ $value->kabkota_nama}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Your Districts</label>
            <select class="form-control" name="kec" id="kec">
              <option value="0" disable="true" selected="true">=== Select Districts Dahulu ===</option>
            </select>
          </div>

        
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      $('#kabkota').on('change', function(e){
        console.log(e);
        var id_kabkota = e.target.value;
        $.get('/json-kec?id_kabkota=' + id_kabkota,function(data) {
          console.log(data);
          $('#kec').empty();
          $('#kec').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

          $.each(data, function(index, kecObj){
            $('#kec').append('<option value="'+ kecObj.kabkota_id +'">'+ kecObj.kabkota_nama +'</option>');
          })
        });
      });


    </script>
  </body>
</html>