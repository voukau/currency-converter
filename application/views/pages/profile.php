

<div class="container">
<br>
    <div class="text-center">
        <h1 class="display-4">User settings</h1>
        <p class="lead text-center">Manage your user settings</p>
    </div>
<br>

<div class="row justify-content-md-center">

<div class="col-6 card bg-light">
<article class="card-body mx-auto">

<?php echo form_open('users/save_base_cur', array('id'=>'basecur_form')); ?>
    <div class="form-group" id="basecurrencies">
      <label for="basecur1">Choose up to five base currencies:</label>
      <select class="form-control mb-3" name="basecur1">
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
      <select class="form-control mb-3" name="basecur2">
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
      <select class="form-control mb-3" name="basecur3">
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
      <select class="form-control mb-3" name="basecur4">
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
      <select class="form-control mb-3" name="basecur5">
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
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save preferences</button>
    </div> <!-- form-group// -->
<?php echo form_close(); ?>
</article>
</div> <!-- card.// -->

</div>
</div>
<!--container end.//-->
