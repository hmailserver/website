<?php
    $title_prepend = "Contact";
    $nav_active = "contact";

    // Site key of the Turnstile widget (public). The secret key is a Worker secret (workers/edge).
    // TODO: replace Cloudflare's always-pass test key with the real site key.
    $turnstile_site_key = "1x00000000000000000000AA";

    include __DIR__ . "/part_header.php";
?>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Handled by the Cloudflare Worker in workers/edge. -->
                <form action="/api/contact" method="post" name="contactForm" class="form-control-limited-width">
                    <br/>
                    This form can be used to contact the developers of hMailServer. Support questions should be submitted via the forum.
                    <br/><br/>

                    <label for="contactsubject">Subject:</label><br/>
                    <input type="text" id="contactsubject" name="contactsubject" size="25" maxlength="200" class="form-control" placeholder="Subject"><br/>

                    <label for="contactname">Your name:</label><br/>
                    <input type="text" id="contactname" name="contactname" size="25" maxlength="200" class="form-control" placeholder="Enter name"><br/>

                    <label for="contactcompany">Company:</label><br/>
                    <input type="text" id="contactcompany" name="contactcompany" size="25" maxlength="200" class="form-control" placeholder="Enter company"><br/>

                    <label for="contactemail">E-mail address:</label><br/>
                    <input type="email" id="contactemail" name="contactemail" size="30" maxlength="254" class="form-control" placeholder="Enter email" required><br/>

                    <label for="contactmessage">Message:</label><br/>
                    <textarea id="contactmessage" name="contactmessage" cols="60" rows="8" maxlength="20000" class="form-control" placeholder="Enter message" required></textarea>
                    <br/>
                    <div class="cf-turnstile" data-sitekey="<?php echo htmlspecialchars($turnstile_site_key); ?>" data-action="contact"></div>
                    <br/>
                    <button type="submit" class="btn btn-default">Send message</button>
                </form>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
