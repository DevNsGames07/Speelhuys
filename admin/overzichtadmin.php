<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header class="site-header">
        <div class="site-logo">
           <h2>Speelhuys</h2> 
        </div>
        <nav class="top menu">
            <a href="overzichtadmin.php" class="active">Overzicht</a>
            <a href="#">Thema</a>
            <a href="#">Merk</a>
            <a href="#">Leeftijd</a>
        </nav>
    </header>
    <div class="page-layout">
        <aside class="sidebar">
            <h3>Menu</h3>
            <a href="overzichtadmin.php">Overzicht</a>
            <a href="#">Thema</a>
            <a href="#">Merk</a>
            <a href="#">Leeftijd</a>
            <a href="#">Prijs</a>
            <a href="#">Steentjes</a>
        </aside>
    <main class="content">
      <div class="container-header">
        <div>
            <p>Bekijk alle beschikbare pakketten.</p>
        </div>
        <form method="get" class="search-form">
            <input type="text" name="zoek" placeholder="Zoek een pakket...">
            <button type="submit">Zoeken</button>
        </form>
      </div>
    </main>
    
<footer class="site-footer">
    <h2>Speelhuys</h2>
</footer>    
</body>
</html>