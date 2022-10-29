let incit1 = document.currentScript.getAttribute('data-t1');
let incit2 = document.currentScript.getAttribute('data-t2');
let incit3 = document.currentScript.getAttribute('data-t3');
let incit4 = document.currentScript.getAttribute('data-t4');
    //-------------
    //- BAR CHART -
    //-------------

    const barChartCanvas = document.getElementById('barChart');

    let areaChartData = {
      labels  : ['1T', '2T', '3T', '4T'],
      datasets: [
        {
          label               : 'Incidencias',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [incit1, incit2, incit3, incit4]
        },
        // {
        //   label               : 'Averías',
        //   backgroundColor     : 'rgba(210, 214, 222, 1)',
        //   borderColor         : 'rgba(210, 214, 222, 1)',
        //   pointRadius         : false,
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [0, 0, 0, 0]
        // },
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