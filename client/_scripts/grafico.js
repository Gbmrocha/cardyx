function configData(params) {

const ctx = document.getElementById('myChart');

  const data = {
    labels: [
      'Modelo 1',
      'Modelo 2',
      'Modelo 3',
      'Modelo 4'
    ],
    datasets: [{
      label: 'My First Dataset',
      //Bota os valores aqui no 'data'
      data: [params['totalTipo1'], params['totalTipo2'], params['totalTipo3'], params['totalTipo4']],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        '#ee82ee'
      ],
      hoverOffset: 4
    }]
  };
  
  const config = {
    type: 'pie',
    data: data,
    options:{
      plugins:{
        legend:{
          labels:{
            font:{
              size:14,
              family:"'Arial', sans-serif",
              
            }
          }
        }
      }
    }
  };
  const myChart = new Chart(ctx, config);
  
}