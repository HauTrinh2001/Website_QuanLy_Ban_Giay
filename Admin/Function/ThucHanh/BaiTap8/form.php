<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 8</title>
 
</head>

<body>


    <form action="?thamso=baitap&bai=8_answer" method="post">
        <div class="container">
            <h1>Enter Your Information</h1>
            <div class="item">
                Full name:
                <div>
                    <input type="text" name="fullname" value="">
                    <span></span>
                </div>
            </div>
            <div class="item">
                Address:
                <div>
                    <input type="text" name="address" value="">
                    <span></span>
                </div>
            </div>

            <div class="item">
                Phone:
                <input  type="text" name="phone" value="">
            </div>
            <div class="item">
                Gender:
                <div class="gender">
                    <input type="radio" name="gender" value="Nam">Nam
                    <input type="radio" name="gender" value="Nữ">Nữ
                </div>

            </div>

            <div class="item">
                Country:
                <select id="country" name="country">
                    <option  value="Việt Nam">Việt Nam</option>
                    <option  value="Nhật Bản">Nhật Bản</option>
                    <option  value="Hàn Quốc">Hàn Quốc</option>
                </select>

            </div>
            <div class="item">
                Study:
                <div class="study">
                    <input type="checkbox" name="PHPandMySQL">PHP & MySQL
                    <input type="checkbox" name="ASPNet">ASP.Net
                    <input type="checkbox" name="CCNA">CCNA
                    <input type="checkbox" name="Security">Security+
                </div>

            </div>
            <div class="item">
                Note:
                <textarea name="note" id="" cols="1" rows="3">

                </textarea>

            </div>
            <div class="submit">
                <input type="submit" value="Gửi" name="submit">
                <input type="reset" value="Làm mới" name="lammoi">

            </div>
            <span></span>
        </div>

    </form>


    <style>
.container {
    width: 700px;
    height: 400px;
    background-color: #fffada;
    padding: 0 20px;
    box-sizing: border-box;

}
h1 {
    padding: 3px 0px;
    text-align: center;
    background-color: #fed576;
    text-transform: uppercase;
}
.item {
    display: grid;
    grid-template-columns: 0.5fr 2fr ;
    grid-template-rows: 1fr;
    margin-top: 10px;
    column-gap: 15px;

}

.item input,select {
    width: 100%;
    height: 25px;
    transform: translate(0, -25%);
}

.submit {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.submit input {
    margin-right: 10px;
}


.submit input:nth-child(1) ,.submit input:nth-child(2){
    cursor: pointer;
    padding: 5px 5px;
}

.gender ,.study{
    display: flex;
   
}
.gender input,.study input {
    width: 10%;
    height: 25px;
    transform: translate(0, -25%);
    margin: 0px 0px;
}
    </style>
</body>

</html>