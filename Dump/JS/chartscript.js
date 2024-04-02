// Source: w3 schools   https://www.w3schools.com/js/tryit.asp?filename=trychartjs_bars_colors_more 

const xValues = ["Chrome", "Firefox", "Edge", "Other"];
const yValues = [12, 5, 3, 4];
const barColors = ["#fff18f", "#de425b","#353c8f","#488f31"];

new Chart("myChart", {
  type: "horizontalBar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Number of Users"
    }
  }
});
