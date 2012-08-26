<h2>Login</h2>
<p>Select an OpenID provider you recognize</p>
<!-- Simple OpenID Selector -->
    <link type="text/css" rel="stylesheet" href="/css/openid.css" />
    <script type="text/javascript" src="/js/openid/jquery-1.2.6.min.js"></script>
    <script type="text/javascript" src="/js/openid/openid-jquery.js"></script>
    <script type="text/javascript" src="/js/openid/openid-en.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            openid.init('openid_identifier');
            openid.setDemoMode(false); //Stops form submission for client javascript-only test purposes
        });
    </script>
    <!-- /Simple OpenID Selector -->
<!-- Simple OpenID Selector -->
    <form action="/users/auth" method="get" id="openid_form">
        <input type="hidden" name="action" value="verify" />
        <fieldset>
            <legend>Sign-in or Create New Account</legend>
            <div id="openid_choice">
                <p>Please click your account provider:</p>
                <div id="openid_btns"></div>
            </div>
            <div id="openid_input_area">
                <input id="openid_identifier" name="openid_identifier" type="text" value="http://" />
                <input id="openid_submit" type="submit" value="Sign-In"/>
            </div>
            <noscript>
                <p>OpenID is service that allows you to log-on to many different websites using a single indentity.
                Find out <a href="http://openid.net/what/">more about OpenID</a> and <a href="http://openid.net/get/">how to get an OpenID enabled account</a>.</p>
            </noscript>
        </fieldset>
    </form>
    <!-- /Simple OpenID Selector -->
