    
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">History</h1>
      <p class="lead">All information about the currency stability.</p>
    </div>

    <script type="text/javascript" src="vendor\assets\js\history.js"></script>


    <div class="container">
    <form name="historyForm">
        <div class="row">
        <div class="col-3">
            <label>Start date:</label>
            <input type="date" name="start_at" class="form-control form-control-sm" required="true" />
        </div>
        <div class="col-3">
            <label>End date:</label>
            <input type="date" name="end_at" class="form-control form-control-sm" required="true" />
        </div>
        <div class="col-2">
            <label>From:</label>
            <select id="base-select" name="base" class="form-control form-control-sm" required="true">
                <option disabled selected value>Choose currency</option>
                <option value="USD">US Dollar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
                <option value="AUD">Australian Dollar (AUD)</option>
                <option value="BGN">Bulgarian Lev (BGN)</option>
                <option value="BRL">Brazilian Real (BRL)</option>
                <option value="CAD">Canadian Dollar (CAD)</option>
                <option value="CHF">Swiss Franc (CHF)</option>
                <option value="CNY">Chinese Yuan Renminbi (CNY)</option>
                <option value="CZK">Czech Koruna (CZK)</option>
                <option value="DKK">Danish Krone (DKK)</option>
                <option value="GBP">British Pound (GBP)</option>
                <option value="HKD">Hong Kong Dollar (HKD)</option>
                <option value="HRK">Croatian Kuna (HRK)</option>
                <option value="HUF">Hungarian Forint (HUF)</option>
                <option value="IDR">Indonesian Rupiah (IDR)</option>
                <option value="ILS">Israeli Shekel (ILS)</option>
                <option value="INR">Indian Rupee (INR)</option>
                <option value="ISK">Icelandic Krona (ISK)</option>
                <option value="JPY">Japanese Yen (JPY)</option>
                <option value="KRW">South Korean Won (KRW)</option>
                <option value="MXN">Mexican Peso (MXN)</option>
                <option value="MYR">Malaysian Ringgit (MYR)</option>
                <option value="NOK">Norwegian Krone (NOK)</option>
                <option value="NZD">New Zealand Dollar (NZD)</option>
                <option value="PHP">Philippine Peso (PHP)</option>
                <option value="PLN">Polish Zloty (PLN)</option>
                <option value="RON">Romanian Leu (RON)</option>
                <option value="RUB">Romanian Leu (RON)</option>
                <option value="SEK">Swedish Krona (SEK)</option>
                <option value="SGD">Singapore Dollar (SGD)</option>
                <option value="THB">Thai Baht (THB)</option>
                <option value="TRY">Turkish Lira (TRY)</option>
                <option value="ZAR">South African Rand (ZAR)</option>
            </select>
        </div>
        <div class="col-2">
            <label>To:</label>
            <select name="symbols" class="form-control form-control-sm" required="true">
            <option disabled selected value>Choose currency</option>
                <option value="USD">US Dollar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
                <option value="AUD">Australian Dollar (AUD)</option>
                <option value="BGN">Bulgarian Lev (BGN)</option>
                <option value="BRL">Brazilian Real (BRL)</option>
                <option value="CAD">Canadian Dollar (CAD)</option>
                <option value="CHF">Swiss Franc (CHF)</option>
                <option value="CNY">Chinese Yuan Renminbi (CNY)</option>
                <option value="CZK">Czech Koruna (CZK)</option>
                <option value="DKK">Danish Krone (DKK)</option>
                <option value="GBP">British Pound (GBP)</option>
                <option value="HKD">Hong Kong Dollar (HKD)</option>
                <option value="HRK">Croatian Kuna (HRK)</option>
                <option value="HUF">Hungarian Forint (HUF)</option>
                <option value="IDR">Indonesian Rupiah (IDR)</option>
                <option value="ILS">Israeli Shekel (ILS)</option>
                <option value="INR">Indian Rupee (INR)</option>
                <option value="ISK">Icelandic Krona (ISK)</option>
                <option value="JPY">Japanese Yen (JPY)</option>
                <option value="KRW">South Korean Won (KRW)</option>
                <option value="MXN">Mexican Peso (MXN)</option>
                <option value="MYR">Malaysian Ringgit (MYR)</option>
                <option value="NOK">Norwegian Krone (NOK)</option>
                <option value="NZD">New Zealand Dollar (NZD)</option>
                <option value="PHP">Philippine Peso (PHP)</option>
                <option value="PLN">Polish Zloty (PLN)</option>
                <option value="RON">Romanian Leu (RON)</option>
                <option value="RUB">Romanian Leu (RON)</option>
                <option value="SEK">Swedish Krona (SEK)</option>
                <option value="SGD">Singapore Dollar (SGD)</option>
                <option value="THB">Thai Baht (THB)</option>
                <option value="TRY">Turkish Lira (TRY)</option>
                <option value="ZAR">South African Rand (ZAR)</option>
            </select>
        </div>
        <div class="col-2">
        <br>
            <input type="button" class="btn btn-outline-primary btn-block" id="getResult" value="Submit" />
        </div>
    </form>
    </div>
<hr>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="table-tab" role="tabpanel" aria-labelledby="table-tab">
        <br>
        <div class="row">
        <div class="col-md-6">
        <history-table></history-table>
        </div>
        <div class="col">
        <chart-table></chart-table>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>


