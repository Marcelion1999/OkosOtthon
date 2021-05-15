   /*
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
                                         // ms-ben van, azaz 1000 az 1 mp, 300 000 ms az 5 perc*/