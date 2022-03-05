                        <div class="header">
                            <h2>
                                Detail Maps Kandang
                            </h2>
                        </div>
                        <div class="body">
                            <div id="gmap_basic_example" class="gmap"></div>
                        </div>

    <!-- GMaps PLugin Js -->
    <script src="<?php echo base_url('assets/plugins/gmaps/gmaps.js');?>"></script>

    <script>
        var map, infoWindow;

        function initMap(){
             var locations = [ 
                    <?php
                        $kd_kandang = $this->uri->segment(3);
                        
                        $query = $this->db->query('SELECT * FROM kandang WHERE kd_kandang = '.$kd_kandang.'');
                        $data   =   array();
                        foreach ($query->result_array() as $row):
                            $data[] = $row['lintang'];
                            $data[] = $row['bujur'];
                            $data[] = $row['kd_kandang'];
                            echo '["'.$row['lintang'].'",'.$row['bujur'].','.$row['kd_kandang'].'],';
                        endforeach; 
                    ?>

             ];
                    for (var i=0; i<locations.length; i++) {
                        var lintang = parseFloat(locations[i][0]);
                        var bujur = parseFloat(locations[i][1]);
                        
                        var map = new google.maps.Map(document.getElementById('gmap_basic_example'),{
                            center: {lat:lintang, lng:bujur},
                            zoom: 15
                        }); 
                    }     

                    var marker;      
                    var infoWindow = new google.maps.InfoWindow();

                    for (var i=0; i<locations.length; i++) {
                        marker = new google.maps.Marker({
                            position : new google.maps.LatLng(locations[i][0],locations[i][1]),
                        map: map

                        });

                        google.maps.event.addListener(marker,'click', (function(marker, i) {
                            return function() {
                                kd_kandang = locations[i][2];
                                window.location.href = "<?php echo base_url('Maps/detail_kandang/')?>"+kd_kandang;
                            }
                        })(marker, i)); 
                    }
                }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdd5HZzwPBwQMUfD28ODjb74lgCJDt1_o&callback=initMap&callback=initMap">
    </script>