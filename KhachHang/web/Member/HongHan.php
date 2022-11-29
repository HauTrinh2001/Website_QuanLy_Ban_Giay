<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resume.css">
</head>

<body>
    <div class="full">
        <div class="left">
            <div class="image">
                <img src="./img_Member/HongHan.jpg" alt="gfg-logo" style="width:100px;height:100px;">
            </div>
            <div class="Contact">
                <h3>THÔNG TIN CÁ NHÂN</h3>
                <p><b>Email:</b>honghan15102001@gmail.com</p>
                <p><b>Số điện thoại:</b>0374798026</p>
            </div>
            <div class="Skills">
                <h3>KỸ NĂNG</h3>
                <ul>
                    <li>
                        <p>Ngôn ngữ:
                            C++,php,C#</p>
                    </li>
                    <li>
                        <p>Frontend : HTML5,
                            JavaScript</p>
                    </li>

                </ul>
            </div>
            <div class="Language">
                <h3>NGÔN NGỮ</h3>
                <ul>
                    <li>
                        <p>Tiếng Anh
                        <p>
                    </li>

                </ul>
            </div>
            <div class="Hobbies">
                <h3>SỞ THÍCH</h3>
                <ul>
                    <li>
                        <p>Coi anime</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="name">
                <h2>Nguyễn Ngọc Hồng Hân</h2>
            </div>
            <div class="title">
                <p>Lập trình viên</p>
            </div>
            <div class="Summary">
                <h3>MỤC TIÊU</h3>
                <p>
                    Ra trường đúng hạn, làm việc đúng chuyên ngành
                </p>
            </div>
            <div class="Experience">
                <h3>KINH NGHIỆM</h3>
                <h4>Thực tập tại TMA Solutions Bình Định</h4>
                <p>Từ ngày 05/12 đến 07/01</p>

            </div>
            <div class="Education">
                <h3>TRÌNH ĐỘ HỌC VẤN</h3>
                <p class="nghieng">Đại Học Nha Trang (2019 - 2023)<br></p>
                <p class="nghieng">Chuyên nghành công nghệ thông tin<br></p>

            </div>

        </div>
    </div>
</body>

</html>
<style>
    /* Write CSS Here */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .full {
        width: 50%;
        max-width: 1000px;
        min-height: 100px;
        background-color: rgb(245, 239, 231);
        margin: 0px;
        display: grid;
        grid-template-columns: 2fr 4fr;
        margin: 0 auto;
        margin-top: 20px;
    }

    .left {
        position: initial;
        background-color: rgb(126, 219, 231);
        padding: 20px;

    }

    .right {
        position: initial;
        background-color: rgb(162, 202, 206);
        padding: 20px;

    }

    li {
        list-style: none;
    }

    .full .image,
    .Contact,
    .Skills,
    .Language,
    .Hobbies,
    .title,
    .Summary,
    .Experience,
    .Education,
    .project {
        margin-bottom: 30px;
    }

    .full h3 {
        background-color: rgb(4, 96, 150);
        color: aliceblue;

    }

    .nghieng {
        font-style: italic;
    }

    p {
        font-size: small;
    }
</style>