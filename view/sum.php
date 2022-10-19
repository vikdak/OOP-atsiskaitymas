<!DOCOTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
</head>
<body style="margin: 80px; background-color: lightgoldenrodyellow;">
<p style="display: flex; justify-content: center;font-size: 50px; font-weight: bold; color: green">ELEKTROS KAINOS
    SKAIČIUOKLĖ</p>
<div style="display: flex; justify-content:center; font-size: 25px; background-color: lightgoldenrodyellow; border-style: solid ;border-color: darkgreen">
    <div>
        <table>
            <tbody>
            <div>
                <th>KWh:</th>
                <th>KAINA, Eur:</th>
                <th>TARIFAS:</th>
                <th>LAIKOTARPIS:</th>
                <?php foreach ($electricities as $key => $electricity): ?>
                    <tr>
                        <td><?php echo $electricity['amount'] ?></td>
                        <td><?php echo $electricity['price'] ?></td>
                        <td><?php echo $electricity['tariff'] ?></td>
                        <td><?php echo $electricity['month'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </div>
            </tbody>
        </table>
        <table>
            <p>MOKĖTINA SUMA:</p>
            <tr>
                <td>Už naktinį tarifą:</td>
                <td><?php echo $sumNight ?></td>
            </tr>
            <tr>
                <td>Už dieninį tarifą:</td>
                <td><?php echo $sumDay ?></td>
            </tr>
            <tr>
                <td>Bendra suma, Eur:</td>
                <td><?php echo $sum ?></td>
            </tr>
        </table>
        <form method="POST" action="/electricities">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="DEKLARUOTI IR SUMOKĖTI">
        </form>
    </div>
</div>
</body>
</html>

