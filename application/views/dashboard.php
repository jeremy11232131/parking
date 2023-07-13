<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <?php if ($is_admin == true) { ?>
      <div class="row">

        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              $slot_1 = false;
              $slot_2 = false;
              $slot = $this->model_slots->getAllSlots()[0];
              if ($slot['UltrasonicSensorReading1'] == '2') {
                $slot_1 = true;
                if ($slot['UltrasonicSensorReading1'] == '3') {
                  $slot_1 = false;
                }
              }

              if ($slot['UltrasonicSensorReading2'] == '4') {
                $slot_2 = true;
                if ($slot['UltrasonicSensorReading2'] == '5') {
                  $slot_2 = false;
                }
              }

              if ($slot_1 == false && $slot_2 == false) {
                $availableSlots = 2;
              } elseif ($slot_1 == true && $slot_2 == false) {
                $availableSlots = 1;
              } elseif ($slot_1 == false && $slot_2 == true) {
                $availableSlots = 1;
              } elseif ($slot_1 == true && $slot_2 == true) {
                $availableSlots = 0;
              }
              ?>
              <h3><?php echo $availableSlots; ?></h3>
              <p>Total Parking Slots</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('slots/iot') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_users; ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url('users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total_parking; ?></h3>

              <p>Total Parking</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('parking') ?>" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
      <!-- /.row -->
    <?php } else { ?>
      <!DOCTYPE html>
      <html>

      <head>
        <title>Welcome to the Smart Parking System</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
          }

          .container {
            width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          }

          h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
          }

          p {
            font-size: 18px;
            color: #666;
            text-align: center;
          }

          .parking-image {
            width: 300px;
            height: auto;
            margin: 0 auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <div class="container">
          <h1>Welcome to the Smart Parking System</h1>
          <img src="https://hackster.imgix.net/uploads/attachments/917796/smartpark_wqdiHhCJOh.jpg?auto=compress&w=1600&h=1200&fit=min&fm=jpg" alt="Smart Parking Image" class="parking-image">
          <p>We are glad to have you here. Our smart parking system aims to provide efficient and convenient parking solutions. Through advanced technologies, we optimize parking space utilization and enhance your parking experience. Enjoy the benefits of our intelligent parking system.</p>
        </div>
      </body>

      </html>

      <div class="row">
        <div class="col-lg-4 col-xs-12"></div>
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              $slot_1 = false;
              $slot_2 = false;
              $slot = $this->model_slots->getAllSlots()[0];
              if ($slot['UltrasonicSensorReading1'] == '2') {
                $slot_1 = true;
                if ($slot['UltrasonicSensorReading1'] == '3') {
                  $slot_1 = false;
                }
              }

              if ($slot['UltrasonicSensorReading2'] == '4') {
                $slot_2 = true;
                if ($slot['UltrasonicSensorReading2'] == '5') {
                  $slot_2 = false;
                }
              }

              if ($slot_1 == false && $slot_2 == false) {
                $availableSlots = 2;
              } elseif ($slot_1 == true && $slot_2 == false) {
                $availableSlots = 1;
              } elseif ($slot_1 == false && $slot_2 == true) {
                $availableSlots = 1;
              } elseif ($slot_1 == true && $slot_2 == true) {
                $availableSlots = 0;
              }
              ?>
              <h3><?php echo $availableSlots; ?></h3>
              <p>Total Parking Slots</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('slots/iot') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12"></div>
      </div>
    <?php } ?>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#dashboardSideNav").addClass('active');
  });
  setTimeout(function() {
    location.reload();
  }, 60000);
</script>