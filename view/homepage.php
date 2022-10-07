<!DOCOTYPE html>
<html>
<body style="margin: 80px; background-color: lightgoldenrodyellow;">
<p style="display: flex; justify-content: center;font-size: 50px; font-weight: bold; color: green">ELEKTROS KAINOS SKAIČIUOKLĖ</p>
<div style="display: flex; justify-content:center; font-size: 25px; background-color: lightgoldenrodyellow; border-style: solid ;border-color: darkgreen">
<div>
    <form method="POST" action="/electricities">
        <div>
            <label for="amount">Elektros kilovatvalandžių kiekis, kwh </label>
            <input type="number" name="amount" id="amount" value="0"   >
        </div>
        <div>
            <label for="price">Elektros tarifo kaina, Eur </label>
            <input type="number" name="price" id="price" placeholder="Kaina" min="0.01" step="0.01" value="0.01"">
        </div>
        <div>
            <input type="radio" id="day" name="tariff" value="Dieninis" checked>
            <label for="day">Dieninis tarifas</label>
        </div>
        <div>
            <input type="radio" id="night" name="tariff" value="Naktinis">
            <label for="night">Naktinis tarifas</label>
        </div>
        <div>
            <label for="month">Laikotarpis </label>
            <input type="month" name="month" id="month" value="2022-01">
        </div>
        <input style="color: darkgreen; font-weight: bold" type="submit" value="PATVIRTINTI">
    </form>


        <a style="color: green; font-size: 25px; font-weight: bold" href="/electricities">SKAIČIUOTI KAINĄ</a>
</div>
</div>
</body>
</html>
