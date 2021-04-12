<div id="content-page" class="content-page">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
               <div class="iq-card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <h5>Worked Today</h5>
                     <h3>08:00 Hr</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-2 text-warning">
               <div class="iq-card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <h5>Worked This Week</h5>
                     <h3>40:00 Hr</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-3 text-danger">
               <div class="iq-card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <h5>Worked Issue</h5>
                     <h3>1200</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-4 text-info">
               <div class="iq-card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <h5>Worked Income</h5>
                     <h3>$54000</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">User Perform</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="performa"></div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Worker Daily Overview</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="performa_daily"></div>
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-5">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Review</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-7">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Over Time</h4>
                  </div>
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                     <div class="dropdown">
                        <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                           <i class="ri-more-2-fill"></i>
                        </span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                           <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                           <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                           <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                           <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                           <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="menu-overtime-chart" style="height: 400px;"></div>
               </div>
            </div>
         </div> -->
         <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Worker List</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <table class="table mb-0 table-borderless">
                     <thead>
                        <tr>
                           <th scope="col"></th>
                           <th scope="col">Worker</th>
                           <th scope="col">Position</th>
                           <th scope="col">Daily Activity</th>
                           <th scope="col">Progress</th>
                        </tr>
                     </thead>
                     <tbody id="body_daily_activity">

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Task List</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <ul class="tasks-lists m-0 p-0">
                     <li class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-1">
                           <label class="custom-control-label" for="task-1">Prepare for presentation </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-2" checked="">
                           <label class="custom-control-label" for="task-2"><del>Create invoice </del> </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-3">
                           <label class="custom-control-label" for="task-3">Print Documents </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-4">
                           <label class="custom-control-label" for="task-4">Team Meeting on Satuarday </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-5" checked="">
                           <label class="custom-control-label" for="task-5"><del> Lunch our New Product </del> </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-2 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-6">
                           <label class="custom-control-label" for="task-6">Sent Email for Meeting </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-2 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-7">
                           <label class="custom-control-label" for="task-7">Sent Email for Hiliday List </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                     <li class="d-flex justify-content-between mb-2 align-items-center">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="task-8">
                           <label class="custom-control-label" for="task-8"> Birthday celebration </label>
                        </div>
                        <div class="font-size-18">
                           <i class="ri-close-circle-line"></i>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-12" style=" z-index: 0;">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <!-- <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Maps</h4>
                  </div>
               </div> -->
               <div class="iq-card-body">
                  <div id="mapid" style="height: 500px; width: 100%"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<script>
   $(document).ready(function() {
      getDailyActivity()
      getRoleDailyActivity()

      body_daily = $('#body_daily_activity')

      function getDailyActivity() {
         return $.ajax({
            url: `<?php echo base_url('DashboardController/DailyActivity/') ?>`,
            'type': 'GET',
            data: {},
            success: function(data) {
               var json = JSON.parse(data);
               if (json['error']) {
                  return;
               }
               data = json['data'];
               Object.values(data).forEach((d) => {
                  console.log(d)
                  body_daily.append(`   <tr>
                     <td class="text-center">
                        <img class="rounded-circle img-fluid avatar-40" src="<?= base_url() ?>${d['photo'] ? 'upload/photo/'+d['photo'] : 'assets/images/user/05.jpg'}" alt="profile">
                     </td>
                     <td>${d['nama']}</td>
                     <td>${d['title_role']}</td>
                     <td>${d['count_act']}</td>
                     <td>
                   ${daily_performance( d['count_act'])}
                     </td>
                  </tr>`)


               });
            },
            error: function(e) {}
         });
      }

      function getRoleDailyActivity() {
         return $.ajax({
            url: `<?php echo base_url('DashboardController/RoleDailyActivity/') ?>`,
            'type': 'GET',
            data: {},
            success: function(data) {
               var json = JSON.parse(data);
               if (json['error']) {
                  return;
               }
               data = json['data'];
               data_r = [];
               data_ac = [];
               Object.values(data).forEach((d) => {
                  console.log(d)
                  data_r.push(d['title_role'])
                  data_ac.push(parseInt(d['count_act']))

               });

               renderPerformaRole(data_r, data_ac)
            },
            error: function(e) {}
         });
      }

      function daily_performance(i) {
         if (i == '0')
            return `<div class="badge badge-pill badge-dangger">Tidak Ada Aktifitas</div>`
         if (i < '5')
            return `<div class="badge badge-pill badge-warning">Baik</div>`
         if (i >= '5')
            return `<div class="badge badge-pill badge-success">Sangat Baik</div>`
      }


      getMaps()
      var map = L.map('mapid').setView({
         lon: 106.0596408,
         lat: -1.8509798
      }, 13)

      L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
         attribution: "",
         minZoom: 1,
         maxZoom: 19,
      }).addTo(map);

      function getMaps() {
         return $.ajax({
            url: `<?php echo site_url('Service/getMaps/') ?>`,
            'type': 'GET',
            data: {},
            success: function(data) {
               var json = JSON.parse(data);
               if (json['error']) {
                  return;
               }
               data = json['data'];
               Object.values(data).forEach((d) => {
                  console.log(d['latitude'], d['longitude'])
                  var x = L.marker([d['latitude'], d['longitude']]).bindPopup(`<a href="<?= base_url() ?>PengirimanController/DetailPengiriman?id_pengiriman=${d['id_pengiriman']}">${d['nama_badan']} </a>`).addTo(map)
                  // s
               });
            },
            error: function(e) {}
         });

      }

   });
   renderGraphPengajuan()

   function renderGraphPengajuan() {

      options = {
         chart: {
            height: 350,
            type: "line",
            stacked: !1,
         },
         stroke: {
            width: [0, 2, 5],
            curve: "smooth",
         },
         plotOptions: {
            bar: {
               columnWidth: "50%",
            },
         },
         colors: ["#27b345", "#827af3"],
         series: [{
               name: "Disposision",
               type: "column",
               data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30],
            },
            {
               name: "Clear Disposition",
               type: "area",
               data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43],
            },
         ],
         fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
               inverseColors: !1,
               shade: "light",
               type: "vertical",
               opacityFrom: 0.85,
               opacityTo: 0.55,
               stops: [0, 100, 100, 100],
            },
         },
         labels: [
            "01/01/2003",
            "02/01/2003",
            "03/01/2003",
            "04/01/2003",
            "05/01/2003",
            "06/01/2003",
            "07/01/2003",
            "08/01/2003",
            "09/01/2003",
            "10/01/2003",
            "11/01/2003",
         ],
         markers: {
            size: 0,
         },
         xaxis: {
            type: "datetime",
         },
         yaxis: {
            min: 0,
         },
         tooltip: {
            shared: !0,
            intersect: !1,
            y: {
               formatter: function(e) {
                  return void 0 !== e ? e.toFixed(0) + " views" : e;
               },
            },
         },
         legend: {
            labels: {
               useSeriesColors: !0,
            },
            markers: {
               customHTML: [
                  function() {
                     return "";
                  },
                  function() {
                     return "";
                  }
               ],
            },
         },
      };
      var chart = new ApexCharts(document.querySelector("#performa"), options);
      chart.render();
   }

   function renderPerformaRole(data_r, data_ac) {
      console.log(data_r)
      console.log(data_ac)
      performa_daily_option = {
         chart: {
            type: 'donut'
         },
         colors: ["#27b345", "#827af3", '#ffb037', '#ff7a00', '#007580', '#e4bad4', '#ff7171'],
         series: data_ac,
         labels: data_r
      }
      var performa_daily = new ApexCharts(document.querySelector("#performa_daily"), performa_daily_option);
      performa_daily.render();
   }

   // chart = new ApexCharts(
   //    document.querySelector("#performa-user"),
   //    options
   // )
   // console.log('ws')
   // console.log(chart)
   // chart.render();
</script>