<header style="background-color: grey;">
    <nav>
        <a href="./" class="flex1">Anytime Movers</a>
        <div id="three-line-menu" class="three-line-menu"><i class="ri-menu-3-line"></i></div>
            <div class="close-the-nav" id="close-the-nav">X</div>
        <ul class="flex2" id="flex2">
            <li><a href="<?=base_urlx() ?>#service-section">OUR SERVICES</a></li>
            <li><a href="about-us">ABOUT US</a></li>
            <li><a href="request-a-free-quote">REQUEST A FREE QUOTE</a></li>
            <li><a href="blogs">BLOGS</a></li>
        </ul>
    </nav>
</header>
<script>
        document.getElementById('close-the-nav').addEventListener('click',()=>{
            document.getElementById('close-the-nav').style.display = 'none';
            document.getElementById('flex2').style.transform = 'scale(0)'
        })
        document.getElementById('three-line-menu').addEventListener('click',()=>{
            document.getElementById('close-the-nav').style.display = 'block';
            document.getElementById('flex2').style.transform = 'scale(1)'
        })
    </script>