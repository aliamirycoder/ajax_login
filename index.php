<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود - لاگین با تکنولوژی AJAx </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="login">
    <center>
        <div class="container">
            <br>
            <br>
            <br>

            <div class="login-box">
                <br>
                <br>
                <br>
                <img src="img/logo-vector.png" width="150px" alt="">
                <h5>ajax login - aliamirycoder </h5>
                <br>
                <br>

                <table cellpadding="8px">
                    <tr>
                        <td><h3><i class="fas fa-user-alt"></i> :»</h3> </td>
                        <td><input type="text" class="form-control" placeholder="کد ملی : " id="name"></td>
                    </tr>
                    <tr>
                        <td>
                            <h3><i class="fa fa-lock"></i> :»</h3>
                        </td>
                        <td><input type="password" class="form-control" placeholder="رمز عبور : " id="password"></td>
                    </tr>
                </table>
                <br>
                <input type="button" onclick="check()" data-toggle="modal" data-target="#exampleModal" value="ورود " class="btn btn-success">

                </form>
            </div>
        </div>
    </center>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div data-dismiss="modal">
                        <img src="img/close.png" width="50px" alt="">
                    </div>
                    <center>
                        <h4 id="respond"></h4>
                        <div id="loaderbox"></div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>

    function check() {
        var name = document.getElementById('name').value
        var pass = document.getElementById('password').value
        if (name =="" || name == null){
            document.getElementById('respond').innerHTML = "فیلد کد ملی نباید خالی باشد "
            document.getElementById("name").style.borderBottom = "thick solid red";
        }
        else if (pass =="" || pass == null){
            document.getElementById('respond').innerHTML = "فیلد کد رمز  خالی باشد "
            document.getElementById("password").style.borderBottom = "thick solid red";
        }
        else {
            login()
        }

    }
    function login() {
        document.getElementById('respond').innerHTML=""
        function end() {
            document.getElementById('loader').style.transition = "all 2s"
            document.getElementById('loader').style.display = "none"
            document.getElementById('leadertext').style.display = "none"
        }
        function lodaerbox() {
            document.getElementById('loaderbox').innerHTML="<img src=\"img/loader.png\" id=\"loader\" class=\"loader\"  alt=\"\">\n" +
                "                        <p id=\"leadertext\">در حال پردازش اطلاعات </p>"
        }
        function enter (){
            location.replace('panel.php')
        }
        lodaerbox()
        var name = document.getElementById('name').value
        var password = document.getElementById('password').value
        var select_query = new XMLHttpRequest();
        select_query.onreadystatechange = function () {
            if (select_query.readyState == 4 && select_query.status==200){
                console.log(select_query.responseText)
                setTimeout(end, 1000);
                function see(){
                    if (select_query.responseText.indexOf('no-mojod') > -1){
                        document.getElementById('respond').innerHTML = "<img src='img/erore.png' width='100px'/><p style='color: red'> حساب کاربری با این نام موجود نیست </p> <input type='button' onclick='clear()' class='btn btn-primary' value='تلاش مجدد ' data-dismiss=\"modal\">"
                    }
                    else {
                        if (select_query.responseText.indexOf('truepassword') > -1){
                            document.getElementById('respond').innerHTML = "<h4 style='color: green'>خوش آمدید</h4>"
                            setTimeout(enter, 1000);
                        }
                        if (select_query.responseText.indexOf('wrongpassword') > -1){
                            document.getElementById('respond').innerHTML = "<h4 style='color: red'>رمز عبور یا نام کاربری اشتباه است </h4>"

                        }
                    }
                }
                setTimeout(see , 1000)

            }

        }
        select_query.open("GET","test-login.php?name="+name+"&password="+password,true)
        select_query.send();
    }
</script>
</html>