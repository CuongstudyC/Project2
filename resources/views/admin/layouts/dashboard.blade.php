<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $orders_newInDay }}</h3>

              <p style="font: 20px;">Các đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $sum_ordersInDay }} VNĐ</h3>

              <p style="font: 20px;">Tổng danh thu được trong ngày</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $usersNumber }}</h3>

              <p style="font: 20px;">Người dùng đã đăng ký</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $sum_total }} VNĐ</h3>

              <p style="font:20px;">Tổng Doanh thu</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>

      <section class="col-lg-7 connectedSortable" style="margin:2% auto;">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Sales
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart"
                   style="position: relative; height: 300px;">
                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
               </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
              </div>
            </div>
          </div><!-- /.card-body -->
        </div>
    </section>
    </div>
  </section>

  @section('script-section')
  <script>
    // Dữ liệu cho biểu đồ Area
    var total = @json($array_sum);
    var getDate = @json($array_date);

    var array_data = ['#ff0000', '#0000ff', '#ffff00','#7bed9f','#70a1ff'];
    var new_data = [];
    for(var i = 0; i <total.length; i++){
        new_data = new_data.concat(array_data);
    }

    
    var areaData = {
      labels: getDate,
      datasets: [
        {
          label: 'Sales',
          data: total,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
        },
      ],
    };

    // Dữ liệu cho biểu đồ Donut
    var donutData = {
      labels: getDate,
      datasets: [
        {
          data: total,
        //   backgroundColor: ['#ff0000', '#0000ff', '#ffff00','#7bed9f','#70a1ff'],
          backgroundColor: new_data,
        },
      ],
    };

       // Tùy chọn cho biểu đồ Area
       var areaOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true,
        },
      },
    };

    // Tùy chọn cho biểu đồ Donut
    var donutOptions = {
      responsive: true,
      maintainAspectRatio: false,
    };

    // Vẽ biểu đồ Area
    var areaCtx = document.getElementById('revenue-chart-canvas').getContext('2d');
    var areaChart = new Chart(areaCtx, {
      type: 'line',
      data: areaData,
      options: areaOptions,
    });

    // Vẽ biểu đồ Donut
    var donutCtx = document.getElementById('sales-chart-canvas').getContext('2d');
    var donutChart = new Chart(donutCtx, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions,
    });
  </script>
  @endsection
