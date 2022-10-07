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
            <a style="color: green; font-size: 25px; font-weight: bold" href="/electricities">MOKĖTINA SUMA:</a>

    </div>
</div>
</body>
</html>
