<?php
session_start();
include("php/config.php");
// reset tmp images
copy('images/sample-1.jpg', 'images/tmp.jpeg');
copy('images/sample-1.jpg', 'images/tmp.jpg');
copy('images/sample-1.jpg', 'images/tmp.png');
?>

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
        <li class="active"><a href="#">Jia Jia Soap Maker</a></li>
        <li class=""><a href="dbms.php">Jia Jia Database</a></li>
        <li class=""><a href="history.php">Jia Jia Soap Maker History</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#" class="active">Jia Jia Soap Maker</a></li>
        <li><a href="dbms.php" class="">Jia Jia Soap Database</a></li>
        <li><a href="history.php" class="">Jia Jia Soap Maker History</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">
          Jia Jia Soap Maker
        </h5>
      </div>
      <div class="row">
        <h6 class="header col s12 light">
          Soap Information
        </h6>
      </div>
      <div class="row">
        <form id="soapInfo" class="col s12">
          <img id="image" class="materialboxed" style="max-width: 450px; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: 30px" src="images/sample-1.jpg">
          <div class="row">
            <div class="file-field input-field col s12">
              <div class="waves-effect waves-light btn-small pink lighten-2">
                <span>Upload Image</span>
                <input id="uploadFile" type="file" accept="image/jpeg, image/png, image/jpg">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" disabled>
              </div>
            </div>
            <div class="input-field col s12">
              <input placeholder="Soap Name" value="" id="name" type="text" class="active validate" required />
              <label for="name">Soap Name</label>
            </div>

            <div class="input-field col s12">
              <textarea id="desc" class="materialize-textarea"></textarea>
              <label for="desc">Soap Description</label>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <h6 class="header col s12 light">
          Soap Ingredients
        </h6>
      </div>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <select id="soapType">
                <option value="solid">Solid Soap</option>
                <option value="liquid">Liquid Soap</option>
              </select>
              <label>Soap Type</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="oilAmount">Oil Amount (g)</label>
              <input id="oilAmount" type="number" placeholder="Oil Amount (g)" class="validate" required />
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="waterScale">Water Scale (against oil amount)</label>
              <input id="waterScale" type="number" placeholder="Water Scale (against oil amount)" class="validate" required />
            </div>
          </div>
          <div class="card-panel pink lighten-5">
            <div class="row">
              <div class="input-field col s12 m4">
                <select id="oilName">
                </select>
                <label>Oil Name</label>
              </div>
              <div class="input-field col s12 m4">
                <label for="oilPct">Oil Percentage</label>
                <input id="oilPct" type="number" placeholder="Oil Percentage" class="validate" required />
              </div>
              <div class="input-field col s12 m4">
                <button id="oilBtn" type="button" class="waves-effect waves-light btn-small pink lighten-2">
                  Add Oil
                </button>
              </div>
            </div>
            <div class="row">
              <table class="responsive-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Oil Name</th>
                    <th>Percentage (%)</th>
                    <th>Remove Oil</th>
                  </tr>
                </thead>

                <tbody id="oilBody">
                  <tr>
                    <td>1</td>
                    <td>棕榈油</td>
                    <td>80</td>
                    <td>
                      <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                        Remove
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>椰子油</td>
                    <td>10</td>
                    <td>
                      <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                        Remove
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>红椰子油</td>
                    <td>10</td>
                    <td>
                      <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                        Remove
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
          <div class="card-panel pink lighten-5" style="margin-top: 50px;">
            <div class="row">
              <div class="input-field col s12 m4">
                <select id="additiveName">
                  <option value="1" selected>Red Additive 红添加物</option>
                  <option value="2">Green Additive 绿添加物</option>
                </select>
                <label>Additive Name</label>
              </div>
              <div class="input-field col s12 m4">
                <label for="additiveAmnt">Additive Amount (g / ml)</label>
                <input id="additiveAmnt" type="number" placeholder="Additive Amount" class="validate" required />
              </div>
              <div class="input-field col s12 m4">
                <button id="additiveBtn" type="button" class="waves-effect waves-light btn-small pink lighten-2">
                  Add Additive
                </button>
              </div>
            </div>
            <div class="row">
              <table class="responsive-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Additive Name</th>
                    <th>Original Cost (RM)</th>
                    <th>Amount used (g / ml)</th>
                    <th>Price (RM)</th>
                    <th>Remove Additive</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>棕榈添加物</td>
                    <td>80.00 / 1000.0 g</td>
                    <td>500.0</td>
                    <td>7.00</td>
                    <td>
                      <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                        Remove
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row center" style="margin-top: 30px;">
            <button id="calculateBtn" class="btn-large waves-effect waves-light pink lighten-2">Calculate Cost</a>
          </div>
        </form>
        <div class="row">
          <table class="responsive-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Oil Name</th>
                <th>Percentage (%)</th>
                <th>Oil Amount (g)</th>
                <th>Saponification Price</th>
                <th id="headerOH">NaOH Amount(g)</th>
                <th>INS Value</th>
                <th>Total INS</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>棕榈油</td>
                <td>80</td>
                <td>
                  <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>椰子油</td>
                <td>10</td>
                <td>
                  <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                    Remove
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>红椰子油</td>
                <td>10</td>
                <td>
                  <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
                    Remove
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="row center" style="margin-top: 30px;">
          <button id="printBtn" class="btn-large waves-effect waves-light pink lighten-2">Make Soap Now!</a>
        </div>
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
      var imgType = "jpg";
      var selectedOil = {};
      var selectedAdditives = {};
      $('.materialboxed').materialbox();
      // update oil selector
      $.ajax({
        type: "POST",
        url: "php/selectOil.php",
        data: {},
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          let first = true;
          $.each(data, function(index, value) {
            if (first) {
              $("#oilName").append(
                `<option value="${value['id']}" selected>${value['nameEng']} ${value['nameChi']}</option>`
              );
              first = false;
            } else {
              $("#oilName").append(
                `<option value="${value['id']}">${value['nameEng']} ${value['nameChi']}</option>`
              );
            }
          });
          $('select').formSelect();
        }
      });
      // upload image mechanism
      document.querySelector('#uploadFile').addEventListener('change', function() {
        // This is the file user has chosen
        let file = this.files[0];
        let data = new FormData();
        data.append(0, file);
        $.ajax({
          processData: false,
          contentType: false,
          type: "POST",
          url: "php/uploadImage.php",
          data: data,
          cache: false,
          success: function(data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
              imgType = data.msg;
              $("#image").attr("src", `images/tmp.${imgType}?rnd=${Math.random()}`);
            } else alert(data.msg);
          }
        });
      });
      // NaOH / KOH on change
      $("#soapType").change(function() {
        if ($("#soapType").val() == 'solid') {
          $("#headerOH").html('NaOH Amount(g)');
        } else {
          $("#headerOH").html('KOH Amount(g)');
        }
      });
      // add oil
      $("#oilBtn").click(function() {
        $
        // <tr>
        //             <td>1</td>
        //             <td>棕榈油</td>
        //             <td>80</td>
        //             <td>
        //               <button class="waves-effect waves-light btn-small pink lighten-2" type="button">
        //                 Remove
        //               </button>
        //             </td>
        //           </tr>

      });
    });
  </script>
</body>

</html>