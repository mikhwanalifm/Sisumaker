
 <div class="right_col" role="main">
 
 <div class="x_title">
   <h2>Dashboard</h2>
   <div class="clearfix"></div>
 </div>
     <div class="alert alert-success" role="alert">
       <h4 class="alert-heading">Selamat Datang!</h4>
       <b><p>Selamat Datang <strong><?php echo $nama_lengkap; ?></strong> di Sistem Informasi Surat Masuk dan Surat Keluar Kantor Camat Selebar Kota Bengkulu<br> Anda Login sebagai <strong><?php echo $level; ?></strong> </p>
     </div>
<!-- page content -->

<div class="row">
<div class="col-md-12">
<div class="">
 <div class="x_content">
   <div class="row">
     <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
       <div class="tile-stats">
         <div class="icon"><i class="fa fa-user"></i>
         </div>
         <div class="count"><?php echo $hitung_user ?></div>
         <h3>Total User</h3>
         <br>
       </div>
     </div>
     <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
       <div class="tile-stats">
         <div class="icon"><i class="fa fa-download"></i>
         </div>
         <div class="count"><?php echo $hitung_sm ?></div>
         <h3>Total Surat Masuk</h3>
         <br>
       </div>
     </div>
     <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
       <div class="tile-stats">
         <div class="icon"><i class="fa fa-cloud-upload"></i>
         </div>
         <div class="count"><?php echo $hitung_sk ?></div>

         <h3>Total Surat Keluar</h3>
         <br>
       </div>
     </div>
     
   </div>
   <div style="width:75%;">
        <canvas id="canvas"></canvas>
    </div>
    <br>
    <br>
    <!-- <button id="randomizeData">Randomize Data</button>
    <button id="changeDataObject">Change Data Object</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <button id="addData">Add Data</button>
    <button id="removeData">Remove Data</button> -->
    
</div>
</div>
     
</div>
</div>
</div>


</div>
</div>
</div>
<!-- /page content -->
<!-- data masuk -->
<?php
   function digit($angka){
     if($angka < 10){
       return '0'.$angka;
     }
     else{
       return $angka;
     }
   }
   $bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
   for ($i=0;$i<12;$i++){
     // code...
     $bln = digit($i+1);
      $no_kk = $this->db->query("SELECT count(*) as jumlah FROM `tb_suratmasuk` WHERE tgl_masuk LIKE '2020-$bln-%'")->result();
      // $no_kk = $this->db->query("SELECT count(*) as jumlah FROM `tb_suratmasuk` GROUP BY YEAR(tgl_masuk)")->result();
      foreach($no_kk as $nk){

          echo "<script>";
        if($nk->jumlah > 0){
          echo "var suratmasuk".$bln."={$nk->jumlah}";}

      else{
        echo "var suratmasuk".$bln."=0";
      }
      echo "</script>";
    }}

    for ($i=0;$i<12;$i++){
      // code...
      $bln = digit($i+1);
      $ikut = $this->db->query("SELECT count(*) as jumlah FROM `tb_suratkeluar` WHERE tgl_keluar LIKE '2020-$bln-%'")->result();
      // $ikut = $this->db->query("SELECT count(*) as jumlah FROM `tb_suratkeluar` GROUP BY YEAR(tgl_keluar)")->result();
       foreach($ikut as $nk){

           echo "<script>";
         if($nk->jumlah > 0){
           echo "var suratkeluar".$bln."={$nk->jumlah}";}

       else{
         echo "var suratkeluar".$bln."=0";
       }
       echo "</script>";
     }}
          ?>
<script>

        var MONTHS = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
            //return 0;
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };

        var config = {
            type: 'line',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: "Surat Masuk",
                    data: [suratmasuk01,suratmasuk02,suratmasuk03,suratmasuk04,suratmasuk05,suratmasuk06,suratmasuk07,suratmasuk08,suratmasuk09,suratmasuk10,suratmasuk11,suratmasuk12],
                    fill: false,
                    borderDash: [5, 5],
                    // borderColor: "yellow",
                }, {
                    label: "Surat Keluar",
                    data: [suratkeluar01,suratkeluar02,suratkeluar03,suratkeluar04,suratkeluar05,suratkeluar06,suratkeluar07,suratkeluar08,suratkeluar09,suratkeluar10,suratkeluar11,suratkeluar12],
                    // borderColor: "red",
                    fill: false,
                  }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Rekapitulasi Surat Masuk dan Surat Keluar Bidang Umum Kepegawaian Tahun 2020'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                        // beforeTitle: function() {
                        //     return '...beforeTitle';
                        // },
                        // afterTitle: function() {
                        //     return '...afterTitle';
                        // },
                        // beforeBody: function() {
                        //     return '...beforeBody';
                        // },
                        // afterBody: function() {
                        //     return '...afterBody';
                        // },
                        // beforeFooter: function() {
                        //     return '...beforeFooter';
                        // },
                        // footer: function() {
                        //     return 'Footer';
                        // },
                        // afterFooter: function() {
                        //     return '...afterFooter';
                        // },
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        // ticks: {
                        //     suggestedMin: 0,
                        //     suggestedMax: 10,
                        // }
                    }]
                }
            }
        };

        $.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

        $('#randomizeData').click(function() {
            $.each(config.data.datasets, function(i, dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        $('#changeDataObject').click(function() {
            config.data = {
                labels: ["July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "My First dataset",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                    fill: false,
                }, {
                    label: "My Second dataset",
                    fill: false,
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }]
            };

            $.each(config.data.datasets, function(i, dataset) {
                dataset.borderColor = randomColor(0.4);
                dataset.backgroundColor = randomColor(0.5);
                dataset.pointBorderColor = randomColor(0.7);
                dataset.pointBackgroundColor = randomColor(0.5);
                dataset.pointBorderWidth = 1;
            });

            // Update the chart
            window.myLine.update();
        });

        $('#addDataset').click(function() {
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                borderColor: randomColor(0.4),
                backgroundColor: randomColor(0.5),
                pointBorderColor: randomColor(0.7),
                pointBackgroundColor: randomColor(0.5),
                pointBorderWidth: 1,
                data: [],
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        $('#addData').click(function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                $.each(config.data.datasets, function(i, dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        $('#removeDataset').click(function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        $('#removeData').click(function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
    </script>