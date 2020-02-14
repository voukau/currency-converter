// https://api.exchangeratesapi.io/history?start_at=2018-01-01&end_at=2018-09-01&base=EUR&symbols=USD   

const addCurrencyList = document.querySelector(".add-currency-list");




window.onload = function() {
    document.getElementById("getResult").onclick = function fun() {

        var start_at = document.forms["historyForm"]["start_at"].value;
        var end_at = document.forms["historyForm"]["end_at"].value;
        var base = document.forms["historyForm"]["base"].value;
        var symbols = document.forms["historyForm"]["symbols"].value;

        var Url = "https://api.exchangeratesapi.io/history?start_at=" + start_at + "&end_at=" + end_at + "&base=" + base + "&symbols=" + symbols;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', Url, true);
        xhr.send();
        xhr.onreadystatechange = processRequest;
        function processRequest(e) {
         if (xhr.readyState == 4 && xhr.status == 200) {
            //	alert(xhr.responseText);
                var resp = JSON.parse(xhr.responseText);
                
                var $table = $('<table class="table table-bordered"/> ');
                var $headerTr = $('<th/>');
                
                for (var index in resp.rates) {
                  $headerTr.append($('<tr>').html(index));
                }
                
                $table.append($headerTr);
                var $tableTr = $('<td/>');
                 
                for (var key in resp.rates) {
                    //console.log('Date: '+ key);
                    //console.log('Rate: '+ data.rates[key]['USD']);
                    $tableTr.append($('<tr/>').html(resp.rates[key][symbols]));
                }
                
                $table.append($tableTr);
                $('history-table').prepend($table);

                var $chart = $('<canvas id="newChart" width="400" height="400"></canvas>');
                $('chart-table').prepend($chart);
                var ctx = document.getElementById('newChart').getContext('2d');
                var newChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [resp.rates],
                        datasets: [
                            {
                                data: [resp.rates]
                            }
                        ]
                    }
                } )

                
                    

            }
        }
    }
}
