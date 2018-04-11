
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/backend/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/backend/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Restaudent | Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/backend/css/bootstrap.min.css" rel="stylesheet" />
    
  </head>
  <body>
    <div class="container">    
      <div class="jumbotron">
        <h1 class="text-center">Food Booking System</h1> 
        <p class="text-center">BigAct Restaurant</p> 
      </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <form action="{{ route('login')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>  
            </form>
            @include('parts.messages')
        </div>
      </div>
    </div>    




    <!--   Core JS Files   -->
    <script src="/backend/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/backend/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>