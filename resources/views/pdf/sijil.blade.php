<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
           
        }

        .certificate-container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            text-align: center;
            border: 10px solid #787878;
}


        .inner-container {
            width: 100%;
            box-sizing: border-box;
            padding: 20px;
            text-align: center;
            border: 5px solid #787878;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            font-size: 18px;
        }

        /* Add a media query for smaller screens */
        @media (max-width: 600px) {
            .certificate-container {
                padding: 10px;
            }

            .inner-container {
                padding: 10px;
            }
        }

        .logo {
            max-width: 50%;
            height: auto;
        }

        .star {
            max-width: 13%;
            height: auto;
        }

        .stamp {
            max-width: 60%;
            height: auto;
        }

        .header-text {
            font-size: 26px;
            font-weight: bold;
        }

        .student-name {
            font-size: 24px;
        }

        .course-details {
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .grade-details {
            font-size: 18px;
        }

        .date-text {
            font-size: 22px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            width: 50%;
            padding: 8px;
            text-align: center;
        }

        .left-thing {
            text-align: center;
            color: blue;
        }
    </style>
</head>
<!-- <body >  <img src="C:\laragon\www\sppip\resources\images\frame\certFrame.jpg" style="z-index:-1; position:relative; top:0;left:0;"> -->
    <div class="certificate-container">
        <div class="inner-container">
          
        <img src="https://www.moe.gov.my/images/KPM/UKK/2022/04_April/Logo_Korporat_KPM_BM.jpg" alt="KPM Logo" class="logo">            
            <span class="header-text">PENGIKTIRAFAN BINTANG</span>
            <br>
            <span class="header-text">STANDARD KUALITI INSTITUSI PENDIDIKAN SWASTA (SKIPS)</span>
            <br><br>
            <span class="student-name"><b>SEKOLAH MENENGAH AGAMA SWASTA TAHUN 2023</b></span><br/><br/><br>
            <span class="course-details">
                <img src="https://www.freepnglogos.com/uploads/red-star-png/red-star-nautical-star-tattoo-design-ideas-13.png" alt="Star" class="star">
                <img src="https://www.freepnglogos.com/uploads/red-star-png/red-star-nautical-star-tattoo-design-ideas-13.png" alt="Star" class="star">
                <img src="https://www.freepnglogos.com/uploads/red-star-png/red-star-nautical-star-tattoo-design-ideas-13.png" alt="Star" class="star">
                <img src="https://www.freepnglogos.com/uploads/red-star-png/red-star-nautical-star-tattoo-design-ideas-13.png" alt="Star" class="star">
                <img src="https://www.freepnglogos.com/uploads/red-star-png/red-star-nautical-star-tattoo-design-ideas-13.png" alt="Star" class="star">
            </span>
        
            {{-- @if (pencapaian >=1)
            tunjuk satu gamba bintang                
            @elseif(pencapaian == 2)
            tunjuk dua bintang                
            @endif 
            
            atau 
            
            
            ataupun bole guna @foreach--}}
            
            <br><br><br>
            <span class="student-name"><b>SEKOLAH MENENGAH AGAMA ABC</b></span>           
            <span class="student-name"><b>BEA1234</b></span>   
            <br><br>  
            <table>
                <tr>
                    <td ><img src="https://clipart-library.com/img/1923021.png" alt="Star" class="stamp"></td>
                    <td class="left-thing">
                        <span><b>DATUK HJ. PKHARUDDIN BIN HJ. GHAZALI</b></span>
                        <br>
                        <span ><b>Ketua Pengarah Pendidikan Malaysia</b></span>
                        <br>
                        <span ><b>Kementerian Pendidikan Malaysia</b></span>
                        <br>
                        <span ><b>Tarikh: Oktober 2023</b></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>




