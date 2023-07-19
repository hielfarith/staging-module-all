@extends('layouts.app')

@section('header')
Tambah Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Tambah Instrumen</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-7 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Tambah Instrumen </h4>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12 mb-1">
                        <label class="fw-bolder">Nama Instrumen:</label>
                        <input class="form-control" type="text" id="namaInstrumenInput">
                    </div>

                    <div class="col-md-12 col-12 mb-1">
                        <label class="fw-bolder">Keterangan Instrumen:</label>
                        <textarea class="form-control" rows="5" id="keteranganInstrumenInput"></textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <form id="attributeForm">
                    <div class="row">
                        <div class="col-md-6 col-12 mb-1">
                            <label class="fw-bolder">Nama Atribut:</label>
                            <input class="form-control" type="text" id="attributeName">
                        </div>

                        <div class="col-md-2 col-12 mb-1">
                            <label class="fw-bolder">Jenis Atribut:</label>
                            <select class="form-select select2" id="attributeType" required onchange="handleAttributeTypeChange()">
                                <option value="" hidden>Type</option>
                                <option value="text">Text</option>
                                <option value="longText">Long Text</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-12 mb-1">
                            <div id="checkboxRadioOptions" style="display: none;">
                                <label class="fw-bolder">Label Pilihan:</label>
                                <input class="form-control" type="text" id="optionLabels" placeholder="Option 1, Option 2, Option 3">
                                <p class="text-danger">Please use comma as separator for each labels.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end align-items-center my-1 ">
                        <a class="me-3" type="button" id="reset" href="#">
                            <span class="text-danger"> &nbsp; </span>
                        </a>
                        <button type="button" class="btn btn-sm btn-primary float-right" onclick="addAttribute()">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Senarai Instrumen </h4>
            </div>

            <hr>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Atribut</th>
                            <th>Jenis Atribut</th>
                            <th>Label Pilihan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>text</td>
                        <td>-</td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Action">
                                <a data-bs-toggle="modal" data-bs-target="#edit_instrumen" aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i class="fas fa-pencil text-primary"></i>
                                <a href="#" class="btn btn-xs btn-default"> <i class="fas fa-trash text-danger"></i> </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>longtext</td>
                        <td>-</td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Action">
                                <a data-bs-toggle="modal" data-bs-target="#edit_instrumen" aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i class="fas fa-pencil text-primary"></i>
                                <a href="#" class="btn btn-xs btn-default"> <i class="fas fa-trash text-danger"></i> </a>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-5 col-12">
        <h4 class="fw-bolder mb-1">Contoh Borang Instrumen: </h4>
        <div class="card">
            <div class="card-header">
                <h4 id="dynamicContent"></h4>
            </div>

            <hr>

            <div class="card-body">
                <p id="dynamicDescription"></p>
                <div id="attributeCardContainer"></div>
            </div>
        </div>
    </div>
</div>

<div class="buy-now">
    <a class="btn btn-danger waves-effect waves-float waves-light" onclick="fakeSuccess()">Simpan</a>
</div>

@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection

@section('script')
<script>
    document.getElementById("namaInstrumenInput").addEventListener("input", updateDynamicContent);
    document.getElementById("keteranganInstrumenInput").addEventListener("input", updateDynamicContent);

    function updateDynamicContent() {
        const inputVal = document.getElementById("namaInstrumenInput").value;
        const keteranganInputVal = document.getElementById("keteranganInstrumenInput").value;

        const dynamicContentDiv = document.getElementById("dynamicContent");
        const dynamicDescriptionDiv = document.getElementById("dynamicDescription");

        // Update the content of the target element
        dynamicContentDiv.innerText = inputVal;
        dynamicDescriptionDiv.innerText = keteranganInputVal;
    }

    const attributes = [];

    function handleAttributeTypeChange() {
      const attributeType = document.getElementById("attributeType").value;
      const checkboxRadioOptions = document.getElementById("checkboxRadioOptions");

      // Show the additional input field if the type is "Checkbox" or "Radio"
      checkboxRadioOptions.style.display = attributeType === "checkbox" || attributeType === "radio" ? "block" : "none";
    }

    function addAttribute() {
      // Get input values
      const attributeName = document.getElementById("attributeName").value;
      const attributeType = document.getElementById("attributeType").value;

      // If checkbox or radio, get the option labels and split them into an array
      const optionLabels = attributeType === "checkbox" || attributeType === "radio"
        ? document.getElementById("optionLabels").value.split(',').map(label => label.trim())
        : [];

      // Push the new attribute to the array
      attributes.push({ name: attributeName, type: attributeType, labels: optionLabels });

      // Update the card container
      updateCardContainer();

      // Clear the input fields after adding the attribute
      document.getElementById("attributeName").value = "";
      document.getElementById("attributeType").value = "text"; // Reset to default option
      document.getElementById("optionLabels").value = "";
      document.getElementById("checkboxRadioOptions").style.display = "none"; // Hide the additional input field
    }

    function updateCardContainer() {
      // Get the container
      const container = document.getElementById("attributeCardContainer");

      // Clear the container
      container.innerHTML = "";

      // Create and append the attribute cards
      attributes.forEach((attribute) => {
        const attributeCard = document.createElement("div");
        attributeCard.className = "attribute-card";

        let attributeHTML = `<b>${attribute.name}</b>: `;

        if (attribute.type === "text") {
          attributeHTML += '<input type="text" class="form-control">';
        } else if (attribute.type === "longText") {
          attributeHTML += '<textarea class="form-control"></textarea>';
        } else if (attribute.type === "checkbox") {
          attributeHTML += attribute.labels.map(label => `<input type="checkbox">${label}<br>`).join('');
        } else if (attribute.type === "radio") {
          attributeHTML += attribute.labels.map(label => `<input type="radio" name="${attribute.name}">${label}<br>`).join('');
        }

        attributeCard.innerHTML = attributeHTML;
        container.appendChild(attributeCard);
      });
    }
  </script>

@endsection
