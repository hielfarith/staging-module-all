<!DOCTYPE html>
<html lang="en">





<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurusan Murid</title>

    <style>
        /* CSS Class Definition */
        .highlighted-row {
            background-color: lightblue;
            font-size: 13px;
        }

        .line {
            margin-bottom: 20px;
            /* Adjust the spacing between lines */
        }


        body {
            font-family: Arial, sans-serif;
            /* Specify your desired font family */
            font-size: 12px;
            /* Specify your desired font size */
        }

        .header {
            background-color: #f0f0f0;
        }

        .logo img {
            max-width: 70px;
            text-align: left;
        }

        .title {
            max-width: 100px;
            text-align: center;
            margin: 0;

        }

        .contact-info {
            text-align: right;
            margin: 0;
        }

        .contact-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;

        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;

        }

        th {
            background-color: #f2f2f2;
        }

        .info-group {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .info-group>div {
            margin-right: 20px;
            /* Adjust as needed */
        }

        .title {
            border-collapse: collapse;
            border: none;
            /* Removes the border from the table */
        }

        .title td,
        .title th {
            border: none;
            /* Removes the border from table cells */
        }

    </style>
</head>



<body>
    <table class="title">
        <tr>
            <td>
                <div class="title logo">
                    <img src="{{ asset('images/logo/jata_negara.png') }}" alt="Logo">
                </div>
            </td>
            <td>
                <div>
                    <span>
                        KEMENTERIAN PENDIDIKAN MALAYSIA <br>
                        PUSAT PETADBIRAN KERAJAAN PERSEKUTUAN PUTRAJAYA <br>
                        62604 PUTRAJAYA
                    </span>
                </div>
            </td>
            <td>
                <div class="contact-info">
                    <span>
                        Tel: +603-8884 9401 <br>
                        Fax: +603-8888 9315 <br>
                        http://www.moe.gov.my
                    </span>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <style>
        hr.right {
            width: 100%;
            border: none;
            height: 1px;
            /* Adjust as needed */
            background-color: black;
            /* Adjust the color if needed */
        }

    </style>
    </head>

    <body>

        <hr class="right">

    </body>
    <br>
    <br>

    <table border="1" style="width: 100%;">
        <tr class="highlighted-row">
            <td>KOD SEKOLAH : BBA4016</td>
            <td>NAMA SEKOLAH : SEKOLAH KEBANGSAAN BERANANG</td>
            <td>FASA : NOVEMBER/2022</td>
        </tr>
    </table>

    <table>
        <tbody>
            <tr class="highlighted-row">
                <td colspan="4">ASPEK 1: PENGURUSAN AKTIVITI MURID</td>
            </tr>
            <tr>
                <td colspan="3">ITEM</td>
                <td>SKOR</td>
            </tr>
            <tr>
                <td>a)</td>
                <td colspan="2">Arahan Keselamatan Murid Dari Aspek Pergi Dan Balik Sekolah:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>i.</td>
                <td>Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga,
                    Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>ii.</td>
                <td>Menyedia dan mempamer tatacara keselamatan pergi dan balik sekolah</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>iii.</td>
                <td>pemeriksaan berkala ke atas kenderaan yang digunakan murid ke sekolah.(Basikal, Motosikal, Kereta)
                </td>
                <td>1</td>
            </tr>
            <tr>
                <td></td>
                <td>iv.</td>
                <td>Mematuhi prosedur dan peraturan berkaitan keselamatan daripada pihak berkuasa berkenaan. (Jaket
                    keselamatan/topi
                    keledar/lesen memandu/cukai jalan dan lain-lain berkaiMenetapkan laluan pejalan kaki, laluan dan
                    parkir kenderaan yang digunakan oleh muridtan)</td>
                <td>1</td>
            </tr>
            <tr>
                <td></td>
                <td>v.</td>
                <td>Menetapkan laluan pejalan kaki, laluan dan parkir kenderaan yang digunakan oleh murid</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>vi.</td>
                <td>Menetapkan tempat menurunkan dan mengambil murid yang menggunakan bas dan yang dihantar oleh penjaga
                </td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>vii.</td>
                <td>Kawal selia pengurusan sekolah sewaktu murid datang dan balik dari sekolah.</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>viii.</td>
                <td>Ada arahan berkaitan keselamatan murid semasa berada di jeti / stesen bas/ stesen kereta api/ dan
                    lain-lain</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">JUMLAH SKOR</td>
                <td>14</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>b)</td>
                <td colspan="2">Arahan Keselamatan Murid Semasa Pengajaran & Pembelajaran Dan Waktu Rehat</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>i.</td>
                <td>Ada Arahan berkaitan keselamatan murid di bilik darjah, makmal. bengkel, lain-lain tempat amali dan
                    bilik-bilik khas</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>ii.</td>
                <td>Pengawasan guru sebelum, semasa, dan selepas aktiviti dijalankan</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>iii.</td>
                <td>Memastikan kehadiran murid direkodkan</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>iv.</td>
                <td>Memastikan tatacara penggunaan peralatan dipatuhi</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>v.</td>
                <td>Mematuhi peraturan berpakaian semasa melaksanakan aktiviti</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>vi.</td>
                <td>Ada arahan kepada murid tentang kawasan larangan sewaktu rehat</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>vii.</td>
                <td>Rekod keluar masuk dari kawasan sekolah semasa Pengajaran & Pembelajaran</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">JUMLAH SKOR</td>
                <td>14</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>c)</td>
                <td colspan="2">Arahan Keselamatan Murid Semasa Aktiviti Kokurikulum, Sukan Dan Permainan</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>i.</td>
                <td>Ada arahan berkaitan keselamatan murid sebelum, semasa dan selepas aktiviti kokurikulum, sukan dan
                    permainan</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>ii.</td>
                <td>Pengawasan guru sebelum, semasa dan selepas aktiviti dijalankan</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>iii.</td>
                <td>Memastikan kehadiran murid direkodkan</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>iv.</td>
                <td>Memastikan tatacara penggunaan peralatan dipatuhi</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td>v.</td>
                <td>Mematuhi peraturan berpakaian semasa melaksanakan aktiviti</td>
                <td>2</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">JUMLAH SKOR</td>
                <td>10</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
