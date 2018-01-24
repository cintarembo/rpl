<div class="row">
    <div class="col">
        <h3 class="page-title">Penjualan</h3>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="col"><h1></h1></div>
</div>

<script defer="defer">
    const charts = () => {

        // Initialize Charts Js
        const Init = (e) => {         
            let ctx = document.getElementById("myChart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }

        const data = (d) => {
            
        }

        return {
            init: Init
        };
    }

    setTimeout(() => {
        charts().init();
    }, 1);
</script>