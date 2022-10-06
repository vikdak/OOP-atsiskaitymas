<!DOCOTYPE html>
<html>
<body style="margin: 80px; background-color: lightgoldenrodyellow;">
<p style="display: flex; justify-content: center;font-size: 50px; font-weight: bold; color: green">ELEKTROS KAINOS SKAIČIUOKLĖ</p>
<div style="display: flex; justify-content:center; font-size: 25px; background-color: lightgoldenrodyellow; border-style: solid ;border-color: darkgreen">
    <form method="POST" action="/electricities">
        <div>
            <label for="amount">Elektros kilovatvalandžių kiekis, kwh </label>
            <input type="number" name="amount" id="amount" placeholder="kilovatvalandziu kiekis"   >
        </div>
       <div>
           <label for="price">Elektros tarifo kaina, Eur </label>
           <input type="number" name="price" id="price" placeholder="kaina" min="0.01" step="0.01"">
       </div>
        <div>
        <input type="radio" id="day" name="tariff" value="day" checked>
        <label for="day">Dieninis tarifas</label>
        </div>
        <div>
        <input type="radio" id="night" name="tariff" value="night">
        <label for="night">Naktinis tarifas</label>
        </div>
        <input style="color: darkgreen" type="submit" value="PATVIRTINTI">
        <div>
        <a style="color: black; font-size: 25px; " href="/electricities">Pereiti prie apmokėjimo:</a>
        </div>
    </form>



</div>
</body>
</html>
