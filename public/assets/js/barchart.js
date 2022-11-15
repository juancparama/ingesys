let avs = document.currentScript.getAttribute('data-av');
let evas = document.currentScript.getAttribute('data-ev');
const ctx = document.getElementById('chartTipo');

const chTipo = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ['Avería', 'Evaluación'],
      datasets: [{
          label: 'Total',
          data: [avs, evas],
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
      plugins: { legend: { display: false }, },
      scales: {
          y: {
              beginAtZero: true,
          }
      }
  }
  });