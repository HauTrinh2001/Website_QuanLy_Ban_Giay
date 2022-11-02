<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="?thamso=baitap&bai=6_answer" method="post">
        <div class="container">
            <h1>Phép tính trên hai số</h1>
            <div class="item">
                Chọn phép tính:
                <div class="cal">
                    <input type="radio" name="pheptinh" value="+" checked="true">Cộng
                    <input type="radio" name="pheptinh" value="-">Trừ
                    <input type="radio" name="pheptinh" value="*">Nhân
                    <input type="radio" name="pheptinh" value="/">Chia
                </div>

            </div>
            <div class="item">
                Số thứ nhất:
                <div>
                    <input type="text" name="so1" value="<?php  ?>">
                    <span><?php ?></span>
                </div>

            </div>
            <div class="item">
                Số thứ hai:
                <div>
                    <input type="text" name="so2" value="<?php ?>">
                    <span><?php  ?></span>
                </div>

            </div>

            <div class="submit">
                <input type="submit" value="Tính" name="submit">
                <input type="reset" value="Làm mới" name="lammoi">
               
            </div>
        </div>

    </form>


<style>
    .container {
    width: 500px;
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
    grid-template-columns: 1fr 2fr ;
    grid-template-rows: 1fr;
    margin-top: 10px;
    column-gap: 15px;

}

.item input {
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
.item input:last-child {
    background: #ffdcdc;
}
.cal {
    display: flex;
    gap: 3px;
}
</style>
</body>

</html>