const fishForm = document.getElementById('fishForm');
const album = document.getElementById('album');
const filtro = document.getElementById('filtro');
const exportar = document.getElementById('exportar');

let registros = [];

fishForm.addEventListener('submit', function (e) {
  e.preventDefault();

  const nombre = document.getElementById('nombre').value;
  const especie = document.getElementById('especie').value;
  const tamaño = document.getElementById('tamaño').value;
  const imagen = document.getElementById('imagen').files[0];

  const reader = new FileReader();
  reader.onload = function () {
    const data = {
      nombre,
      especie,
      tamaño,
      imagen: reader.result,
    };
    registros.push(data);
    localStorage.setItem('registrosPeces', JSON.stringify(registros));
    mostrarRegistros();
    fishForm.reset();
  };
  if (imagen) reader.readAsDataURL(imagen);
});

function mostrarRegistros() {
  album.innerHTML = '';
  const filtroValor = filtro.value.toLowerCase();

  registros
    .filter((r) => r.especie.toLowerCase().includes(filtroValor))
    .forEach((r) => {
      const card = document.createElement('div');
      card.classList.add('card');
      card.innerHTML = `
        <h3>${r.nombre}</h3>
        <p><strong>Especie:</strong> ${r.especie}</p>
        <p><strong>Tamaño:</strong> ${r.tamaño}</p>
        <img src="${r.imagen}" alt="${r.nombre}" />
      `;
      album.appendChild(card);
    });
}

filtro.addEventListener('input', mostrarRegistros);
exportar.addEventListener('click', () => {
  const blob = new Blob([JSON.stringify(registros)], { type: 'application/json' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'registro_peces.json';
  a.click();
});
function aplicarFiltros() {
  const nombre = document.getElementById('busqueda_nombre').value;
  const ordenar = document.getElementById('ordenar_por').value;

  window.location.href = `index.php?nombre=${nombre}&ordenar=${ordenar}`;
}


window.onload = function () {
  const dataGuardada = localStorage.getItem('registrosPeces');
  if (dataGuardada) registros = JSON.parse(dataGuardada);
  mostrarRegistros();
};
