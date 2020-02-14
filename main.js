var gbp, usd, eur, cad, aud;
function init() {
    gbp = document.getElementById("GBP");
    usd = document.getElementById("USD");
    eur = document.getElementById("EUR");
    cad = document.getElementById("CAD");
    aud = document.getElementById("AUD");
}

function gbpfunc() {
    usd.value = parseFloat(gbp.value) * 1.31;
    eur.value = parseFloat(gbp.value) * 1.15;
    cad.value = parseFloat(gbp.value) * 1.72;
    aud.value = parseFloat(gbp.value) * 1.82;
}

function eurfunc() {
    gbp.value = parseFloat(eur.value) * 0.87;
    usd.value = parseFloat(eur.value) * 1.13;
    cad.value = parseFloat(eur.value) * 1.5;
    aud.value = parseFloat(eur.value) * 1.58;
}

function cadfunc() {
    gbp.value = parseFloat(cad.value) * 0.58;
    usd.value = parseFloat(cad.value) * 0.76;
    eur.value = parseFloat(cad.value) * 0.67;
    aud.value = parseFloat(cad.value) * 1.06;
}

function audfunc() {
    gbp.value = parseFloat(aud.value) * 0.55;
    usd.value = parseFloat(aud.value) * 0.72;
    eur.value = parseFloat(aud.value) * 0.63;
    cad.value = parseFloat(aud.value) * 0.95;
}

function usdfunc() {
    gbp.value = parseFloat(usd.value) * 0.77;
    eur.value = parseFloat(usd.value) * 0.89;
    cad.value = parseFloat(usd.value) * 1.32;
    aud.value = parseFloat(usd.value) * 1.39;
}

init();

