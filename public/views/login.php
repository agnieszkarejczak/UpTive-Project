<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                <!--TODO Area for logo svg image-->
                <!--Temporarily-->
                UpTive
            </div>
        </div>
        <div class="login-sign-container">
            <div class="signup-container">
                <form>
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <input name="rpassword" type="password" placeholder="repeat password">
                    <button>SIGN UP</button>
                </form>
            </div>

            <div class="login-container" >
                <form class="login" action="login" method="POST">
                    <div class="message">
                        <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>

                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <button type="submit">LOG IN</button>
                </form>

                <div class="additional-signup">
                    ---------- or ----------
                    <button>SIGN UP</button>
                </div>
            </div>
        </div>
    </div>
</body>