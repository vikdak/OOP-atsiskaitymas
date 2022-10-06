
<!DOCOTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
</head>
<body>
<main>
    <div>
        <h1></h1>
        <table>
            <tbody>
            <div>
                <th style="text-align: left"><strong>KILOVATVALANDŽIŲ KIEKIS: </strong></th>
                <th style="text-align: left"><strong>KAINA: </strong></th>
                <th style="text-align: left"><strong>TARIFAS: </strong></th>
                <?php foreach ($electricities as $key=>$electricity): ?>
                    <tr>
                        <td><?php echo $electricity['amount']?></td>
                        <td><?php echo $electricity['price'] ?></td>
                        <td><?php echo $electricity['tariff'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </div>
            </tbody>
        </table>
        <form method="POST" action="/electricities">
            <input type="hidden" name="_method" value="sum">
            <input type="submit" name="button"  value="RODYTI BENDRĄ SUMĄ">
        </form>
    </div>
</main>
<script>
    document.body.style.backgroundColor = "lightgrey";
</script>
</body>
</html>
