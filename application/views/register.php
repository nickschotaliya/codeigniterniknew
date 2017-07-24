<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php $this->load->view('script'); ?>
        <script type="text/javascript">
            $(function () {
                // validate signup form on keyup and submit
                var base_url = $('#base_url').val();
                $("#registerform").validate({
                    rules: {
                        first_name: "required",
                        last_name: "required",
                        user_name: {
                            required: true,
                            minlength: 5,
                            remote: {
                                url: base_url + 'welcome/checkUserName',
                                type: "post",
                                data: {
                                    user_name: function () {
                                        return $("#user_name").val();
                                    }
                                }
                            }
                        },
                        pass_word: {
                            required: true,
                            minlength: 5
                        },
                        pwdConfirmPassword: {
                            required: true,
                            minlength: 5,
                            equalTo: "#pass_word"
                        },
                        e_mail: {
                            required: true,
                            email: true,
                            remote: {
                                url: base_url + 'welcome/checkEmail',
                                type: "post",
                                data: {
                                    e_mail: function () {
                                        return $("#e_mail").val();
                                    }
                                }
                            }
                        }
                    },
                    messages: {
                        first_name: "Please enter your firstname",
                        last_name: "Please enter your lastname",
                        user_name: {
                            required: "Please enter a username",
                            minlength: "Your username must consist of at least 5 characters",
                            remote: "Username is already in use!"
                        },
                        pass_word: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        pwdConfirmPassword: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        e_mail: {
                            required: "Please enter email address",
                            email: "Please enter a valid email address",
                            remote: "Email is already in use!"
                        },
                    }
                });
            });
        </script>
    </head>
    <body>
        <h1 align="center">Registration</h1>
        <div align="center">
            <?php echo $this->session->flashdata('dispMessage'); ?>
            <form action="<?php echo base_url(); ?>welcome/register" method="post"
                  id="registerform" name="registerform">
                <table border="0">
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" id="user_name" name="user_name"></td>
                    </tr>
                    <tr>
                        <td>First Name :</td>
                        <td><input type="text" id="first_name" name="first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name :</td>
                        <td><input type="text" id="last_name" name="last_name"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input type="email" id="e_mail" name="e_mail"></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" id="pass_word" name="pass_word"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password :</td>
                        <td><input type="password" id="pwdConfirmPassword" name="pwdConfirmPassword"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Save" name="btnRegister" id="btnRegister">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>welcome/login">Login</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>