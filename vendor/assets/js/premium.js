// Source of used logic: https://codepen.io/Coding_Journey/pen/exjrdg

(function($) {

// Global variables
const addCurrencyList = document.querySelector(".add-currency-list");
const currenciesList = document.querySelector(".currencies");
// API address for fetching rates
const dataURL = "https://api.exchangeratesapi.io/latest";

// Initialises base currencies on the page load
let initCurrencies;
// Base currency variable
let baseCurrency;
// Base currency amount for 1-to-1 ratio changing
let baseCurrencyAmount;

// List of available currencies
let currencies = [
  {
    name: "Euro",
    abbreviation: "EUR",
    symbol: "\u20AC",
    flag: "flag-icon flag-icon-squared flag-icon-eu"
  },
  {
    name: "US Dollar",
    abbreviation: "USD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-us"
  },
  {
    name: "Japanese Yen",
    abbreviation: "JPY",
    symbol: "\u00A5",
    flag: "flag-icon flag-icon-squared flag-icon-jp"
  },
  {
    name: "British Pound",
    abbreviation: "GBP",
    symbol: "\u00A3",
    flag: "flag-icon flag-icon-squared flag-icon-gb"
  },
  {
    name: "Australian Dollar",
    abbreviation: "AUD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-au"
  },
  {
    name: "Canadian Dollar",
    abbreviation: "CAD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-ca"
  },
  {
    name: "Swiss Franc",
    abbreviation: "CHF",
    symbol: "\u0043\u0048\u0046",
    flag: "flag-icon flag-icon-squared flag-icon-ch"
  },
  {
    name: "Chinese Yuan Renminbi",
    abbreviation: "CNY",
    symbol: "\u00A5",
    flag: "flag-icon flag-icon-squared flag-icon-cn"
  },
  {
    name: "Swedish Krona",
    abbreviation: "SEK",
    symbol: "\u006B\u0072",
    flag: "flag-icon flag-icon-squared flag-icon-se"
  },
  {
    name: "New Zealand Dollar",
    abbreviation: "NZD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-nz"
  },
  {
    name: "Mexican Peso",
    abbreviation: "MXN",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-mx"
  },
  {
    name: "Singapore Dollar",
    abbreviation: "SGD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-sg"
  },
  {
    name: "Hong Kong Dollar",
    abbreviation: "HKD",
    symbol: "\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-hk"
  },
  {
    name: "Norwegian Krone",
    abbreviation: "NOK",
    symbol: "\u006B\u0072",
    flag: "flag-icon flag-icon-squared flag-icon-no"
  },
  {
    name: "South Korean Won",
    abbreviation: "KRW",
    symbol: "\u20A9",
    flag: "flag-icon flag-icon-squared flag-icon-kr"
  },
  {
    name: "Turkish Lira",
    abbreviation: "TRY",
    symbol: "\u20BA",
    flag: "flag-icon flag-icon-squared flag-icon-tr"
  },
  {
    name: "Russian Ruble",
    abbreviation: "RUB",
    symbol: "\u20BD",
    flag: "flag-icon flag-icon-squared flag-icon-ru"
  },
  {
    name: "Indian Rupee",
    abbreviation: "INR",
    symbol: "\u20B9",
    flag: "flag-icon flag-icon-squared flag-icon-in"
  },
  {
    name: "Brazilian Real",
    abbreviation: "BRL",
    symbol: "\u0052\u0024",
    flag: "flag-icon flag-icon-squared flag-icon-br"
  },
  {
    name: "South African Rand",
    abbreviation: "ZAR",
    symbol: "\u0052",
    flag: "flag-icon flag-icon-squared flag-icon-za"
  },
  {
    name: "Philippine Peso",
    abbreviation: "PHP",
    symbol: "\u20B1",
    flag: "flag-icon flag-icon-squared flag-icon-ph"
  },
  {
    name: "Czech Koruna",
    abbreviation: "CZK",
    symbol: "\u004B\u010D",
    flag: "flag-icon flag-icon-squared flag-icon-cz"
  },
  {
    name: "Indonesian Rupiah",
    abbreviation: "IDR",
    symbol: "\u0052\u0070",
    flag: "flag-icon flag-icon-squared flag-icon-id"
  },
  {
    name: "Malaysian Ringgit",
    abbreviation: "MYR",
    symbol: "\u0052\u004D",
    flag: "flag-icon flag-icon-squared flag-icon-my"
  },
  {
    name: "Hungarian Forint",
    abbreviation: "HUF",
    symbol: "\u0046\u0074",
    flag: "flag-icon flag-icon-squared flag-icon-hu"
  },
  {
    name: "Icelandic Krona",
    abbreviation: "ISK",
    symbol: "\u006B\u0072",
    flag: "flag-icon flag-icon-squared flag-icon-is"
  },
  {
    name: "Croatian Kuna",
    abbreviation: "HRK",
    symbol: "\u006B\u006E",
    flag: "flag-icon flag-icon-squared flag-icon-hr"
  },
  {
    name: "Bulgarian Lev",
    abbreviation: "BGN",
    symbol: "\u043B\u0432",
    flag: "flag-icon flag-icon-squared flag-icon-bg"
  },
  {
    name: "Romanian Leu",
    abbreviation: "RON",
    symbol: "\u006C\u0065\u0069",
    flag: "flag-icon flag-icon-squared flag-icon-ro"
  },
  {
    name: "Danish Krone",
    abbreviation: "DKK",
    symbol: "\u006B\u0072",
    flag: "flag-icon flag-icon-squared flag-icon-dk"
  },
  {
    name: "Thai Baht",
    abbreviation: "THB",
    symbol: "\u0E3F",
    flag: "flag-icon flag-icon-squared flag-icon-th"
  },
  {
    name: "Polish Zloty",
    abbreviation: "PLN",
    symbol: "\u007A\u0142",
    flag: "flag-icon flag-icon-squared flag-icon-pl"
  },
  {
    name: "Israeli Shekel",
    abbreviation: "ILS",
    symbol: "\u20AA",
    flag: "flag-icon flag-icon-squared flag-icon-il"
  }
]

// Event Listeners
// Listener for "Add currency" button in currency converter
addCurrencyList.addEventListener("click", addCurrencyListClick);

function addCurrencyListClick(event) {
  const clickedListItem = event.target.closest("option");
  if(!clickedListItem.classList.contains("list-group-item-primary")) {
    const newCurrency = currencies.find(c => c.abbreviation===clickedListItem.getAttribute("data-currency"));
    if(newCurrency) newCurrenciesListItem(newCurrency);
  }
}

// Listener for deleting currency from the list
currenciesList.addEventListener("click", currenciesListClick);

function currenciesListClick(event) {
  if(event.target.classList.contains("close")) {
    const parentNode = event.target.parentNode;
    parentNode.remove();
    addCurrencyList.querySelector(`[data-currency=${parentNode.id}]`).classList.remove("list-group-item-primary");
    if(parentNode.classList.contains("base-currency")) {
      const newBaseCurrencyLI = currenciesList.querySelector(".card-body");
      if(newBaseCurrencyLI) {
        setNewBaseCurrency(newBaseCurrencyLI);
        baseCurrencyAmount = Number(newBaseCurrencyLI.querySelector(".input").value);
      }
    }
  }
}

// Listener for setting new base currency
function setNewBaseCurrency(newBaseCurrencyLI) {
  newBaseCurrencyLI.classList.add("base-currency");
  baseCurrency = newBaseCurrencyLI.id;
  const baseCurrencyRate = currencies.find(currency => currency.abbreviation===baseCurrency).rate;
  currenciesList.querySelectorAll(".card-body").forEach(currencyLI => {
    const currencyRate = currencies.find(currency => currency.abbreviation===currencyLI.id).rate;
    const exchangeRate = currencyLI.id===baseCurrency ? 1 : (currencyRate/baseCurrencyRate).toFixed(4);
    currencyLI.querySelector(".base-currency-rate").textContent = `1 ${baseCurrency} = ${exchangeRate} ${currencyLI.id}`;
  });
}

// Listener for the changes in input event for currencies list element
currenciesList.addEventListener("input", currenciesListInputChange);

function currenciesListInputChange(event) {
  const isNewBaseCurrency = event.target.closest("crncy").id!==baseCurrency;
  if(isNewBaseCurrency) {
    currenciesList.querySelector(`#${baseCurrency}`).classList.remove("list-group-item-primary");
    setNewBaseCurrency(event.target.closest("crncy"));
  }
  const newBaseCurrencyAmount = isNaN(event.target.value) ? 0 : Number(event.target.value);
  if(baseCurrencyAmount!==newBaseCurrencyAmount || isNewBaseCurrency) {
    baseCurrencyAmount = newBaseCurrencyAmount;
    const baseCurrencyRate = currencies.find(currency => currency.abbreviation===baseCurrency).rate;
    currenciesList.querySelectorAll(".currency").forEach(currencyLI => {
      if(currencyLI.id!==baseCurrency) {
        const currencyRate = currencies.find(currency => currency.abbreviation===currencyLI.id).rate;
        const exchangeRate = currencyLI.id===baseCurrency ? 1 : (currencyRate/baseCurrencyRate).toFixed(4);
        currencyLI.querySelector(".input input").value = exchangeRate*baseCurrencyAmount!==0 ? (exchangeRate*baseCurrencyAmount).toFixed(4) : "";
      }
    });
  }
}

// Listener for value reset for four decimal places as soon as input loses focus and block invalid non-numeric values
currenciesList.addEventListener("focusout", currenciesListFocusOut);

function currenciesListFocusOut(event) {
  const inputValue = event.target.value;
  if(isNaN(inputValue) || Number(inputValue)===0) event.target.value="";
  else event.target.value = Number(inputValue).toFixed(4);
}

// Listener for losing focus from input on Enter click
currenciesList.addEventListener("keydown", currenciesListKeyDown);

function currenciesListKeyDown(event) {
  if(event.key==="Enter") event.target.blur();
}

// Auxiliary Functions
// Function for generating list in "Add currency" modal
function populateAddCurrencyList() {
  for(let i=0; i < currencies.length; i++) {
    addCurrencyList.insertAdjacentHTML("beforeend",
    `<option class="list-group-item" data-currency="${currencies[i].abbreviation}">${currencies[i].name} (${currencies[i].abbreviation})</option>`
    );
  }
}

// Full currency list shown to user
function populateCurrenciesList() {
  for(let i=0; i < initCurrencies.length; i++) {
    const currency = currencies.find(c => c.abbreviation === initCurrencies[i]);
    if(currency) newCurrenciesListItem(currency);
  }
}

// For initializing new currency card in currencies list
function newCurrenciesListItem(currency) {
  if(currenciesList.childElementCount === 0) {
    baseCurrency = currency.abbreviation;
    baseCurrencyAmount = 0;
  }
  addCurrencyList.querySelector(`[data-currency=${currency.abbreviation}]`).classList.add("list-group-item-primary");
  const baseCurrencyRate = currencies.find(c => c.abbreviation===baseCurrency).rate;
  const exchangeRate = currency.abbreviation===baseCurrency ? 1 : (currency.rate/baseCurrencyRate).toFixed(4);
  const inputValue = baseCurrencyAmount ? (baseCurrencyAmount*exchangeRate).toFixed(4) : "";

  // Code of currency card in currency list
  currenciesList.insertAdjacentHTML(
    "beforeend",
    `
    <div class="card-body mt-2 base-currency" id=${currency.abbreviation}>
    <div class="row">
    <div class="col-lg-6">
    <h5>${currency.name} <span class="${currency.flag}"></h6>
    <h6 class="text-muted">${currency.abbreviation}
      <small class="base-currency-rate">1 ${baseCurrency} = ${exchangeRate} ${currency.abbreviation}</small></h6>
    </div>
    <crncy class="currency ${currency.abbreviation===baseCurrency ? "base-currency" : ""}" id=${currency.abbreviation}>
    <div class="col">
      <div class="info">
        <p class="input"><input type="text" id="${currency.abbreviation}" size="15" placeholder="0.0000" maxlength="9" value="${inputValue}" class="form-control form-control-lg"></p>
      </div>
    </div>
    </crncy>
    </div>
    <span class="close">&times;</span>
    </div>
    `
  );
}

  $(document).ready(function() {
      fetchUserCurrencies();
  });

  function fetchUserCurrencies() {
    $.ajax({
    url: "converter-premium",
    type: 'post',
    dataType: 'json',
    async: false,
    success: function(curs) {
    initCurrencies = curs;

// Initializing all mentioned functions and fetching data from API
   fetch(dataURL)
  .then(res => res.json())
  .then(data => {
     document.querySelector(".date").textContent = "Last update: " + data.date;
     data.rates["EUR"] = 1;
     currencies = currencies.filter(currency => data.rates[currency.abbreviation]);
     currencies.forEach(currency => currency.rate = data.rates[currency.abbreviation]);
     populateAddCurrencyList();
     populateCurrenciesList();
  })
  .catch(err => console.log(err));

  }
  })
}
})($)