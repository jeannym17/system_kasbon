/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Ecommerce Dashboard Js
 */


var options = {
    chart: {
      height: 345,
      type: 'bar',
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '30%',
      },
    },
    colors: ['#9fc1fa'],
    dataLabels: {
        enabled: false
    },
    
    
    stroke: {
        show: true,
        width: 2,
    },
    series: [{
        name: 'Jumlah',
        data: kasbon
    }],
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November",
     "Desember",],
    
    yaxis: {
      labels: {      
        offsetX: -12,
        offsetY: 0,      
      }
    },
    grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 3,
      xaxis: {
          lines: {
              show: false
          }
      },   
      yaxis: {
          lines: {
              show: true,
          }
      },
    }, 
    legend: {
     show: false
    },
    tooltip: {
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    yaxis: {
        labels: {
            formatter: function (value) {
                return  value ;
            }
        },
    },
    yaxis: {
      min: (min) => {
        console.log(`Min value: ${min}`);
        return min;
      },
      max: (max) => {
        console.log(`Max value: ${max}`);
        return max;
      }
    },
    fill: {
      opacity: 1,
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#kasbon"), options);
  chart.render();


  var options = {
    chart: {
      height: 345,
      type: 'bar',
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '30%',
      },
    },
    colors: ['#9fc1fa'],
    dataLabels: {
        enabled: false
    },
    
    
    stroke: {
        show: true,
        width: 2,
    },
    series: [{
        name: 'Jumlah',
        data: nonkasbon
    }],
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November",
     "Desember",],
    
    yaxis: {
      labels: {      
        offsetX: -12,
        offsetY: 0,      
      }
    },
    
    grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 3,
      xaxis: {
          lines: {
              show: false
          }
      },   
      yaxis: {
          lines: {
              show: true,
          }
      },
    }, 
    legend: {
     show: false
    },
    tooltip: {
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    yaxis: {
        labels: {
            formatter: function (value) {
              return val.toFixed(2)
            }
        },
    },
    yaxis: {
      min: (min) => 0,
      max: (max) => 10
    },
    fill: {
      opacity: 1,
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#nonkasbon"), options);
  chart.render();

  var options = {
    chart: {
      height: 345,
      type: 'bar',
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '30%',
      },
    },
    colors: ['#9fc1fa'],
    dataLabels: {
        enabled: false
    },
    
    
    stroke: {
        show: true,
        width: 2,
    },
    series: [{
        name: 'Jumlah',
        data: pertanggungan
    }],
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November",
     "Desember",],
    
    yaxis: {
      labels: {      
        offsetX: -12,
        offsetY: 0,      
      }
    },
    grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 3,
      xaxis: {
          lines: {
              show: false
          }
      },   
      yaxis: {
          lines: {
              show: true,
          }
      },
    }, 
    legend: {
     show: false
    },
    tooltip: {
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    yaxis: {
        labels: {
            formatter: function (value) {
                return  value ;
            }
        },
    },
    yaxis: {
      min: (min) => 0,
      max: (max) => 10
    },
    fill: {
      opacity: 1,
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#pertanggungan"), options);
  chart.render(); 

var options = {
  chart: {
      height: 270,
      type: 'donut',
  }, 
  plotOptions: {
    pie: {
      donut: {
        size: '85%'
      }
    }
  },
  dataLabels: {
    enabled: false,
  },

  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
 
  series: [50, 25, 25,],
  legend: {
    show: true,
    position: 'bottom',
    horizontalAlign: 'center',
    verticalAlign: 'middle',
    floating: false,
    fontSize: '13px',
    offsetX: 0,
    offsetY: 0,
  },
  labels: [ "Mobile","Tablet", "Desktop" ],
  colors: ["#2a76f4","rgba(42, 118, 244, .5)","rgba(42, 118, 244, .18)"],
 
  responsive: [{
      breakpoint: 600,
      options: {
        plotOptions: {
            donut: {
              customScale: 0.2
            }
          },        
          chart: {
              height: 240
          },
          legend: {
              show: false
          },
      }
  }],
  tooltip: {
    y: {
        formatter: function (val) {
            return   val + " %"
        }
    }
  }
  
}

var chart = new ApexCharts(
  document.querySelector("#ana_device"),
  options
);

chart.render();




  // saprkline chart


var dash_spark_1 = {
    
  chart: {
      type: 'area',
      height: 50,
      sparkline: {
          enabled: true
      },
  },
  stroke: {
      curve: 'smooth',
      width: 1.5
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#e3ebf6',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.5,
        opacityTo: 0.5,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 16, 5, 11, 6, 11, 30, 10, 13, 4, 6, 3, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#e3ebf6'],
  tooltip: {
    show: false,
  }
}
new ApexCharts(document.querySelector("#dash_spark_1"), dash_spark_1).render();


