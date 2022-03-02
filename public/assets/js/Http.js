function post(val)
{
    let formElement = document.querySelector("form");
    let request = new XMLHttpRequest();
    request.open("POST","../app/controllers/"+ val+".php");
    if (formElement != null) 
    {
        let formData = new FormData(formElement);  
        request.send(formData);
    }
    request.send();
    console.log(request);
}

function get(val)
{
  var request = new XMLHttpRequest();
  request.open("GET","../app/controllers/" +val+".php");
  request.send();

}