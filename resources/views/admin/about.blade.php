@extends('layout.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/about.css') }}">
@endsection

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <div class="wrap-content-body">
            <h1>
                En savoir plus
            </h1><br />

            <form action="{{ route('about.update', $about->id) }}" method="post">
                @csrf
                @method('PUT')
                <textarea name="about" id="summernote">{{ $about->about }}</textarea><br />

                <button class="button">
                    Soumettre
                    &nbsp;
                    &rightarrow;
                </button>
            </form>

            <div class="image-wrap-container">
                <h2>Image d'en savoir plus</h2>
                <div class="image-wrap-content">
                    <figure class="about-image">
                        @if ($contentFile != null)
                            <img src="{{ asset('storage/app/public/' . $contentFile->filepath) }}" alt="Image en savoir plus">
                        @endif
                    </figure>
                    <form action="{{ route('storeOrUpdateAboutFile', $contentFile) }}" method="post" class="dropzone-box" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <h3>Charger un fichier</h3>
                        <p>Cliquer pour charger ou téléverser</p>
                        <div class="dropzone-area">
                            <div class="file-upload-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                        <line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                    <polyline points="16 16 12 12 8 16"></polyline>
                                </svg>
                            </div>
                            <input type="file" accept="image/*" id="about-file" name="about-file">
                            <p class="file-info">Aucun fichier sélectionné</p>
                        </div>
                        <div class="dropzone-actions">
                            <button type="reset" id="resetButton">Annuler</button>
                            <button type="submit" id="submit-button">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                placeholder: 'Saisir un texte descriptif sur votre église pour renseigner davantage votre public ...'
            })


            const dropzoneBox = document.getElementsByClassName("dropzone-box")[0];
            const inputFiles = document.querySelectorAll(".dropzone-area input[type='file']");
            const inputElement = inputFiles[0];
            const dropZoneElement = inputElement.closest('.dropzone-area');

            const updateDropzoneFileList = (dropZoneElement, file) => {
                let dropzoneFileMessage = dropZoneElement.querySelector(".file-info");

                dropzoneFileMessage.innerHTML = `${file.name}, ${file.size} octets`;
            };


            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateDropzoneFileList(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("dropzone--over");
            })

            let dragOptions = ["dragleave", "dragend"];

            dragOptions.forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("dropzone--over")
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;

                    updateDropzoneFileList(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("dropzone--over");
            });

            dropzoneBox.addEventListener("reset", (e) => {

                let dropzoneFileMessage = dropZoneElement.querySelector(".file-info");

                dropzoneFileMessage.innerHTML = "Aucun fichier sélectionné"
            });

        })
    </script>
@endsection
