
<!DOCOTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
</head>
<body>
<main>
    <div>
        <h1>Prekių sąrašas:</h1>
        <table>
            <tbody>
            <div>
                <th style="text-align: left"><strong>PREKĖS PAVADINIMAS: </strong></th>
                <th style="text-align: left"><strong>KAINA: </strong></th>
                <?php foreach ($electricities as $key=>$electricity): ?>
                    <tr>
                        <td><?php echo $electricity['amount']?></td>
                        <td><?php echo $electricity['price'] ?></td>
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

    <div>
        <?php echo $sum ?>
    </div>

</main>
<script>
    document.body.style.backgroundColor = "lightgrey";

</script>
</body>
</html>
