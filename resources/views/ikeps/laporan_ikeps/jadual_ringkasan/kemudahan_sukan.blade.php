<div class="row">
    <div class="col-md-6">
        <label class="form-label fw-bold">Jenis Kemudahan Sukan</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Jenis Kemudahan Sukan</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold">Jenis Sub Kemudahan Sukan</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Jenis Kemudahan Sukan</option>
        </select>
    </div>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <a class="me-3 text-danger" type="button" id="reset" href="#">
            Setkan Semula
        </a>
        <button type="button" onclick="search()" class="btn btn-success float-right">
            <i class="fa fa-search me-1"></i> Cari
        </button>
    </div>
</div>

<style>
    #ringkasan_kemudahan_sukan thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_kemudahan_sukan tbody {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_kemudahan_sukan table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<hr>

<div class="table-responsive mt-2">
    <table class="table table-bordered table-hovered" id="ringkasan_kemudahan_sukan">
        <thead style="color: white; background-color:#39c3b5;">
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Jenis Prasarana</th>
                <th rowspan="2">Sub Prasarana</th>
                <th colspan="2">Bilangan</th>
            </tr>
            <tr>
                <th>Ada</th>
                <th>Tiada</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Badminton</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Badminton</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Badminton</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola Baling</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bola Baling</td>
                <td>Gelanggang Terbuka (Berumput)</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Bola Baling</td>
                <td>Gelanggang Terbuka (Hardcourt)</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Bola Baling</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Bola Jaring</td>
                <td>Gelanggang Dalam dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>9</td>
                <td>Bola Jaring</td>
                <td>Gelanggang Terbuka (Berumput)</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Bola Jaring</td>
                <td>Gelanggang Terbuka (Hardcourt)</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>11</td>
                <td>Bola Jaring</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>12</td>
                <td>Bola Keranjang</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>13</td>
                <td>Bola Keranjang</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>14</td>
                <td>Bola Keranjang</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>15</td>
                <td>Bola Tampar</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>16</td>
                <td>Bola Tampar</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>17</td>
                <td>Bola Tampar</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>18</td>
                <td>Boling Tenpin</td>
                <td>12 Lorong</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>19</td>
                <td>Boling Tenpin</td>
                <td>8 Lorong</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>20</td>
                <td>Boling Tenpin</td>
                <td>Lain-lain Lorong</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>21</td>
                <td>Futsal</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>22</td>
                <td>Futsal</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>23</td>
                <td>Futsal</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>24</td>
                <td>Gimnastik Artistik</td>
                <td>Dewan Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>25</td>
                <td>Gimnastik Artistik</td>
                <td>Dewan Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>26</td>
                <td>Gimnastik Berirama</td>
                <td>Dewan Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>27</td>
                <td>Gimnastik Berirama</td>
                <td>Dewan Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>28</td>
                <td>Kriket</td>
                <td>Saiz Padang Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>29</td>
                <td>Kriket</td>
                <td>Saiz Padang Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>30</td>
                <td>Lain-lain</td>
                <td>Lain-lain Kemudahan Sukan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>31</td>
                <td>Memanah</td>
                <td>Lapang Sasar Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>32</td>
                <td>Memanah</td>
                <td>Lapang Sasar Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>33</td>
                <td>Padang Bola Sepak</td>
                <td>Saiz Padang Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>34</td>
                <td>Padang Bola Sepak</td>
                <td>Saiz Padang Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>35</td>
                <td>Padang Hoki</td>
                <td>Padang Rumput Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>36</td>
                <td>Padang Hoki</td>
                <td>Padang Rumput Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>37</td>
                <td>Padang Hoki</td>
                <td>Padang Sintetik Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>38</td>
                <td>Padang Hoki</td>
                <td>Padang Sintetik Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>39</td>
                <td>Ping Pong</td>
                <td>Dalam Dewan Tertutup</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>40</td>
                <td>Ping Pong</td>
                <td>Dewan Serbaguna Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>41</td>
                <td>Ragbi</td>
                <td>Saiz Padang Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>42</td>
                <td>Ragbi</td>
                <td>Saiz Padang Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>43</td>
                <td>Sepak Takraw</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>44</td>
                <td>Sepak Takraw</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>45</td>
                <td>Sepak Takraw</td>
                <td>Gelanggang Terbuka Berbumbung</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>46</td>
                <td>Skuasy</td>
                <td>Gelanggang Dalam Dewan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>47</td>
                <td>Sofbol</td>
                <td>Saiz Padang Standard Pertandingan</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>48</td>
                <td>Sofbol</td>
                <td>Saiz Padang Untuk Latihan Sahaja</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
            <tr>
                <td>49</td>
                <td>Tenis</td>
                <td>Gelanggang Terbuka</td>
                <td>
                    300
                </td>
                <td>
                    300
                </td>
            </tr>
        </tbody>
    </table>
</div>
