@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Clients</span>
              <span class="info-box-number">450</span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 45%"></div>
              </div>
              <span class="progress-description text-muted">
                    45% Increase in 28 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-eye-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Visits</span>
              <span class="info-box-number">15,489</span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 40%"></div>
              </div>
              <span class="progress-description text-muted">
                    40% Increase in 28 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">55,005</span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 85%"></div>
              </div>
              <span class="progress-description text-muted">
                    85% Increase in 28 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-orange"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Chat</span>
              <span class="info-box-number">13,921</span>

              <div class="progress">
                <div class="progress-bar bg-orange" style="width: 50%"></div>
              </div>
              <span class="progress-description text-muted">
                    50% Increase in 28 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->            
        
      <div class="row">
        <div class="col-xl-6 connectedSortable">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Statistics</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:228px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <div class="row">
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header text-muted font-weight-300">$12,000</h5>
                    <span class="description-text text-muted font-weight-300">DAILY SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 30%</span>
                    <h5 class="description-header text-muted font-weight-300">$5,000</h5>
                    <span class="description-text text-muted font-weight-300">WEEKLY SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 60%</span>
                    <h5 class="description-header text-muted font-weight-300">$10,000</h5>
                    <span class="description-text text-muted font-weight-300">MONTHLY SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block">
                    <span class="description-percentage text-purple"><i class="fa fa-caret-up"></i> 50%</span>
                    <h5 class="description-header text-muted font-weight-300">$50,000</h5>
                    <span class="description-text text-muted font-weight-300">Yearly SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <div class="col-xl-6 connectedSortable">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Analatics</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="line-chart" style="height: 332px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>         
        <!-- /.col -->        
       </div>        
      <!-- /.row -->        
      
      <div class="row">
          
         <div class="col-xl-4 connectedSortable">   
          <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Products</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="images/gallery/landscape1.jpg" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">iphone 7plus
                          <span class="label bg-orange pull-right">$300</span></a>
                        <span class="product-description">
                              12MP Wide-angle and telephoto cameras.
                            </span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="images/gallery/landscape10.jpg" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Apple Tv
                          <span class="label bg-orange pull-right">$400</span></a>
                        <span class="product-description">
                              Library | For You | Browse | Radio
                            </span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="images/gallery/landscape11.jpg" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">MacBook Air<span
                            class="label bg-orange pull-right">$450</span></a>
                        <span class="product-description">
                              Make big things happen. All day long.
                            </span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="images/gallery/landscape12.jpg" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">iPad Pro
                          <span class="label bg-orange pull-right">$289</span></a>
                        <span class="product-description">
                              Anything you can do, you can do better.
                            </span>
                      </div>
                    </li>
                    <!-- /.item -->
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
              </div>           
         </div>        
        <div class="col-xl-8 connectedSortable">
          <!-- MAP & BOX PANE -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Our Visitors</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-lg-9 col-md-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="visitfromworld" style="height: 300px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-lg-3 col-md-4">
                  <div class="row pad box-pane-right bg-orange m-0">
                    <div class="col-4 col-sm-12 description-block margin-bottom p-0">
                      <div class="sparkbar pad" data-color="#fff">80,60,95,70,75,80,50</div>
                      <h5 class="description-header">7458</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="col-4 col-sm-12 description-block margin-bottom p-0">
                      <div class="sparkbar pad" data-color="#fff">70,40,85,70,61,93,63</div>
                      <h5 class="description-header">56%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="col-4 col-sm-12 description-block p-0">
                      <div class="sparkbar pad" data-color="#fff">80,55,91,70,81,43,67</div>
                      <h5 class="description-header">85%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>        
      </div>
      <!-- /.row -->    
      
      <div class="row">
        <div class="col">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Weekly Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn  btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-wrench"></i>
                  </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-8">
                  <p class="text-center">
                    Sales: 1 Jan, 2017 - 30 Jul, 2017
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <div id="bar-chart" style="height: 200px;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-12 col-lg-4">
                  <p class="text-center">
                    Goal Completion
                  </p>

                  <div class="progress-group">
                    <span class="progress-text font-weight-400 text-muted">Add Products to Bag</span>
                    <span class="progress-number"><b>140</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar bg-orange" style="width: 70%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text font-weight-400 text-muted">Complete Purchase</span>
                    <span class="progress-number"><b>300</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar bg-orange" style="width: 75%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text font-weight-400 text-muted">Visit Page</span>
                    <span class="progress-number"><b>400</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar bg-orange" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text font-weight-400 text-muted">Send Inquiries</span>
                    <span class="progress-number"><b>425</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar bg-orange" style="width: 85%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
@endsection
