let user = document.querySelector("[name=jmeno]")
let varovani = document.querySelector("#varovani")

function kontrola(e) {
  let name = user.value
  let url = encodeURI("ajax.php?user="+ name)
  let xhr = new XMLHttpRequest()
  xhr.open("GET", url, true)
  xhr.send()
  xhr.addEventListener("load", odpoved)
}

function odpoved(e) {
  let xhr = e.target
  let color
  console.log(xhr.responseText.trim())
  if(xhr.responseText.trim() == "0"){
    color="red"
    varovani.classList.remove("hide")
    varovani.classList.add("hlaska")
  }else{
    color="green"
    varovani.classList.add("hide")
    varovani.classList.remove("hlaska")
  }
  user.style.borderColor = color
}
user.addEventListener("blur",kontrola)
