
  <!-- Page Content -->
  <div class="container">
      <body onload="init()">
      <div class="row">
      <div class="col-md-7 mx-auto">
    <div class="row">
      <div class="col-lg-6 text-center">
        <h3 class="display-5 mt-5 text-left">Premium Converter</h1>
        <p class="date text-left text-muted" id="current-date-time"></p>
        <!-- <script>
          document.getElementById("current-date-time").innerHTML = formatAMPM();
          function formatAMPM() {
          var d = new Date(),
              minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
              hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
              ampm = d.getHours() >= 12 ? 'pm' : 'am',
              months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
              days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
          return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
          }
        </script> -->
      </div>
    </div>

    <!-- Button trigger modal -->
    <div class="mt-4 mb-4 text-left">
      <button type="button" class="btn btn-primary btn re" data-toggle="modal" data-target="#exampleModalCenter" id="addCurrencyBtn">
        <i class="fas fa-plus-circle"></i> Add currency
      </button>
      <a href="profile" role="button" class="btn btn-outline-primary btn re ml-3">
        <i class="fas fa-wrench"></i> Configure base currencies
      </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">List of currencies</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="add-currency-list modal-body">
          <p class="text-muted">Please choose currencies and close the modal to see changes.</p>
          <select class="list-group" multiple>
          </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="card">
    <div class="currencies"></div>
    <script type="text/javascript" src="vendor\assets\js\premium.js"></script>

</div>
</div>
</div>
</div>
</div>





