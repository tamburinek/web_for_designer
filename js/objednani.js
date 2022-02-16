/*kontrola jména na délku*/
function kontrolajmeno(e) {

  let text = jmeno.value

  if (text.length > 4 && text.length < 13) {
    jmeno.classList.remove("chyba")
    jmeno.classList.add("spravne")
  } else {
    e.preventDefault()
    jmeno.classList.add("chyba")
    jmeno.classList.remove("spravne")
  }
}
/*kontrola emailu na délku a zda obsahuje zavináč*/
function kontrolaemail(e) {

  let textik = email.value

  if (textik.indexOf("@") > 2 && textik.includes("@") && textik.includes(".") && textik.length > 4) {
    email.classList.remove("chyba")
    email.classList.add("spravne")
  } else {
    e.preventDefault()
    email.classList.add("chyba")
    email.classList.remove("spravne")
  }
}
/*kontrola hesla na délku*/
function kontrolaheslo(e) {

  let zkouska = heslo.value

  if (zkouska.length > 4 && zkouska.length < 13) {
    heslo.classList.remove("chyba")
    heslo.classList.add("spravne")
  } else {
    e.preventDefault()
    heslo.classList.add("chyba")
    heslo.classList.remove("spravne")
  }
}
/*kontrola zda zadaná hesla jsou totožná*/
function kontrolahesel(e) {
  let heslo3 = heslo.value
  let heslo4 = heslo2.value

  if (heslo3===heslo4) {
    heslo2.classList.remove("chyba")
    heslo2.classList.add("spravne")
  } else {
    e.preventDefault()
    heslo2.classList.add("chyba")
    heslo2.classList.remove("spravne")
  }
}
/*zavedení*/
let jmeno = document.querySelector("[name=jmeno]")
let email = document.querySelector("[name=email]")
let heslo = document.querySelector("[name=heslo1]")
let heslo2 = document.querySelector("[name=heslo2]")
let form = document.querySelector("form")
/*kontrola*/
email.addEventListener("blur", kontrolaemail)
jmeno.addEventListener("blur", kontrolajmeno)
heslo.addEventListener("blur", kontrolaheslo)
heslo2.addEventListener("blur", kontrolahesel)
form.addEventListener("change", kontrolahesel)

form.addEventListener("submit", kontrolajmeno)
form.addEventListener("submit", kontrolaemail)
form.addEventListener("submit", kontrolaheslo)
form.addEventListener("submit", kontrolahesel)
