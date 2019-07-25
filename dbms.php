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
        <li class="active"><a href="#">Jia Jia Database</a></li>
        <li class=""><a href="history.php">Jia Jia Soap Maker History</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="soapMaker.php" class="active">Jia Jia Soap Maker</a></li>
        <li><a href="#" class="active">Jia Jia Soap Database</a></li>
        <li><a href="history.php" class="">Jia Jia Soap Maker History</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">
          Jia Jia Soap Database
        </h5>
      </div>
      <div class="row">
        <h6 class="header col s12 light">
          Oil Information
        </h6>
      </div>
      <!-- panel for oil information -->
      <div class="card-panel pink lighten-5">
        <div class="row">
          <div class="input-field col s12 m6">
            <label for="oilChi">Oil Name (Chinese)</label>
            <input id="oilChi" type="text" placeholder="Oil Name (Chinese)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="oilEng">Oil Name (English)</label>
            <input id="oilEng" type="text" placeholder="Oil Name (English)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="naoh">NaOH Value</label>
            <input id="naoh" type="number" placeholder="NaOH Value" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="koh">KOH Value</label>
            <input id="koh" type="number" placeholder="KOH Value" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="insSolid">INS Value (Solid)</label>
            <input id="insSolid" type="number" placeholder="INS Value (Solid)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="insLiquid">INS Value (Liquid)</label>
            <input id="insLiquid" type="number" placeholder="INS Value (Liquid)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="cost">Cost (RM / 1000 g)</label>
            <input id="cost" type="number" placeholder="Cost (RM / 1000 g)" class="validate" />
          </div>
          <div class="input-field col s12 center">
            <button id="oilBtn" type="button" class="waves-effect waves-light btn-small pink lighten-2">
              Save Oil
            </button>
          </div>
        </div>
        <div class="row">
          <table class="responsive-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Oil Name (Chinese)</th>
                <th>Oil Name (English)</th>
                <th>NaOH Value</th>
                <th>KOH Value</th>
                <th>INS Value (Solid)</th>
                <th>INS Value (Liquid)</th>
                <th>Cost (RM / 1000 g)</th>
                <th>Remove</th>
              </tr>
            </thead>

            <tbody id="oilBody">
            </tbody>
          </table>
        </div>
      </div>
      <!-- end panel for oil information -->
      <div class="row">
        <h6 class="header col s12 light">
          Additive Information
        </h6>
      </div>
      <!-- panel for additive information -->
      <div class="card-panel pink lighten-5">
        <div class="row">
          <div class="input-field col s12 m6">
            <label for="additiveChi">Additive Name (Chinese)</label>
            <input id="additiveChi" type="text" placeholder="Additive Name (Chinese)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="additiveEng">Additive Name (English)</label>
            <input id="additiveEng" type="text" placeholder="Additive Name (English)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="additiveCost">Cost (RM)</label>
            <input id="additiveCost" type="number" placeholder="Cost (RM)" class="validate" />
          </div>
          <div class="input-field col s12 m6">
            <label for="additiveAmnt">Amount (g / ml)</label>
            <input id="additiveAmnt" type="number" placeholder="Amount (g / ml)" class="validate" />
          </div>
          <div class="input-field col s12 center">
            <button id="additiveBtn" type="button" class="waves-effect waves-light btn-small pink lighten-2">
              Save Additives
            </button>
          </div>
        </div>
        <div class="row">
          <table class="responsive-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Additive Name (Chinese)</th>
                <th>Additive Name (English)</th>
                <th>Cost (RM)</th>
                <th>Amount (g / ml)</th>
                <th>Remove</th>
              </tr>
            </thead>

            <tbody id="additivesBody">
            </tbody>
          </table>

        </div>
      </div>
      <!-- end panel for additive information -->
      <div class="row center" style="margin-top: 30px;">
        <a href="php/printDatabase.php" target="_blank" id="printBtn" class="btn-large waves-effect waves-light pink lighten-2">Print Database</a>
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
    // update oil fields
    var selectOneOil = function(id) {
      $.ajax({
        type: "POST",
        url: "php/selectOneOil.php",
        data: {
          id: id,
        },
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          $("#oilChi").val(data["nameChi"]);
          $("#oilEng").val(data["nameEng"]);
          $("#naoh").val(data["NaOH"]);
          $("#koh").val(data["KOH"]);
          $("#insSolid").val(data["INSsolid"]);
          $("#insLiquid").val(data["INSliquid"]);
          $("#cost").val(data["price"]);
        }
      });
    };
    // update additive fields
    var selectOneAdditive = function(id) {
      $.ajax({
        type: "POST",
        url: "php/selectOneAdditive.php",
        data: {
          id: id,
        },
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          $("#additiveChi").val(data["nameChi"]);
          $("#additiveEng").val(data["nameEng"]);
          $("#additiveCost").val(data["price"]);
          $("#additiveAmnt").val(data["amount"]);
        }
      });
    };
    // remove oil based on ID
    var removeOil = function(id, nameChi, nameEng) {
      if (confirm(`Are you sure you want to remove ${nameChi} (${nameEng}) ?`))
        $.ajax({
          type: "POST",
          url: "php/removeOil.php",
          data: {
            id: id,
          },
          cache: false,
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
              location.reload(true);
            } else {
              alert(data.msg);
            }
          }
        });
    };
    // remove additive based on ID
    var removeAdditive = function(id, nameChi, nameEng) {
      if (confirm(`Are you sure you want to remove ${nameChi} (${nameEng}) ?`))
        $.ajax({
          type: "POST",
          url: "php/removeAdditive.php",
          data: {
            id: id,
          },
          cache: false,
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
              location.reload(true);
            } else {
              alert(data.msg);
            }
          }
        });
    };
    $(document).ready(function() {
      $('select').formSelect();
      $('.materialboxed').materialbox();
      // update oil table
      $.ajax({
        type: "POST",
        url: "php/selectOil.php",
        data: {},
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          $.each(data, function(index, value) {

            $("#oilBody").append(
              `<tr id='oil${value["id"]}'>
              <td>${index+1}</td>
              <td>${value["nameChi"]}</td>
              <td>${value["nameEng"]}</td>
              <td>${value["NaOH"]}</td>
              <td>${value["KOH"]}</td>
              <td>${value["INSsolid"]}</td>
              <td>${value["INSliquid"]}</td>
              <td>${value["price"]}</td>
              <td>
                <button onclick="removeOil(${value["id"]}, '${value["nameChi"]}', '${value["nameEng"]}')" class="waves-effect waves-light btn-small pink lighten-2" type="button">
                  Remove
                </button>
              </td>
            </tr>`
            );
            $(`#oil${value["id"]}`).click(function() {
              selectOneOil(value["id"]);
            });
          });
        }
      });
      // update additives table
      $.ajax({
        type: "POST",
        url: "php/selectAdditives.php",
        data: {},
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          $.each(data, function(index, value) {
            $("#additivesBody").append(
              `<tr id='additive${value["id"]}'>
              <td>${index+1}</td>
              <td>${value["nameChi"]}</td>
              <td>${value["nameEng"]}</td>
              <td>${value["price"]}</td>
              <td>${value["amount"]}</td>
              <td>
                <button onclick="removeAdditive(${value["id"]}, '${value["nameChi"]}', '${value["nameEng"]}')" class="waves-effect waves-light btn-small pink lighten-2" type="button">
                  Remove
                </button>
              </td>
            </tr>`
            );
            $(`#additive${value["id"]}`).click(function() {
              selectOneAdditive(value["id"]);
            });
          });
        }
      });
      $("#oilBtn").click(function() {
        // send request
        $.ajax({
          type: "POST",
          url: "php/addOil.php",
          data: {
            oilChi: $("#oilChi").val(),
            oilEng: $("#oilEng").val(),
            naoh: $("#naoh").val(),
            koh: $("#koh").val(),
            insSolid: $("#insSolid").val(),
            insLiquid: $("#insLiquid").val(),
            cost: $("#cost").val(),
          },
          cache: false,
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == "success") {
              location.reload(true);
            } else {
              alert(data.msg);
            }
          }
        });
      });
      $("#additiveBtn").click(function() {
        // send request
        $.ajax({
          type: "POST",
          url: "php/addAdditive.php",
          data: {
            additiveChi: $("#additiveChi").val(),
            additiveEng: $("#additiveEng").val(),
            additiveCost: $("#additiveCost").val(),
            additiveAmnt: $("#additiveAmnt").val(),
          },
          cache: false,
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == "success") {
              location.reload(true);
            } else {
              alert(data.msg);
            }
          }
        });
      });
    });
  </script>
</body>

</html>