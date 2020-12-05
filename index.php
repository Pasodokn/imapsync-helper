<!DOCTYPE html>
<html lang="en" id="doc">
  <head>
    <header style="float: right;">
      <a class="link" href="https://github.com/Pasodokn/imapsync-helper" target="_blank">gst-imapsync</a> || 
      <a class="link" href="https://github.com/Pasodokn/" target="_blank">Pasodokn</a>
    </header>
    <title>IMAPSync Helper</title>
    <meta name="description" content="A tool to generate the imapsync command">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body>
    <h1>Email Migration Tool</h1>
    <main id="main">
      <div>
        <form style="width: 100%; overflow: hidden; padding: 12px;">
          <div class="custombg" style="width: 45%; float: left; padding: 12px;">
            <h3>Source</h3>
            <h2>Server / Hostname:</h2>
            <input class="custom" name="host1" id="host1" type="text" maxlength="100" placeholder="Host 1">
            <h2>Email Address:</h2>
            <input class="custom" name="user1" id="user1" type="email" maxlength="75" placeholder="User 1" onchange="updateCPUser();">
            <h2>Password:</h2>
            <input class="custom" name="pass1" id="pass1" type="text" maxlength="50" placeholder="Pass 1" onchange="updateCPPass();">
            <div>
              <br>Port
              <input class="custom" name="port1" id="port1" type="number" maxlength="5" placeholder="Port 1" style="width: 65px;">
              <br>SSL
              <input id=ssl1 name="ssl1" type="checkbox" style="width: unset;">
            </div>
            <h2 class="bold">Presets:</h2>
            <select id="type1" onchange="setType1();">
              <option>Other</option>
              <option>Google / GSuite</option>
              <option>Office 365</option>
            </select>
          </div>
          <div class="custombg" style="margin-left: 50%; width: 45%; padding: 12px;">
            <h3>Destination</h3>
            <h2>Server / Hostname:</h2>
            <input class="custom" name="host2" id="host2" type="text" maxlength="100" placeholder="Host 2">
            <h2>Email Address:</h2>
            <input class="custom" name="user2" id="user2" type="email" maxlength="75" placeholder="User 2">
            <input type="checkbox" name="cpuser" id="cpuser">
            <h2>Password:</h2>
            <input class="custom" name="pass2" id="pass2" type="text" maxlength="50" placeholder="Pass 2">
            <input type="checkbox" name="cppass" id="cppass">
            <div>
              <br>Port
              <input class="custom" name="port2" id="port2" type="number" maxlength="5" placeholder="Port 2" style="width: 65px;">
              <br>SSL
              <input id=ssl2 name="ssl2" type="checkbox" style="width: unset;">
              <br><br><br>
            </div>
          </div>
        </form>
      </div>
    <div style="text-align: center; padding-top: 20px;">
      <button id="submit" onclick="updateCommand();" style="background-color: green;">Update</button>
      <input class="custom" id="result" type="text" style="width: 70%;">
      <button id="copy">Copy text</button>
      <input class="cbutton" type="submit" value="Run Test" onclick="syncRequest(document.getElementById('result').value);" id="runtest" style="background-color: red;">
    </div>
    <div style="width: 30%; float: left; position: absolute;">
      <br><br><br><br>
      <table>
        <tr>
          <th class="tableHead">Recent Tests</th>
        </tr>
        <tr>
          <th>$logEmailAcc1</th>
          <th>$logEmailResults1</th>
        </tr>
        <tr>
          <th>$logEmailAcc2</th>
          <th>$logEmailResults2</th>
        </tr>
        <tr>
          <th>$logEmailAcc3</th>
          <th>$logEmailResults3</th>
        </tr>
      </table>
    </div>
    <div id="tdetails" style="width: 60%; float: right;">
      <br><br><br>
      <table>
        <tr>
          <th class="tableHead">Test Details</th>
        </tr>
        <tr>
          <th>IMAPSYNC:</th>
          <th>$accResult</th>
        </tr>
        <tr>
          <th>Account Size: </th>
          <th>$accDisk</th>
        </tr>
        <tr>
          <th>Emails: </th>
          <th>$accEmails</th>
        </tr>
        <tr>
          <th>Estimated Time: </th>
          <th>$accETA</th>
        </tr>
        <tr>
          <th>Date/Time: </th>
          <th id="logtime"></th>
        </tr>
        <tr>
          <th id="log">PLACEHOLDER</th>
        </tr>
      </table>
    </div>
    <script>
      $("#copy").on('click', function() {
          copytext = document.getElementById("result");
          copytext.select();
          document.execCommand("copy");
        });
    </script>
    <script>
      $(function() {
        $("#runtest").hide();
        $("#tdetails").hide();
        $("#runtest").on('click', function() {
          $("#tdetails").show(400);
        });
      });
    </script>
    </main>
  </body>
</html>
