<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quick-Fill Sandbagger</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-spy="scroll" data-target=".nav-primary">
    <div id="wrap" class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div id="carousel-head" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-head" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-head" data-slide-to="1"></li>
              <li data-target="#carousel-head" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active" style="background-image: url(http://placekitten.com/2000/400);">
              </div>
              <div class="item" style="background-image: url(http://placekitten.com/g/2000/400);">
              </div>
              <div class="item" style="background-image: url(http://placekitten.com/2002/400);">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <header id="nav-primary" class="navbar navbar-inverse" data-spy="affix" data-offset-top="350">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Quick-Fill Sandbagger</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#story">Story</a></li>
                  <li><a href="#options">Options</a></li>
                  <li><a href="#purchase">Purchase</a></li>
                  <li><a href="#contact">Contact</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div>
          </header>
        </div>
      </div>
      <div class="row buffer-bottom buffer-top">
        <div class="col-xs-6">
          <h2 id="story">About the Product</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis, risus a interdum imperdiet, orci erat scelerisque massa, id consequat justo felis et nulla. Curabitur ipsum tortor, ultrices id tincidunt eget, hendrerit viverra sem. Donec ut rhoncus orci. In faucibus pellentesque leo at dictum. Donec rhoncus, libero in pulvinar gravida, ante diam porttitor sem, eu tristique dolor purus iaculis metus. Vivamus blandit nisl ac mi pellentesque, vel molestie est iaculis. Suspendisse neque nibh, venenatis vitae iaculis ut, tristique ac orci. Pellentesque luctus a lorem eu ultrices. Etiam quis ullamcorper nibh, eget vestibulum neque. Duis nec semper velit. Vestibulum elementum urna nisi, aliquet eleifend libero suscipit sit amet. Pellentesque convallis lobortis massa, et ultricies erat suscipit ac.</p>
        </div>
        <div class="col-xs-6 dark buffer-bottom">
          <h2>Story</h2>
          <div class="row">
            <div class="col-xs-8">
              <p>Aenean condimentum massa non nisi varius porta. Quisque in metus mattis risus feugiat interdum. Vivamus adipiscing elit aliquam, tristique neque sit amet, convallis tellus. Integer libero turpis, bibendum sit amet ligula vel, interdum tempor dui. Fusce non sollicitudin augue, eget dapibus ante. Maecenas placerat dui dui. Nunc eu ullamcorper dolor. Duis aliquet auctor libero id varius.</p>
            </div>
            <div class="col-xs-4">
              <img class="pull-right" src="http://placedog.com/150/200" />
            </div>
          </div>
        </div>
      </div>
      <div id="options" class="row dark buffer-bottom">
        <div class="col-xs-3">
          <h3>Truck</h3>
          <div>
            <img src="http://placebear.com/200/200">
            <p>In varius non ipsum placerat mattis. Integer fringilla congue odio. Praesent vestibulum egestas augue, vel vehicula neque tempus a.</p>
          </div>
        </div>
        <div class="col-xs-3">
          <h3>Freestanding</h3>
          <div>
            <img src="http://placedog.com/g/200/200">
            <p>Nam congue, nisi eget pharetra aliquet, quam justo pretium mauris, ornare laoreet felis urna at est. Quisque auctor sem eget ultrices vulputate.</p>
          </div>
        </div>
        <div class="col-xs-3">
          <h3>Auger</h3>
          <div>
            <img src="http://flickholdr.com/200/200">
            <p>Nam sit amet libero hendrerit, molestie ante et, bibendum tellus. Etiam eget felis vitae sem vehicula posuere.</p>
          </div>
        </div>
        <div class="col-xs-3">
          <h3>Bags</h3>
          <div>
            <img src="http://placekitten.com/g/200/200">
            <p>Fusce vehicula diam a orci molestie posuere. Cras venenatis ultrices cursus.</p>
          </div>
        </div>
      </div>
      <div class="row buffer-bottom">
        <div class="col-xs-12">
          <h3 id="purchase">Purchase</h3>
          <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Auger</td>
                    <td>$123.45</td>
                    <td>1</td>
                    <td>$123.45</td>
                  </tr>
                  <tr>
                    <td>Bags</td>
                    <td>$12.34</td>
                    <td>20</td>
                    <td>$246.80</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>$370.25</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 dark buffer-bottom">
          <h3 id="contact">Contact</h3>
          <div class="row">
            <div class="col-md-4 col-md-offset-1 col-xs-10 col-xs-offset-1">
              <address>
                <h2 class="h3">Greg Schaefer</h2>
                <a href="mailto:greg@indmfg.net">greg@indmfg.net</a>
              </address>
            </div>
            <div class="col-md-4 col-md-offset-2 col-xs-10 col-xs-offset-1">
              <address>
                <h2 class="h3">Jerry VanHoosen</h2>
                <a href="mailto:jerry@indmfg.net">jerry@indmfg.net</a>
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

