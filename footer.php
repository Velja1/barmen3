<footer id="footer">
    <div class="container">
        <ul class="icons">
            <li><a href="http://facebook.com" target="_blank" class="icon fa-facebook"></a></li>
            <li><a href="http://twitter.com" target="_blank" class="icon fa-twitter"></a></li>
            <li><a href="http://instagram.com" target="_blank" class="icon fa-instagram"></a></li>
        </ul>
        <ul class="copyright">
        <?php
            global $conn;
            $upit="SELECT * FROM meni WHERE lokacija = 'footer'";
            $podaci=$conn->query($upit)->fetchAll();
            foreach($podaci as $red):
        ?>
            <li><a href="<?=$red->href?>"><?=$red->naziv?></a></li>
        <?php
            endforeach;
        ?>
        </ul>
    </div>
</footer>