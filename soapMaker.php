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
              <input id="oilAmount" type="text" placeholder="Oil Amount (g)" class="validate" required />
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="waterScale">Water Scale (against oil amount)</label>
              <input id="waterScale" type="text" placeholder="Water Scale (against oil amount)" class="validate" required />
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
                <input id="oilPct" type="number" placeholder="Oil Percentage" class="validate" />
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

                <tbody id="oilBody"></tbody>
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
                <input id="additiveAmnt" type="number" placeholder="Additive Amount" class="validate" />
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

                <tbody id="additivesBody"></tbody>
              </table>
            </div>
          </div>
          <div class="row center" style="margin-top: 30px;">
            <button id="calculateBtn" class="btn-large waves-effect waves-light pink lighten-2" type="button">Calculate Cost</button>
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

            <tbody id="calculateBody">
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
    var imgType = "jpg";
    var selectedOil = [];
    var selectedAdditives = [];
    var allOil = [];
    var allAdditives = [];
    // for date usage
    function appendLeadingZeroes(n) {
      if (n <= 9) {
        return "0" + n;
      }
      return n;
    }
    // calculate soap formula
    function calculateSoap() {
      //   // clean the table
      $("#calculateBody").empty();
      //   // try to draw the table
      let ohTotal = 0,
        insTotal = 0,
        pctTotal = 0,
        oilTotal = 0;
      $.each(selectedOil, function(index, value) {
        let currentOil = getOilBasedOnId(value["id"]);
        let pct = parseFloat(value["pct"]);
        let oilAmount = pct * $("#oilAmount").val() / 100.0;
        let oh = 0;
        let ins = 0;
        if ($("#soapType").val() == 'solid') {
          oh = currentOil["NaOH"];
          ins = currentOil["INSsolid"];
        } else {
          oh = currentOil["KOH"];
          ins = currentOil["INSliquid"];
        }
        let ohAmnt = oh * oilAmount;
        let currentInsTotal = ins * pct / 100.0;
        ohTotal += ohAmnt;
        insTotal += currentInsTotal;
        pctTotal += pct;
        oilTotal += oilAmount;
        $("#calculateBody").append(
          `<tr>
              <td>${index+1}</td>
              <td>${currentOil["nameEng"]} ${currentOil["nameChi"]}</td>
              <td>${parseFloat(pct).toFixed(2)}</td>
              <td>${parseFloat(oilAmount).toFixed(2)}</td>
              <td>${parseFloat(oh).toFixed(2)}</td>
              <td>${parseFloat(ohAmnt).toFixed(2)}</td>
              <td>${ins}</td>
              <td>${parseFloat(currentInsTotal).toFixed(2)}</td>
            </tr>`
        );
      });
      $("#calculateBody").append(
        `<tr>
              <td></td>
              <td></td>
              <td>${parseFloat(pctTotal).toFixed(2)}</td>
              <td>${parseFloat(oilTotal).toFixed(2)}</td>
              <td></td>
              <td>${Math.round(ohTotal)}</td>
              <td></td>
              <td>${Math.round(insTotal)}</td>
            </tr>`
      );
      $("#calculateBody").append(
        `<tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>Water = </td>
              <td>${Math.round(ohTotal * parseFloat($("#waterScale").val()))}</td>
              <td></td>
            </tr>`
      );
      let grandTotal = Math.round(ohTotal) + oilTotal + Math.round(ohTotal * parseFloat($("#waterScale").val()));
      $("#calculateBody").append(
        `<tr>
              <td>Total Weight = ${Math.round(grandTotal)}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>`
      );
      $("#calculateBody").append(
        `<tr>
              <td>Actual Weight = </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>`
      );
    }
    // get data of oil based on id
    function getOilBasedOnId(id) {
      let index = allOil.map(s => `${s["id"]}`).indexOf(`${id}`);
      return allOil[index];
    }
    // get data of additives based on id
    function getAdditiveBasedOnId(id) {
      let index = allAdditives.map(s => `${s["id"]}`).indexOf(`${id}`);
      return allAdditives[index];
    }
    // update oil table
    function updateOilTable() {
      // sort alphabetical order
      selectedOil.sort(function(a, b) {
        return a.last_nom == b.last_nom ? 0 : +(a.last_nom > b.last_nom) || -1;
      });
      $("#oilBody").empty();
      $.each(selectedOil, function(index, value) {
        let currentOil = getOilBasedOnId(value["id"]);
        $("#oilBody").append(
          `<tr>
              <td>${index+1}</td>
              <td>${currentOil["nameEng"]} ${currentOil["nameChi"]}</td>
              <td>${value["pct"]}</td>
              <td>
                <button onclick="removeOil(${value["id"]})" class="waves-effect waves-light btn-small pink lighten-2" type="button">
                  Remove
                </button>
              </td>
            </tr>`
        );
      });
    }
    // update selector for oil
    function updateOilSelector() {
      let first = true;
      $("#oilName").empty();
      $.each(allOil, function(index, value) {
        if (!selectedOil.map(d => `${d["id"]}`).includes(`${value["id"]}`)) {
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
        }
      });
      $('select').formSelect();
    }
    // update additives table
    function updateAdditivesTable() {
      $("#additivesBody").empty();
      $.each(selectedAdditives, function(index, value) {
        let currentAdditive = getAdditiveBasedOnId(value["id"]);
        $("#additivesBody").append(
          `<tr>
              <td>${index+1}</td>
              <td>${currentAdditive["nameEng"]} ${currentAdditive["nameChi"]}</td>
              <td>${currentAdditive["price"]} / ${currentAdditive["amount"]}</td>
              <td>${value["amount"]}</td>
              <td>${(currentAdditive["price"] / currentAdditive["amount"] * value["amount"]).toFixed(2)}</td>
              <td>
                <button onclick="removeAdditive(${value["id"]})" class="waves-effect waves-light btn-small pink lighten-2" type="button">
                  Remove
                </button>
              </td>
            </tr>`
        );
      })
    }
    // update selector for additives
    function updateAdditivesSelector() {
      let first = true;
      $("#additiveName").empty();
      $.each(allAdditives, function(index, value) {
        if (!selectedAdditives.map(d => `${d["id"]}`).includes(`${value["id"]}`)) {
          if (first) {
            $("#additiveName").append(
              `<option value="${value['id']}" selected>${value['nameEng']} ${value['nameChi']}</option>`
            );
            first = false;
          } else {
            $("#additiveName").append(
              `<option value="${value['id']}">${value['nameEng']} ${value['nameChi']}</option>`
            );
          }
        }
      });
      $('select').formSelect();
    }
    // remove oil based on ID
    function removeOil(id) {
      let index = selectedOil.map(s => `${s["id"]}`).indexOf(`${id}`);
      selectedOil.splice(index, 1);
      updateOilTable();
      updateOilSelector();
    };
    // remove additive based on ID
    function removeAdditive(id) {
      let index = selectedAdditives.map(s => `${s["id"]}`).indexOf(`${id}`);
      selectedAdditives.splice(index, 1);
      updateAdditivesTable();
      updateAdditivesSelector();
    };
    $(document).ready(function() {
      $('.materialboxed').materialbox();
      // update oil selector after getting data from database
      $.ajax({
        type: "POST",
        url: "php/selectOil.php",
        data: {},
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          allOil = data;
          updateOilSelector();
        }
      });
      // update additives selector after getting data from database
      $.ajax({
        type: "POST",
        url: "php/selectAdditives.php",
        data: {},
        cache: false,
        success: function(data) {
          data = JSON.parse(data);
          allAdditives = data;
          updateAdditivesSelector();
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
        selectedOil.push({
          "id": $("#oilName").val(),
          "pct": $("#oilPct").val(),
        });
        updateOilTable();
        updateOilSelector();
      });
      // add additive
      $("#additiveBtn").click(function() {
        selectedAdditives.push({
          "id": $("#additiveName").val(),
          "amount": $("#additiveAmnt").val()
        });
        updateAdditivesTable();
        updateAdditivesSelector();
      });
      // calculate soap formula
      $("#calculateBtn").click(function() {
        calculateSoap();
      });
      // print soap and save history
      $("#printBtn").click(function() {
        // save history
        let today = new Date();
        $.ajax({
          type: "POST",
          url: "php/saveHistory.php",
          data: {
            "name": $("#name").val(),
            "description": $("#desc").val(),
            "mode": $("#soapType").val(),
            "oilAmount": $("#oilAmount").val(),
            "waterScale": $("#waterScale").val(),
            "timeMade": today.getFullYear() + "-" + appendLeadingZeroes(today.getMonth() + 1) + "-" + appendLeadingZeroes(today.getDate()),
            "imgPath": imgType,
            "selectedOil": JSON.stringify(selectedOil),
            "selectedAdditives": JSON.stringify(selectedAdditives),
          },
          cache: false,
          success: function(data) {
            console.log(data);
          }
        });
        // print soap
        let type = $("#soapType").val();
        let data1 = [];
        let data2 = [];
        // get additives table values
        let table = document.getElementById("additivesBody").children;
        $.each(table, function(index, row) {
          let tmp = [];
          $.each(row.children, function(index, cell) {
            tmp.push(cell.innerHTML);
          });
          data1.push(tmp);
        });
        // get result table values
        let table2 = document.getElementById("calculateBody").children;
        $.each(table2, function(index, row) {
          let tmp2 = [];
          $.each(row.children, function(index, cell) {
            tmp2.push(cell.innerHTML);
          });
          data2.push(tmp2);
        });
        $.ajax({
          type: "POST",
          url: "php/setSession.php",
          data: {
            "type": type,
            "data1": JSON.stringify(data1),
            "data2": JSON.stringify(data2),
          },
          cache: false,
          success: function(data) {
            if (data == "success") {
              window.open("php/printResult.php", "_blank");
            }
          }
        });
      });
      // get history if applicable
      setTimeout(function() {
        $.ajax({
          type: "POST",
          url: "php/selectOneHistory.php",
          data: {},
          cache: false,
          success: function(data) {
            if (data != "none") {
              data = JSON.parse(data);
              imgType = data["imgPath"].substring(data["imgPath"].indexOf(".") + 1);
              $("#image").attr("src", `images/tmp.${imgType}?rnd=${Math.random()}`);
              $("#name").val(data["name"]);
              $("#desc").val(data["description"]);
              $("#soapType").val(data["mode"]);
              $("#oilAmount").val(data["oilAmount"]);
              $("#waterScale").val(data["waterScale"]);
              selectedOil = data["selectedOil"];
              selectedAdditives = data["selectedAdditives"];
              calculateSoap();
              updateOilTable();
              updateOilSelector();
              updateAdditivesTable();
              updateAdditivesSelector();
            }
          }
        });
      }, 1000);
    });
  </script>
</body>

</html>