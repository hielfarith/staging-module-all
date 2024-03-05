<!DOCTYPE html>
<html lang="en">





<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemarkahan Murid</title>

    <style>
        /* CSS Class Definition */
        .highlighted-row {
            background-color: lightblue;
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
            <td>PPD : PPD PETALING UTAMA</td>
            <td>PEMARKAHAN PENARAFAN KESELAMATAN SEKOLAH KEMENTERIAN PENDIDIKAN MALAYSIA</td>
        </tr>
    </table>
<table>
	<tbody>
		<tr class="highlighted-row">
			<td rowspan="3">BIL</td>
			<td rowspan="3">Daerah</td>
			<td rowspan="3">Bil.Sekolah Rendah</td>
			<td rowspan="3">Bil.Sekolah Menengah</td>
			<td rowspan="3">Bil. Sekolah</td>
			<td colspan="6">Penarafan Keselamatan Sekolah</td>
		</tr>
		<tr class="highlighted-row">
			<td colspan="3">Kategori Sekolah Rendah</td>
			<td colspan="3">Kategori Sekolah Menengah</td>
		</tr>
		<tr class="highlighted-row">
			<td>0 - 49%</td>
			<td>50 - 79%</td>
			<td>80 - 100%</td>
			<td>0 - 49%</td>
			<td>50 - 79%</td>
			<td>80 - 100%</td>
		</tr>
		<tr>
			<td>1</td>
			<td>PPD JELI</td>
			<td>15</td>
			<td>6</td>
			<td>21</td>
			<td>0</td>
			<td>0</td>
			<td>15</td>
			<td>0</td>
			<td>0</td>
			<td>6</td>
		</tr>
		<tr>
			<td>2</td>
			<td>PPD PASIR MAS</td>
			<td>56</td>
			<td>25</td>
			<td>81</td>
			<td>0</td>
			<td>0</td>
			<td>56</td>
			<td>0</td>
			<td>0</td>
			<td>25</td>
		</tr>
		<tr>
			<td>3</td>
			<td>PPD PASIR PUTIH</td>
			<td>39</td>
			<td>17</td>
			<td>56</td>
			<td>0</td>
			<td>0</td>
			<td>39</td>
			<td>0</td>
			<td>0</td>
			<td>17</td>
		</tr>
		<tr>
			<td>4</td>
			<td>PPD MACHANG</td>
			<td>29</td>
			<td>10</td>
			<td>39</td>
			<td>0</td>
			<td>0</td>
			<td>29</td>
			<td>0</td>
			<td>0</td>
			<td>10</td>
		</tr>
		<tr>
			<td>5</td>
			<td>PPD TUMPAT</td>
			<td>35</td>
			<td>13</td>
			<td>48</td>
			<td>0</td>
			<td>1</td>
			<td>34</td>
			<td>0</td>
			<td>0</td>
			<td>13</td>
		</tr>
		<tr>
			<td>6</td>
			<td>PPD KOTA BHARU</td>
			<td>96</td>
			<td>49</td>
			<td>145</td>
			<td>0</td>
			<td>1</td>
			<td>97</td>
			<td>0</td>
			<td>0</td>
			<td>47</td>
		</tr>
		<tr>
			<td>7</td>
			<td>PPD KUALA KRAI</td>
			<td>41</td>
			<td>13</td>
			<td>54</td>
			<td>0</td>
			<td>0</td>
			<td>40</td>
			<td>0</td>
			<td>0</td>
			<td>13</td>
		</tr>
		<tr>
			<td>8</td>
			<td>PPD TANAH MERAH</td>
			<td>34</td>
			<td>16</td>
			<td>50</td>
			<td>0</td>
			<td>0</td>
			<td>34</td>
			<td>0</td>
			<td>1</td>
			<td>15</td>
		</tr>
		<tr>
			<td>9</td>
			<td>PPD BACHOK</td>
			<td>34</td>
			<td>19</td>
			<td>53</td>
			<td>0</td>
			<td>0</td>
			<td>34</td>
			<td>0</td>
			<td>0</td>
			<td>19</td>
		</tr>
		<tr>
			<td>10</td>
			<td>PPD GUA MUSANG</td>
			<td>39</td>
			<td>10</td>
			<td>49</td>
			<td>0</td>
			<td>2</td>
			<td>37</td>
			<td>0</td>
			<td>1</td>
			<td>9</td>
		</tr>
		<tr>
			<td colspan="2">JUMLAH</td>
			<td>420</td>
			<td>178</td>
			<td>598</td>
			<td>0</td>
			<td>4</td>
			<td>415</td>
			<td>0</td>
			<td>2</td>
			<td>174</td>
		</tr>
		<tr>
			<td colspan="5">PERATUS</td>
			<td>0%</td>
			<td>1&amp;</td>
			<td>99%</td>
			<td>0%</td>
			<td>1%</td>
			<td>98%</td>
		</tr>
	</tbody>
</table>
