const alias = document.getElementById("alias");
const fullName = document.getElementById("fullName");
const rut = document.getElementById("rut");
const gmail = document.getElementById("email");
const valias = document.getElementById("vAlias");
const vfullName = document.getElementById("vFullName");
const vrut = document.getElementById("vRut");
const vgmail = document.getElementById("vEmail");
const vCheckBox = document.getElementById("vCheckBox");

// let checkboxes = document.querySelectorAll('input[name="color"]:checked');
//Function

async function submitEve(e) {
  const checked = document.querySelectorAll('input[type="checkbox"]:checked');
  let howMetUs = "";

  if (fullName.value.length === 0) {
    fullName.style.borderColor = "red";
    vfullName.style.color = "red";
    vfullName.style.display = "block";
  } else {
    fullName.style.borderColor = "";
    vfullName.style.display = "none";
  }
  if (gmail.value.length === 0 || !validEmail.test(gmail.value)) {
    gmail.style.borderColor = "red";
    vgmail.style.color = "red";
    vgmail.style.display = "block";
  } else {
    gmail.style.borderColor = "";
    vgmail.style.display = "none";
  }
  if (alias.value.length < 5) {
    alias.style.borderColor = "red";
    valias.style.color = "red";
    valias.style.display = "block";
  } else {
    alias.style.borderColor = "";
    valias.style.display = "none";
  }
  if (!Fn.validaRut(rut.value)) {
    rut.style.borderColor = "red";
    vrut.style.color = "red";
    vrut.style.display = "block";
  } else {
    rut.style.borderColor = "";
    vrut.style.display = "none";
  }

  if (checked.length < 2) {
    vCheckBox.style.display = "block";
    vCheckBox.style.color = "red";
  } else {
    checked.forEach(
      (checkeds) => (howMetUs += `${checkeds.getAttribute("name")}, `)
    );
    vCheckBox.style.display = "none";
  }

  //   const validateRut = await fetch();
  if (
    fullName.value.length > 0 &&
    alias.value.length > 5 &&
    gmail.value.length > 0 &&
    validEmail.test(gmail.value) &&
    Fn.validaRut(rut.value) &&
    checked.length >= 2
  ) {
    howMetUs = howMetUs.slice(0, -2);
    await fetch(
      `${api}/voto.php?nombreyapellido=${fullName.value}&alias=${alias.value}&regionId=${region.value}&comunaId=${comuna.value}&candidatoId=${candidato.value}&conocio=${howMetUs}&rut=${rut.value}`,
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
      }
    )
      .then((res) => res.json())
      .then((data) => {
        if (data.OK) {
          alert("Votacion exitosa");
          (fullName.value = ""),
            (alias.value = ""),
            (howMetUs = ""),
            (rut.value = ""),
            (gmail.value = "");
        } else {
          alert(`Ya se realizo una votacion con el rut ${rut.value}`);
        }
      })
      .catch((err) => console.log(err));
  }
}
