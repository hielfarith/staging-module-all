<h6>{{ $title }}</h4>
<hr>
<label for="{{ 'acara_'.$name.'_'.$type }}">Nama Acara</label>
<input type="text" name="{{ 'acara_'.$name.'_'.$type }}" class="form-control">
<br>
<label for="{{ 'jurulatih_'.$name.'_'.$type }}">Jurulatih</label>
<select class="form-control select2" name="{{ 'jurulatih_'.$name.'_'.$type }}" required>
    <option value="">Sila Pilih:</option>
    @foreach($jurulatih as $juru)
    <option value="{{ $juru->id }}">{{ $juru->nama_pengguna }}</option>
    @endforeach
</select>
<br>
<?php
    for($i=1; $i<=$value;$i++){
?>
<label for="{{ 'ic_'.$name.'_'.$type.'_'.$i }}">No Kad Pengenalan</label>
<input type="text" name="{{ 'ic_'.$name.'_'.$type.'_'.$i }}" class="form-control">
<br>
<?php } ?>