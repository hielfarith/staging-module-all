<div class="btn-group" role="group" aria-label="Role Action">
    <a href="#" class="btn btn-outline-success waves-effect">
        <i class="fa fa-file-excel text-success"></i> Excel
    </a>
    <a href="#" class="btn btn-outline-danger waves-effect">
        <i class="fa fa-file-pdf text-danger"></i> PDF
    </a>
</div>

<hr>

<style>
    #ticket_listing thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ticket_listing tbody {
        vertical-align: middle;
    }

</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered table-responsive" id="issues" width="300%">
        <thead>
            <tr>
                <th rowspan="2" colspan="1"> NUM. </th>
                <th rowspan="2" colspan="1"> TICKET NUMBER </th>
                <th rowspan="2" colspan="1"> CATEGORY </th>
                <th rowspan="2" colspan="1"> ISSUER </th>
                <th rowspan="2" colspan="1"> FRP NO. </th>
                <th rowspan="2" colspan="1"> ISSUE </th>
                <th rowspan="2" colspan="1"> LEVEL </th>
                <th rowspan="1" colspan="8"> STATUS</th>
                <th rowspan="2" colspan="1"> IRT </th>
                <th rowspan="2" colspan="1"> PRT </th>
                <th rowspan="2" colspan="1"> CURRENT STATUS </th>
                <th rowspan="2" colspan="1"> MESSAGE </th>
                <th rowspan="2" colspan="1"> ACTION TAKEN </th>
            </tr>
            <tr>
                <th>DATE CREATED</th>
                <th>ACKNOWLEDGE</th>
                <th>IN PROGRESS</th>
                <th>Push Staging</th>
                <th>VERIFIED STAGING</th>
                <th>PUSH PRODUCTION</th>
                <th>VERIFIED PRODUCTION</th>
                <th>RESOLVED</th>
            </tr>
        </thead>

        <tbody>

            @php $count = 1; @endphp

            <tr>
                <td> {{ $count++ }} </td>
                <td><a href={{ route('helpdesk.update-ticket') }} class="btn btn-xs btn-default text-primary"
                        title="">FC8-A1A-D6E</a></td>
                <td>RETURN</td>
                <td>LEE THUNG KUEN</td>
                <td>‍20000382</td>
                <td>penyata dijana secara berganda</td>
                <td>Level 2 - Serious</td>
                <td>2023-05-30 09:17</td>
                <td>2023-05-30 10:17</td>
                <td>2023-05-30 10:43</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>0 hour 26 min </td>
                <td>0 hour 0 min </td>
                <td>IN PROGRESS </td>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> {{ $count++ }} </td>
                <td><a href={{ route('helpdesk.update-ticket') }} class="btn btn-xs btn-default text-primary"
                        title="">841-DCA-B37</a></td>
                <td>ADJUSTMENT</td>
                <td>SHATIRAH BINTI HARON HELMI </td>
                <td></td>
                <td>LISTING TIDAK TEPAT </td>
                <td>Level 3 - Moderate </td>
                <td>2023-05-30 09:17</td>
                <td>2023-05-30 10:17</td>
                <td>2023-05-30 10:43</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1 hour 15 min </td>
                <td>1 hour 15 min </td>
                <td>VERIFIED STAGING </td>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> {{ $count++ }} </td>
                <td><a href={{ route('helpdesk.update-ticket') }} class="btn btn-xs btn-default text-primary"
                        title="">6Q7-81R-9MG3</a></td>
                <td>REFUND</td>
                <td>userunijaya </td>
                <td>‍19000006</td>
                <td>Terdapat 4 permohonan refund dihantar pada 18 Apr 2023, tetapi sistem masih paparkan refund akan
                    carry forward ke tempoh bercukai ke-13 ( 01 Jan 2023 – 31 Mac 2023, Due date: 30 Apr 2023) </td>
                <td>Level 1 - Critical </td>
                <td>2023-04-27 09:39</td>
                <td>2023-05-30 10:17</td>
                <td>2023-05-30 10:43</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>0 hour 0 min </td>
                <td>0 hour 0 min </td>
                <td>RESOLVED </td>
                <td> </td>
                <td> "CPCDN bersetuju untuk carry forward ke tempoh bercukai ke-13 ( 01 Jan 2023 – 31 Mac 2023, Due
                    date: 30 Apr 2023). Perlu dokumentasi SOP yang sebenar bagi mengelakkan kekeliruan berlaku."
                </td>
            </tr>
        </tbody>
    </table>
</div>