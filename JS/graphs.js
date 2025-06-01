// const xValues = [2019, 2020, 2021, 2022, 2023];
// const yValues = [25, 38, 35, 45, 50, 15];
// const barColors = ["#0098FF", "#5600FF", "blue", "green", "orange"];

// new Chart("yearStudents", {
//   type: "bar",
//   data: {
//     labels: xValues,
//     datasets: [
//       {
//         backgroundColor: barColors,
//         data: yValues,
//       },
//     ],
//   },
//   options: {
//     legend: { display: false },
//     title: {
//       display: true,
//       text: "Total Fees Collections As Per Each Year",
//     },
//   },
// });

// const aValues = ["Male", "Female"];
// const bValues = [55, 55];
// const genderColors = ["#0096FF", "#5800FF"];

// new Chart("genderStudents", {
//   type: "doughnut",
//   data: {
//     labels: aValues,
//     datasets: [
//       {
//         backgroundColor: genderColors,
//         data: bValues,
//       },
//     ],
//   },
//   options: {
//     title: {
//       display: true,
//       text: "Number of Students As Per Gender",
//     },
//   },
// });

const pValues = ["BCA", "BSc", "BCom"];
const qValues = [500, 150, 100];
const courseColors = ["#b91d47", "#00aba9", "#712cf9"];

new Chart("courseStudents", {
  type: "doughnut",
  data: {
    labels: pValues,
    datasets: [
      {
        backgroundColor: courseColors,
        data: qValues,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Number of Students As Per Course",
    },
  },
});

// const mValues = ["BCA", "BSc", "BCom"];
// const nValues = [500, 150, 100];
// const semColors = ["#712cf9", "#712313", "#ffffas"];

// new Chart("semStudents", {
//   type: "pie",
//   data: {
//     labels: mValues,
//     datasets: [
//       {
//         backgroundColor: semColors,
//         data: nValues,
//       },
//     ],
//   },
//   options: {
//     title: {
//       display: true,
//       text: "Number of Students As Per Course",
//     },
//   },
// });
