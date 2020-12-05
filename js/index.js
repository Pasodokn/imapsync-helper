function setType1() {
  let e = document.getElementById('type1').options[document.getElementById('type1').selectedIndex].text;

  if (e == "Google / GSuite") {
    document.getElementById("host1").value = "imap.gmail.com";
    document.getElementById("port1").value = "993";
    document.getElementById("ssl1").value.checked = true;
  } else
  if (e == "Other") {
    document.getElementById("host1").value = "";
    document.getElementById("port1").value = "993";
    document.getElementById("ssl1").checked = true;
  } else
  if (e == "Office 365") {
    document.getElementById("host1").value = "outlook.office365.com";
    document.getElementById("port1").value = "993";
    document.getElementById("ssl1").checked = true;
  }
}

function updateCPUser() {
  if (document.getElementById("cpuser").checked === true)
    document.getElementById("user2").value = document.getElementById("user1").value;
};

function updateCPPass() {
  if (document.getElementById("cppass").checked === true)
    document.getElementById("pass2").value = document.getElementById("pass1").value;
};

function updateCommand() {
  //Reset the result box
  let command = "";

  let host1 = document.getElementById('host1').value;
  let user1 = document.getElementById('user1').value;
  let pass1 = document.getElementById('pass1').value;
  let port1 = document.getElementById('port1').value;
  let host2 = document.getElementById('host2').value;
  let user2 =document.getElementById('user2').value;
  let pass2 = document.getElementById('pass2').value;
  let port2 = document.getElementById('port2').value;
  let ssl1 = document.getElementById('ssl1').checked;
  let ssl2 = document.getElementById('ssl2').checked;

  let fields ={
    host1: host1, 
    user1: user1, 
    port1: port1, 
    host2: host2, 
    user2: user2, 
    port2: port2
  };

  Object.keys(fields).forEach(function(key) {
    if (fields[key] == "")
      console.log("Field \'" + key + "\' is empty.")
    else
      command += " --" + key + " " + fields[key]; 
  })

  if (pass1 == "") {
    console.log("Field \'password1\' is empty.")
    _pass1 = "";
  } else _pass1 = " --password1 " + pass1;

  if (pass2 == "") {
    console.log("Field \'password2\' is empty.")
    _pass2 = "";
  } else _pass2 = " --password2 " + pass2;

  if (ssl1 == true)
    _ssl1 = " --ssl1";
  else _ssl1 = "";
  
  if (ssl2 == true)
    _ssl2 = " --ssl2";
  else _ssl2 = "";

  command += _pass1 + _pass2 + _ssl1 + _ssl2;

  updateResult(command);
};

function updateResult(command) {
  document.getElementById('result').value = "imapsync" + command;
  $(function() {
    //$("#runtest").show(500);
  });
};
