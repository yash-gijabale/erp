
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_developers ?></h3>

                <p>Total</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_projects ?></h3>

                <p>Close</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $total_structurs ?></h3>

                <p>In Progress</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_observations ?></h3>

                <p>Open NC</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  var myContext = document.getElementById( 
            "myChart").getContext('2d'); 
        var myChart = new Chart(myContext, { 
            type: 'bar', 
            data: { 
                labels: ["bike", "car", "scooter",  
                    "truck", "auto", "Bus"], 
                datasets: [{ 
                    label: 'worst', 
                    backgroundColor: "blue", 
                    data: [17, 16, 4, 11, 8, 9], 
                }, { 
                    label: 'Okay', 
                    backgroundColor: "green", 
                    data: [14, 2, 10, 6, 12, 16], 
                }, { 
                    label: 'bad', 
                    backgroundColor: "red", 
                    data: [2, 21, 13, 3, 24, 7], 
                }], 
            }, 
            options: { 
                plugins: { 
                    title: { 
                        display: true, 
                        text: 'Stacked Bar chart for pollution status' 
                    }, 
                }, 
                scales: { 
                    x: { 
                        stacked: true, 
                    }, 
                    y: { 
                        stacked: true 
                    } 
                } 
            } 
        }); 
</script>