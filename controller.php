<script>

getJSON('http://193.6.19.58:8182/smarthome/' + session_id,
function(err, data) {
  if (err !== null) {
    alert('Something went wrong: ' + err);
  } else {
    alert('Your query count: ' + data.query.count);
  }
});

<?php echo "asd"?>


var getJSON = function(url,session_id, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
};

function write_data()
{  
    var jsObject = JSON.parse(`<?= json_encode($monitor_obj); ?>`);
    if (jsObject["boilerState"] == true) { bojlerállapot = "Bekapcsolva";}
        else{bojlerállapot = "Kikapcsolva";}
    if (jsObject["airConditionerState"] == true) { klímaállapot = "Bekapcsolva";}
        else{ klímaállapot = "Kikapcsolva";}
    today = new Date();
    document.getElementById("controller").innerHTML+= "<b>Jelentés -> " +  jsObject["sessionId"] + "<- " +  today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds() +  "</b><br><hr>" 
                    + "&nbsp;&nbsp;&nbsp;&nbsp;Bojler állapot: " + bojlerállapot+ "<br>" 
                    + "&nbsp;&nbsp;&nbsp;&nbsp;Klíma állapot: " + klímaállapot  + "<br>" 
                    + "&nbsp;&nbsp;&nbsp;&nbsp;Hőmérséklet: " + jsObject["temperature"]  + "°C <br> <br>" ;
    setTimeout(write_data, 60000); // ms-ben van, azaz 1000 az 1 mp, 300 000 ms az 5 perc
}
</script>