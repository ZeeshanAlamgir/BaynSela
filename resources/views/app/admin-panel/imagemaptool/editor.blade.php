<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{ env('APP_NAME') }} Image Map Pro Editor</title>
    <meta name="description" content="Image Map Pro Editor">
    <meta name="author" content="Nikolay Dyankov">

    <!-- Submodules -->
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/squares/css/squares.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/squares/css/squares-editor.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/squares/css/squares-controls.css') }}">

    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-editor/css/wcp-editor.css') }}">

    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-form/css/wcp-form.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-form/css/wcp-form-controls.css') }}">

    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-tour/css/wcp-tour.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/submodules/wcp-fontawesome/css/wcp-fontawesome.css') }}">

    <!-- Image Map Pro Editor -->
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/css/image-map-pro-editor.css') }}">

    <!-- Image Map Pro Plugin -->
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/css/image-map-pro.css') }}">
</head>

<body>

    <div id="wcp-editor"></div>

    <!-- Libs -->
    <script src="{{ asset('app-assets/imagemaptool/js/lib/jquery.min.js') }}"></script>

    <!-- Submodules -->
    <script src="{{ asset('app-assets/imagemaptool/submodules/svg-path-parser/svg-path-parser.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/squares/js/squares-renderer.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/squares/js/squares.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/squares/js/squares-elements-jquery.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/squares/js/squares-controls.js') }}"></script>

    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-form/js/wcp-form.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-form/js/wcp-form-controls.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-editor/js/wcp-editor.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-tour/js/wcp-tour.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-compress/js/wcp-compress.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/submodules/wcp-fontawesome/js/wcp-fontawesome.js') }}"></script>

    <!-- Image Map Pro Editor -->
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-defaults.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-editor-countries-jquery.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-editor.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-editor-content.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-editor-storage-jquery.js') }}"></script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro-editor-init-jquery.js') }}"></script>

    <!-- <script src="js/image-map-pro-editor-website.js') }}"></script> -->

    <!-- Image Map Pro Plugin -->
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro.js') }}"></script>


</body>
</html>
