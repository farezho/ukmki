function validateForm() {
  var x = document.forms["contactMe"]["email"].value;
  var y = document.forms["contactMe"]["messages"].value;

  x = x.replace(/^\s+|\s+$/g,"");
  y = y.replace(/^\s+|\s+$/g,"");

  if (x == "" || y == "") {
    alert("Email or messages must be filled out");
    return false;
  }else{
  	alert("Isi email: " + x + " || Isi pesan: " + y);
  	return true;
  }
}