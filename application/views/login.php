<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php $this->load->view('script'); ?>
        <script type="text/javascript">
            $(function () {
                // validate signup form on keyup and submit
                var base_url = $('#base_url').val();
                $("#loginform").validate({
                    rules: {
                        user_name: {
                            required: true,
                            minlength: 5,
                        },
                        pass_word: {
                            required: true,
                            minlength: 5
                        },
                    },
                    messages: {
                        user_name: {
                            required: "Please enter a username",
                            minlength: "Your username must consist of at least 5 characters",
                        },
                        pass_word: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                    }
                });
            });
        </script>
    </head>
    <body>
        <h1 align="center">Login</h1>
        <div align="center">
            <?php echo $this->session->flashdata('dispMessage'); ?>
            <form action="<?php echo base_url(); ?>welcome/login" method="post" id="loginform" name="loginform">
                <table border="0">
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" id="user_name" name="user_name"></td>
                    </tr>				
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" id="pass_word" name="pass_word"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Login" name="btnLogin" id="btnLogin">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>welcome/register">Register</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>