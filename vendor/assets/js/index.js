// Source of used logic: https://codepen.io/Coding_Journey/pen/exjrdg

// Global variables
const currenciesList = document.querySelector(".currencies");
// API address for fetching rates
const dataURL = "https://api.exchangeratesapi.io/latest";

// Initialises base currencies on the page load
const initCurrencies = ["EUR", "USD", "GBP", "JPY", "CNY"];
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
    name: "British Pound",
    abbreviation: "GBP",
    symbol: "\u00A3",
    flag: "flag-icon flag-icon-squared flag-icon-gb"
  },
  {
    name: "Japanese Yen",
    abbreviation: "JPY",
    symbol: "\u00A5",
    flag: "flag-icon flag-icon-squared flag-icon-jp"
  },
  {
    name: "Chinese Yuan Renminbi",
    abbreviation: "CNY",
    symbol: "\u00A5",
    flag: "flag-icon flag-icon-squared flag-icon-cn"
  }
]

// Event Listeners

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
function populateCurrenciesList() {
  for(let i=0; i < initCurrencies.length; i++) {
    const currency = currencies.find(c => c.abbreviation === initCurrencies[i]);
    if(currency) newCurrenciesListItem(currency);
  }
}

// Full currency list shown to user
function newCurrenciesListItem(currency) {
  if(currenciesList.childElementCount===0) {
    baseCurrency = currency.abbreviation;
    baseCurrencyAmount = 0;
  }
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
        <p class="input"><input type="text" id="${currency.abbreviation}" size="17" placeholder="0.0000" maxlength="9" value="${inputValue}" class="form-control form-control-lg"></p>
      </div>
    </div>
    </crncy>
    </div>
    </div>
    </div>
    `
  );
}

// Initializing all mentioned functions and fetching data from API
fetch(dataURL)
  .then(res => res.json())
  .then(data => {
     console.log(data); // needed only for testing purposes
     document.querySelector(".date").textContent = "Last update: " + data.date;
     data.rates["EUR"] = 1;
     currencies = currencies.filter(currency => data.rates[currency.abbreviation]);
     currencies.forEach(currency => currency.rate = data.rates[currency.abbreviation]);
     populateCurrenciesList();
  })
  .catch(err => console.log(err));

