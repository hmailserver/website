// Hides the cookie banner once accepted. In a file rather than inline, so the CSP can forbid inline scripts.
document.getElementById('acceptCookies').addEventListener('click', function () {
    document.getElementById('cookieBanner').style.display = 'none';
    localStorage.setItem('cookiesAccepted', 'true');
});

window.addEventListener('load', function () {
    if (localStorage.getItem('cookiesAccepted') === 'true') {
        document.getElementById('cookieBanner').style.display = 'none';
    }
});
