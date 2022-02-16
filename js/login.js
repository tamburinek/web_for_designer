function kontrolajmeno(e) {

  let text = jmeno.value

  if (text.length > 4 && text.length < 13) {
    jmeno.classList.remove("chyba")
  } else {
    e.preventDefault()
    jmeno.classList.add("chyba")
  }
}


function kontrolaheslo(e) {

  let zkouska = heslo.value

  if (zkouska.length > 4 && text.length < 13) {
    heslo.classList.remove("chyba")
  } else {
    e.preventDefault()
    heslo.classList.add("chyba")
  }
}


let jmeno = document.querySelector("[name=jmeno]")
let heslo = document.querySelector("[name=heslo1]")
let form = document.querySelector("form")

jmeno.addEventListener("blur", kontrolajmeno)
heslo.addEventListener("blur", kontrolaheslo)

form.addEventListener("submit", kontrolajmeno)
form.addEventListener("submit", kontrolaheslo)
