<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Laravel</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

   <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

   <!-- Styles -->
   <style>
      html, body {
         background-color: white;
         color: #636b6f;
         font-family: 'Raleway', sans-serif;
         font-weight: 100;
         margin: 0;
      }

      .full-height {
         height: 100vh;
      }

      .flex-center {
         align-items: center;
         display: flex;
         justify-content: center;
      }

      .position-ref {
         position: relative;
      }

      .top-right {
         position: absolute;
         right: 10px;
         top: 18px;
      }

      .content {
         text-align: center;
      }

      .title {
         font-size: 84px;
      }

      .links > a {
         color: #636b6f;
         padding: 0 25px;
         font-size: 12px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: uppercase;
      }

      .m-b-md {
         margin-bottom: 30px;
      }

      .card1 {
         box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
         transition: 0.3s;
         background-color: darkgreen;
         width: auto;
         height: 335px;
         margin-left: auto;
         margin-right: auto;
      }

      .card1:hover {
         /*box-shadow: 0 32px 16px 0 rgba(0,0,0,0.2);*/
         box-shadow: 10px 10px black;
      }
      .image{
         height: 200px;
         display: block;
         margin-left: auto;
         margin-right: auto;

         width: 50%;
         border-radius: 4px;
         padding: 5px;
      }

      .imageholder{
         padding-top: 25px;
      }

      .cardheader{
         padding-top: 15px;
         text-shadow: whitesmoke;
         font-size: x-large;
      }


   </style>
</head>
<body style="width: auto;height: auto;">
<div>
   @include('include.navbar')
</div>
   <div class="row" style="margin-top: 20px">
      <div class="col-md-4 text-center">
         <h2 class="display-5 text-center" style="font-size:3vw;">
            <strong>Inventory is now online</strong>
         </h2>

      </div>
      <div class="col-md-4">
         <h2 class="display-5 text-center" style="font-size:3vw;">
            <strong>Get the supplier details easily</strong>
         </h2>


      </div>
      <div class="col-md-4">
         <h2 class="display-5 text-center" style="font-size:3vw;">
            <strong>Generate monthly reports easily</strong>
         </h2>


      </div>
   </div>
<div class="container" style="margin-top: 50px;">
   <div class="row">
      <div class="card-deck">
      {{--orders--}}
               <div class="col-md-4">
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Request your needs here</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Order the items you request from the Inventory</strong></h4><br>
                        <a  class="btn btn-primary btn-lg"  aria-pressed="true" href="orders/create">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Pending Orders :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['pending']}}</button></h4>
                     </div>

                  </div>
               </div>

               {{--stationary items--}}
               <div class="col-md-4" >
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Stationery Items</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/stationary">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['items']}}</button></h4>
                     </div>

                  </div>
               </div>

               <div class="col-md-4">
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Laboratary Equipments</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/labs">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['labs']}}</button></h4>
                     </div>
                  </div>

                </div>
      </div>
      <div class="row" style="margin-top: 20px;">
            <div class="card-deck">
               <div class="col-md-4">
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Sports items</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/sports">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['sports']}}</button></h4>
                     </div>

                  </div>
               </div>


               <div class="col-md-4" >
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>School Resources</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/resource">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" name="resources" disabled>{{$data['resources']}}</button></h4>
                     </div>

                  </div>
               </div>

               {{--sports items--}}
               <div class="col-md-4">
                  <div class="card1">
                     <div class="card-header" style="background-color: black;height: 90px">
                        <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Supplier Details and Monthly Expenses</strong></h3>
                     </div>
                     <div class="card-body text-center">
                        <h4 style="color: white"><strong>Check the supplier details</strong></h4><br>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/supplier">Enter</a>
                        <h4 style="color: white;font-family: sans-serif">Monthly Expenses</h4>
                        <a class="btn btn-primary btn-lg" aria-pressed="true" href="/expenses">Enter</a>
                     </div>

                  </div>

               </div>
            </div>
      </div>
   </div>
</div>



   <footer style="margin-top: 30px">
      @include('include.footer')
   </footer>


</body>
</html>
