

function post(val)
{
    val=val.id;
    let formElement = document.querySelector("form");
    let request = new XMLHttpRequest();
    request.open("POST","../app/controllers/"+val+".php");
    if (formElement != null) {
      let formData = new FormData(formElement);  
      if (request.send(formData) === true)
      {
        request.open(window.location.href);
        alert(window.location.href);
      }
    }
    else request.send();
}

function get(val)
{
  val=val.id;
  var request = new XMLHttpRequest();
  request.open("GET","../app/controllers/"+val+".php");
 
 

}
