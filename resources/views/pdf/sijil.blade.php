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
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
           
        }

        /* .certificate-container{
         position:relative;
         top:0;
         left:0;
         

        } */


        .inner-container {
            
    margin-right: auto;
    margin-left: auto;
    
    
    padding: 20px;
    text-align: center;
    /* border: 4px solid #787878; */
    /* Remove the following two lines */
    /* display: flex; */
    /* justify-content: space-around|center; */
    /*flex-direction: column;  Add this line */
    align-items: center;
    font-size: 26px;
        }

        /* Add a media query for smaller screens */
        @media (max-width: 0px) {
            .certificate-container {
                padding: 5px;
            }

            .inner-container {
                padding: 5px;
            }
        }

        .logo {
            
            
            align-items:center;
        }

        .star {
            max-width: 10%;
            height: auto;
        }

        .stamp {
            max-width: 50%;
            height: auto;
        }

        .header-text {
            font-size: 26px;
            font-weight: bold;
            text-align:center;
        }

        .student-name {
            font-size: 26px;
        }

        .course-details {
            font-size: 26px;
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


        .left-thing {
            /* padding-left:10px; */
            text-align: left;
            color: #353935;
            font-size:  16px;
        }
    </style>
</head>
<body >  
    <img src="{{ public_path().'/images/certFrame (2).png' }}" style="z-index:1 !important; position:fixed; top:0;left:0;height:1300px;">

    <div class="certificate-container">
        <div class="inner-container">
          
        <div class="logo"><img src="{{ public_path().'/images/Logo_Korporat_KPM.png' }}" alt="KPM Logo" >
        </div>
                
            <span class="header-text">PENGIKTIRAFAN BINTANG</span>
            <br>
            <span class="header-text"> STANDARD KUALITI</span>
            <br>
            <span class="header-text"> INSTITUSI PENDIDIKAN SWASTA (SKIPS)</span>
            <br>
            <p class="student-name"><b>SEKOLAH MENENGAH AGAMA SWASTA <p style="">TAHUN 2023</p> </b></p><br/><br/>
            
            <span class="course-details">
                <img src="{{ public_path().'/images/red-star.png' }}" alt="Star" class="star">
                <img src="{{ public_path().'/images/red-star.png' }}" alt="Star" class="star">
                <img src="{{ public_path().'/images/red-star.png' }}" alt="Star" class="star">
                <img src="{{ public_path().'/images/red-star.png' }}" alt="Star" class="star">
                <img src="{{ public_path().'/images/red-star.png' }}" alt="Star" class="star">
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
            <br>    
            <span class="student-name"><b>BEA1234</b></span>   
            <br><br><br>
            <table style="margin-top:3%;">
                <tr>
                    <td style="width:40%;"><img src="https://clipart-library.com/img/1923021.png" alt="Star" class="stamp"></td>
                    <td >
                        <span class="left-thing"><b>DATUK HJ. PKHARUDDIN BIN HJ. GHAZALI</b></span>
                        <br>
                        <span class="left-thing"><b>Ketua Pengarah Pendidikan Malaysia</b></span>
                        <br>
                        <span class="left-thing"><b>Kementerian Pendidikan Malaysia</b></span>
                        <br>
                        <span class="left-thing"><b>Tarikh:<span style="padding-left:20px;">Oktober 2023</span></b></span>
                        <br>
                        <!-- <p style="text-align: left;color: #353935;font-size: 12px;padding-left:7px"><b>Tarikh:    <span style="padding-left:20px">Oktober 2023</span> </b></p> -->
                    </td>
                    
                </tr>
            </table>
        </div>
    </div>
</body>
</html>




