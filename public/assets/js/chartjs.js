const ctx = document.getElementById('chTipo');
const wheel = document.getElementById('wheel');

let averias = document.currentScript.getAttribute('data-averias');
let evaluaciones = document.currentScript.getAttribute('data-evaluaciones');
let cerradas = document.currentScript.getAttribute('data-cerradas');
let pendientes = document.currentScript.getAttribute('data-pendientes');

let totalIncidencias = averias+evaluaciones;

// ===================


const chTipo = new Chart(ctx, {
type: 'bar',
data: {
    labels: ['Avería', 'Evaluación'],
    datasets: [{
        label: 'Tipo de incidencia',
        data: [averias, evaluaciones],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
    }]
},
options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true,
        }
    }
}
});

// ===================

const data = {
    labels: ['Completadas', 'Pendientes'],
    datasets: [{
      label: 'Porcentaje completadas',
      data: [cerradas, pendientes],
      backgroundColor: [
        'rgb(0, 150, 0)',
        'rgb(200, 0, 0)',
      ],
      hoverOffset: 4
    }]
  };


// =========================================

const myChart = new Chart(wheel, {
  type: 'pie',
  data: {
      labels: ['Completadas','Pendientes'],
      datasets: [{
          label: 'Porcentaje completadas',
          data: [cerradas, pendientes],
          backgroundColor: [
              'rgba(152, 224, 185, 0.8)',
              'rgba(255, 99, 132, 0.8)',
              'rgba(54, 162, 235, 0.8)',
          ],
          borderColor: [
              'rgba(152, 224, 185, 1)',
              'rgba(255, 99, 132, 1)',
          ],
          borderWidth: 1,
      }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    }
});