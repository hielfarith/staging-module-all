<div class="form-group main-container" id="div_{{$name}}">
    <label for="{{ $name }}">{{ $label }}</label>
       <div class="col-md-8">
        <select name="{{ $name }}" id="{{ $name }}" {{ $attributes }} class="form-control" type="select">
            <option value="">Select</option>
            {{ $slot }}
        </select>
    </div>
    <!-- <button type="button" class="delete-button" onclick="deletediv('div_{{$name}}')">Delete</button> -->
     <a class="delete-button btn-btn-danger" onclick="deletediv('div_{{$name}}')">
           <span>
           <i class="fa fa-trash"></i>
           </span> 
        </a>
</div>
