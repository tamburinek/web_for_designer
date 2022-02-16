/*kontrola zda je komentář dlouhý maximálně 120 symbolů*/
function kontrolakoment(e) {

  let text = komentar.value

  if (text.length < 121) {
    komentar.classList.remove("chyba")
  } else {
    e.preventDefault()
    komentar.classList.add("chyba")
  }
}



let komentar = document.querySelector("[name=koment]")
let form = document.querySelector("form")

komentar.addEventListener("blur", kontrolakoment)
form.addEventListener("submit", kontrolakoment)
