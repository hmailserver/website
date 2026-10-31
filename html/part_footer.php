    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <div class="cookie-banner" id="cookieBanner">
        <p>
            We use cookies to improve your experience. By using our site, you agree to our use of cookies. <a href="/forum/ucp.php?mode=privacy" target="_blank">Learn more</a>
        </p>
        <button id="acceptCookies">Accept</button>
    </div>

    <script>
        document.getElementById('acceptCookies').addEventListener('click', function () {
            document.getElementById('cookieBanner').style.display = 'none';
            localStorage.setItem('cookiesAccepted', 'true');
        });

        window.addEventListener('load', function () {
            if (localStorage.getItem('cookiesAccepted') === 'true') {
                document.getElementById('cookieBanner').style.display = 'none';
            }
        });
    </script>
</div>
</body>
</html>
