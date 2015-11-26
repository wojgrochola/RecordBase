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
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>

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
          <li class="active"><a href="#">Home</a></li>
          <li><a href="<?php echo $baseUri; ?>/save">Add Record </a> </li>
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

    <div class="container">
      <div class="page-header">
      <?php if (isset($_SESSION['uid'])){ ?> 
          <h1> Witaj, <?php echo $_SESSION['firstName']; ?>. </h1>
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Gratulacje!</strong> Jesteś zalogwoany, możesz zarządzać wydarzeniami.
            </div>  
      <?php } else { ?>
           <h1> Witaj, użytkowniku. </h1>
           <div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           
                <strong>Jesteś niezalogowany!</strong> Aby w pełni korzystać z serwisu, zaloguj się przy użyciu konta Google.
            </div>  
      <?php } ?>
      </div>
      
    

    <div class="panel-group" id="accordion">
      <h3> Zapisane wydarzenia: </h3>
      <hr class="divider">

      <?php foreach ($this->data['events'] as $c): ?> <!-- start PHP foreach-->
         <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <div class="row">
                  <div class="col-sm-3" >
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $c['id']; ?>">
                    <span style="font-size:1.2em;" class="glyphicon glyphicon-pushpin">  </span> 
                    <strong><?php echo '   ' . $c['title']; ?> </strong>

                   </a>
                  </div>

                  <div class="col-sm-2" >
                   
                    <span class="glyphicon glyphicon-calendar"></span> 
                    <?php echo '   ' . $c['date']; ?>
                  </div>
                </div>

              </h2>
            </div>
            <div id="<?php echo $c['id']; ?>" class="panel-collapse collapse out">
              <div class="panel-body" class="row">
              <div class="col-sm-3">
              <div class="well">
              <h4> <span style="font-size:1.2em;" class="glyphicon glyphicon-map-marker"> </span> <?php echo $c['place']; ?>  </h4>
              <h4> <span style="font-size:1.2em;" class="glyphicon glyphicon-time"> </span> n/a  </h4>
              <h4> <span style="font-size:1.2em;" class="glyphicon glyphicon-user"> </span> <?php echo $c['author']; ?>  </h4>
            </div>
              </div>
              <div class="col-sm-5">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
              <hr class="divider">

              <div class="text-right">
                <a href="<?php echo $baseUri; ?>/save/<?php echo $c['id']; ?>" data-ajax="false" data-inline="true" data-role="button" data-icon="edit" data-mini="true" data-theme="a">
                  <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> Update</button>
                </a>
                <a href="<?php echo $baseUri; ?>/delete/<?php echo $c['id']; ?>" data-ajax="false" data-inline="true" data-role="button" data-icon="delete" data-mini="true" data-theme="a">
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                </a>
              </div>
            </div>
            <div class="text-right" class="col-sm-2" >
             
            </div>
            </div>
            </div>
          </div>
      <?php endforeach; ?><!--  End PHP foreach -->
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