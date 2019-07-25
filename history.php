<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Jia Jia Handmade Soap</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
  <nav class="pink darken-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Jia Jia</a>
      <ul class="right hide-on-med-and-down">
        <li class=""><a href="soapMaker.php">Jia Jia Soap Maker</a></li>
        <li class=""><a href="dbms.php">Jia Jia Database</a></li>
        <li class="active"><a href="#">Jia Jia Soap Maker History</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="soapMaker.php" class="">Jia Jia Soap Maker</a></li>
        <li><a href="dbms.php" class="">Jia Jia Soap Database</a></li>
        <li><a href="#" class="active">Jia Jia Soap Maker History</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">
          Jia Jia Soap Maker History
        </h5>
      </div>
      <div class="row" id="cardContainer">
      </div>
    </div>
  </div>
  <footer class="page-footer pink lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Jia Jia Handmade Soap Bio</h5>
          <p class="grey-text text-lighten-4">
            We are a team of college students working on this project like
            it's our full time job. Any amount would help support and continue
            development on this project and is greatly appreciated.
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Copyright &copy 2019 by
        <a class="pink-text text-lighten-4" href="http://materializecss.com">Jia Jia Handmade Soap</a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    $(document).ready(function() {
      $('select').formSelect();
      $('.materialboxed').materialbox();
      var history = [];
      // get all history
      $.ajax({
        type: "POST",
        url: "php/selectHistory.php",
        data: {},
        cache: false,
        success: function(data) {
          history = JSON.parse(data);
          $.each(history, function(index, value) {
            $("#cardContainer").append(
              `<div class="col s12 m6" id="history${value["id"]}">
                <div class="card medium">
                  <div class="card-image">
                    <img src="${value["imgPath"]}">
                    <span class="card-title black-text">${value["name"]}</span>
                  </div>
                  <div class="card-content">
                    <p>Made on ${value["timeMade"]}</p>
                    <p>${value["description"]}</p>
                  </div>
                  <div class="card-action center">
                    <button id="historyBtn${value["id"]}" class="waves-effect waves-light btn-small pink lighten-2" type="button">
                      Load Soap History
                    </button>
                  </div>
                </div>
              </div>`
            );
            $(`#historyBtn${value["id"]}`).click(function() {
              $.ajax({
                type: "POST",
                url: "php/setIdSession.php",
                data: {
                  id: value["id"],
                },
                cache: false,
                success: function(data) {
                  if (data == "success") {
                    location.href = "soapMaker.php";
                  } else {
                    alert("Selected history is currently not available.");
                  }
                }
              });
            });
          });
        }
      });
    });
  </script>
</body>

</html>