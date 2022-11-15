// ======================

    //-------------
    //- BAR CHART -
    //-------------

    const barChartCanvas = document.getElementById('barChart');

    let incit1 = document.currentScript.getAttribute('data-t1');
    let incit2 = document.currentScript.getAttribute('data-t2');
    let incit3 = document.currentScript.getAttribute('data-t3');
    let incit4 = document.currentScript.getAttribute('data-t4');

    let evat1 = document.currentScript.getAttribute('data-t1b');
    let evat2 = document.currentScript.getAttribute('data-t2b');
    let evat3 = document.currentScript.getAttribute('data-t3b');
    let evat4 = document.currentScript.getAttribute('data-t4b');

    let areaChartData = {
      labels  : ['1T', '2T', '3T', '4T'],
      datasets: [
        {
          label               : 'Averías',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [incit1, incit2, incit3, incit4]
        },
        {
          label               : 'Evaluaciones',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [evat1, evat2, evat3, evat4]
        },
      ]
    }


    let barChartData = $.extend(true, {}, areaChartData)
    let temp0 = areaChartData.datasets[0]
    // let temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp0
    // barChartData.datasets[1] = temp1

    
    const barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


// ========================



// ===================

    //-------------
    //- PIE CHART -
    //-------------

const wheel = document.getElementById('wheel');

let averias = document.currentScript.getAttribute('data-averias');
let evaluaciones = document.currentScript.getAttribute('data-evaluaciones');
let cerradas = document.currentScript.getAttribute('data-cerradas');
let pendientes = document.currentScript.getAttribute('data-pendientes');

let totalIncidencias = averias+evaluaciones;

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
              'rgba(152, 224, 185, 0.7)',
              'rgba(255, 99, 132, 0.7)',
          ],
          borderColor: [
              'rgba(152, 224, 185, 1)',
              'rgba(255, 99, 132, 1)',
          ],
          borderWidth: 1,
          hoverOffset: 2,
      }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    }
});