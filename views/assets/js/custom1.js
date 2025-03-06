google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
const color = document.querySelectorAll(".color")
const range = document.querySelectorAll(".range")
const name = document.querySelectorAll(".name")
const mark = document.querySelectorAll(".mark")
const markContent = document.querySelectorAll(".mark_content")
const doughnutChart = document.querySelector(".doughnut_chart")
const submitButton = document.querySelector(".submit_button")

let inRanges
let outRanges = [0, 0, 0]
let totalrange
let rotateNum
let deg1
let deg2
let deg3

function setChart() {
  doughnutChart.style.background = `conic-gradient( ${color[0].value}  0%  ${outRanges[0]}%,  ${color[1].value} ${outRanges[0]}%  ${outRanges[1]}%,  ${color[2].value} ${outRanges[1]}%  ${outRanges[2]}%, #fff  ${outRanges[2]}% 100%)`
}

function writeMark() {
  for (let i = 0; i < markContent.length; i++) {
    markContent[i].innerHTML = name[i].value + `<br/>(${range[i].value}%)`
  }
}

function rotateMark(rotateNum, rotateRange) {
  mark[rotateNum].style.transform = `translate(-50%) rotate(${rotateRange * 1.8}deg)`
  markContent[rotateNum].style.transform = `translateX(-50%) rotate(${-rotateRange * 1.8}deg)`
}

submitButton.addEventListener("click", function () {
  inRanges = []
  for (let i = 0; i < range.length; i++) {
    inRanges.push(Number(range[i].value))
  }

  if (inRanges[0] + inRanges[1] + inRanges[2] > 100) {
    alert("합산이 100%를 초과합니다.")
  } else {
    outRanges[0] = 0
    outRanges[1] = 0
    outRanges[2] = 0
    writeMark()
    const increas1 = setInterval(function () {
      if (outRanges[0] == inRanges[0]) {
        clearTimeout(increas1)
      } else {
        outRanges[0]++
        setChart()
        rotateMark(0, outRanges[0])
      }
    }, 10)
    const increas2 = setInterval(function () {
      if (outRanges[1] == outRanges[0] + inRanges[1]) {
        clearTimeout(increas2)
      } else {
        outRanges[1]++
        setChart()
        totalrange = outRanges[0] + outRanges[1]
        rotateMark(1, totalrange)
      }
    }, 10)
    const increas3 = setInterval(function () {
      if (outRanges[2] == outRanges[1] + inRanges[2]) {
        clearTimeout(increas3)
      } else {
        outRanges[2]++
        setChart()
        totalrange = outRanges[1] + outRanges[2]
        rotateMark(2, totalrange)
      }
    }, 10)
  }
})
