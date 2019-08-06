Chart.pluginService.register({
  beforeDraw: function (chart) {
      var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
      ctx.restore();
      var fontSize = (height / 114).toFixed(2);
      ctx.font = fontSize + "em sans-serif";
      ctx.textBaseline = "middle";
      var text = chart.config.options.elements.center.text,
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
      ctx.fillText(text, textX, textY);
      ctx.save();
  }
});

// chart1
var data = {
  labels: ["green", "white"],
  datasets: [{
      data: [50, 50],
      backgroundColor: ["#FF6384", "#36A2EB"],
      hoverBackgroundColor: ["#FF6384", "#36A2EB"]
  }]
};
var promisedDeliveryChart = new Chart(document.getElementById('myChart1'), {
  type: 'doughnut',
  data: data,
  options: {
      elements: {
          center: {
              text: '50%'  //set as you wish
          }
      },
      cutoutPercentage: 75,
      legend: {
          display: false
      }
  }
});

// chart2
var data = {
  labels: ["Blue", "white"],
  datasets: [{
      data: [75, 25],
      backgroundColor: ["#FF6384", "#36A2EB"],
      hoverBackgroundColor: ["#FF6384", "#36A2EB"]
  }]
};
var promisedDeliveryChart = new Chart(document.getElementById('myChart2'), {
  type: 'doughnut',
  data: data,
  options: {
      elements: {
          center: {
              text: '75%'  //set as you wish
          }
      },
      cutoutPercentage: 75,
      legend: {
          display: false
      }
  }
});
var data = {
  labels: ["Red", "white"],
  datasets: [{
      data: [70, 30],
      backgroundColor: ["#FF6384", "#36A2EB"],
      hoverBackgroundColor: ["#FF6384", "#36A2EB"]
  }]
};
var promisedDeliveryChart = new Chart(document.getElementById('myChart3'), {
  type: 'doughnut',
  data: data,
  options: {
      elements: {
          center: {
              text: '75%'  //set as you wish
          }
      },
      cutoutPercentage: 75,
      legend: {
          display: false
      }
  }
});