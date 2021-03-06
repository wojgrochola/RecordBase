<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/sticky-footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Events_Base</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo $baseUri; ?>/index">Home</a></li>
          <li class="active"><a href="<?php echo $baseUri; ?>/save">Add Record </a> </li>
          <li><a href="#">Search</a></li>
          <li><a href="#">Info</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
           <?php if (isset($_SESSION['uid'])){ ?> 
              <li> <a href="<?php echo  $baseUri . '/userInfo'; ?>"> <span style="font-size:1.0em;" class="glyphicon glyphicon-user"> </span>  <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?> </a></li>
              <li><a href="<?php echo  $baseUri . '/logout'; ?>" ><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>

          <?php } else { ?>
              <li><a href="<?php echo  $baseUri . '/login2'; ?>" ><span class="glyphicon glyphicon-log-in"></span>  Login via Google</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container" class="row">
    <div  class="page-header" >
      <h1 >
      <span style="color:green" style="font-size:0.7em;" class="glyphicon glyphicon-plus" >  </span> 
       Dodaj nowe wydarzenie:
        </h1>
      </div>
    <div class="col-sm-3">
    </div>
    <div  class="col-sm-6" >
      <div  class="well">
              <form  class="form-horizontal"  method="post" action="<?php echo $baseUri; ?>/save">
                <input name="id" type="hidden" value="<?php echo $this->data['events']['id']; ?>" />

                <div class="form-group">
                  <label for="date" class="col-sm-2 control-label">Data:</label>
                  <div class="col-sm-8">
                    <input name="date" type="date" class="form-control" id="date" placeholder="Choose date" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="place" class="col-sm-2 control-label">Miejsce:</label>
                  <div class="col-sm-8">
                    <input  name="place" type="text" class="form-control" id="place" placeholder="Wpisz miejsce imprezy" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Tytuł:</label>
                  <div class="col-sm-8">
                    <input name="title" type="text" class="form-control" id="title" placeholder="Wpisz nazwę imprezy" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="author" class="col-sm-2 control-label">Autor:</label>
                  <div class="col-sm-8">
                    <input name="author" type="text" class="form-control" id="author" placeholder="Autor wpisu" required>
                  </div>
                </div>

                <div class="form-group">
                <label for="details" class="col-sm-2 control-label">Szczegóły:</label>
                <div class="col-sm-8">
                <textarea class="form-control" rows="4" id="comment"></textarea>
      </div> <!-- class well  -->
    </div>


                

                

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Dodaj</button>
                  </div>
                </div>
            </form>
          </div>
    </div>
    </div> <!-- containert -->

    <footer class="footer">
      <div class="container" class="row">
        <p class="text-muted">All right reserved - Wojciech Grochola</p>
      </div>
      </div>
  </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="publicjs/bootstrap.min.js"></script>
  </body>
</html>