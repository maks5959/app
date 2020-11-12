<?php
$url = "https://www.cbr-xml-daily.ru/daily_json.js";
// Создаём запрос
$ch = curl_init();
// Настройки запроса
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Отправка и декодинг ответа
$data = json_decode(curl_exec($ch), $assoc=true);
// Закрытие запроса
curl_close($ch);

$valute = [];
$valute['usd'] = $data["Valute"]["USD"]["Value"]; // Получаем стоимость доллара
$valute['gbp'] = $data["Valute"]["GBP"]["Value"]; // Получаем стоимость фунтов
$valute['eur'] = $data["Valute"]["EUR"]["Value"]; // Получаем стоимость евро
$valute['byn'] = $data["Valute"]["BYN"]["Value"]; // Получаем стоимость белорусский рубль
$valute['krw'] = $data["Valute"]["KRW"]["Value"]; // Получаем стоимость вон Республики корея
$valute['huf'] = $data["Valute"]["HUF"]["Value"]; // Получаем стоимость Венгерский форинт
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<title>Конвертер валют</title>
</head>

<h3>Курс валют</h3>
<body>
 <p>Доллар: <?= $valute['usd'] ?> руб. </p>
 <p>Евро:   <?= $valute['eur'] ?> руб. </p>
 <p>Фунт стерлингов: <?= $valute['gbp'] ?> руб. </p>
 <p>Белорусский рубль: <?= $valute['byn'] ?> руб. </p>
 <p>Венгерский форинт: <?= $valute['huf'] ?> руб. </p>
 <p>Вон Республики корея: <?= $valute['krw'] ?> руб. </p>
<hr>


<form action="" method="get">
<p><select name="a">
 <option value="usd">USD</option>
 <option value="eur">EUR</option>
 <option value="gbp">GBP</option>
 <option value="byn">BYN</option>
 <option value="huf">HUF</option>
 <option value="krw">KRW</option>
</select>

 Количество: <input type="number" step="any" name="usd"></p>
 <input type="submit" value="Отправить" name="go">
 </form>
</body>
</html>

<?php
// Проверка, нажата ли кнопка отправки
if (isset($_GET["go"])) {
    // Конвертируем и выводим на экран
    $USD_in_RUB = round($_GET["usd"] * $valute[$_GET["a"]]);
    echo "<p>Итого в рублях: $USD_in_RUB</p>" ;
}
?>
