

function post(val)
{
    val=val.id;
    let formElement = document.querySelector("form");
    let request = new XMLHttpRequest();
    request.open("POST","../app/controllers/"+val+".php");
    if (formElement != null) {
      let formData = new FormData(formElement);  
      request.send(formData);
    }
    else request.send();
    console.log(request);
}

function get(val)
{
  val=val.id;
  var request = new XMLHttpRequest();
  request.open("GET","../app/controllers/"+val+".php");
  request.send();
  console.log(val);
  
}
