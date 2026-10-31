<?php
    $title_prepend = "Contact";
    $nav_active = "contact";
    include __DIR__ . "/part_header.php";
?>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

    <script type="text/javascript">
        function validateForm() {
            return true;
        }
    </script>

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
                <form action="/api/contact" method="post" name="contactForm" role="form" class="form-control-limited-width" onsubmit="return validateForm();">
                    <br/>
                    This form can be used to contact the developers of hMailServer. Support questions should be submitted via the forum.
                    <br/><br/>
                    <input type="hidden" name="type" value="contact">

                    Subject:<br/>
                    <input type="text" name="contactsubject" size="25" class="form-control" placeholder="Subject"><br/>

                    Your name:<br/>
                    <input type="text" name="contactname" size="25" class="form-control" placeholder="Enter name"><br/>

                    Company:<br/>
                    <input type="text" name="contactcompany" size="25" class="form-control" placeholder="Enter company"><br/>

                    E-mail address:<br/>
                    <input type="text" name="contactemail" size="30" class="form-control" placeholder="Enter email"><br/>

                    <div id="messageHeader">
                        Message:
                    </div>
                    <textarea name="contactmessage" cols="60" rows="8" class="form-control" placeholder="Enter message"></textarea>
                    <br/>
                    <div class="g-recaptcha" data-sitekey="6Ley_ZItAAAAAB6tfQHof9LKCVV52AKju4yRjtOb" data-action="CONTACT"></div>
                    <br/>
                    <button type="submit" class="btn btn-default">Send message</button>
                </form>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/part_footer.php";
?>
