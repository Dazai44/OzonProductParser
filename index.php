<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Парсинг товаров магазинов</title>
</head>
<body>
<?php include('MainFileParser.php'); ?>

    <form  name="sendvalue"  method="POST">
    <?php if ($errors): ?>
    <?php foreach($errors as $error): ?>
     <h3><?php echo 'ОШИБКА: '. $error?></h3><!-- Вывод  скриптовых ошибок если они есть  -->
    <?php endforeach; ?>
    <?php endif; ?>

    <label>Название товара: <br> <input type="text" name="name-product"></label> <br> <br>
    <label>Сколько товаров: <br> <input type="number" name="quantity-product"></label> <br> <br>

    <input  type="submit" name="send-btn" value="Отправить" >

    </form> 
<h3>Товары из магазина OZON:</h3>
<h5>Запрос: <?php echo $_POST['name-product']; ?> (<?php echo $_POST['quantity-product']; ?>) </h5>
<table class="simple-little-table" cellspacing='0'>
	
    

    <tr>
        <td>Название товара:</td>
        <?php foreach($titles_oz as $title): ?>
        <td><?php echo  $title; ?></td>
        <?php endforeach; ?>
    </tr>

    <tr>
        <td>Цена:</td>
        <?php foreach($prices_oz as $price): ?>
        <td><?php echo $price; ?></td>
        <?php endforeach; ?>
    </tr>

    <tr>
        <td>Скидка:</td>
        <?php foreach($percents_oz as $percent): ?>
        <td><?php echo $percent; ?></td>
        <?php endforeach; ?>
        
    </tr>

    <tr>
        <td>Цена без скидки:</td>
        <?php if(isset($prices_without_sale_oz)): ?>
        <?php foreach($prices_without_sale_oz as $price_without_sale_oz): ?>
        <td><?php echo $price_without_sale_oz; ?></td>
        <?php endforeach; ?>
        <?php else: ?>
        -
        <?php endif; ?>
        
    </tr>

    <tr>
        <td>Изображение:</td>
        <?php foreach($images_oz as $img): ?>
        <td><img src="<?php echo $img ?>"></td>
        <?php endforeach; ?>
    </tr>

    <tr>
        <td>Ссылка на товар:</td>
        <?php foreach($links_oz as $link): ?>
        <td><a href="<?php echo $link ?>">Ссылка</a></td>
        <?php endforeach; ?>
    </tr>

    
 
</table>


    
</body>
  
</html>