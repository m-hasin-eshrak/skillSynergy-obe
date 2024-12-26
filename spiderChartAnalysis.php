<?php
include 'db.php';
include "getPLOData.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Synergy</title>

    <link rel="stylesheet" href="commonStdDashboard.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="std-menu-bar">
        <ul>
            <li class="hello"><a href="student_dashboard.php">Home</a></li>
            <li><a href="coWisePlo.php">CO wise PLO Analysis</a></li>
            <li><a href="spiderChartAnalysis.php" target="_self">Spider Chart Analysis</a></li>
        </ul>
    </div>
    <div>
        <select name="courseID" class="select1" id="CSECourseSelection-3">
            <option disabled selected>Select Course</option>
            <option value="CSC101">CSE472</option>
            <option value="CSE203">CSE203</option>
            <option value="CSE303">MIS341</option>
        </select>
    </div>
    <div>
        <button class="plo" onclick="showPLOGraph()">PLO Analysis</button>
        <button class="co" onclick="showCOGraph()">CO Analysis</button>
    </div>

    <div class="chart-container">
        <div id="chart-container-PLO" class="chart-container-PLO">
        </div>
        <div id="chart-container-CO" class="chart-container-CO">
        </div>
    </div>

    <script>
        /* PLO SPIDER GRAPH START */

        let chartObjectPlo;

        function generateRandomData() {
            // Generates random data for PLO (0-100)
            const data = [];
            for (let i = 0; i < 4; i++) {
                data.push(Math.floor(Math.random() * 101));
            }
            return data;
        }

        function createGraphPlo(data, courseId) {
            const ctxSpider = document.getElementById(`spiderPLO-${courseId}`);
            new Chart(ctxSpider, {
                type: 'radar',
                data: {
                    labels: ['PLO2', 'PLO3', 'PLO4', 'PLO6'],
                    datasets: [{
                        label: 'PLO Achieved',
                        data: data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            angleLines: {
                                display: false
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                width: "500px",
            });
            chartObjectPlo = ctxSpider;
        }

        function createCanvasElementPlo(id) {
            const canvasWrapper = document.getElementById("chart-container-PLO");
            const canvas = document.createElement("canvas")
            canvas.setAttribute("id", `spiderPLO-${id}`);
            canvasWrapper.appendChild(canvas);
        }

        function showPLOGraph() {
            let courseId = document.getElementById("CSECourseSelection-3").value;
            document.getElementById("chart-container-PLO").innerHTML = "";
            createCanvasElementPlo(courseId);

            document.getElementById("chart-container-PLO").style.backgroundColor = "#fff";
            const data = generateRandomData();
            createGraphPlo(data, courseId);
        }

        /* CO SPIDER GRAPH START */

        let chartObjectCo;

        function createGraphCo(data, courseId) {
            const ctxSpiderCo = document.getElementById(`spiderCO-${courseId}`);
            new Chart(ctxSpiderCo, {
                type: 'radar',
                data: {
                    labels: ['CO1', 'CO2', 'CO3', 'CO4'],
                    datasets: [{
                        label: 'CO Achieved',
                        data: data,
                        borderWidth: 1,
                        backgroundColor: 'rgb(255,165,0,0.5)'
                    }]
                },
                options: {
                    scales: {
                        r: {
                            angleLines: {
                                display: false
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                width: "500px",
            });
            chartObjectCo = ctxSpiderCo;
        }

        function createCanvasElementCo(id) {
            const canvasWrapper = document.getElementById("chart-container-CO");
            const canvas = document.createElement("canvas")
            canvas.setAttribute("id", `spiderCO-${id}`);
            canvasWrapper.appendChild(canvas);
        }

        function showCOGraph() {
            let courseId = document.getElementById("CSECourseSelection-3").value;
            document.getElementById("chart-container-CO").innerHTML = "";
            createCanvasElementCo(courseId);

            document.getElementById("chart-container-CO").style.backgroundColor = "#fff";
            const data = generateRandomData();
            createGraphCo(data, courseId);
        }
    </script>

</body>

</html>
