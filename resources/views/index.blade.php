<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>


    <title>Covid 19 Indonesia </title>
</head>
<body>
 
    <div class="container">
     <br/>
      <div class = "row">
        <div class = "col">
      <div class="card bg-warning text-white" style="width: 18rem;">
            <div class="card-body">
          <h5 class="card-title">Positif Indonesia</h5>
          <p class="card-text">@foreach ($positif as $jumlas)
            <h1> {{$jumlas}} </h1>
            @endforeach</p>
            </div>
        </div>
        </div>
        <div class = "col">
          <div class="card bg-danger text-white" style="width: 18rem;">
                <div class="card-body">
              <h5 class="card-title">Meninggal Indonesia</h5>
              <p class="card-text">@foreach ($meninggal as $jumlas)
                <h1> {{$jumlas}} </h1>
                @endforeach</p>
                </div>
            </div>
        </div>
        <div class = "col">
            <div class="card bg-success text-white" style="width: 18rem;">
              <div class="card-body">
            <h5 class="card-title">Sembuh Indonesia</h5>
            <p class="card-text">@foreach ($sembuh as $jumlas)
              <h1> {{$jumlas}} </h1>
              @endforeach</p>
              </div>
          </div>
        </div>
      
      </div>
        <br/>
      <div class = "row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Positif</th>
                    <th scope="col">Sembuh</th>
                    <th scope="col">Meninggal</th>
                   
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                @foreach ($data as $datas) 
                @php 
                $no++; 
                @endphp
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{ $datas['Provinsi'] }}</td>
                    <td>{{ $datas['Kasus_Posi'] }}</td>
                    <td>{{ $datas['Kasus_Semb'] }}</td>
                    <td>{{ $datas['Kasus_Meni'] }}</td>
                  </tr>
                @endforeach 
                </tbody>
              </table>
      
      </div>
      <div class="row">
          
          {!! $chart->container() !!}
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
          {!! $chart->script() !!}
      </div>
      <br/>
</div>
</body>
</html>