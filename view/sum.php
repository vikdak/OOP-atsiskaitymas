
<!DOCOTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
</head>
<body style="margin: 80px; background-color: lightgoldenrodyellow;">
<p style="display: flex; justify-content: center;font-size: 50px; font-weight: bold; color: green">ELEKTROS KAINOS SKAIČIUOKLĖ</p>
<div style="display: flex; justify-content:center; font-size: 25px; background-color: lightgoldenrodyellow; border-style: solid ;border-color: darkgreen">
    <table>
        <tbody>
        <div>
            <th >KILOVATVALANDŽIŲ KIEKIS:</th>
            <th >KAINA:</th>
            <th >TARIFAS: </th>
            <th >MĖNESIS: </th>
            <?php foreach ($electricities as $key=>$electricity): ?>
                <tr>
                    <td><?php echo $electricity['amount']?></td>
                    <td><?php echo $electricity['price'] ?></td>
                    <td><?php echo $electricity['tariff'] ?></td>
                    <td><?php echo $electricity['month'] ?></td>
                </tr>
            <?php endforeach; ?>
        </div>
        </tbody>
    </table>
<!--    <form method="POST" action="/electricities">-->
<!--        <input type="hidden" name="_method" value="sum">-->
<!--        <input type="submit" name="button"  value="RODYTI BENDRĄ SUMĄ">-->
<!--    </form>-->
    <div>
        <?php echo $sum ?>
    </div>
</div>

</body>

</html>
