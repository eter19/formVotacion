const region = document.getElementById("region");
const comuna = document.getElementById("comuna");
const candidato = document.getElementById("candidato");
const regiones = async () => {
  await fetch(`${api}/region.php`, {
    headers: { "Content-Type": "application/json" },
  })
    .then((res) => res.json())
    .then((data) => {
      for (const iterator of data) {
        const option = document.createElement("option");
        option.value = iterator.id;
        option.text = iterator.name;
        region.appendChild(option);
      }
    });

  await fetch(`${api}/comuna.php?id=${region.value}`, {
    headers: { "Content-Type": "application/json" },
  })
    .then((res) => res.json())
    .then((data) => {
      let html = "";
      for (const iterator of data) {
        document.createElement("option");
        html += `<option value=${iterator.IdComuna}>${iterator.NombreComuna}</option>`;
      }

      comuna.innerHTML = html;
    });
};
const comunas = async () => {
  let html = "";
  comuna.disabled = false;
  await fetch(`${api}/comuna.php?id=${region.value}`, {
    headers: { "Content-Type": "application/json" },
  })
    .then((res) => res.json())
    .then((data) => {
      for (const iterator of data) {
        // const option = document.createElement("option");
        html += `<option value=${iterator.IdComuna}>${iterator.NombreComuna}</option>`;
      }

      comuna.innerHTML = html;
    });
};
const candidatos = async () => {
  await fetch(`${api}/candidato.php`, {
    headers: { "Content-Type": "application/json" },
  })
    .then((res) => res.json())
    .then((data) => {
      for (const iterator of data) {
        const option = document.createElement("option");
        option.value = iterator.id;
        option.text = iterator.nombre;
        candidato.appendChild(option);
      }
    });
};
candidatos();
regiones();
